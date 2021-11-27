<?php
include_once('../../controllers/formationC.php');
$formationC = new FormationC();
$listeFormations = $formationC->supprimer_formation($_GET['id']);
header('Location: ../dash_admin-courses.php'); 

?>