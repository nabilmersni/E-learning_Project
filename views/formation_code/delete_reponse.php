<?php
include_once('../../controllers/reponseC.php');
$reponseC = new ReponseC();
$listeReponses = $reponseC->supprimer_reponse($_GET['id']);

$id_f = $_GET['id_f'];
$id_l = $_GET['id_l'];

$_SESSION['update_quiz'] = "";
header("Location: ../dash_instructor-quiz-add.php?id_f=$id_f&id_l=$id_l"); 

?>