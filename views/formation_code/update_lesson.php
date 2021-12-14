<?php

include_once ('../../controllers/lessonC.php');


$lessonC = new LessonC();
$formation_id = $_GET['formation_id'];
$lesson_id = $_GET['lesson_id'];

if(isset($_POST["lesson_title"]) && isset($_POST['lesson_description']) )
    {   $lesson_title = $_POST['lesson_title'];
        $lesson_description = $_POST['lesson_description'];
        //$lesson_video = $_FILES['lesson_video'];

        if(isset($_POST['lesson_video_url']) && !empty($_POST['lesson_video_url'])){

            $new_video_name =$_POST['lesson_video_url'];
        }
        else
        {
            $new_video_name = "";
        }
        
        if(!empty($_FILES['lesson_video'])){
            $lesson_video = $_FILES['lesson_video'];
            //------------------------------------
        $video_name = $_FILES['lesson_video']['name'];
	    //$img_size = $_FILES['lesson_video']['size'];
	    $tmp_name = $_FILES['lesson_video']['tmp_name'];
	    $error = $_FILES['lesson_video']['error'];
        if ($error === 0) {
            $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);
            $video_ex_lc = strtolower($video_ex);
    
            $allowed_exs = array("mp4", 'webm', 'avi', 'flv'); 
    
            if (in_array($video_ex_lc, $allowed_exs)) 
            {
                $new_video_name = uniqid("video-", true).'.'.$video_ex_lc;
                $video_upload_path = 'uploads/'.$new_video_name;
                move_uploaded_file($tmp_name, $video_upload_path);
    
                
            }
        }

        }    
        
        //------------------------------------
    
        
        $lesson = new Lesson($lesson_title, $lesson_description, "", $new_video_name , "", 1 );
    
        $lessonC->modifier_lesson($lesson ,$lesson_id);
        header("Location: ../dash_instructor-chapter-add.php?id=$formation_id");
    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }
