<?php

include_once ('../../controllers/chapterC.php');


$chapterC = new ChapterC();
        
if(isset($_POST["chapter_title"]) && isset($_POST['chapter_description']) )
    {   $chapter_title = $_POST['chapter_title'];
        $id = $_GET['id'];
        $id_f = $_GET['id_f'];
        $chapter_description = $_POST['chapter_description'];
        $chapter_duration = $_POST['chapter_duration'];
        //$last_modified = date("d/m/Y - h:i:s A");
    
        $chapter = new Chapter($chapter_title, $chapter_description, '',5 ,$chapter_duration );
    
        $chapterC->modifier_chapitre($chapter ,$id);
        header("Location: ../dash_instructor-chapter-add.php?id=$id_f");
    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }




?>