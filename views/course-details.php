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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../contents/sass/style.css" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="icon" href="../contents/img/logo-icon-nobg.png">
    <title>I learn</title>
</head>

<body class="all-course-body">
    <div class="navigation navigation-scrolled-up">
        <nav class="navigation__nav">
            <a href="#"><img class="navigation__logo" src="../contents/img/logo-txt-nobg.png" alt="platform-logo"></a>

            <ul class="navigation__list">
                <li class="navigation__item"><a href="../index.php#home" class="navigation__link">Home</a></li>
                <li class="navigation__item"><a href="../index.php#course" class="navigation__link">Course</a></li>
                <li class="navigation__item"><a href="../index.php#about" class="navigation__link">About</a></li>
                <li class="navigation__item"><a href="../index.php#instructor" class="navigation__link">Instructor</a>
                </li>
                <li class="navigation__item"><a href="../views/login.php" class="navigation__link">Login</a></li>
                <div class="navigation__btn">
                    <a href="../views/signUp.php" class="primary-btn primary-btn-nav">Sign up</a>
                </div>
            </ul>
        </nav>
    </div>

    <main class="course-detail__container">
        <div class="course-detail__content">
            <h1 class="course-detail__content__title">
                The Complete JavaScript Course 2021:
                From Zero to Expert!
            </h1>

            <div class="course-detail__content__owner">
                <h2 class="course-detail__content__owner__name">
                    <span>By </span>Jonas Schmedtmann
                </h2>

                <h2 class="course-detail__content__owner__category">
                    Development
                </h2>
            </div>

            <div class="course-detail__content__cover__container">
                <img src="../contents/img/course-cover.jpg" alt="" class="course-detail__content__cover">
            </div>

            <h2 class="course-detail__content__description__title">
                Description
            </h2>

            <p class="course-detail__content__description__parag">
                JavaScript is the most popular programming language in the world. It powers the entire modern web. It
                provides millions of high-paying jobs all over the world.
                <br><br>
                You will learn modern JavaScript from the very beginning, step-by-step. I will guide you through
                practical and fun code examples, important theory about how JavaScript works behind the scenes, and
                beautiful and complete projects.
            </p>
            <div class="course-detail__content__chapters">
                <h2 class="course-detail__content__chapters__title">Course chapters</h2>

                <div class="course-detail__content__chapters__container">
                    <div class="course-detail__content__chapters__item">
                        <img src="../contents/img/chapter-icon.png" alt=""
                            class="course-detail__content__chapters__item__icon">
                        <p class="course-detail__content__chapters__item__title">
                            Let's start coding!
                        </p>
                    </div>

                    <div class="course-detail__content__chapters__item">
                        <img src="../contents/img/chapter-icon.png" alt=""
                            class="course-detail__content__chapters__item__icon">
                        <p class="course-detail__content__chapters__item__title">
                            A Brief Introduction to JavaScript
                        </p>
                    </div>

                    <div class="course-detail__content__chapters__item">
                        <img src="../contents/img/chapter-icon.png" alt=""
                            class="course-detail__content__chapters__item__icon">
                        <p class="course-detail__content__chapters__item__title">
                            Variables and Data Types
                        </p>
                    </div>

                    <div class="course-detail__content__chapters__item">
                        <img src="../contents/img/chapter-icon.png" alt=""
                            class="course-detail__content__chapters__item__icon">
                        <p class="course-detail__content__chapters__item__title">
                            Variable Mutation and Type Coercion
                        </p>
                    </div>

                    <div class="course-detail__content__chapters__item">
                        <img src="../contents/img/chapter-icon.png" alt=""
                            class="course-detail__content__chapters__item__icon">
                        <p class="course-detail__content__chapters__item__title">
                            Basic Operators
                        </p>
                    </div>

                    <div class="course-detail__content__chapters__item">
                        <img src="../contents/img/chapter-icon.png" alt=""
                            class="course-detail__content__chapters__item__icon">
                        <p class="course-detail__content__chapters__item__title">
                            Operator Precedence
                        </p>
                    </div>
                </div>
            </div>

            <div class="course__content">
                <h2 class="course__content__title">Contents</h2>
                <div class="course__content__chapter">
                    <h2 class="course__content__chapter__title">Let's start coding!</h2>
                    <a style="text-decoration: none;" href="#">
                        <div class="course__content__lesson">
                            <img src="../contents/img/play-button.png" alt="" class="course__content__lesson__icon">
                            <p class="course__content__lesson__title">
                                Watch Before You Start!
                            </p>
                        </div>
                    </a>

                    <a style="text-decoration: none;" href="#">
                        <div class="course__content__lesson">
                            <img src="../contents/img/play-button.png" alt="" class="course__content__lesson__icon">
                            <p class="course__content__lesson__title">
                                Watch Before You Start!
                            </p>
                        </div>
                    </a>

                    <a style="text-decoration: none;" href="#">
                        <div class="course__content__lesson">
                            <img src="../contents/img/play-button.png" alt="" class="course__content__lesson__icon">
                            <p class="course__content__lesson__title">
                                Watch Before You Start!
                            </p>
                        </div>
                    </a>
                </div>

                <div class="course__content__chapter">
                    <h2 class="course__content__chapter__title">A Brief Introduction to JavaScript</h2>
                    <a style="text-decoration: none;" href="#">
                        <div class="course__content__lesson">
                            <img src="../contents/img/play-button.png" alt="" class="course__content__lesson__icon">
                            <p class="course__content__lesson__title">
                                Watch Before You Start!
                            </p>
                        </div>
                    </a>

                    <a style="text-decoration: none;" href="#">
                        <div class="course__content__lesson">
                            <img src="../contents/img/play-button.png" alt="" class="course__content__lesson__icon">
                            <p class="course__content__lesson__title">
                                Watch Before You Start!
                            </p>
                        </div>
                    </a>

                    <a style="text-decoration: none;" href="#">
                        <div class="course__content__lesson">
                            <img src="../contents/img/play-button.png" alt="" class="course__content__lesson__icon">
                            <p class="course__content__lesson__title">
                                Watch Before You Start!
                            </p>
                        </div>
                    </a>
                </div>

                <div class="course__content__chapter">
                    <h2 class="course__content__chapter__title">Variables and Data Types</h2>
                    <a style="text-decoration: none;" href="#">
                        <div class="course__content__lesson">
                            <img src="../contents/img/play-button.png" alt="" class="course__content__lesson__icon">
                            <p class="course__content__lesson__title">
                                Watch Before You Start!
                            </p>
                        </div>
                    </a>

                    <a style="text-decoration: none;" href="#">
                        <div class="course__content__lesson">
                            <img src="../contents/img/play-button.png" alt="" class="course__content__lesson__icon">
                            <p class="course__content__lesson__title">
                                Watch Before You Start!
                            </p>
                        </div>
                    </a>

                    <a style="text-decoration: none;" href="#">
                        <div class="course__content__lesson">
                            <img src="../contents/img/play-button.png" alt="" class="course__content__lesson__icon">
                            <p class="course__content__lesson__title">
                                Watch Before You Start!
                            </p>
                        </div>
                    </a>
                </div>
            </div>


        </div>

        <div class="course-detail__divider"></div>

        <div class="course-detail__buy">
            <h2 class="course-detail__buy__price">
                1200<span>.000</span><span> TND</span>
            </h2>

            <a href="./login.php" class="course-detail__buy__btn">
                Buy this course
                <img src="../contents/img/cart-icon.png" alt="" class="course-detail__buy__btn-icon">
            </a>

            <div class="course-detail__buy__option__container">
                <div class="course-detail__buy__option__item">
                    <img src="../contents/img/video-icon-2.png" alt="" class="course-detail__buy__option__item__icon">
                    <p class="course-detail__buy__option__item__title">75 Videos</p>
                </div>

                <div class="course-detail__buy__option__item">
                    <img src="../contents/img/chapter-icon.png" alt="" class="course-detail__buy__option__item__icon">
                    <p class="course-detail__buy__option__item__title">21 Chapters</p>
                </div>

                <div class="course-detail__buy__option__item">
                    <img src="../contents/img/infinity-icon.png" alt="" class="course-detail__buy__option__item__icon">
                    <p class="course-detail__buy__option__item__title">Full lifetime access</p>
                </div>

                <div class="course-detail__buy__option__item">
                    <img src="../contents/img/level-icon.png" alt="" class="course-detail__buy__option__item__icon">
                    <p class="course-detail__buy__option__item__title">Level: <span>All</span></p>
                </div>
            </div>

        </div>
    </main>


</body>

</html>