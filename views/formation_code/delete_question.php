<?php
include_once('../../controllers/questionC.php');
$questionC = new QuestionC();
$listeQuestions = $questionC->supprimer_question($_GET['id']);

$_SESSION['update_quiz'] = "";
header('Location: ../dash_instructor-chapter-add.php'); 

?>