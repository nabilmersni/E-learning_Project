<?php 
require_once "../models/user.php";
require_once "../models/coupon.php";


if (isset($_GET['event']) && !empty($_GET['event'])) {
    
    $event = $_GET['event'];

    if ($event == "addCoupon") {

        $data = User::getAllStudents();
        while($student = $data->fetchObject()) {
            if(Coupon::isAdmitCoupon($student->user_id)->total >= 3){
                $coupon_code = "ilearn" . substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
                $email_content = array(
                    'Subject' => 'Gift from Ilearn',
                    'body' => "<h4>Hi $student->username,</h4>
                    <h5>this is Ilearn! we are happy to tell you that you got a coupon code with 10% reduction!<h5/>
                    <br/>
                    COUPON_CODE: $coupon_code"
                );
                User::sendemail($student->email ,$email_content);
                Coupon::addCoupons($student->user_id,  $coupon_code);
            }
        }
        header('location:../views/dash_admin-home.php?coupon=true');        
    }
    elseif ($event == "deleteCoupon"){
        $user_id = $_POST['user_id'];        
        $coupon = $_POST['coupon'];  

        if(Coupon::validCoupon($user_id, $coupon)){
            Coupon::deleteCoupon($user_id, $coupon);
            header('location:../views/user-side-cart.php?appliedCoupon=true');        
        }else{
            header('location:../views/user-side-cart.php?appliedCoupon=false');        
        }
    }
    
    else{
        echo "You are not allowed !";
    }
    
}else{
    echo "You are not allowed !";
}

?>