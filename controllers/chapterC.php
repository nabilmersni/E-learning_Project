<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// include_once ('..\configdb\db_connector.php');
// include_once('..\models\chapter.php');

require_once (__DIR__.'\..\configdb\db_connector.php');
include_once (__DIR__.'\..\models\chapter.php');

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

/********************************************Function afficher chapitre selon page order*****************************************/
Function afficher_chapitres_page_order($id){

	$sql="SELECT * FROM chapitres WHERE formation_id = '$id' ORDER BY page_order ASC ";
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
    $sql = "INSERT INTO chapitres(chapter_title, chapter_description, date_added, formation_id, chapter_duration) VALUES ( :chapter_title ,:chapter_description ,:date_added, :formation_id , :chapter_duration )";
    $db = config::getConnexion();
    try{
    $req = $db->prepare($sql);
        $req->execute([
            
            'chapter_title' => $chapter->getchapter_title(),
            'chapter_description' => $chapter->getchapter_description(),
            'date_added' => $chapter->getdate_added(),
            'formation_id' => $chapter->getformation_id(),
            'chapter_duration' => $chapter->getchapter_duration()
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
    $chapter_duration = $chapter->getchapter_duration();
    $update_chapter = "UPDATE chapitres SET chapter_title = :chapter_title ,chapter_description = :chapter_description ,chapter_duration = :chapter_duration WHERE chapter_id='$id' ";
    $db = config::getConnexion();

    try{
        $query = $db->prepare($update_chapter);
        $query->execute([
             'chapter_title' => $chapter_title,
             'chapter_description' => $chapter_description,
             'chapter_duration' => $chapter_duration 
        ]);
        $_SESSION['flash_success'] = "Congratulation Data updated successfully!";
        header("Location: ../views/dash_instructor-chapter-add.php");

    }
    catch(Exception $e)
    {
        die('Erreuer: '.$e->getMessage() );
    }

}


/********************************************Function count chapter*****************************************/
Function count_chapter($id){

	$sql="SELECT count(chapter_id) FROM chapitres WHERE formation_id='$id' " ;
    $db = config::getConnexion();
    try{
        $query = $db->query($sql);
        $query->execute();
   	    $chapter_number =$query->fetchColumn();
        return $chapter_number;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }   
}



//******************************************Fonction modifier chapitres order*********************************************
function modifier_chapitre_order(){
    
    for($i=0; $i<count($_POST["page_id_array"]); $i++)
    {
        $page_id = $_POST["page_id_array"][$i];
        $update_chapter = "UPDATE chapitres SET page_order = :page_order WHERE chapter_id='$page_id' ";
    $db = config::getConnexion();

    try{
        $query = $db->prepare($update_chapter);
        $query->execute([
        'page_order' => $i 
        ]);
        $_SESSION['flash_success'] = "Congratulation Data updated successfully!";
        header("Location: ../views/dash_instructor-chapter-add.php");

    }
    catch(Exception $e)
    {
        die('Erreuer: '.$e->getMessage() );
    }


    }
    
    
    
}





}//end class ChapterC



?>