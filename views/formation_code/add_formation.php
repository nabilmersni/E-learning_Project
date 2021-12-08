<?php

include('../../controllers/formationC.php');


$formationC = new FormationC();
        
if( isset($_POST["course_title"]) &&
    isset($_POST["short_description"]) &&
    isset($_POST["course_description"]) &&
    isset($_POST["course_categorie"]) &&
    isset($_POST["course_level"]) &&
    isset($_FILES["course_image"]) 

)
    {         
        $course_title = $_POST["course_title"];
        $short_description = $_POST["short_description"];
        $course_description = $_POST["course_description"];
        $course_categorie = $_POST["course_categorie"];
        $course_level = $_POST["course_level"];
        $course_price = 0;
        if(!empty($_POST["course_price"]) )
        {
            $course_price= $_POST["course_price"];
        }
        $course_image = $_FILES["course_image"];
        //$course_image = "../contents/img/course-cover.jpg";

        $date_added = date("d/m/Y - h:i:s A");
        $state = 0;
        $top_formation = 0;

        $user_id = $_SESSION['user']->user_id;
        //$user_id = 53;


        $img_name = $_FILES['course_image']['name'];
	    $img_size = $_FILES['course_image']['size'];
	    $tmp_name = $_FILES['course_image']['tmp_name'];
	    $error = $_FILES['course_image']['error'];
        if ($error === 0) {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
    
            $allowed_exs = array("jpg", "jpeg", "png", "gif"); 
    
            if (in_array($img_ex_lc, $allowed_exs)) 
            {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
    
                
            }
        }
        
        
            $formation = new Formation($course_title, $short_description, $course_description, $course_categorie, $course_level, $course_price, $new_img_name, $date_added, $state, $top_formation, $user_id );
        
            $formationC->ajouter_formation($formation);
            //header('Location: ./dash_instructor-chapter-add.php');
        }
        else
            {
                $_SESSION['error'] = "Missing information!"  ;
                header('Location: ../dash_instructor-courses-add.php');
            }




?>