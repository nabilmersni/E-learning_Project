<?php  
    require_once "../configdb/db_connector.php";


    class Offer {
        private $offer_id;
        private $user_id;
        private $formation_id;
        private $reduction;


        function addOffer($formation_price){
            $base = config::getConnexion();

            $requette = "INSERT INTO offers VALUES (null,'$this->user_id','$this->formation_id','$this->reduction')";
            $requette2 = "UPDATE formations SET offer_price= '$formation_price' ,price = '$formation_price' * (1 - '$this->reduction' / 100) WHERE formation_id = '$this->formation_id'";
            try {
                $base->exec($requette);
                $base->exec($requette2);
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        static function getAlloffers(){
            $base = config::getConnexion();

            $requette = "SELECT * from offers inner join formations on offers.formation_id = formations.formation_id";

            try {
                $data = $base->query($requette);
                return $data;
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        static function deleteOffer($offer_id, $formation_id){
            $base = config::getConnexion();
    
            $requette = "DELETE from offers where offer_id = '$offer_id'";
            $requette2 = "UPDATE formations SET price = offer_price, offer_price = NULL WHERE formation_id = '$formation_id'";


            try {
                $base->exec($requette);
                $base->exec($requette2);
                header('location:../views/dash_instructor-offres.php'); 
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }


        //getter and setter
        function getOffer_id(){
			return $this->offer_id;
		}
        function setOffer_id($val){
			$this->offer_id=$val;
		}

        function getUser_id(){
			return $this->user_id;
		}
        function setUser_id($val){
			$this->user_id=$val;
		}

        function getFormation_id(){
			return $this->formation_id;
		}
        function setFormation_id($val){
			$this->formation_id=$val;
		}

        function getReduction(){
			return $this->reduction;
		}
        function setReduction($val){
			$this->reduction=$val;
		}
        
    }//class end
?>