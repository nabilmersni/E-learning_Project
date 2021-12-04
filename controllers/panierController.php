<?php 
// require_once "../models/user.php";
require_once "../models/panier.php";


if (isset($_GET['event']) && !empty($_GET['event'])) {
    
    $event = $_GET['event'];

    if ($event == "addPanier") {
        $panier = new Panier();

        $panier->setuser_id($_POST['user_id']);
        $panier->setformation_id($_POST['formation_id']);

        $panier->addPanier();   
    }
    else if($event == "deletePanier") {
        Panier::deletePanier($_POST['panier_id']);   
    }

    else{
        echo "You are not allowed !";
    }
    
}else{
    echo "You are not allowed !";
}

?>