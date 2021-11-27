<?php
include_once('../../controllers/lessonC.php');
$lessonC = new LessonC();
$id_l= $_GET['id_l'];
$id_f= $_GET['id_f'];

$listeLessons = $lessonC->supprimer_lesson($id_l);

header("Location: ../dash_instructor-chapter-add.php?id=$id_f"); 

?>