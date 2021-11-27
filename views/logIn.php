<?php 
    session_start();
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
        $user = $_SESSION['user'];

        if($user->role == 'student'){
            header('location:../views/user-side-courses.php');
        }elseif($user->role == 'admin'){
            header('location:../views/dash_admin-home.php');
        }elseif($user->role == 'instructor'){
            header('location:../views/dash_instructor.php');
        }
        
    }

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../contents/sass/style.css" />
    <link rel="icon" href="../contents/img/logo-icon-nobg.png">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <title>I learn-logIn</title>
</head>

<body>
    <div class="navigation navigation-scrolled-up">
        <nav class="navigation__nav">
            <a href="../index.php"><img class="navigation__logo" src="../contents/img/logo-txt-nobg.png"
                    alt="platform-logo"></a>

            <ul class="navigation__list">
                <li class="navigation__item"><a href="../index.php" class="navigation__link">Home</a></li>
                <li class="navigation__item"><a href="../index.php#course" class="navigation__link">Course</a></li>
                <li class="navigation__item"><a href="../index.php#about" class="navigation__link">About</a></li>
                <li class="navigation__item"><a href="../index.php#instructor" class="navigation__link">Instructor</a>
                </li>
                <li class="navigation__item"><a href="#" class="navigation__link">Login</a></li>
                <div class="navigation__btn">
                    <a href="./signUp.php" class="primary-btn primary-btn-nav">Sign up</a>
                </div>
            </ul>
        </nav>
    </div>

    <main>
        <div class="form__container">
            <!-- <img src="../contents/img/signUpIll.png" alt="" class="form__ill"> -->

            <div class="form__ill">
                <lottie-player class="form__ill__lottie-player"
                    src="https://assets3.lottiefiles.com/packages/lf20_q5pk6p1k.json" background="transparent" speed="1"
                    loop autoplay></lottie-player>
            </div>

            <form method="POST" action="../controllers/userController.php?event=login" class="form loginForm">
                <h1 class="form__heading">Log In</h1>

                <?php 
                    if (isset($_GET['register']) && !empty($_GET['register'])) {
                    
                        $register = $_GET['register'];
                        if($register == 'true'){
                            echo '<div class="form_alert form_alert_success">
                                  Your account has been created successfully.Please verify your email
                                  </div>';
                        }else{
                            echo '<div class="form_alert form_alert_error">
                                   Something went wrong. User not created.
                                   </div>';
                        }
                    }

                    if (isset($_GET['login']) && !empty($_GET['login'])) {
                    
                        $login = $_GET['login'];
                        if($login == 'false'){
                            echo '<div class="form_alert form_alert_error">
                                   Email or password are inccorect!
                                   </div>';
                        }
                    }

                    if (isset($_GET['accountDisbaled']) && !empty($_GET['accountDisbaled'])) {
                    
                        $accountDisbaled = $_GET['accountDisbaled'];
                        if($accountDisbaled == 'true'){
                            echo '<div class="form_alert form_alert_error">
                                    Your account has been disabled 
                                   </div>';
                        }
                    }
                    
                    if (isset($_GET['auth']) && !empty($_GET['auth'])) {
                
                        $auth = $_GET['auth'];
                        if($auth == 'false'){
                            echo '<div class="form_alert form_alert_error">
                                   Please log into your account first!
                                   </div>';
                        }
                    }

                    if (isset($_GET['verfied_email']) && !empty($_GET['verfied_email'])) {
                
                        $verfied_email = $_GET['verfied_email'];
                        if($verfied_email == 'false'){
                            echo '<div class="form_alert form_alert_error">
                                   A new email send to you, Please verify your email!
                                   </div>';
                        }elseif($verfied_email == 'true'){
                            echo '<div class="form_alert form_alert_success">
                                   your account is verified. Please login
                                   </div>';
                        }elseif($verfied_email == 'error'){
                            echo '<div class="form_alert form_alert_error">
                                   Little hacker what are you doing? 😅
                                   </div>';
                        }
                    }

                    if (isset($_GET['reset_password_link']) && !empty($_GET['reset_password_link'])) {
                
                        $reset_password_link = $_GET['reset_password_link'];
                        if($reset_password_link == 'true'){
                            echo '<div class="form_alert form_alert_success">
                                   Please check your email for the password reset link
                                   </div>';
                        }
                    }

                    if (isset($_GET['changePass']) && !empty($_GET['changePass'])) {
                
                        $changePass = $_GET['changePass'];
                        if($changePass == 'true'){
                            echo '<div class="form_alert form_alert_success">
                                    Your password changed successfully
                                   </div>';
                        }
                    }
                    

                 ?>

                <div class="form__input__group">
                    <label for="email" class="form__input__label">Email<span>*</span></label>
                    <input id="email" name="email" type="email" class="form__input" placeholder="Email">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                        </path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </div>

                <div class="form__input__group">
                    <label for="password" class="form__input__label">Password<span>*</span></label>
                    <input id="password" name="password" type="password" class="form__input" placeholder="Password">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                        <path
                            d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                        </path>
                    </svg>
                </div>
                <!-- <a href="#" class="primary-btn primary-btn-form">Log In</a> -->
                <input class="primary-btn primary-btn-form" type="submit" value="Log In">
                <p class="form__member">
                    Don't have an account yet?
                    <a class="form__member__link" href="./signUp.php">Sign Up!</a>
                </p>
                <a style="margin-top:1.2rem; " class="form__member__link" href="./reset_password_form1.php">Forget your
                    password?</a>

            </form>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="../contents/js/formValidator.js"></script>

</body>

</html>