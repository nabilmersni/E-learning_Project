<?php

include_once('../../controllers/notifC.php');
include_once ('../../controllers/formationC.php');


$formationC = new FormationC();

$notifC = new NotifC();
         
        $user_id = $_GET['user_id'];
        $for_who = "admin";
        $content = "added a new course!";
        $id_formation = $_GET['formation_id'];
        $notif = new Notif($user_id, $for_who, $content ,$id_formation );
    
        $formationC->sent_for_validation( $id_formation);
        $notifC->ajouter_notif($notif);
        //header('Location: ../views/dash_instructor-chapter-add.php');
        header("Location: ../dash_instructor-courses.php");
    
        
?>