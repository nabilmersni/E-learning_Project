<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once (__DIR__.'\..\configdb\db_connector.php');
include_once (__DIR__.'\..\models\formation.php');


class FormationC{

/********************************************Function afficher formations*****************************************/
Function afficher_formations(){

	$sql="SELECT * FROM formations inner join users on users.user_id = formations.user_id ORDER BY formation_id DESC";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}

/********************************************Function afficher formations d'un instructeur*****************************************/
Function afficher_formations_instructor($id){

	$sql="SELECT * FROM formations inner join users on users.user_id = formations.user_id WHERE formations.user_id = '$id' ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}

/********************************************Function afficher les 2 dernier formations d'un instructeur*****************************************/
Function afficher_latest_formations_instructor($id){

	$sql="SELECT * FROM formations inner join users on users.user_id = formations.user_id WHERE formations.user_id = '$id' ORDER BY formations.formation_id DESC LIMIT 2";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}

/********************************************Function afficher formations d'un instructeur*****************************************/
Function filtrer_formations($categorie){

	$sql="SELECT * FROM formations join users on users.user_id = formations.user_id WHERE categorie = '$categorie' ";
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

    $sql="SELECT * FROM formations join users on users.user_id = formations.user_id WHERE formation_id='$id' LIMIT 1" ;
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

//******************************************Fonction modifier formation*********************************************
function modifier_formation($formation, $id){
    $name = $formation->getname();
    $short_description = $formation->getshort_description();
    $description = $formation->getdescription();
    $categorie = $formation->getcategorie();
    $level = $formation->getlevel();
    $price = $formation->getprice();
    $image = $formation->getimage();
    
    $update_formation = "UPDATE formations SET name = :name ,short_description = :short_description, description = :description ,categorie = :categorie, level = :level ,price = :price ,image = :image WHERE formation_id='$id' ";
    $db = config::getConnexion();

    try{
        $query = $db->prepare($update_formation);
        $query->execute([
             'name' => $name,
             'short_description' => $short_description,
             'description' => $description,
             'categorie' => $categorie,
             'level' => $level,
             'price' => $price,
             'image' => $image 
        ]);
       // $_SESSION['flash_success'] = "Congratulation Data updated successfully!";
       // header("Location: ../views/dash_instructor-chapter-add.php");
       header("Location: ../dash_instructor-course-update.php?id=$id");

    }
    catch(Exception $e)
    {
        die('Erreuer: '.$e->getMessage() );
    }

}

/********************************************Function rechercher formations*****************************************/
Function rechercher_formations($search){

	$sql="SELECT * FROM formations join users on users.user_id = formations.user_id WHERE (formations.name LIKE '%".$search."%' ) OR (formations.short_description LIKE '%".$search."%') ORDER BY formations.formation_id DESC ";
	$db = config::getConnexion();
	try{
		$liste = $db->query($sql);
		return $liste;
	}
	catch(Exception $e){
		die('Erreur: '.$e->getMessage());
	}   
}




}//end class FormationC



?>