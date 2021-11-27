<?php

include_once ('../../controllers/requirementC.php');


$requirementC = new RequirementC();
        
if(isset($_POST["req_content"]) )
    {   $req_content = $_POST['req_content'];
        $id = $_GET['id'];
        $id_req = $_GET['id_req'];
        
        $requirement = new Requirement($req_content, $id);
    
        $requirementC->modifier_requirement($requirement ,$id_req);
        header("Location: ../dash_instructor-requirements-add.php?id=$id");
    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }




?>