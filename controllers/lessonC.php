<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once ('C:\xampp\htdocs\E-learning_Project_last_version\configdb\db_connector.php');
include_once ('C:\xampp\htdocs\E-learning_Project_last_version\models\lesson.php');

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
Function recuperer_formation($id){

    $sql="SELECT * FROM formations WHERE formation_id='$id' LIMIT 1" ;
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
function ajouter_formation($formation){
    $sql = "INSERT INTO formations(name ,description, categorie, level, price, image, date_added, user_id) VALUES ( :name, :description, :categorie, :level, :price, :image, :date_added, :user_id )";
    $db = config::getConnexion();
    try{
    $req = $db->prepare($sql);
        $req->execute([
            'name' => $formation->getname(),
            'description' => $formation->getdescription(),
            'categorie' => $formation->getcategorie(),
			'level' => $formation->getlevel(),
			'price' => $formation->getprice(),
			'image' => $formation->getimage(),
			'date_added' => $formation->getdate_added(),
			'user_id' => $formation->getuser_id()
        ]);
     
        $_SESSION['flash_success'] = "Congratulation Data added successfully!";
        header("Location: ../views/dash_instructor-courses-add.php");
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}







}//end class FormationC



?>