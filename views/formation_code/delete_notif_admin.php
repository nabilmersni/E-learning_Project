<?php
include_once('../../controllers/notifC.php');
$notifC = new NotifC();
$notif_id= $_GET['notif_id'];
$listeNotifs = $notifC->supprimer_notif($notif_id);
$formation_id= $_GET['formation_id'];

header("Location: ../dash_instructor-course-update.php?id=$formation_id"); 

?>