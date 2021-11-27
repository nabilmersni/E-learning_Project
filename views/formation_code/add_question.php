<?php

include_once('../../controllers/questionC.php');


$questionC = new QuestionC();
        
if(isset($_POST["question_content"]) )
    {         
        $question_content = $_POST['question_content'];
        $date_added = date("d/m/Y - h:i:s A");
        //$lesson_id = $_GET['id'];
        $lesson_id = 17;
    
        $question = new Question($question_content, $date_added, $lesson_id );
    
        $questionC->ajouter_question($question);
        //header('Location: ../views/dash_instructor-chapter-add.php');
    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }




?>