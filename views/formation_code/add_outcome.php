<?php

include_once('../../controllers/outcomeC.php');


$outcomeC = new OutcomeC();
        
if(isset($_POST["out_content"]) )
    {         
        $out_content = $_POST['out_content'];
        $formation_id = $_GET['id'];
        
        $outcome = new Outcome($out_content, $formation_id );
    
        $outcomeC->ajouter_outcome($outcome);
        //header('Location: ../views/dash_instructor-chapter-add.php');
    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }




?>