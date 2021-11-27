<?php
include_once('../../controllers/outcomeC.php');
$outcomeC = new OutcomeC();
$out_id= $_GET['out_id'];
$listeOutcomes = $outcomeC->supprimer_outcome($out_id);
$id= $_GET['id'];

header("Location: ../dash_instructor-requirements-add.php?id=$id"); 

?>