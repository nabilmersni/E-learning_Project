<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once (__DIR__.'\..\configdb\db_connector.php');
include_once (__DIR__.'\..\models\notif.php');

class NotifC{

//*****************************************Function supprimer requirement***********************************************
function supprimer_notif($id){
    $sql = "DELETE FROM notifications WHERE notif_id ='$id' ";
    $db = config::getConnexion();
    
    $query = $db->prepare($sql);
    try{
        $query->execute();
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}

//***********************************************Fuction ajouter_notif**************************************
function ajouter_notif($notif){
    $sql = "INSERT INTO notifications(user_id , for_who, content, id_formation) VALUES ( :user_id ,:for_who ,:content ,:id_formation )";
    $db = config::getConnexion();
    try{
    $req = $db->prepare($sql);
        $req->execute([
            
            'user_id' => $notif->getuser_id(),
            'for_who' => $notif->getfor_who(),
            'content' => $notif->getcontent(),
            'id_formation' => $notif->getid_formation()
        ]);
       
        //header("Location: ../dash_instructor-courses.php");
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}









}//end class QuestionC



?>