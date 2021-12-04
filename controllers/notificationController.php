<?php 
// require_once "../models/user.php";
require_once "../models/notification.php";


if (isset($_GET['event']) && !empty($_GET['event'])) {
    
    $event = $_GET['event'];

    if ($event == "deleteNotif") {
        if (isset($_GET['notif_id'])) {
            $notif_id = $_GET['notif_id'];
            Notification::deleteNotif($notif_id);
            header('location:../views/login.php');
        }
    }
    else{
        echo "You are not allowed !";
    }
    
}else{
    echo "You are not allowed !";
}

?>