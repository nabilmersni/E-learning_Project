<?php
include_once('../../controllers/chapterC.php');
$chapterC = new ChapterC();
$id = $_GET['id'];
$id_f = $_GET['id_f'];
$listeChapters = $chapterC->supprimer_chapitre($id);

header("Location: ../dash_instructor-chapter-add.php?id=$id_f"); 

?>