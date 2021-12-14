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
include_once('../controllers/chapterC.php');
include_once('../controllers/lessonC.php');
include_once('../controllers/outcomeC.php');
include_once('../controllers/requirementC.php');

$formationC = new FormationC();
$listeFormations = $formationC->recuperer_formation($_GET['id']);

$outcomeC = new OutcomeC();
$listeOutcomes = $outcomeC->afficher_outcomes($_GET['id']);
$listeOutcome = $outcomeC->afficher_outcomes($_GET['id']);

$chapterC = new ChapterC();
$count_chapters = $chapterC->count_chapter($_GET['id']);
$listeChapters = $chapterC->afficher_chapitres_page_order($_GET['id']);
$listeChapter = $chapterC->afficher_chapitres_page_order($_GET['id']);

$lessonC = new LessonC();
$count_lessons = $lessonC->count_lesson($_GET['id']);

$requirementC = new RequirementC();
$listeRequirements = $requirementC->afficher_requirements($_GET['id']);

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

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>

<body class="all-course-body">
    <div class="navigation navigation-scrolled-up">
        <nav class="navigation__nav">
            <a href="#"><img class="navigation__logo" src="../contents/img/logo-txt-nobg.png" alt="platform-logo"></a>

            <ul class="navigation__list">
                <li class="navigation__item"><a href="../index.html#home" class="navigation__link">Home</a></li>
                <li class="navigation__item"><a href="../index.html#course" class="navigation__link">Course</a></li>
                <li class="navigation__item"><a href="../index.html#about" class="navigation__link">About</a></li>
                <li class="navigation__item"><a href="../index.html#instructor" class="navigation__link">Instructor</a>
                </li>
                <li class="navigation__item"><a href="../views/logIn.html" class="navigation__link">Login</a></li>
                <div class="navigation__btn">
                    <a href="../views/signUp.html" class="primary-btn primary-btn-nav">Sign up</a>
                </div>
            </ul>
        </nav>
    </div>

    <?php

    foreach ($listeFormations as $formation) {
    ?>

        <main class="course-detail__container">
            <div class="course-detail__content">
                <h1 class="course-detail__content__title">
                    <?php echo $formation['name']; ?>
                </h1>

                <p class="course-detail__content__description__parag">
                    <?php echo $formation['short_description']; ?>
                </p>

                <div class="course-detail__content__owner">
                    <h2 class="course-detail__content__owner__name">
                        <span>By </span><?php echo $formation['fullname']; ?>
                    </h2>

                    <h2 class="course-detail__content__owner__category">
                        <?php echo $formation['categorie']; ?>
                    </h2>
                </div>

                <div class="course-detail__content__cover__container">
                    <img src="formation_code/uploads/<?php echo $formation['image']; ?>" alt="" class="course-detail__content__cover">
                </div>

                <p class="course-detail__content__description__parag">
                    <?php
                    $json_a = json_decode($formation['description'], true); ?>
                </p>
                <div class="course-detail__content__chapters">
                    <h2 class="course-detail__content__chapters__title">What you'll learn</h2>


                    <div class="course-detail__content__chapters__container">
                        <?php
                        $i = 0;

                        foreach ($listeOutcomes as $outcome) {
                            $i++;
                            if ($i < 5) {
                        ?>
                                <div class="course-detail__content__chapters__item" id="outcome_list_id">
                                    <!-- <img src="../contents/img/chapter-icon.png" alt="" class="course-detail__content__chapters__item__icon"> -->
                                    <span class="course-detail__content__chapters__item__icon" style="color: #585856;"><i class="fas fa-check"></i></span>
                                    <p class="course-detail__content__chapters__item__title">
                                        <?php echo $outcome['out_content']; ?>
                                    </p>
                                </div>
                        <?php }
                        } ?>

                        <?php
                        $i = 0;
                        foreach ($listeOutcome as $outcomes) {
                            $i++;
                            if ($i > 4) {
                        ?>
                                <div class="course-detail__content__chapters__item" id="outcomes_all_id<?php echo $i; ?>" style="display: none;">
                                    <!-- <img src="../contents/img/chapter-icon.png" alt="" class="course-detail__content__chapters__item__icon"> -->
                                    <span class="course-detail__content__chapters__item__icon" style="color: #585856;"><i class="fas fa-check"></i></span>
                                    <p class="course-detail__content__chapters__item__title">
                                        <?php echo $outcomes['out_content']; ?>
                                    </p>
                                </div>
                        <?php }
                        } ?>

                        <div class="show_more" id="show_more">Show more <span style="padding-left: 1rem;font-size:1.75rem"><i class="far fa-chevron-down"></i></span></div>
                        <div class="show_more" id="show_less" style="display: none;">Show less <span style="padding-left: 1rem;font-size:1.75rem"><i class="far fa-chevron-up"></i></span></div>
                    </div>
                </div>

                <div class="course__content">
                    <h2 class="course__content__title">Contents</h2>
                    <?php
                    $j = 0;
                    foreach ($listeChapters as $chapter) {
                        $j++;
                        if ($j < 5) {
                    ?>
                            <div class="course__content__chapter" onclick="show_lessons_btn( x='<?php echo $chapter['chapter_id']; ?>')">
                                <h2 class="course__content__chapter__title course__content__chapter-v1">
                                    <div class="chapter_elements_line">

                                        <div>
                                            <img src="../contents/img/chapter-icon.png" style="width: 4rem;padding-right: 1.5rem;" alt="" class="course-detail__buy__option__item__icon">
                                            <?php echo $chapter['chapter_title'] ?>
                                        </div>

                                        <div id="course_chapter_down<?php echo $chapter['chapter_id']; ?>">
                                            <span style="padding-left: 1rem;font-size:1.75rem"><i class="far fa-chevron-down "></i></span>
                                        </div>
                                        <div id="course_chapter_up<?php echo $chapter['chapter_id']; ?>" style="display: none;">
                                            <span style="padding-left: 1rem;font-size:1.75rem"><i class="far fa-chevron-up "></i></span>
                                        </div>
                                    </div>
                                </h2>
                                <div id="lesson_show<?php echo $chapter['chapter_id']; ?>" style="display: none;">
                                    <?php
                                    $listeLessons = $lessonC->afficher_lessons_page_order($chapter['chapter_id']);
                                    foreach ($listeLessons as $lesson) { ?>
                                        <a style="text-decoration: none;" href="#">
                                            <div class="course__content__lesson">
                                                <?php if (strcmp($lesson['lesson_type'], "video") == 0) { ?>
                                                    <img src="../contents/img/play-button.png" alt="" class="course__content__lesson__icon">
                                                <?php } ?>

                                                <?php if (strcmp($lesson['lesson_type'], "quiz") == 0) { ?>
                                                    <span class="course__content__lesson__icon" style="color: #585856;"><i class="fas fa-question-circle fa-lg"></i></span>
                                                <?php } ?>

                                                <p class="course__content__lesson__title">
                                                    <?php echo $lesson['lesson_title']; ?>
                                                </p>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </div>


                            </div>
                    <?php }
                    } ?>

                    <!--afficher tous les chapitres-->
                    <?php
                    $j = 0;
                    foreach ($listeChapter as $chapters) {
                        $j++;
                        if ($j > 4) {
                    ?>
                            <div class="course__content__chapter " id="chapters_all_id<?php echo $j; ?>" onclick="show_lessons_btn( x='<?php echo $chapters['chapter_id']; ?>')" style="display: none;">
                                <h2 class="course__content__chapter__title course__content__chapter-v1">
                                    <div class="chapter_elements_line">

                                        <div>
                                            <img src="../contents/img/chapter-icon.png" style="width: 4rem;padding-right: 1.5rem;" alt="" class="course-detail__buy__option__item__icon">
                                            <?php echo $chapters['chapter_title'] ?>
                                        </div>

                                        <div id="course_chapter_down<?php echo $chapters['chapter_id']; ?>">
                                            <span style="padding-left: 1rem;font-size:1.75rem"><i class="far fa-chevron-down "></i></span>
                                        </div>
                                        <div id="course_chapter_up<?php echo $chapters['chapter_id']; ?>" style="display: none;">
                                            <span style="padding-left: 1rem;font-size:1.75rem"><i class="far fa-chevron-up "></i></span>
                                        </div>
                                    </div>
                                </h2>

                                <!--- ----- ----- ---- ------ ---- ----->
                                <div id="lesson_show<?php echo $chapters['chapter_id']; ?>" style="display: none;">
                                    <?php
                                    $listeLessons = $lessonC->afficher_lessons_page_order($chapters['chapter_id']);
                                    foreach ($listeLessons as $lesson) { ?>
                                        <a style="text-decoration: none;" href="#">
                                            <div class="course__content__lesson">
                                                <?php if (strcmp($lesson['lesson_type'], "video") == 0) { ?>
                                                    <img src="../contents/img/play-button.png" alt="" class="course__content__lesson__icon">
                                                <?php } ?>

                                                <?php if (strcmp($lesson['lesson_type'], "quiz") == 0) { ?>
                                                    <span class="course__content__lesson__icon" style="color: #585856;"><i class="fas fa-question-circle fa-lg"></i></span>
                                                <?php } ?>

                                                <p class="course__content__lesson__title">
                                                    <?php echo $lesson['lesson_title']; ?>
                                                </p>
                                            </div>
                                        </a>
                                    <?php } ?>
                                </div>


                            </div>
                    <?php }
                    } ?>
                    <!--fin-afficher tous les chapitres-->
                    <div class=" course__content__chapter__title show_more_chapter" id="show_more_chapter">Show more <span style="padding-left: 1rem;font-size:1.75rem"><i class="far fa-chevron-down"></i></span></div>
                    <div class="course__content__chapter__title show_more_chapter" id="show_less_chapter" style="display: none;">Show less <span style="padding-left: 1rem;font-size:1.75rem"><i class="far fa-chevron-up"></i></span></div>

                    <h2 class="course-detail__content__description__title">
                        Requirements
                    </h2>

                    <div class="course-detail__content__chapters">
                        <?php foreach ($listeRequirements as $req) { ?>
                            <li class="course-detail__content__chapters-v1"><?php echo $req['req_content'] ?></li>
                        <?php } ?>
                    </div>

                    <h2 class="course-detail__content__description__title">
                        Description
                    </h2>



                </div>


            </div>

            <div class="course-detail__divider"></div>

            <div class="course-detail__buy">
                <h2 class="course-detail__buy__price">
                    <?php echo (int)$formation['price']; ?><span>.
                        <?php $num = $formation['price'] - (int)$formation['price'];
                        $num = $num * 1000;
                        $num = (int)($num);
                        echo $num; ?>
                    </span><span> TND</span>
                </h2>

                <a href="./logIn.html" class="course-detail__buy__btn">
                    Buy this course
                    <img src="../contents/img/cart-icon.png" alt="" class="course-detail__buy__btn-icon">
                </a>

                <div class="course-detail__buy__option__container">

                    <div class="course-detail__buy__option__item">
                        <span class="course-detail__buy__option__item__icon" style="color: #636361;"><i class="far fa-file-certificate fa-2x"></i></span>
                        <p class="course-detail__buy__option__item__title"> Shareable Certificate</p>
                    </div>

                    <div class="course-detail__buy__option__item">
                        <span class="course-detail__buy__option__item__icon" style="color: #636361;"><i class="fal fa-globe fa-2x"></i></span>
                        <p class="course-detail__buy__option__item__title"> 100% online courses</p>
                    </div>

                    <div class="course-detail__buy__option__item">
                        <img src="../contents/img/video-icon-2.png" alt="" class="course-detail__buy__option__item__icon">
                        <p class="course-detail__buy__option__item__title"><?php echo $count_lessons  ?></p>
                    </div>

                    <div class="course-detail__buy__option__item">
                        <img src="../contents/img/chapter-icon.png" alt="" class="course-detail__buy__option__item__icon">
                        <p class="course-detail__buy__option__item__title"><?php echo $count_chapters  ?> </p>
                    </div>

                    <div class="course-detail__buy__option__item">
                        <img src="../contents/img/infinity-icon.png" alt="" class="course-detail__buy__option__item__icon">
                        <p class="course-detail__buy__option__item__title">Full lifetime access</p>
                    </div>

                    <div class="course-detail__buy__option__item">
                        <img src="../contents/img/level-icon.png" alt="" class="course-detail__buy__option__item__icon">
                        <p class="course-detail__buy__option__item__title">Level: <span><?php echo $formation['level']; ?></span></p>
                    </div>

                </div>

            </div>
        </main>

    <?php
    }
    ?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#show_more").click(function() {
                for (let i = 0; i < 40; i++) {
                    $("#outcomes_all_id" + i).show(0)
                }
                $("#show_more").hide(0)
                $("#show_less").show(0)
            });

        });

        $(document).ready(function() {
            $("#show_less").click(function() {
                for (let i = 0; i < 40; i++) {
                    $("#outcomes_all_id" + i).hide(0)
                }
                $("#show_more").show(0)
                $("#show_less").hide(0)
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            $("#show_more_chapter").click(function() {
                for (let i = 0; i < 40; i++) {
                    $("#chapters_all_id" + i).show(0)
                }
                $("#show_more_chapter").hide(0)
                $("#show_less_chapter").show(0)
            });

        });

        $(document).ready(function() {
            $("#show_less_chapter").click(function() {
                for (let i = 0; i < 40; i++) {
                    $("#chapters_all_id" + i).hide(0)
                }
                $("#show_more_chapter").show(0)
                $("#show_less_chapter").hide(0)
            });

        });
    </script>

    <script>
        function show_lessons_btn(x) {
            $("#lesson_show" + x).toggle(300)
            $("#course_chapter_down" + x).toggle(0)
            $("#course_chapter_up" + x).toggle(0)

        }
    </script>


</body>

</html>