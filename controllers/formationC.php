<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once ('C:\xampp\htdocs\E-learning_Project_last_version\configdb\db_connector.php');
include ('C:\xampp\htdocs\E-learning_Project_last_version\models\formation.php');

class FormationC{

/********************************************Function afficher formations*****************************************/
Function afficher_formations(){

	$sql="SELECT * FROM formations ORDER BY formation_id DESC";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}

//*****************************************Function récupérer formation***********************************************
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

//*****************************************Function supprimer formation***********************************************
function supprimer_formation($id){
    $sql = "DELETE FROM formations WHERE formation_id ='$id' ";
    $db = config::getConnexion();
    
    $query = $db->prepare($sql);
    try{
        $query->execute();
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}

/*******************************************Recuperer id_nv_formation***********************************************/
function recuperer_nv_formation($user_id){
    $sql="SELECT * FROM formations WHERE user_id='$user_id' ORDER BY formation_id DESC LIMIT 1" ;
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}



/********************************************Function ajouter formation*****************************************/
function ajouter_formation($formation){
    $sql = "INSERT INTO formations(name ,short_description, description, categorie, level, price, image, date_added, state, top_formation, user_id) VALUES ( :name, :short_description, :description, :categorie, :level, :price, :image, :date_added, :state, :top_formation, :user_id )";
    $db = config::getConnexion();
    try{
    $req = $db->prepare($sql);
        $req->execute([
            'name' => $formation->getname(),
            'short_description' => $formation->getshort_description(),
            'description' => $formation->getdescription(),
            'categorie' => $formation->getcategorie(),
			'level' => $formation->getlevel(),
			'price' => $formation->getprice(),
			'image' => $formation->getimage(),
			'date_added' => $formation->getdate_added(),
            'state' => $formation->getstate(),
            'top_formation' => $formation->gettop_formation(),
			'user_id' => $formation->getuser_id()
        ]);
     
        $_SESSION['flash_success'] = "Congratulation Data added successfully!";
        $array = $this->recuperer_nv_formation( $formation->getuser_id() );
        foreach($array as $f){
            $get_formation_id = $f['formation_id'];
            header("Location: ../dash_instructor-requirements-add.php?id=$get_formation_id");
        }
       // 

   
    }
    catch(Exception $e){
        die('Erreuer: '.$e->getMessage());
    }

}







}//end class FormationC



?>