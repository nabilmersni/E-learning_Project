<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once ('C:\xampp\htdocs\E-learning_Project_last_version\configdb\db_connector.php');
include_once('C:\xampp\htdocs\E-learning_Project_last_version\models\chapter.php');

class ChapterC{

/********************************************Function afficher chapitre*****************************************/
Function afficher_chapitres($id){

	$sql="SELECT * FROM chapitres WHERE formation_id = '$id' ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}

//*****************************************Function récupérer chapitre***********************************************
Function recuperer_chapitre($id){

    $sql="SELECT * FROM chapitres WHERE chapter_id='$id' LIMIT 1" ;
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }

}

//*****************************************Function supprimer chapitre***********************************************
function supprimer_chapitre($id){
    $sql = "DELETE FROM chapitres WHERE chapter_id ='$id' ";
    $db = config::getConnexion();
    
    $query = $db->prepare($sql);
    try{
        $query->execute();
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}

//***********************************************Fuction ajouter_chapitre**************************************
function ajouter_chapitre($chapter){
    $sql = "INSERT INTO chapitres(chapter_title, chapter_description, date_added, formation_id) VALUES ( :chapter_title ,:chapter_description ,:date_added, :formation_id )";
    $db = config::getConnexion();
    try{
    $req = $db->prepare($sql);
        $req->execute([
            
            'chapter_title' => $chapter->getchapter_title(),
            'chapter_description' => $chapter->getchapter_description(),
            'date_added' => $chapter->getdate_added(),
            'formation_id' => $chapter->getformation_id()
        ]);
     
        //header("Location: ../views/dash_instructor-chapter-add.php");
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}

//******************************************Fonction modifier chapitre*********************************************
function modifier_chapitre($chapter, $id){
    $chapter_title = $chapter->getchapter_title();
    $chapter_description = $chapter->getchapter_description();
    $update_chapter = "UPDATE chapitres SET chapter_title = :chapter_title ,chapter_description = :chapter_description WHERE chapter_id='$id' ";
    $db = config::getConnexion();

    try{
        $query = $db->prepare($update_chapter);
        $query->execute([
             'chapter_title' => $chapter_title,
             'chapter_description' => $chapter_description 
        ]);
        $_SESSION['flash_success'] = "Congratulation Data updated successfully!";
        header("Location: ../views/dash_instructor-chapter-add.php");

    }
    catch(Exception $e)
    {
        die('Erreuer: '.$e->getMessage() );
    }

}







}//end class ChapterC



?>