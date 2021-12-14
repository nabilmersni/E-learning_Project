<?php

include_once ('../../controllers/reponseC.php');


$reponseC = new ReponseC();
        
if(isset($_POST["reponse_content"]) )
    {   $reponse_content = $_POST['reponse_content'];
        $id = $_GET['id'];
        $id_f = $_GET['id_f'];
        $id_l = $_GET['id_l'];
        
        $reponse = new Reponse($reponse_content, 1);
    
        $reponseC->modifier_reponse($reponse ,$id);
        header("Location: ../dash_instructor-quiz-add.php?id_f=$id_f&id_l=$id_l");
    }
    else
        {
            $_SESSION['error'] = "Missing information!"  ;
            header('Location: ../views/signUp.php');
        }




?>