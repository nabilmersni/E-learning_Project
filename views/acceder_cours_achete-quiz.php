<?php
require_once "../models/user.php";
require_once "../models/panier.php";
include_once('../controllers/chapterC.php');
include_once('../controllers/lessonC.php');
include_once('../controllers/questionC.php');
include_once('../controllers/reponseC.php');
//include_once('data.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user'])) {
    $_SESSION['user'] = User::getOneUser($_SESSION['user']->user_id);
    $user = $_SESSION['user'];
    if ($user->role == 'instructor' && $user->cv_status == 0) {
        header('location:../views/dash_instructor-uploadCV.php');
    }
    if ($user->status == 0) {
        session_unset();
        session_destroy();
        header('location:../views/login.php?accountDisbaled=true');
    }
} else {
    header('location:../views/login.php?auth=false');
}

$data = Panier::getAllPaniers($user->user_id);
$empty = true;
$totalPrice = 0;
$formationIDArray = [];

$paniertStat = Panier::getPanierNumber($user->user_id);

require_once "../models/notification.php";

if ($user->role == 'admin') {
    $notifCount = Notification::getNotifAdminNumber()->total;
    $notifications = Notification::getAllNotifAdmin();
} else {
    $notifCount = Notification::getNotifUserNumber($user->user_id)->total;
    $notifications = Notification::getAllNotifUser($user->user_id);
}


$chapterC = new ChapterC();
$listeChapters = $chapterC->afficher_chapitres_page_order(114);

$lessonC = new LessonC();

$test = $_GET['test'];

$questionC = new QuestionC();
$listeQuestions = $questionC->afficher_question($_GET['lesson_id'], $_GET['page_order']);
$nb_questions = $questionC->count_question($_GET['lesson_id']);


$reponseC = new ReponseC();

$i = 0;

?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../contents/css/notif.css" />
    <link rel="stylesheet" href="../contents/sass/style.css" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" href="../contents/img/logo-icon-nobg.png">
    <link rel="stylesheet" href="../contents/css/dash_instructor-courses.css" />
    <link rel="stylesheet" href="../contents/css/btn_quiz.css" />
    <link rel="stylesheet" href="../contents/sass/pagination.css" />



    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>I learn</title>

</head>

