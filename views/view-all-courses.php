<?php
session_start();
if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    $user = $_SESSION['user'];
    if ($user->role == 'student') {
        header('location:../views/user-side-courses.php');
    } elseif ($user->role == 'admin') {
        header('location:../views/dash_admin-home.php');
    } elseif ($user->role == 'instructor') {
        header('location:../views/dash_instructor.php');
    }
}

include_once('../controllers/formationC.php');

$formationC = new FormationC();
$listeFormations = $formationC->afficher_formations();

if(isset($_GET['test'])){
    $test = $_GET['test'];


if ($test == 1) {
    $search = $_GET['search'];
    $listeFormations = $formationC->rechercher_formations($search);
} else if ($test == 2) {
    $search = $_POST['search'];
    $listeFormations = $formationC->filtrer_formations($search);
}
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../contents/sass/style.css" />
    <link rel="stylesheet" href="../contents/css/dash_instructor-courses.css" />
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

    <main class="all-courses">
        <div style="display: flex; justify-content: space-between;">
            <h1 class="all-courses__title">Browse All Courses</h1>
            <form action="view-all-course.php?test=1" method="POST">
                <div class="container_search">
                    <input type="text" maxlength="12" name="search" placeholder="Rechercher" class="searchbar">
                    <button type="submit"><img src="https://images-na.ssl-images-amazon.com/images/I/41gYkruZM2L.png"
                            alt="search icon" class="button_search">
                    </button>
            </form>
        </div>

        </div>


        <section class="all-courses__container">
            <div class="all-courses__categorie__container">
                <h1 class="all-courses__categorie__title">Category</h1>
                <div class="all-courses__categorie__list">
                    <a href="view-all-course.php?test=0"
                        class="all-courses__categorie__item all-courses__categorie__item-active">All courses</a>
                    <a href="#" class="all-courses__categorie__item">Programing & Development</a>
                    <a href="#" class="all-courses__categorie__item">Art & Music</a>
                    <a href="#" class="all-courses__categorie__item">Business</a>
                    <a href="#" class="all-courses__categorie__item">Design</a>
                    <a href="#" class="all-courses__categorie__item">Languages & Literature</a>
                    <a href="#" class="all-courses__categorie__item">Photography</a>
                    <a href="#" class="all-courses__categorie__item">Marketing</a>
                </div>
            </div>
            <div class="courses__container" style="border: none; padding: 0rem 3rem;">
                <div class="courses__card-v3__container">

                    <?php

                    foreach ($listeFormations as $formation) {
                    ?>
                    <a style="text-decoration: none;" href="./course-details.php">
                        <div class="course__card-v3">
                            <div class="course__card-v3__thumbnail-container">
                                <img src="./formation_code/uploads/<?php echo $formation['image']; ?>" alt="course img"
                                    class="course__card-v3__thumbnail">
                            </div>

                            <div class="course__card-v3__category-price">
                                <p class="course__card-v3__category"><?php echo $formation['categorie']; ?></p>
                                <p class="course__card-v3__price"><?php echo $formation['price']; ?></p>
                            </div>

                            <h1 class="course__card-v3__title"><?php echo $formation['name']; ?>
                            </h1>

                            <p class="course__card-v3__instructor-name">Braiek Ali</p>

                            <div class="course__card-v3__stat">

                                <div class="course__card-v3__stat__rating-container">
                                    <p class="course__card-v3__stat__rating">5.0</p>
                                    <div class="course__card-v3__stat__stars">
                                        <img src="../contents/img/star-icon.png" alt=""
                                            class="course__card-v3__stat__star-icon">
                                        <img src="../contents/img/star-icon.png" alt=""
                                            class="course__card-v3__stat__star-icon">
                                        <img src="../contents/img/star-icon.png" alt=""
                                            class="course__card-v3__stat__star-icon">
                                        <img src="../contents/img/star-icon.png" alt=""
                                            class="course__card-v3__stat__star-icon">
                                        <img src="../contents/img/star-icon.png" alt=""
                                            class="course__card-v3__stat__star-icon">
                                    </div>
                                    <p class="course__card-v3__stat__rating-count">(256321)</p>

                                </div>

                                <div class="course__card-v3__stat__student">
                                    <img class="course__card-v3__stat__student-icon"
                                        src="../contents/img/users-icon.png" alt="">
                                    <p class="course__card-v3__stat__student-count">256321</p>
                                </div>

                            </div>
                        </div>
                    </a>
                    <?php
                    }
                    ?>


                </div>
                <!-- <div class="courses-btn">
                    <a href="#" class="primary-btn">View All Course</a>
                </div> -->
            </div>




        </section>



    </main>


    <!-- <script src="../contents/js/navScript.js"></script> -->
</body>

</html>