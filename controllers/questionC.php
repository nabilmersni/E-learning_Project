<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once ('C:\xampp\htdocs\E-learning_Project_last_version\configdb\db_connector.php');
include_once('C:\xampp\htdocs\E-learning_Project_last_version\models\question.php');

class QuestionC{

/********************************************Function afficher question*****************************************/
Function afficher_questions(){

	$sql="SELECT * FROM questions";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}

//*****************************************Function récupérer question***********************************************
Function recuperer_question($id){

    $sql="SELECT * FROM questions WHERE question_id='$id' LIMIT 1" ;
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }

}

//*****************************************Function supprimer question***********************************************
function supprimer_question($id){
    $sql = "DELETE FROM questions WHERE question_id ='$id' ";
    $db = config::getConnexion();
    
    $query = $db->prepare($sql);
    try{
        $query->execute();
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}

//***********************************************Fuction ajouter_question**************************************
function ajouter_question($question){
    $sql = "INSERT INTO questions(question_content ,date_added, lesson_id) VALUES ( :question_content ,:date_added ,:lesson_id )";
    $db = config::getConnexion();
    try{
    $req = $db->prepare($sql);
        $req->execute([
            
            'question_content' => $question->getquestion_content(),
            'date_added' => $question->getdate_added(),
            'lesson_id' => $question->getlesson_id()
        ]);
     
        $_SESSION['update_question'] = "";
        header("Location: ../dash_instructor-chapter-add.php");
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}









}//end class QuestionC



?>