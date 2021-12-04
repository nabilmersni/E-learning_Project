<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// include_once ('..\configdb\db_connector.php');
// include_once('..\models\requirement.php');

require_once (__DIR__.'\..\configdb\db_connector.php');
include_once (__DIR__.'\..\models\requirement.php');

class RequirementC{

/********************************************Function afficher requirements*****************************************/
Function afficher_requirements($id){

	$sql="SELECT * FROM requirements WHERE formation_id = '$id' ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}

//*****************************************Function récupérer requirement***********************************************
Function recuperer_requirement($id){

    $sql="SELECT * FROM requirements WHERE req_id='$id' LIMIT 1" ;
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }

}

//*****************************************Function supprimer requirement***********************************************
function supprimer_requirement($id){
    $sql = "DELETE FROM requirements WHERE req_id ='$id' ";
    $db = config::getConnexion();
    
    $query = $db->prepare($sql);
    try{
        $query->execute();
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}

//***********************************************Fuction ajouter_requirement**************************************
function ajouter_requirement($requirement){
    $sql = "INSERT INTO requirements(req_content , formation_id) VALUES ( :req_content ,:formation_id )";
    $db = config::getConnexion();
    try{
    $req = $db->prepare($sql);
        $req->execute([
            
            'req_content' => $requirement->getreq_content(),
            'formation_id' => $requirement->getformation_id()
        ]);
        $id=$requirement->getformation_id();
        header("Location: ../dash_instructor-requirements-add.php?id=$id");
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}

//******************************************Fonction modifier requirement*********************************************
function modifier_requirement($requirement, $id){
    $req_content = $requirement->getreq_content();
    $update_requirement = "UPDATE requirements SET req_content = :req_content  WHERE req_id='$id' ";
    $db = config::getConnexion();

    try{
        $query = $db->prepare($update_requirement);
        $query->execute([
             'req_content' => $req_content
        ]);
        $_SESSION['flash_success'] = "Congratulation Data updated successfully!";
        //  header("Location: ../views/dash_instructor-chapter-add.php");

    }
    catch(Exception $e)
    {
        die('Erreuer: '.$e->getMessage() );
    }

}










}//end class QuestionC



?>