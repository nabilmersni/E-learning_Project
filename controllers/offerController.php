<?php 
require_once "../models/user.php";
require_once "../models/offer.php";


if (isset($_GET['event']) && !empty($_GET['event'])) {
    
    $event = $_GET['event'];

    if ($event == "addOffer") {
        $offer = new Offer();
        $formation_id = $_POST['formation_id'];

        $offer->setUser_id($_POST['user_id']);
        $offer->setFormation_id($_POST['formation_id']);
        $offer->setReduction($_POST['reduction']);

        $offer->addOffer($_POST['formation_price']);


        $data = User::getAllStudents();
        while($student = $data->fetchObject()) {
            $email_content = array(
                'Subject' => 'New Offer from Ilearn',
                'body' => "<h4>Hi $student->username,</h4>
                <h5>this is Ilearn! and we are happy to tell you that we have new Offer for you!<h5/>
                <br/>
                <a href='http://localhost/E-learning_Project/user-side-course-detail.php?formation_id=$formation_id'>Check offer</a>"
            );
            User::sendemail($student->email ,$email_content);
        }

    
        header('location:../views/dash_instructor-courses.php');        
    }
    elseif ($event == "deleteOffer"){
        $offer_id = $_POST['offer_id'];        

        Offer::deleteOffer($offer_id, $_POST['formation_id']);
        header('location:../views/dash_instructor-offres.php');        
    }
    
    else{
        echo "You are not allowed !";
    }
    
}else{
    echo "You are not allowed !";
}

?>