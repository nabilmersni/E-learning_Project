<?php

include_once('../../controllers/requirementC.php');


$requirementC = new RequirementC();
        
if(isset($_POST["req_content"]) )
    {         
        $req_content = $_POST['req_content'];
        $formation_id = $_GET['id'];
        
        $requirement = new Requirement($req_content, $formation_id );
    
        $requirementC->ajouter_requirement($requirement);
        //header('Location: ../views/dash_instructor-chapter-add.php');
    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }




?>