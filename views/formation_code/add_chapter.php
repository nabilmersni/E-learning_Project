<?php

include_once('../../controllers/chapterC.php');


$chapterC = new ChapterC();
        
if(isset($_POST["chapter_title"]) &&
     isset($_POST["chapter_description"]) 
 )
    {         
        $chapter_title = $_POST['chapter_title'];
        $chapter_description = $_POST['chapter_description'];
        $date_added = date("d/m/Y - h:i:s A");
        $formation_id = $_GET['id'];
        //$lesson_id = 1;
    
        $chapter = new Chapter($chapter_title, $chapter_description, $date_added, $formation_id );
    
        $chapterC->ajouter_chapitre($chapter);
        header("Location: ../dash_instructor-chapter-add.php?id=$formation_id");
    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }




?>