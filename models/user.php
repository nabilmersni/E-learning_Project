<?php 
    require_once "../configdb/db_connector.php";
    
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
 
    //Load Composer's autoloader
    require '../vendor/autoload.php';

    class User {
        private $user_id;
        private $fullname;
        private $username;
        private $email;
        private $role;
        private $phone;
        private $password;
        private $about_me;
        private $fb_link;
        private $linkedin_link;
        private $img_url;
        private $cv_url;


        static function used_email($email){
            $base = config::getConnexion();
            $requette = "SELECT * from users WHERE email ='$email'";
            $data = $base->query($requette);
            if($data->rowCount() == 1){
                return true;
            }
            return false;
        }

        static function used_username($username){
            $base = config::getConnexion();
            $requette = "SELECT * from users WHERE username ='$username'";
            $data = $base->query($requette);
            
            if($data->rowCount() == 1){
                return true;
            }
            return false;
        }

        static function sendemail($email ,$email_content){
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
            $mail->addAddress($email);                     //Add a recipient
            
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            
            $mail->Subject = $email_content['Subject'];      
            $mail->Body = $email_content['body'];
            
            $mail->send();
        }
        
        function signup(){
            $base = config::getConnexion();
    
            if($this->used_email($this->email)){
                header('location:../views/signUp.php?used_email=true');
            }
            
            if($this->used_username($this->username)){
                header('location:../views/signUp.php?used_username=true');
            }
            $token = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 49);
            $requette = "INSERT INTO users VALUES (null,'$this->fullname','$this->username','$this->email','$this->role','$this->phone','$this->password',1,0,'$token',null,null,null,'$this->img_url',null,0,0)";
            try {
                $base->exec($requette );
                
                $email_content = array(
                    'Subject' => 'Email Verfication From iLearn',
                    'body' => "<h4>Hi $this->username,</h4><br/><br/>
                    <h5>Verify your email address by clickig the link below!<h5/>
                    <br/>
                    <a href='http://localhost/E-learning_Project/controllers/userController.php?event=verify_email&token=$token&email=$this->email'>Verify my email</a>"
                );

                $this->sendemail($this->email,$email_content);
                header('location:../views/login.php?register=true');
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        static function getAllStudents(){
            $base = config::getConnexion();

            $requette = "SELECT * from users WHERE role ='student'";

            try {
                $data = $base->query($requette);
                return $data;
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        static function getAllInstructors(){
            $base = config::getConnexion();

            $requette = "SELECT * from users WHERE role ='instructor'";

            try {
                $data = $base->query($requette);
                return $data;
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        static function getOneUser($user_id){
            $base = config::getConnexion();

            $requette = "SELECT * from users WHERE user_id ='$user_id'";

            try {
                $data = $base->query($requette);
                return $data->fetchObject();
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        static function getOneUserByEmail($email){
            $base = config::getConnexion();

            $requette = "SELECT * from users WHERE email ='$email'";

            try {
                $data = $base->query($requette);
                return $data->fetchObject();
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        static function delete($user_id){
            $base = config::getConnexion();
    
            $requette = "DELETE from users where user_id = '$user_id'";

            try {
                $base->exec($requette);
                header('location:../views/dash_admin-users.php');
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        function update($user_id){
            $base = config::getConnexion();
    
            $requette = "UPDATE users SET 
                            fullname='$this->fullname' , 
                            username ='$this->username' ,
                            email = '$this->email',
                            role = '$this->role' ,
                            phone = '$this->phone' ,
                            password = '$this->password' ,
                            about_me = '$this->about_me' ,
                            fb_link = '$this->fb_link' ,
                            linkedin_link = '$this->linkedin_link' ,
                            img_url = '$this->img_url'
                            where user_id = '$user_id'";

            $requette2 = "SELECT * from users where user_id = '$user_id'";
            
            
            try {
                $base->exec($requette);
                $updatedUser = $base->query($requette2);
                return $updatedUser->fetchObject();
                
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        function login(){
            $base = config::getConnexion();

            $requette = "SELECT * from users where email='$this->email' and password='$this->password'";

            try {
                $data = $base->query($requette );
                if($data->rowCount() != 1){
                    header('location:../views/login.php?login=false');
                }else{
                    $user = $data->fetchObject();
                    if($user->verified_email == 0){
                        $token = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 49);
                        $requette = "UPDATE users SET token='$token' where user_id = '$user->user_id'";
                        $base->exec($requette);

                        $email_content = array(
                            'Subject' => 'Email Verfication From iLearn',
                            'body' => "<h4>Hi $user->username,</h4><br/><br/>
                            <h5>Verify your email address by clickig the link below!<h5/>
                            <br/>
                            <a href='http://localhost/E-learning_Project/controllers/userController.php?event=verify_email&token=$token&email=$user->email'>Verify my email</a>"
                        );
        
                        $this->sendemail($user->email,$email_content);
                        header('location:../views/login.php?verfied_email=false');
                    }else{
                        session_start();
                        $_SESSION['user'] = $user;
                        if($user->role == "student"){
                            header('location:../views/user-side-courses.php');
                        }elseif($user->role == "instructor"){
                            header('location:../views/dash_instructor.php');
                        }elseif($user->role == "admin"){
                            header('location:../views/dash_admin-home.php');
                        }else {
                            header('location:../views/login.php?login=false');
                        }
                    }
                }

            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}

        }

        static function verify_email($email, $token){
            $base = config::getConnexion();

            $requette = "SELECT * from users where email='$email'";

            try {
                $data = $base->query($requette);
                
                $user = $data->fetchObject();
                if($user->token == $token){
                    $requette = "UPDATE users SET verified_email=1 where user_id = '$user->user_id'";
                    $base->exec($requette);
                    header('location:../views/login.php?verfied_email=true');
                }else{
                    header('location:../views/login.php?verfied_email=invalid');
                }
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        static function send_reset_pass_link($email){
            $base = config::getConnexion();

            $token = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 49);
            $requette = "UPDATE users SET token='$token' where email = '$email'";
            $requette2 = "SELECT * from users where email = '$email'";

            try {
                $base->exec($requette);
                $updatedUser = $base->query($requette2)->fetchObject();
                
                $email_content = array(
                    'Subject' => 'Reset Password Link From iLearn',
                    'body' => "<h4>Hi $updatedUser->username,</h4><br/><br/>
                    <h5>We received a request to reset your password. You can do this throught the link below.<h5/>
                    <br/>
                    <a href='http://localhost/E-learning_Project/views/reset_password_form2.php?token=$token&email=$email'>Change my password</a>"
                );

                User::sendemail($email,$email_content);
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        function changePassword($email){
            $base = config::getConnexion();
    
            $requette = "UPDATE users SET password = '$this->password' where email = '$email'";

            $requette2 = "SELECT * from users where email = '$email'";
            
            
            try {
                $base->exec($requette);
                $updatedUser = $base->query($requette2);
                return $updatedUser->fetchObject();
                
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        static function block($user_id, $reasons){
            $base = config::getConnexion();
    
            $requette = "UPDATE users SET status= 0 where user_id = '$user_id'";            
            $requette2 = "SELECT * from users where user_id = '$user_id'";
            
            try {
                $base->exec($requette);
                $updatedUser = $base->query($requette2)->fetchObject();

                $email_content = array(
                    'Subject' => 'Account Suspended',
                    'body' => "<h4>Hi $updatedUser->username,</h4><br/><br/>
                    <h5>Your account is now disabled, it looks like it was being used in a way that violeted I Learn Policies.<h5/>
                    <br/>
                    Reasons: $reasons .
                    "
                );
                User::sendemail($updatedUser->email,$email_content);

                return $updatedUser;
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        static function unblock($user_id){
            $base = config::getConnexion();
    
            $requette = "UPDATE users SET status= 1 where user_id = '$user_id'";            
            $requette2 = "SELECT * from users where user_id = '$user_id'";
            
            try {
                $base->exec($requette);
                $updatedUser = $base->query($requette2);
                return $updatedUser->fetchObject();
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        function uploadCV($user_id){
            $base = config::getConnexion();
    
            $requette = "UPDATE users SET cv_url= '$this->cv_url' where user_id = '$user_id'";            
            $requette2 = "SELECT * from users where user_id = '$user_id'";
            
            try {
                $base->exec($requette);
                $updatedUser = $base->query($requette2);
                return $updatedUser->fetchObject();
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        static function acceptCV($user_id, $cvStatus){
            $base = config::getConnexion();
    
            $requette = "UPDATE users SET cv_status	= '$cvStatus' where user_id = '$user_id'";            
            $requette2 = "SELECT * from users where user_id = '$user_id'";
            
            try {
                $base->exec($requette);
                $updatedUser = $base->query($requette2);
                return $updatedUser->fetchObject();
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        static function getStudentsNumber(){
            $base = config::getConnexion();

            $requette = "SELECT count(*) as total from users WHERE role ='student'";

            try {
                $data = $base->query($requette);
                return $data->fetchObject();
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        static function getInstructorsNumber(){
            $base = config::getConnexion();

            $requette = "SELECT count(*) as total from users WHERE role ='instructor'";

            try {
                $data = $base->query($requette);
                return $data->fetchObject();
            } catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}
        }

        //getter and setter
        function getid(){
			return $this->user_id;
		}
        function setuser_id($val){
			$this->user_id=$val;
		}

        function getfullname(){
			return $this->fullname;
		}
		function setfullname($val){
			$this->fullname=$val;
		}

        function getusername(){
			return $this->username;
		}
		function setusername($val){
			$this->username=$val;
		}

        function getemail(){
			return $this->email;
		}
		function setemail($val){
			$this->email=$val;
		}

        function getrole(){
			return $this->role;
		}
		function setrole($val){
			$this->role=$val;
		}

        function getphone(){
			return $this->phone;
		}
		function setphone($val){
			$this->phone=$val;
		}

        function getpassword(){
			return $this->password;
		}
		function setpassword($val){
			$this->password=$val;
		}

        function getabout_me(){
			return $this->about_me;
		}
		function setabout_me($val){
			$this->about_me=$val;
		}

        function getfb_link(){
			return $this->fb_link;
		}
		function setfb_link($val){
			$this->fb_link=$val;
		}

        function getlinkedin_link(){
			return $this->linkedin_link;
		}
		function setlinkedin_link($val){
			$this->linkedin_link=$val;
		}

        function getimg_url(){
			return $this->img_url;
		}
		function setimg_url($val){
			$this->img_url=$val;
		}

        function getcv_url(){
			return $this->cv_url;
		}
		function setcv_url($val){
			$this->cv_url=$val;
		}

        
    }//class end
    

?>