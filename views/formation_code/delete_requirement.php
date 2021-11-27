<?php
include_once('../../controllers/requirementC.php');
$requirementC = new RequirementC();
$req_id= $_GET['req_id'];
$listeRequirements = $requirementC->supprimer_requirement($req_id);
$id= $_GET['id'];

header("Location: ../dash_instructor-requirements-add.php?id=$id"); 

?>