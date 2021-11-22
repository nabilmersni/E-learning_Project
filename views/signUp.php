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

    <title>I learn-signUp</title>
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
                <li class="navigation__item"><a href="./login.php" class="navigation__link">Login</a></li>
                <div class="navigation__btn">
                    <a href="#" class="primary-btn primary-btn-nav">Sign up</a>
                </div>
            </ul>
        </nav>
    </div>

    <main>
        <div class="form__container">

            <div class="form__ill">
                <lottie-player class="form__ill__lottie-player"
                    src="https://assets3.lottiefiles.com/packages/lf20_q5pk6p1k.json" background="transparent" speed="1"
                    loop autoplay></lottie-player>
            </div>

            <form method="POST" action="../controllers/userController.php?event=signup" class="form signupForm">
                <h1 class="form__heading">Sign Up</h1>

                <?php 
                    if (isset($_GET['used_email']) && !empty($_GET['used_email'])) {
                    
                            $used_email = $_GET['used_email'];
                            if($used_email){
                                echo '<div class="form_alert form_alert_error">
                                        the email is already in use
                                    </div>';
                            }
                } ?>

                <div class="form__input__group">
                    <label for="fullname" class="form__input__label">Fullname<span>*</span></label>
                    <input id="fullname" name="fullname" type="text" class="form__input" placeholder="Fullname">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>

                <!---------------------------- ***input separation*** --------------------------->

                <div class="form__input__group">
                    <label for="username" class="form__input__label">Username<span>*</span></label>
                    <input id="username" name="username" type="text" class="form__input" placeholder="Username">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>

                <!---------------------------- ***input separation*** --------------------------->

                <div class="form__input__group">
                    <label for="email" class="form__input__label">Email<span>*</span></label>
                    <input id="email" name="email" type="email" class="form__input" placeholder="Email">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </div>

                <!---------------------------- ***input separation*** --------------------------->

                <div class="form__input__group">
                    <label class="form__input__label">Are you<span>*</span></label>

                    <div class="form__input__group-radio">
                        <label class="form__input__label-radioBTN">
                            <input class="form__input-radioBTN" type="radio" id="student" name="role" value="student"
                                checked>
                            <span>Student</span>
                        </label>

                        <label class="form__input__label-radioBTN">
                            <input class="form__input-radioBTN" type="radio" id="instructor" name="role"
                                value="instructor">
                            <span>Instructor</span>
                        </label>
                    </div>

                </div>

                <!---------------------------- ***input separation*** --------------------------->

                <div class="form__input__group">
                    <label for="phone" class="form__input__label">Phone Number<span>*</span></label>
                    <input id="phone" name="phone" type="number" class="form__input" placeholder="Phone Number">

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                        </path>
                    </svg>
                </div>

                <!---------------------------- ***input separation*** --------------------------->
                <div class="form__input__group-password">
                    <div class="form__input__group" style="margin-right: 10px;">
                        <label for="password" class="form__input__label">Password<span>*</span></label>
                        <input id="password" name="password" type="password" class="form__input" placeholder="Password">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                            <path
                                d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                            </path>
                        </svg>
                    </div>

                    <div class="form__input__group">
                        <label for="repassword" class="form__input__label">Confirm Password<span>*</span></label>
                        <input id="repassword" name="repassword" type="password" class="form__input"
                            placeholder="Password">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="form__input__icon">
                            <path
                                d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                            </path>
                        </svg>
                    </div>

                </div>

                <!---------------------------- ***input separation*** --------------------------->


                <!-- <a href="#" class="primary-btn primary-btn-form">Sign Up</a> -->
                <input class="primary-btn primary-btn-form" type="submit" value="Sign Up">


                <p class="form__member">
                    You already have an account!
                    <a class="form__member__link" href="./login.php">Log In!</a>
                </p>

            </form>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="../contents/js/formValidator.js"></script>
</body>

</html>