<body class="all-course-body">
    <nav class="dash__top-bar user-side__top-bar">
        <a href="user-side-courses.php">
            <img src="../contents/img/logo-icon-nobg.png" alt="" class="user-side__top-bar__logo">
        </a>

        <ul class="navigation__list">
            <li class="navigation__item"><a href="./user-side-courses.php" class="navigation__link user-side__top-bar__link">Home</a>
            </li>

            <li class="navigation__item">
                <a href="./user-side-account-settings.php" class="navigation__link user-side__top-bar__link">Account
                    settings
                </a>
                <input type="hidden" name="user_id" value=" <?php echo $user->user_id ?>">
            </li>
            <li class="navigation__item"><a href="./user-side-profile-info.php" class="navigation__link user-side__top-bar__link">View profile</a>
            </li>

            <?php
            if ($user->role != 'student') {
            ?>
                <li class="navigation__item"><a href="./login.php" class="navigation__link user-side__top-bar__link">Dashboard</a>
                </li>
            <?php } ?>

        </ul>

        <div class="dash__top-bar__container">
            <div class="dash__top-bar__container__left">

                <a href="../controllers/userController.php?event=logout">
                    <div class="dash__top-bar__svg-container">
                        <svg class="dash__top-bar__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46.917 46.917">
                            <g id="logout-icon" transform="translate(0 -0.004)">
                                <path id="Path_1043" data-name="Path 1043" d="M29.323,25.417a1.954,1.954,0,0,0-1.955,1.955v7.82a1.957,1.957,0,0,1-1.955,1.955H19.548V7.823a3.94,3.94,0,0,0-2.662-3.716l-.579-.194h9.106a1.957,1.957,0,0,1,1.955,1.955v5.865a1.955,1.955,0,0,0,3.909,0V5.868A5.872,5.872,0,0,0,25.413,0H4.4a1.535,1.535,0,0,0-.209.043C4.1.039,4.005,0,3.91,0A3.913,3.913,0,0,0,0,3.913V39.1a3.94,3.94,0,0,0,2.662,3.716l11.765,3.922a4.047,4.047,0,0,0,1.212.182,3.913,3.913,0,0,0,3.909-3.91V41.056h5.865a5.872,5.872,0,0,0,5.865-5.865v-7.82a1.954,1.954,0,0,0-1.955-1.955Zm0,0" fill="currentColor" />
                                <path id="Path_1044" data-name="Path 1044" d="M298.263,115.058l-7.82-7.819a1.954,1.954,0,0,0-3.337,1.382v5.865h-7.819a1.955,1.955,0,1,0,0,3.909h7.819v5.865a1.954,1.954,0,0,0,3.337,1.382l7.82-7.82a1.953,1.953,0,0,0,0-2.764Zm0,0" transform="translate(-251.919 -96.888)" fill="currentColor" />
                            </g>
                        </svg>
                    </div>
                </a>

                <div class="divider"></div>

                <script>
                    $(document).ready(function() {
                        $(".notification_icon").click(function() {
                            $(".dropdown").toggleClass("active");
                        })
                    });
                </script>
                <div class="notification_wrap">
                    <div class="dash__top-bar__svg-container ">
                        <div style="position:relative" class="notification_icon">
                            <span class="cart-icon__span"><?php echo $notifCount; ?> </span>
                            <svg class="dash__top-bar__svg" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 48 48" style="enable-background:new 0 0 512 512" xml:space="preserve">
                                <g>
                                    <g xmlns="http://www.w3.org/2000/svg" id="Line">
                                        <path d="m24 2a15 15 0 0 0 -15 15v11.7l-3.32 5a4.08 4.08 0 0 0 3.39 6.3h29.86a4.08 4.08 0 0 0 3.39-6.33l-3.32-4.97v-11.7a15 15 0 0 0 -15-15z" fill="currentColor" data-original="currentColor"></path>
                                        <path d="m24 46a6 6 0 0 0 5.65-4h-11.3a6 6 0 0 0 5.65 4z" fill="currentColor" data-original="currentColor"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <div class="dropdown">

                        <?php if ($notifCount == 0) {
                            echo '<div class="empty_alert">
                                    There is no notifications
                                </div>';
                        } ?>

                        <?php
                        while ($notification = $notifications->fetchObject()) {
                        ?>

                            <div class="notify_item">
                                <div class="notify_img">
                                    <img src="../uploads/defaultUserImage.png" alt="" style="width: 50px">
                                </div>
                                <div class="notify_info">
                                    <p><span><?php echo $notification->fullname ?></span>
                                        <?php echo $notification->content ?></p>
                                    <span class="notify_time">10 minutes ago</span>
                                </div>
                                <div class="notify_read">
                                    <a style="text-decoration:none; color:inherit" href="../controllers/notificationController.php?event=deleteNotif&notif_id=<?php echo $notification->notif_id ?>">
                                        <svg class="notify_read_icon" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512" xml:space="preserve">
                                            <g>
                                                <path xmlns="http://www.w3.org/2000/svg" d="m16 5.5c-6.76001 0-13 3.94-15.89996 10.04999-.13.28998-.13.63 0 .90997 2.90997 6.10004 9.14996 10.04004 15.89996 10.04004s12.98999-3.94 15.90002-10.04004c.13-.27997.13-.62 0-.90997-2.90002-6.10999-9.14001-10.04999-15.90002-10.04999zm0 16.83997c-3.48999 0-6.33997-2.84998-6.33997-6.33997s2.84998-6.34003 6.33997-6.34003 6.34003 2.85004 6.34003 6.34003-2.85004 6.33997-6.34003 6.33997z" fill="currentColor" data-original="currentColor"></path>
                                                <circle xmlns="http://www.w3.org/2000/svg" cx="16" cy="16" r="4.2" fill="currentColor" data-original="currentColor"></circle>
                                            </g>
                                        </svg>
                                        <p class="notify_read_text">
                                            Mark as read
                                        </p>
                                    </a>
                                </div>
                            </div>

                        <?php } ?>
                    </div>
                </div>

                <div class="divider"></div>

                <?php
                if ($user->role == 'student') {
                ?>
                    <a style="text-decoration: none;" href="#">
                        <div style="margin-top: .3rem;" class="dash__top-bar__svg-container cart-icon">
                            <span class="cart-icon__span"><?php echo $paniertStat->total; ?> </span>
                            <svg class="dash__top-bar__svg" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 512.00033 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
                                <g>
                                    <path xmlns="http://www.w3.org/2000/svg" d="m166 300.003906h271.003906c6.710938 0 12.597656-4.4375 14.414063-10.882812l60.003906-210.003906c1.289063-4.527344.40625-9.390626-2.433594-13.152344-2.84375-3.75-7.265625-5.964844-11.984375-5.964844h-365.632812l-10.722656-48.25c-1.523438-6.871094-7.617188-11.75-14.648438-11.75h-91c-8.289062 0-15 6.710938-15 15 0 8.292969 6.710938 15 15 15h78.960938l54.167968 243.75c-15.9375 6.929688-27.128906 22.792969-27.128906 41.253906 0 24.8125 20.1875 45 45 45h271.003906c8.292969 0 15-6.707031 15-15 0-8.289062-6.707031-15-15-15h-271.003906c-8.261719 0-15-6.722656-15-15s6.738281-15 15-15zm0 0" fill="currentColor" data-original="#000000"></path>
                                    <path xmlns="http://www.w3.org/2000/svg" d="m151 405.003906c0 24.816406 20.1875 45 45.003906 45 24.8125 0 45-20.183594 45-45 0-24.8125-20.1875-45-45-45-24.816406 0-45.003906 20.1875-45.003906 45zm0 0" fill="currentColor" data-original="#000000"></path>
                                    <path xmlns="http://www.w3.org/2000/svg" d="m362.003906 405.003906c0 24.816406 20.1875 45 45 45 24.816406 0 45-20.183594 45-45 0-24.8125-20.183594-45-45-45-24.8125 0-45 20.1875-45 45zm0 0" fill="currentColor" data-original="#000000"></path>
                                </g>
                            </svg>
                        </div>
                    </a>
                <?php } ?>
            </div>

            <div class="dash__top-bar__container__right">
                <h1 class="dash__top-bar__fullname">
                    <?php echo $user->fullname ?>
                </h1>
                <div class="dash__top-bar__img-container">
                    <a href="./user-side-profile-info.php">
                        <img class="dash__top-bar__img" src="<?php echo '../uploads/' . $user->img_url ?>" alt="">
                    </a>
                </div>
            </div>
        </div>


    </nav>



    <div class="acceder_cours">
        <!-- afficher quiz -->
        <div class="quiz_affichee">
            <?php if (strcmp($test, "btn") == 0) { ?>
                <h1 class="dash__instructor-my-courses__title dashh">Quiz</h1>

                <a href="#">
                    <div class="wrapper btn_pos_quiz">
                        <a class="cta" href="acceder_cours_achete-quiz.php?formation_id=<?php echo $_GET['formation_id'] ;?>&lesson_id=<?php echo $_GET['lesson_id'] ?>&test=quiz&page_order=0">
                            <span>START</span>
                            <span class="span_transform">
                                <svg width="66px" height="43px" viewBox="0 0 66 43" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="arrow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <path class="one" d="M40.1543933,3.89485454 L43.9763149,0.139296592 C44.1708311,-0.0518420739 44.4826329,-0.0518571125 44.6771675,0.139262789 L65.6916134,20.7848311 C66.0855801,21.1718824 66.0911863,21.8050225 65.704135,22.1989893 C65.7000188,22.2031791 65.6958657,22.2073326 65.6916762,22.2114492 L44.677098,42.8607841 C44.4825957,43.0519059 44.1708242,43.0519358 43.9762853,42.8608513 L40.1545186,39.1069479 C39.9575152,38.9134427 39.9546793,38.5968729 40.1481845,38.3998695 C40.1502893,38.3977268 40.1524132,38.395603 40.1545562,38.3934985 L56.9937789,21.8567812 C57.1908028,21.6632968 57.193672,21.3467273 57.0001876,21.1497035 C56.9980647,21.1475418 56.9959223,21.1453995 56.9937605,21.1432767 L40.1545208,4.60825197 C39.9574869,4.41477773 39.9546013,4.09820839 40.1480756,3.90117456 C40.1501626,3.89904911 40.1522686,3.89694235 40.1543933,3.89485454 Z" fill="#FFFFFF"></path>
                                        <path class="two" d="M20.1543933,3.89485454 L23.9763149,0.139296592 C24.1708311,-0.0518420739 24.4826329,-0.0518571125 24.6771675,0.139262789 L45.6916134,20.7848311 C46.0855801,21.1718824 46.0911863,21.8050225 45.704135,22.1989893 C45.7000188,22.2031791 45.6958657,22.2073326 45.6916762,22.2114492 L24.677098,42.8607841 C24.4825957,43.0519059 24.1708242,43.0519358 23.9762853,42.8608513 L20.1545186,39.1069479 C19.9575152,38.9134427 19.9546793,38.5968729 20.1481845,38.3998695 C20.1502893,38.3977268 20.1524132,38.395603 20.1545562,38.3934985 L36.9937789,21.8567812 C37.1908028,21.6632968 37.193672,21.3467273 37.0001876,21.1497035 C36.9980647,21.1475418 36.9959223,21.1453995 36.9937605,21.1432767 L20.1545208,4.60825197 C19.9574869,4.41477773 19.9546013,4.09820839 20.1480756,3.90117456 C20.1501626,3.89904911 20.1522686,3.89694235 20.1543933,3.89485454 Z" fill="#FFFFFF"></path>
                                        <path class="three" d="M0.154393339,3.89485454 L3.97631488,0.139296592 C4.17083111,-0.0518420739 4.48263286,-0.0518571125 4.67716753,0.139262789 L25.6916134,20.7848311 C26.0855801,21.1718824 26.0911863,21.8050225 25.704135,22.1989893 C25.7000188,22.2031791 25.6958657,22.2073326 25.6916762,22.2114492 L4.67709797,42.8607841 C4.48259567,43.0519059 4.17082418,43.0519358 3.97628526,42.8608513 L0.154518591,39.1069479 C-0.0424848215,38.9134427 -0.0453206733,38.5968729 0.148184538,38.3998695 C0.150289256,38.3977268 0.152413239,38.395603 0.154556228,38.3934985 L16.9937789,21.8567812 C17.1908028,21.6632968 17.193672,21.3467273 17.0001876,21.1497035 C16.9980647,21.1475418 16.9959223,21.1453995 16.9937605,21.1432767 L0.15452076,4.60825197 C-0.0425130651,4.41477773 -0.0453986756,4.09820839 0.148075568,3.90117456 C0.150162624,3.89904911 0.152268631,3.89694235 0.154393339,3.89485454 Z" fill="#FFFFFF"></path>
                                    </g>
                                </svg>
                            </span>

                        </a>
                    </div>

                </a>

            <?php } ?>
            <!---------------------------------------------------------------------------------------------->

            <?php if (strcmp($test, "quiz") == 0) { ?>
                <?php
                foreach ($listeQuestions as $question) {
                ?>
                    <div class="question_class">
                        <?php echo $question['question_content']; ?>
                    </div>

                    <!-- affichage reponse-->
                    <?php
                    $listeReponses = $reponseC->afficher_reponses_page_order($question['question_id']);
                    foreach ($listeReponses as $reponse) {
                    ?>
                        <?php if ($reponse['checked'] == 0) { ?>
                            <a href="formation_code/update_bonne_reponse.php?formation_id=<?php echo $_GET['formation_id'] ?>&lesson_id=<?php echo $_GET['lesson_id'] ?>&test=quiz&page_order=<?php echo $_GET['page_order'] ?>&reponse_id=<?php echo $reponse['reponse_id'] ?>" style="text-decoration: none;color:white">

                                <div class="reponse_class-quiz">
                                    <?php echo $reponse['reponse_content']; ?>

                                </div>

                            </a>
                        <?php } ?>

                        <?php if ($reponse['checked'] == 1) { ?>
                            <a href="formation_code/update_bonne_reponse.php?formation_id=<?php echo $_GET['formation_id'] ?>&lesson_id=<?php echo $_GET['lesson_id'] ?>&test=quiz&page_order=<?php echo $_GET['page_order'] ?>&reponse_id=<?php echo $reponse['reponse_id'] ?>" style="text-decoration: none;color:white">

                                <div class="reponse_class-quiz" style="background-color: #FF7244;">
                                    <?php echo $reponse['reponse_content']; ?>

                                </div>

                            </a>
                        <?php } ?>



                    <?php } ?>
                    <!--end reponse-->



                <?php } ?>


            <?php } ?>

            <?php
            if ($_GET['page_order'] >= 0 && $_GET['page_order'] < $nb_questions -1) { ?>

                <a href="acceder_cours_achete-quiz.php?formation_id=<?php echo $_GET['formation_id'] ;?>&lesson_id=<?php echo $_GET['lesson_id'] ?>&test=quiz&page_order=<?php echo $_GET['page_order'] + 1 ?>" class="next_btn_quiz">
                    Next
                </a>
            <?php } ?>

            <?php if ($_GET['page_order'] > 0 && $_GET['page_order'] < $nb_questions-1) { ?>
                <a href="acceder_cours_achete-quiz.php?formation_id=<?php echo $_GET['formation_id'] ;?>&lesson_id=<?php echo $_GET['lesson_id'] ?>&test=quiz&page_order=<?php echo $_GET['page_order'] - 1 ?>" class="next_btn_quiz preview_btn_quiz">
                    Preview
                </a>
            <?php } ?>

            <?php
            if ($_GET['page_order'] >= $nb_questions -1) { ?>

                <a href="acceder_cours_achete-quiz.php?formation_id=<?php echo $_GET['formation_id'] ;?>&lesson_id=<?php echo $_GET['lesson_id'] ?>&test=quiz&page_order=<?php echo $_GET['page_order'] - 1 ?>" class="next_btn_quiz preview_btn_quiz prev-finish_btn_quiz ">
                    Preview
                </a>

                <a href="acceder_cours_achete-score-quiz.php?formation_id=<?php echo $_GET['formation_id'] ;?>&lesson_id=<?php echo $_GET['lesson_id'] ?>&test=quiz&page_order=0" class="next_btn_quiz finish_btn_quiz">
                    Finish
                </a>
            <?php } ?>


        </div>

        <div class="liste_cours_achete">



            <div class="dash__content " style="position: relative;bottom: 60px;">


                <div class="dash__instructor-my-courses">


                    <?php
                    $i = 0;
                    foreach ($listeChapters as $chapter) {
                        $i++;

                    ?>

                        <div class="course-detail__buy__option__item course__content__chapter__title modif_chapter_title" onclick="show_lessons_btn( x='<?php echo $chapter['chapter_id']; ?>')">
                            <div class="chapter_elements_line-v1 ">
                                <div class="chapter_elements_line">
                                    <div>
                                        <img src="../contents/img/chapter-icon.png" alt="" class="course-detail__buy__option__item__icon" style="width: 2.7rem;">
                                    </div>
                                    <p class="course-detail__buy__option__item__title ">
                                        <bold>C <?php echo $i; ?>:</bold> <?php echo $chapter['chapter_title'] ?>
                                    </p>

                                </div>


                                <div id="course_chapter_down<?php echo $chapter['chapter_id']; ?>">
                                    <span style="padding-left: 1rem;font-size:1.75rem"><i class="far fa-chevron-down "></i></span>
                                </div>
                                <div id="course_chapter_up<?php echo $chapter['chapter_id']; ?>" style="display: none;">
                                    <span style="padding-left: 1rem;font-size:1.75rem"><i class="far fa-chevron-up "></i></span>
                                </div>
                            </div>





                        </div>

                        <div id="lesson_show<?php echo $chapters['chapter_id']; ?>" style="">
                            <?php
                            $listeLessons = $lessonC->afficher_lessons_page_order($chapter['chapter_id']);
                            foreach ($listeLessons as $lesson) {
                            ?>
                                <?php if (strcmp($lesson['lesson_type'], "video") == 0) {
                                ?>
                                    <a style="text-decoration: none;" href="acceder_cours_achetes.php?formation_id=<?php echo $_GET['formation_id'] ;?>&lesson_id=<?php echo $lesson['lesson_id'] ?>">
                                        <div class="course__content__lesson">

                                            <img src="../contents/img/play-button.png" alt="" class="course__content__lesson__icon">

                                            <p class="course__content__lesson__title">
                                                <?php echo $lesson['lesson_title'];
                                                ?>
                                            </p>
                                        </div>
                                    </a>
                                <?php } ?>
                                <?php if (strcmp($lesson['lesson_type'], "quiz") == 0) {

                                ?>
                                    <a style="text-decoration: none;" href="acceder_cours_achete-quiz.php?formation_id=<?php echo $_GET['formation_id'] ;?>&lesson_id=<?php echo $lesson['lesson_id'] ?>&test=btn&page_order=-1 ">
                                        <div class="course__content__lesson">
                                            <span class="course__content__lesson__icon" style="color: #585856;"><i class="fas fa-question-circle fa-lg"></i></span>

                                            <p class="course__content__lesson__title">
                                                <?php echo $lesson['lesson_title'];
                                                ?>
                                            </p>
                                        </div>
                                    </a>
                                <?php } ?>
                            <?php }
                            ?>
                        </div>

                    <?php } ?>








                </div>



            </div>

        </div>

    </div>





</body>

</html>