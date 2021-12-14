<?php

include_once ('../../controllers/reponseC.php');


$reponseC = new ReponseC();
        
        $id = $_GET['id'];
        $id_f = $_GET['id_f'];
        $id_l = $_GET['id_l'];
        $true = $_GET['true'];
        
        if($true == 0)
        {
            $reponseC->bonne_reponse($id, 1);
        }else if($true == 1)
        {
            $reponseC->bonne_reponse($id, 0);
        }
        
        header("Location: ../dash_instructor-quiz-add.php?id_f=$id_f&id_l=$id_l");
    

?>