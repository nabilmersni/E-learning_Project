<?php

include_once ('../../controllers/questionC.php');


$questionC = new QuestionC();
        
if(isset($_POST["question_content"]) )
    {   $question_content = $_POST['question_content'];
        $id = $_GET['id'];
        $id_f = $_GET['id_f'];
        $id_l = $_GET['id_l'];
        
        $question = new Question($question_content, $id_l, "");
    
        $questionC->modifier_question($question ,$id);
        header("Location: ../dash_instructor-quiz-add.php?id_f=$id_f&id_l=$id_l");
    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }




?>