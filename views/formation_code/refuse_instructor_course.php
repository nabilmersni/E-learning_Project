<?php

include_once('../../controllers/notifC.php');
include_once ('../../controllers/formationC.php');


$formationC = new FormationC();

$notifC = new NotifC();
         
        $user_id = $_GET['user_id'];
        $for_who = "user";
        $content = "Sorry! Your course has been refused.";
        $id_formation = 0;
        $notif = new Notif($user_id, $for_who, $content ,$id_formation );
    
        $notifC->ajouter_notif($notif);
        
        $state = 2;
        $formation = new Formation("", "", "", "", "", 0, "", "", $state, 0, 0 );
        
        $formation_id = $_GET['formation_id'];
        $formationC->state_formation($formation , $formation_id);

        $reasons = "Les formateurs ne peuvent pas suggérer aux participants quel type de note ou d'avis ils doivent laisser, ou souligner tout détail ou information à inclure dans leurs commentaires.
        Les formateurs ne doivent pas spécifier quel moyen doit être utilisé pour exprimer des commentaires divers";
       // $formationC->sendemail_coordonnees($reasons);
       if(isset($_POST['reasons'] ) ){
        $reasons = $_POST['reasons'];

       }

        $array = $formationC->get_elements($formation_id);

        $formationC->sendemail_verify($array,$reasons);
        

        
        
        
        //header('Location: ../views/dash_instructor-chapter-add.php');
        header("Location: ../dash_admin-courses.php");
    
        
?>