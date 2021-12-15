<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// include_once ('..\configdb\db_connector.php');
// include_once('..\models\question.php');

require_once (__DIR__.'\..\configdb\db_connector.php');
include_once (__DIR__.'\..\models\question.php');

class QuestionC{

/********************************************Function afficher question*****************************************/
Function afficher_questions($lesson_id){

	$sql="SELECT * FROM questions WHERE lesson_id='$lesson_id'";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}

/********************************************Function afficher une seule question*****************************************/
Function afficher_question($lesson_id ,$num){

	$sql="SELECT * FROM questions WHERE lesson_id='$lesson_id' and page_order='$num' ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}

/********************************************Function afficher question selon page order*****************************************/
Function afficher_questions_page_order($lesson_id){

	$sql="SELECT * FROM questions WHERE lesson_id='$lesson_id' ORDER BY page_order ASC";
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
       // header("Location: ../dash_instructor-chapter-add.php");
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}

//******************************************Fonction modifier question*********************************************
function modifier_question($question, $id){
    $question_content = $question->getquestion_content();
    $update_question = "UPDATE questions SET question_content = :question_content  WHERE question_id='$id' ";
    $db = config::getConnexion();

    try{
        $query = $db->prepare($update_question);
        $query->execute([
             'question_content' => $question_content
        ]);
        $_SESSION['flash_success'] = "Congratulation Data updated successfully!";
        //  header("Location: ../views/dash_instructor-chapter-add.php");

    }
    catch(Exception $e)
    {
        die('Erreuer: '.$e->getMessage() );
    }

}

//******************************************Fonction modifier questions order*********************************************
function modifier_question_order(){
    
    for($i=0; $i<count($_POST["page_id_array"]); $i++)
    {
        $page_id = $_POST["page_id_array"][$i];
        $update_question = "UPDATE questions SET page_order = :page_order WHERE question_id='$page_id' ";
    $db = config::getConnexion();

    try{
        $query = $db->prepare($update_question);
        $query->execute([
        'page_order' => $i 
        ]);
        $_SESSION['flash_success'] = "Congratulation Data updated successfully!";
        //header("Location: ../views/dash_instructor-chapter-add.php");

    }
    catch(Exception $e)
    {
        die('Erreuer: '.$e->getMessage() );
    }


    }
    
    
    
}


/********************************************Function count question*****************************************/
Function count_question($id){

	$sql="SELECT count(question_id) FROM questions  WHERE lesson_id='$id' " ;
    $db = config::getConnexion();
    try{
        $query = $db->query($sql);
        $query->execute();
   	    $question_number =$query->fetchColumn();
        return $question_number;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }   
}







}//end class QuestionC
