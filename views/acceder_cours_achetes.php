<?php
require_once "../models/user.php";
require_once "../models/panier.php";
include_once('../controllers/chapterC.php');
include_once('../controllers/lessonC.php');

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
$listeChapters = $chapterC->afficher_chapitres_page_order($_GET['formation_id']);

$lessonC = new LessonC();
$lesson_video = $lessonC->afficher_video($_GET['lesson_id']);

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
        <div class="video_affichee">

        <video class="video_affichee-v1"  src="formation_code/uploads/<?php echo $lesson_video; ?>" controls></video>
        
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