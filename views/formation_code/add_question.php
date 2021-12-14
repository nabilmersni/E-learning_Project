<?php

include_once('../../controllers/questionC.php');


$questionC = new QuestionC();
        
if(isset($_POST["question_content"]) )
    {         
        $question_content = $_POST['question_content'];
        $date_added = date("d/m/Y - h:i A");
        $id_l = $_GET['id_l'];
        $id_f = $_GET['id_f'];

        //$lesson_id = 17;
    
        $question = new Question($question_content, $id_l, $date_added );
    
        $questionC->ajouter_question($question);
        header("Location: ../dash_instructor-quiz-add.php?id_f=$id_f&id_l=$id_l"); 
    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }




?>