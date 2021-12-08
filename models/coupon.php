<?php  
    require_once "../configdb/db_connector.php";


    class Coupon {
        private $coupon_id;
        private $user_id;
        private $coupon_code;
        private $reduction;


        static function addCoupons($user_id, $coupon_code){
            $base = config::getConnexion();

            $requette = "INSERT INTO coupons VALUES (null,'$user_id','$coupon_code',10)";
            // $requette2 = "UPDATE users SET coupon_active=  ,price = '$formation_price' * (1 - '$this->reduction' / 100) WHERE formation_id = '$this->formation_id'";
            
            try {
                $base->exec($requette);
                // $base->exec($requette2);
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        static function deleteCoupon($user_id, $coupon){
            $base = config::getConnexion();
    
            $requette = "DELETE from coupons WHERE (user_id ='$user_id' and coupon_code ='$coupon')";
            $requette2 = "UPDATE users SET coupon_active = 1 WHERE user_id = '$user_id'";

            try {
                $base->exec($requette);
                $base->exec($requette2);
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        static function isAdmitCoupon($user_id){
            $base = config::getConnexion();
            $requette = "SELECT count(*) as total from achats WHERE user_id = '$user_id'";
    
            try {
                $data = $base->query($requette);
                return $data->fetchObject();
            } catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
        }

        static function validCoupon($user_id, $coupon){
            $base = config::getConnexion();
            $requette = "SELECT * from coupons WHERE (user_id ='$user_id' and coupon_code ='$coupon')";
            $data = $base->query($requette);
            if($data->rowCount() == 1){
                return true;
            }
            return false;
        }

        static function user_coupon_desactivate($user_id){
            $base = config::getConnexion();
            $requette = "UPDATE users SET coupon_active = 0 WHERE user_id = '$user_id'";

            try {
                $base->exec($requette);
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }


        //getter and setter
        function getCoupon_id(){
			return $this->coupon_id;
		}
        function setCoupon_id($val){
			$this->coupon_id=$val;
		}

        function getUser_id(){
			return $this->user_id;
		}
        function setUser_id($val){
			$this->user_id=$val;
		}

        function getCoupon_code(){
			return $this->coupon_code;
		}
        function setCoupon_code($val){
			$this->coupon_code=$val;
		}
        
    }//class end
?>