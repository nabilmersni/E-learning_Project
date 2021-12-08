<?php 
    require_once "../configdb/db_connector.php";


    class Notification {
        private $notif_id;
        private $user_id;
        private $for_who;
        private $content;

    
    function addNotif(){
        $base = config::getConnexion();
        $requette = "INSERT INTO notifications VALUES (null,'$this->user_id','$this->for_who','$this->content' ,0)";

        try {
            $base->exec($requette);
        } catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    static function getAllNotifAdmin(){
        $base = config::getConnexion();
        $requette = "SELECT * from notifications inner join users on notifications.user_id = users.user_id WHERE for_who='admin'";

        try {
            $data = $base->query($requette);
            return $data;
        } catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    static function getAllNotifUser($user_id){
        $base = config::getConnexion();
        $requette = "SELECT * from notifications inner join users on notifications.user_id = users.user_id WHERE (notifications.user_id='$user_id') AND (for_who='user')";

        try {
            $data = $base->query($requette);
            return $data;
        } catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    static function deleteNotif($notif_id){
        $base = config::getConnexion();
        $requette = "DELETE from notifications where notif_id = '$notif_id'";

        try {
            $base->exec($requette);
        } catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    static function getNotifAdminNumber(){
        $base = config::getConnexion();

        $requette = "SELECT count(*) as total from notifications WHERE for_who='admin'";

        try {
            $data = $base->query($requette);
            return $data->fetchObject();
        } catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    static function getNotifUserNumber($user_id){
        $base = config::getConnexion();

        $requette = "SELECT count(*) as total from notifications WHERE (user_id='$user_id' and for_who='user')";

        try {
            $data = $base->query($requette);
            return $data->fetchObject();
        } catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }




    
    function getnotif_id(){
        return $this->notif_id;
    }
    function setnotif_id($val){
        $this->notif_id=$val;
    }

    function getuser_id(){
        return $this->user_id;
    }
    function setuser_id($val){
        $this->user_id=$val;
    }

    function getfor_who(){
        return $this->for_who;
    }
    function setfor_who($val){
        $this->for_who=$val;
    }

    function getcontent(){
        return $this->content;
    }
    function setcontent($val){
        $this->content=$val;
    }

}
?>