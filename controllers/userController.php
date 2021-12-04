<?php 
require_once "../models/user.php";
require_once "../models/notification.php";

if (isset($_GET['event']) && !empty($_GET['event'])) {
    
    $event = $_GET['event'];

    if ($event == "signup") {
        $user = new User();

        $user->setfullname($_POST['fullname']);
        $user->setusername($_POST['username']);
        $user->setemail($_POST['email']);
        $user->setrole($_POST['role']);
        $user->setphone( $_POST['phone']);
        $user->setpassword(md5($_POST['password']));
        $user->setimg_url('defaultUserImage.png');
        $user->signup();
        
    }
    elseif ($event == "deleteMe"){
        $user_id = $_POST['user_id'];        

        User::delete($user_id);
        session_start();
        session_unset();
        session_destroy();
        header('location:../views/login.php?logout=true');
        
    }
    elseif ($event == "deleteStudent"){
        $user_id = $_POST['user_id'];        

        User::delete($user_id);
        header('location:../views/dash_admin-users.php');
        
    }
    elseif ($event == "deleteInstructor"){
        $user_id = $_POST['user_id'];        

        User::delete($user_id);
        header('location:../views/dash_admin-instructors.php');
        
    }
    elseif ($event == "updateMe"){
        if(isset($_POST['user_id'])){
            session_start();
            $user_id = $_POST['user_id']; 


            $user = new User();

            $user->setfullname($_POST['fullname']);
            $user->setusername($_POST['username']);
            $user->setemail($_POST['email']);
            $user->setrole($_SESSION['user']->role);
            $user->setphone( $_POST['phone']);
            $user->setpassword($_SESSION['user']->password);
            $user->setabout_me( $_POST['about']);
            $user->setfb_link( $_POST['facebook']);
            $user->setlinkedin_link( $_POST['linkedin']);

            if (file_exists($_FILES['profileImg']['tmp_name']) || is_uploaded_file($_FILES['profileImg']['tmp_name'])) {
                $profileImgName = time() .'_'. $_FILES['profileImg']['name'];
                $target = '../uploads/' . $profileImgName;

                move_uploaded_file($_FILES['profileImg']['tmp_name'], $target);
                $user->setimg_url($profileImgName);
            }else{
                $user->setimg_url($_SESSION['user']->img_url);
            }

            


            $updatedUser = $user->update($user_id);
            
            $_SESSION['user'] = $updatedUser;
            header('location:../views/user-side-profile-info.php');
        }
            
    }
    elseif ($event == "update"){
        if(isset($_POST['user_id'])){
            $user_id = $_POST['user_id']; 
            $user_not_updated = User::getOneUser($user_id);
            $user = new User();

            $user->setfullname($_POST['fullname']);
            $user->setusername($_POST['username']);
            $user->setemail($_POST['email']);
            $user->setrole($user_not_updated->role);
            $user->setphone( $_POST['phone']);
            $user->setpassword($user_not_updated->password);
            $user->setabout_me( $_POST['about']);
            $user->setfb_link( $_POST['facebook']);
            $user->setlinkedin_link( $_POST['linkedin']);
            
            if (file_exists($_FILES['profileImg']['tmp_name']) || is_uploaded_file($_FILES['profileImg']['tmp_name'])) {
                $profileImgName = time() .'_'. $_FILES['profileImg']['name'];
                $target = '../uploads/' . $profileImgName;

                move_uploaded_file($_FILES['profileImg']['tmp_name'], $target);
                $user->setimg_url($profileImgName);
            }else{
                $user->setimg_url($user_not_updated->img_url);
            }

            $updatedUser = $user->update($user_id);
            header('location:../views/dash_admin-users.php');

            if($updatedUser->role == "student"){
                header('location:../views/dash_admin-users.php');
            }elseif($updatedUser->role == "instructor"){
                header('location:../views/dash_admin-instructors.php');
            }
        }
            
    }
    elseif($event == "login"){
        $user = new User();

        $user->setemail($_POST['email']);
        $user->setpassword(md5($_POST['password']));

        $user->login();
        
    }
    else if ($event == "logout") {
        session_start();
        session_unset();
        session_destroy();

        header('location:../views/login.php?logout=true');
    }
    else if ($event == "verify_email") {
        if(isset($_GET['token']) && isset($_GET['email'])){
            $token = $_GET['token'];
            $email = $_GET['email'];

            User::verify_email($email,$token);
        }
    }
    else if ($event == "reset_password_link") {
        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $existEmail = User::used_email($email);
            if($existEmail){
                User::send_reset_pass_link($email);
                header('location:../views/login.php?reset_password_link=true');
            }else{
                header('location:../views/login.php?emailExist=false');
            }
            // User::verify_email($email,$token);
        }

    }
    elseif ($event == "change_password"){

            $user = new User();
            
            $user->setpassword(md5($_POST['password']));

            $user->changePassword($_POST['email']);
            header('location:../views/login.php?changePass=true');        
    }
    else if ($event == "block") {
        if(isset($_POST['user_id'])  ){
            $user_id = $_POST['user_id'];
            $reasons = $_POST['reasons'];
            
            $user = User::block($user_id, $reasons);

            if($user->role == 'student'){
                header('location:../views/dash_admin-users.php');        
            }else{
                header('location:../views/dash_admin-instructors.php');        
            }

        }
    }
    else if ($event == "unblock") {
        if(isset($_POST['user_id'])){
            $user_id = $_POST['user_id'];

            

            $user = User::unblock($user_id);

            if($user->role == 'student'){
                header('location:../views/dash_admin-users.php');        
            }else{
                header('location:../views/dash_admin-instructors.php');        
            }

        }
    }
    elseif ($event == "uploadCV"){
        if(isset($_POST['user_id'])){
            session_start();
            $user_id = $_POST['user_id']; 

            $user = new User();

            $user->setfullname($_POST['fullname']);

            if (file_exists($_FILES['uploadCV']['tmp_name']) || is_uploaded_file($_FILES['uploadCV']['tmp_name'])) {
                $cvName = time() .'_'. $_FILES['uploadCV']['name'];
                $target = '../uploads/' . $cvName;

                move_uploaded_file($_FILES['uploadCV']['tmp_name'], $target);
                $user->setcv_url($cvName);
            }

            $notif = new Notification();
            $notif->setuser_id($user_id);
            $notif->setfor_who('admin');
            $notif->setcontent('CV need to be reviewed');
            
            $notif->addNotif();
            
            $updatedUser = $user->uploadCV($user_id);
            
            $_SESSION['user'] = $updatedUser;
            header('location:../views/dash_instructor-uploadCV.php');
        }
            
    }
    else if ($event == "acceptCV") {
        if(isset($_POST['user_id']) ){
            $user_id = $_POST['user_id'];
            
            if($_POST['cvStatus'] == "1"){
                
                $notif = new Notification();
                $notif->setuser_id($user_id);
                $notif->setfor_who('user');
                $notif->setcontent('Your cv is accepted');
            
                
                $notif->addNotif();
                $user = User::acceptCV($user_id,1);
            }else{
                $user = User::acceptCV($user_id,0);
            }
            header('location:../views/dash_admin-instructors.php');        
        }
    }
    else{
        echo "You are not allowed !";
    }
    
}else{
    echo "You are not allowed !";
}

?>