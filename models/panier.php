<?php 
    require_once "../configdb/db_connector.php";


    class Panier {
        private $panier_id;
        private $user_id;
        private $formation_id;


    static function alreadyAddedPanier($formation_id,$user_id){
        $base = config::getConnexion();
        $requette = "SELECT * from paniers WHERE (formation_id = '$formation_id') and (user_id = '$user_id')";
        $data = $base->query($requette);
        if($data->rowCount() == 1){
            return true;
        }
        return false;
    }
    
    function addPanier(){
        $base = config::getConnexion();
        $requette = "INSERT INTO paniers VALUES (null,'$this->user_id','$this->formation_id')";

        if($this->alreadyAddedPanier($this->formation_id, $this->user_id)){
            header('location:../views/user-side-courses.php?added=already#open-modal');
            return 0;
        }
        try {
            
            $base->exec($requette);

            header('location:../views/user-side-courses.php?added=true#open-modal');
        } catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }


    static function getAllPaniers($user_id){
        $base = config::getConnexion();
        $requette = "SELECT * from paniers inner join formations on paniers.formation_id = formations.formation_id WHERE paniers.user_id ='$user_id' order by paniers.panier_id desc";

        try {
            $data = $base->query($requette);
            return $data;
        } catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    static function deletePanier($panier_id){
        $base = config::getConnexion();
        $requette = "DELETE from paniers where panier_id = '$panier_id'";

        try {
            $base->exec($requette);
            header('location:../views/user-side-cart.php?deletePanier=true');
        } catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }

    static function getPanierNumber($user_id){
        $base = config::getConnexion();

        $requette = "SELECT count(*) as total from paniers WHERE user_id ='$user_id'";

        try {
            $data = $base->query($requette);
            return $data->fetchObject();
        } catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
    }












    
    function getpanier_id(){
        return $this->panier_id;
    }
    function setpanier_id($val){
        $this->panier_id=$val;
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

}
?>