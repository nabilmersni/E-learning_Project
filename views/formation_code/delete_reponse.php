<?php
include_once('../../controllers/reponseC.php');
$reponseC = new ReponseC();
$listeReponses = $reponseC->supprimer_reponse($_GET['id']);

$_SESSION['update_quiz'] = "";
header('Location: ../dash_instructor-chapter-add.php'); 

?>