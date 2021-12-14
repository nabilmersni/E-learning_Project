<?php

include_once('../../controllers/reponseC.php');


$reponseC = new ReponseC();
        
if(isset($_POST["reponse_content"]) )
    {         
        $reponse_content = $_POST['reponse_content'];
        $question_id = $_GET['id'];
        //$question_id = 8;
    
        $reponse = new Reponse($reponse_content, $question_id );

        $id_l = $_GET['id_l'];
        $id_f = $_GET['id_f'];
    
        $reponseC->ajouter_reponse($reponse);
        header("Location: ../dash_instructor-quiz-add.php?id_f=$id_f&id_l=$id_l"); 
    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }




?>