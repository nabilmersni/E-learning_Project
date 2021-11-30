<?php

include_once('../../controllers/lessonC.php');


$lessonC = new LessonC();
        
if(isset($_POST["lesson_title"]) &&
    isset($_POST["lesson_description"]) &&
    isset($_POST["lesson_type"])
    
 )
    {         
        $lesson_title = $_POST['lesson_title'];
        $lesson_description = $_POST['lesson_description'];
        $lesson_type = $_POST['lesson_type'];
        
        //$lesson_video = "";
        $new_video_name ="";
        if(strcmp($lesson_type,"video") == 0)
        {
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
        //------------------------------------
        }
        

        $date_added = date("d/m/Y - h:i A");
        
        $formation_id = $_GET['formation_id'];
        $chapter_id = $_GET['chapter_id'];
        
        $lesson = new Lesson($lesson_title, $lesson_description, $lesson_type, $new_video_name, $date_added, $chapter_id );
    
        $lessonC->ajouter_lesson($lesson);
        header("Location: ../dash_instructor-chapter-add.php?id=$formation_id");
    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }




?>