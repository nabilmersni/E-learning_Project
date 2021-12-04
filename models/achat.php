<?php 
    require_once "../configdb/db_connector.php";


    class Achat {
        private $achat_id;
        private $user_id;
        private $formation_id;
        private $achat_date;

        
    
    function addAchat($formation_id){
        $base = config::getConnexion();
        $requette = "INSERT INTO achats VALUES (null,'$this->user_id','$formation_id', now())";

        // if($this->alreadyAddedPanier($this->formation_id, $this->user_id)){
        //     header('location:../views/user-side-courses.php?added=already#open-modal');
        //     return 0;
        // }
        try {
            $base->exec($requette);
        } catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }


    static function getAllUserAchat($user_id){
        $base = config::getConnexion();
        $requette = "SELECT * from achats inner join formations on achats.formation_id = formations.formation_id inner join users on achats.user_id = users.user_id WHERE achats.user_id ='$user_id' order by achats.achat_id desc";

        try {
            $data = $base->query($requette);
            return $data;
        } catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }


    static function getMyStudentNumber($user_id){
        $base = config::getConnexion();

        $requette = "SELECT count(DISTINCT achats.user_id) as total from achats inner join formations on achats.formation_id = formations.formation_id WHERE formations.user_id ='$user_id'";
        // $requette = "SELECT DISTINCT achats.user_id from achats inner join formations on achats.formation_id = formations.formation_id WHERE formations.user_id ='$user_id'";

        try {
            $data = $base->query($requette);
            return $data->fetchObject();
        } catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    static function getOrderCount($month){
        $base = config::getConnexion();
        // $requette = "SELECT count(*) as total from achats WHERE DATEPART(month,date_achat) = '$month + 1' ";
        $requette = "SELECT count(*) as total from achats WHERE extract(MONTH from date_achat) = '$month' ";


        try {
            $data = $base->query($requette);
            return $data->fetchObject();
        } catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    static function getTotalEarning($month){
        $base = config::getConnexion();
        // $requette = "SELECT count(*) as total from achats WHERE DATEPART(month,date_achat) = '$month + 1' ";
        $requette = "SELECT sum(formations.price) as total from achats inner join formations on achats.formation_id = formations.formation_id WHERE extract(MONTH from date_achat) = '$month' ";


        try {
            $data = $base->query($requette);
            return $data->fetchObject();
        } catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    static function getInstructorEarning($user_id, $month){
        $base = config::getConnexion();

        $requette = "SELECT sum(formations.price) as total from achats inner join formations on achats.formation_id = formations.formation_id WHERE (formations.user_id ='$user_id' and extract(MONTH from achats.date_achat) = '$month')";

        try {
            $data = $base->query($requette);
            return $data->fetchObject();
        } catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }




    

    
    function getachat_id(){
        return $this->achat_id;
    }
    function setachat_id($val){
        $this->achat_id=$val;
    }

    function getuser_id(){
        return $this->user_id;
    }
    function setuser_id($val){
        $this->user_id=$val;
    }

    function getformation_id(){
        return $this->formation_id;
    }
    function setformation_id($val){
        $this->formation_id=$val;
    }

    function getachat_date(){
        return $this->achat_date;
    }
    function setachat_date($val){
        $this->achat_date=$val;
    }

}
?>