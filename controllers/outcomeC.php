<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// include_once ('..\configdb\db_connector.php');
// include_once('..\models\outcome.php');
require_once (__DIR__.'\..\configdb\db_connector.php');
include_once (__DIR__.'\..\models\outcome.php');

class OutcomeC{

/********************************************Function afficher outcomes*****************************************/
Function afficher_outcomes($id){

	$sql="SELECT * FROM outcomes WHERE formation_id = '$id' ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}

//*****************************************Function récupérer outcome***********************************************
Function recuperer_outcomes($id){

    $sql="SELECT * FROM outcomes WHERE out_id='$id' LIMIT 1" ;
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }

}

//*****************************************Function supprimer outcome***********************************************
function supprimer_outcome($id){
    $sql = "DELETE FROM outcomes WHERE out_id ='$id' ";
    $db = config::getConnexion();
    
    $query = $db->prepare($sql);
    try{
        $query->execute();
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}

//***********************************************Fuction ajouter_outcome**************************************
function ajouter_outcome($outcome){
    $sql = "INSERT INTO outcomes(out_content , formation_id) VALUES ( :out_content ,:formation_id )";
    $db = config::getConnexion();
    try{
    $req = $db->prepare($sql);
        $req->execute([
            
            'out_content' => $outcome->getout_content(),
            'formation_id' => $outcome->getformation_id()
        ]);
        $id=$outcome->getformation_id();
        header("Location: ../dash_instructor-requirements-add.php?id=$id");
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}

//******************************************Fonction modifier outcome*********************************************
function modifier_outcome($outcome, $id){
    $out_content = $outcome->getout_content();
    $update_outcome = "UPDATE outcomes SET out_content = :out_content  WHERE out_id='$id' ";
    $db = config::getConnexion();

    try{
        $query = $db->prepare($update_outcome);
        $query->execute([
             'out_content' => $out_content
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