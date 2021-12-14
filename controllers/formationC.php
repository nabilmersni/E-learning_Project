<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once (__DIR__.'\..\configdb\db_connector.php');
include_once (__DIR__.'\..\models\formation.php');

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require (__DIR__.'/../vendor/autoload.php');

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

/********************************************Function filtrer formations d'un instructeur*****************************************/
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

//******************************************Fonction sent_for_validation formation*********************************************
function sent_for_validation( $id){
    $sent_for_validation = 1;
    
    $update_formation = "UPDATE formations SET sent_for_validation = :sent_for_validation WHERE formation_id='$id' ";
    $db = config::getConnexion();

    try{
        $query = $db->prepare($update_formation);
        $query->execute([
             'sent_for_validation' => $sent_for_validation 
        ]);
       // $_SESSION['flash_success'] = "Congratulation Data updated successfully!";
       // header("Location: ../views/dash_instructor-chapter-add.php");
      // header("Location: ../dash_instructor-course-update.php?id=$id");

    }
    catch(Exception $e)
    {
        die('Erreuer: '.$e->getMessage() );
    }

}

//******************************************Fonction state_formation :accepter/refuser*********************************************
function state_formation($formation , $id){
    $state = $formation->getstate();;

    
    $update_formation = "UPDATE formations SET state = :state WHERE formation_id='$id' ";
    $db = config::getConnexion();

    try{
        $query = $db->prepare($update_formation);
        $query->execute([
             'state' => $state 
        ]);
       // $_SESSION['flash_success'] = "Congratulation Data updated successfully!";
       // header("Location: ../views/dash_instructor-chapter-add.php");
      // header("Location: ../dash_instructor-course-update.php?id=$id");

    }
    catch(Exception $e)
    {
        die('Erreuer: '.$e->getMessage() );
    }

}

//*********************************************Function get_elements*********************************************************
function get_elements($id){
    $sql = "SELECT * FROM formations inner join users on users.user_id = formations.user_id WHERE formation_id='$id' LIMIT 1 ";
    $db = config::getConnexion();

    $query = $db->prepare($sql);
    $query->execute();
    $array =$query->fetch();
    return $array;
}

//*************************************Function email_verification_coordonnees*************************************
function sendemail_coordonnees($reasons)
{
    $arr = array(
        'Subject' => 'your course has been refused',
        'body' => "
        <h2>your course has been refused for many reasons: <h2/>
        <h4>$reasons<h4/>
        <br/><br/>
        "
    );
    return $arr ;
    
}

//*********************************************Function sendemail_verify*********************************************
function sendemail_verify($array,$reasons)
{
    $mail = new PHPMailer(true);

    //$mail->SMTPDebug = 2;                                     //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'iLearn.contact.tn@gmail.com';          //SMTP username
    $mail->Password   = 'ilearn123';                            //SMTP password
    $mail->SMTPSecure = "ssl";                                  //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
 
    //Recipients
    $mail->setFrom('iLearn.contact.tn@gmail.com', "iLearn");
    $mail->addAddress($array['email']);                     //Add a recipient
     
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    
    $array = $this->sendemail_coordonnees($reasons);
    $mail->Subject = $array['Subject'];      
    $mail->Body = $array['body'];
    
    $mail->send();
}



/********************************************Function rechercher formations*****************************************/
Function rechercher_formations($search){

	$sql="SELECT * FROM formations join users on users.user_id = formations.user_id WHERE (formations.name LIKE '%".$search."%' ) OR (formations.short_description LIKE '%".$search."%') OR (formations.categorie LIKE '%".$search."%') ORDER BY formations.formation_id DESC ";
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