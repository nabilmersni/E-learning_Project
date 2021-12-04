<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// include_once ('..\configdb\db_connector.php');
// include_once ('..\models\lesson.php');
require_once (__DIR__.'\..\configdb\db_connector.php');
include_once (__DIR__.'\..\models\lesson.php');

class LessonC{

/********************************************Function afficher lesson*****************************************/
Function afficher_lessons($id){

	$sql="SELECT * FROM lessons WHERE chapter_id='$id' ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}

//*****************************************Function récupérer lesson***********************************************
Function recuperer_lesson($id){

    $sql="SELECT * FROM lessons WHERE lesson_id='$id' LIMIT 1" ;
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }

}

//*****************************************Function supprimer lesson***********************************************
function supprimer_lesson($id){
    $sql = "DELETE FROM lessons WHERE lesson_id ='$id' ";
    $db = config::getConnexion();
    
    $query = $db->prepare($sql);
    try{
        $query->execute();
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}

/********************************************Function ajouter lesson*****************************************/
function ajouter_lesson($lesson){
    $sql = "INSERT INTO lessons(lesson_title ,lesson_description, lesson_type, lesson_video, date_added, chapter_id) VALUES ( :lesson_title, :lesson_description, :lesson_type, :lesson_video, :date_added, :chapter_id )";
    $db = config::getConnexion();
    try{
    $req = $db->prepare($sql);
        $req->execute([
            'lesson_title' => $lesson->getlesson_title(),
            'lesson_description' => $lesson->getlesson_description(),
            'lesson_type' => $lesson->getlesson_type(),
			'lesson_video' => $lesson->getlesson_video(),
			'date_added' => $lesson->getdate_added(),
			'chapter_id' => $lesson->getchapter_id()
        ]);
     
        //$_SESSION['flash_success'] = "Congratulation Data added successfully!";
        //header("Location: ../views/dash_instructor-chapter-add.php?id=$formation_id");
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}

//******************************************Fonction modifier lesson*********************************************
function modifier_lesson($lesson, $id){
    $lesson_title = $lesson->getlesson_title();
    $lesson_description = $lesson->getlesson_description();
    $lesson_video = $lesson->getlesson_video();
    $update_lesson = "UPDATE lessons SET lesson_title = :lesson_title ,lesson_description = :lesson_description ,lesson_video = :lesson_video WHERE lesson_id='$id' ";
    $db = config::getConnexion();

    try{
        $query = $db->prepare($update_lesson);
        $query->execute([
             'lesson_title' => $lesson_title,
             'lesson_description' => $lesson_description,
             'lesson_video' => $lesson_video 
        ]);
       // $_SESSION['flash_success'] = "Congratulation Data updated successfully!";
       // header("Location: ../views/dash_instructor-chapter-add.php");

    }
    catch(Exception $e)
    {
        die('Erreuer: '.$e->getMessage() );
    }

}






}//end class LessonC



?>