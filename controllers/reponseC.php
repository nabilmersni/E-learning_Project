<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// include_once ('..\configdb\db_connector.php');
// include_once('..\models\reponse.php');

require_once (__DIR__.'\..\configdb\db_connector.php');
include_once (__DIR__.'\..\models\reponse.php');

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

/********************************************Function afficher reponse selon page order*****************************************/
Function afficher_reponses_page_order($question_id){

	$sql="SELECT * FROM reponses WHERE question_id='$question_id' ORDER BY page_order ASC";
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
      //  header("Location: ../dash_instructor-chapter-add.php");
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}

//******************************************Fonction modifier reponse*********************************************
function modifier_reponse($reponse, $id){
    $reponse_content = $reponse->getreponse_content();
    $update_reponse = "UPDATE reponses SET reponse_content = :reponse_content  WHERE reponse_id='$id' ";
    $db = config::getConnexion();

    try{
        $query = $db->prepare($update_reponse);
        $query->execute([
             'reponse_content' => $reponse_content
        ]);
        $_SESSION['flash_success'] = "Congratulation Data updated successfully!";
        //  header("Location: ../views/dash_instructor-chapter-add.php");

    }
    catch(Exception $e)
    {
        die('Erreuer: '.$e->getMessage() );
    }

}

//******************************************Fonction bonne reponse*********************************************
function bonne_reponse($id, $bonne_reponse){
    $update_reponse = "UPDATE reponses SET bonne_reponse = :bonne_reponse  WHERE reponse_id='$id' ";
    $db = config::getConnexion();

    try{
        $query = $db->prepare($update_reponse);
        $query->execute([
             'bonne_reponse' => $bonne_reponse
        ]);
        $_SESSION['flash_success'] = "Congratulation Data updated successfully!";
        //  header("Location: ../views/dash_instructor-chapter-add.php");

    }
    catch(Exception $e)
    {
        die('Erreuer: '.$e->getMessage() );
    }

}

//******************************************Fonction modifier reponses order*********************************************
function modifier_reponse_order(){
    
    for($i=0; $i<count($_POST["page_id_array"]); $i++)
    {
        $page_id = $_POST["page_id_array"][$i];
        $update_reponse = "UPDATE reponses SET page_order = :page_order WHERE reponse_id='$page_id' ";
    $db = config::getConnexion();

    try{
        $query = $db->prepare($update_reponse);
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


/********************************************Function count bonne_reponse*****************************************/
Function count_bonne_reponse($id){   
     
	$sql="SELECT count(reponse_id) FROM reponses join questions on reponses.question_id = questions.question_id  WHERE questions.lesson_id='$id' and bonne_reponse='1' " ;
    $db = config::getConnexion();
    try{
        $query = $db->query($sql);
        $query->execute();
   	    $reponse_number =$query->fetchColumn();
        return $reponse_number;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }   
}




/********************************************Function get checked*****************************************/
Function get_checked($id){

	$sql="SELECT checked FROM reponses  WHERE reponse_id='$id' " ;
    $db = config::getConnexion();
    try{
        $query = $db->query($sql);
        $query->execute();
   	    $reponse_number =$query->fetchColumn();
        return $reponse_number;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }   
}

//******************************************Fonction modifier cheched*********************************************
function modifier_bonne_reponse($id ,$num){
 
        $update_reponse = "UPDATE reponses SET checked = :checked WHERE reponse_id='$id' ";
    $db = config::getConnexion();

    try{
        $query = $db->prepare($update_reponse);
        $query->execute([
        'checked' => $num
        ]);
        $_SESSION['flash_success'] = "Congratulation Data updated successfully!";
        //header("Location: ../views/dash_instructor-chapter-add.php");

    }
    catch(Exception $e)
    {
        die('Erreuer: '.$e->getMessage() );
    }
    
}


/********************************************Function count score*****************************************/
Function count_score($id){

	$sql="SELECT count(*) FROM reponses join questions on reponses.question_id = questions.question_id  WHERE questions.lesson_id='$id' and reponses.bonne_reponse='1' and reponses.checked='1' " ;
    $db = config::getConnexion();
    try{
        $query = $db->query($sql);
        $query->execute();
   	    $reponse_number =$query->fetchColumn();
        return $reponse_number;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }   
}





}//end class ReponseC



?>