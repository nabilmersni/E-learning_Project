<?php

include_once('../../controllers/notifC.php');
include_once ('../../controllers/formationC.php');


$formationC = new FormationC();

$notifC = new NotifC();
         
        $user_id = $_GET['user_id'];
        $for_who = "user";
        $content = "Congratulation! Your course has been accepted.";
        $id_formation = 0;
        $notif = new Notif($user_id, $for_who, $content ,$id_formation );
    
        $notifC->ajouter_notif($notif);
        
        $state = 1;
        $formation = new Formation("", "", "", "", "", 0, "", "", $state, 0, 0 );
        
        $formation_id = $_GET['formation_id'];
        $formationC->state_formation($formation , $formation_id);
        //header('Location: ../views/dash_instructor-chapter-add.php');
        header("Location: ../dash_admin-courses.php");
    
        
?>