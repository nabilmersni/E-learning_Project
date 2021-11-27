<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once ('C:\xampp\htdocs\E-learning_Project_last_version\configdb\db_connector.php');
include_once('C:\xampp\htdocs\E-learning_Project_last_version\models\reponse.php');

class ReponseC{

/********************************************Function afficher reponse*****************************************/
Function afficher_reponses($question_id){

	$sql="SELECT * FROM reponses WHERE question_id='$question_id' ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}

//*****************************************Function récupérer reponse***********************************************
Function recuperer_reponse($id){

    $sql="SELECT * FROM reponses WHERE reponse_id='$id' LIMIT 1" ;
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }

}

//*****************************************Function supprimer reponse***********************************************
function supprimer_reponse($id){
    $sql = "DELETE FROM reponses WHERE reponse_id ='$id' ";
    $db = config::getConnexion();
    
    $query = $db->prepare($sql);
    try{
        $query->execute();
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}

//***********************************************Fuction ajouter reponse**************************************
function ajouter_reponse($reponse){
    $sql = "INSERT INTO reponses(reponse_content, question_id) VALUES ( :reponse_content ,:question_id )";
    $db = config::getConnexion();
    try{
    $req = $db->prepare($sql);
        $req->execute([
            
            'reponse_content' => $reponse->getreponse_content(),
            'question_id' => $reponse->getquestion_id()
        ]);
     
        $_SESSION['update_question'] = "";
        header("Location: ../dash_instructor-chapter-add.php");
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}









}//end class ReponseC



?>