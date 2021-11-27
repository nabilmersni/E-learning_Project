<?php

include_once('../../controllers/reponseC.php');


$reponseC = new ReponseC();
        
if(isset($_POST["reponse_content"]) )
    {         
        $reponse_content = $_POST['reponse_content'];
        $question_id = $_GET['id'];
        //$question_id = 8;
    
        $reponse = new Reponse($reponse_content, $question_id );
    
        $reponseC->ajouter_reponse($reponse);
        //header('Location: ../views/dash_instructor-chapter-add.php');
    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }




?>