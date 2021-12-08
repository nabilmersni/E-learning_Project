<?php 
// require_once "../models/user.php";
require_once "../models/achat.php";
require_once "../models/coupon.php";


if (isset($_GET['event']) && !empty($_GET['event'])) {
    
    $event = $_GET['event'];

    if ($event == "addAchat") {
        $user_id = $_POST['user_id'];
        $formationIDArray = $_POST['formationIDArray'];
        $achat = new Achat();
        $achat->setuser_id($_POST['user_id']);
        Coupon::user_coupon_desactivate($user_id);
        foreach ($formationIDArray as $formation_id) {
            $achat->addAchat($formation_id);       
        }
        header('location:../views/user-side-cart.php?achat=true');
        
    }
    else{
        echo "You are not allowed !";
    }
    
}else{
    echo "You are not allowed !";
}

?>