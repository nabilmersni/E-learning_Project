<?php

include_once('../controllers/questionC.php');
include_once('../controllers/reponseC.php');
include_once('../controllers/chapterC.php');
include_once('../controllers/lessonC.php');


$questionC = new QuestionC();
$listeQuestions = $questionC->afficher_questions_page_order($_GET['id_l']);

$reponseC = new ReponseC();

$lessonC = new LessonC();


$i = 0;


require_once "../models/user.php";
require_once "../models/notification.php";



if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user'])) {
    $_SESSION['user'] = User::getOneUser($_SESSION['user']->user_id);

    $user = $_SESSION['user'];
    if ($user->status == 0) {
        session_unset();
        session_destroy();
        header('location:../views/login.php?accountDisbaled=true');
    }

    if ($user->role != 'instructor') {
        header('location:../views/login.php');
    }

    if ($user->cv_status == 0) {
        header('location:../views/dash_instructor-uploadCV.php');
    }
} else {
    header('location:../views/login.php?auth=false');
}

$notifCount = Notification::getNotifUserNumber(56)->total;
$notifications = Notification::getAllNotifUser(56);


$modalCount = 0;


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../contents/css/notif.css" />
    <link rel="stylesheet" href="../contents/sass/style.css" />
    <link rel="stylesheet" href="../contents/css/chart_style.css" />
    <link rel="stylesheet" href="../contents/css/dash_instructor-courses.css" />
    <link rel="stylesheet" href="../contents/css/dash_instructor-quiz.css" />


    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="icon" href="../contents/img/logo-icon-nobg.png">
    <title>I learn-dash</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


    <style>
        .error {
            color: red;
            font-style: italic;
            border: 1px solid red;
        }

        label {
            border: none !important;
        }

        #question_content-error,
        #chapter_description-error {
            padding: 0rem 0rem 0rem 1rem;

        }
    </style>
</head>

<body>

    <div class="dash">
        <div class="dash__side-bar">
            <img class="dash__side-bar__logo" src="../contents/img/logo-icon-nobg.png" alt="logo">

            <div class="dash__side-bar__list">
                <a href="#" class="dash__side-bar__item active">
                    <div class="dash__side-bar__item__icon">
                        <svg class="dash__side-bar__item__icon-svg" id="dashboard-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44.432 44.432">
                            <g id="dashboard-icon-2" data-name="dashboard-icon">
                                <path id="Path_1025" data-name="Path 1025" d="M17.125,0H3.24A3.243,3.243,0,0,0,0,3.24v8.331a3.243,3.243,0,0,0,3.24,3.24H17.125a3.243,3.243,0,0,0,3.24-3.24V3.24A3.243,3.243,0,0,0,17.125,0Zm0,0" fill="currentColor" />
                                <path id="Path_1026" data-name="Path 1026" d="M17.125,213.332H3.24A3.243,3.243,0,0,0,0,216.572v19.439a3.243,3.243,0,0,0,3.24,3.24H17.125a3.243,3.243,0,0,0,3.24-3.24V216.572A3.243,3.243,0,0,0,17.125,213.332Zm0,0" transform="translate(0 -194.819)" fill="currentColor" />
                                <path id="Path_1027" data-name="Path 1027" d="M294.457,341.332H280.572a3.243,3.243,0,0,0-3.24,3.24V352.9a3.243,3.243,0,0,0,3.24,3.24h13.885a3.243,3.243,0,0,0,3.24-3.24v-8.331A3.243,3.243,0,0,0,294.457,341.332Zm0,0" transform="translate(-253.265 -311.711)" fill="currentColor" />
                                <path id="Path_1028" data-name="Path 1028" d="M294.457,0H280.572a3.243,3.243,0,0,0-3.24,3.24V22.679a3.243,3.243,0,0,0,3.24,3.24h13.885a3.243,3.243,0,0,0,3.24-3.24V3.24A3.243,3.243,0,0,0,294.457,0Zm0,0" transform="translate(-253.265)" fill="currentColor" />
                            </g>
                        </svg>
                    </div>
                    <h1 class="dash__side-bar__item__txt">Dashboard</h1>
                </a>

                <a href="./dash_instructor-courses.php" class="dash__side-bar__item">
                    <div class="dash__side-bar__item__icon">
                        <svg class="dash__side-bar__item__icon-svg id=" course-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 49 37.435">
                            <g id="Group_26" data-name="Group 26" transform="translate(0 0)">
                                <g id="Group_25" data-name="Group 25">
                                    <g id="Group_24" data-name="Group 24">
                                        <path id="Path_1032" data-name="Path 1032" d="M36.582,35.049h0a1.728,1.728,0,0,0-1.228.509,1.746,1.746,0,0,0-.516,1.244V63.1a1.759,1.759,0,0,0,1.756,1.753c4.081.01,10.919.86,15.636,5.8V43.129a1.68,1.68,0,0,0-.241-.888C48.112,36.006,40.672,35.059,36.582,35.049Z" transform="translate(-29.086 -35.049)" fill="currentColor" />
                                        <path id="Path_1033" data-name="Path 1033" d="M174.143,63.094V36.8a1.746,1.746,0,0,0-.516-1.244,1.729,1.729,0,0,0-1.228-.509h0c-4.09.01-11.531.957-15.4,7.192a1.68,1.68,0,0,0-.241.888V70.644c4.717-4.936,11.555-5.787,15.636-5.8A1.759,1.759,0,0,0,174.143,63.094Z" transform="translate(-130.89 -35.048)" fill="currentColor" />
                                        <path id="Path_1034" data-name="Path 1034" d="M190.437,71.8h-1.271V93.784a4.486,4.486,0,0,1-4.471,4.475c-3.462.008-9.17.685-13.213,4.511,6.992-1.712,14.362-.6,18.563.358a1.753,1.753,0,0,0,2.146-1.708V73.554A1.755,1.755,0,0,0,190.437,71.8Z" transform="translate(-143.19 -65.737)" fill="currentColor" />
                                        <path id="Path_1035" data-name="Path 1035" d="M3.024,93.784V71.8H1.753A1.755,1.755,0,0,0,0,73.554v27.865a1.753,1.753,0,0,0,2.146,1.708c4.2-.957,11.571-2.07,18.562-.358-4.042-3.826-9.751-4.5-13.212-4.511A4.486,4.486,0,0,1,3.024,93.784Z" transform="translate(0 -65.737)" fill="currentColor" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <h1 class="dash__side-bar__item__txt">My courses</h1>
                </a>

                <!-- <a href="#" class="dash__side-bar__item">
                    <div class="dash__side-bar__item__icon">
                        <svg class="dash__side-bar__item__icon-svg" id="dollar-icon" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 45.958 45.958">
                            <g id="Group_27" data-name="Group 27">
                                <path id="Path_1036" data-name="Path 1036"
                                    d="M22.979,0A22.979,22.979,0,1,0,45.958,22.979,22.978,22.978,0,0,0,22.979,0ZM24.37,33.215v2.66a.712.712,0,0,1-.739.717H21.858a.722.722,0,0,1-.751-.717V33.449a15.221,15.221,0,0,1-4.524-.9,1.42,1.42,0,0,1-.872-1.679L16,29.748a1.422,1.422,0,0,1,1.89-.972,11.409,11.409,0,0,0,4.086.793c1.906,0,3.211-.736,3.211-2.074,0-1.271-1.07-2.074-3.546-2.911-3.579-1.2-6.03-2.876-6.03-6.121,0-2.943,2.083-5.251,5.644-5.954V10.083a.8.8,0,0,1,.771-.787H23.8a.757.757,0,0,1,.721.787v2.191a13.2,13.2,0,0,1,3.621.6,1.425,1.425,0,0,1,.944,1.7l-.254,1.008A1.419,1.419,0,0,1,27,16.58a10.241,10.241,0,0,0-3.38-.559c-2.174,0-2.877.937-2.877,1.874,0,1.1,1.171,1.806,4.014,2.877,3.98,1.405,5.579,3.245,5.579,6.254C30.33,30,28.227,32.547,24.37,33.215Z"
                                    fill="currentColor" />
                            </g>
                        </svg>
                    </div>
                    <h1 class="dash__side-bar__item__txt">My earning</h1>
                </a> -->

                <a href="./dash_instructor-availability.php" class="dash__side-bar__item">
                    <div class="dash__side-bar__item__icon">
                        <svg class="dash__side-bar__item__icon-svg" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <path d="m256 0c-140.61 0-256 115.39-256 256s115.39 256 256 256 256-115.39 256-256-115.39-256-256-256zm116.673 118.114c5.858-5.858 15.355-5.858 21.213 0s5.858 15.355 0 21.213-15.355 5.858-21.213 0-5.858-15.355 0-21.213zm-131.673-42.114c0-8.291 6.709-15 15-15s15 6.709 15 15v30c0 8.291-6.709 15-15 15s-15-6.709-15-15zm-165 195c-8.291 0-15-6.709-15-15s6.709-15 15-15h30c8.291 0 15 6.709 15 15s-6.709 15-15 15zm63.327 122.886c-5.858 5.858-15.355 5.858-21.213 0s-5.858-15.355 0-21.213c5.858-5.859 15.355-5.859 21.213 0 5.858 5.858 5.858 15.355 0 21.213zm0-254.559c-5.858 5.858-15.355 5.858-21.213 0s-5.858-15.355 0-21.213 15.355-5.858 21.213 0 5.858 15.355 0 21.213zm131.673 296.673c0 8.291-6.709 15-15 15s-15-6.709-15-15v-30c0-8.291 6.709-15 15-15s15 6.709 15 15zm85.605-79.395c-5.859 5.859-15.352 5.859-21.211 0l-90-90c-2.812-2.812-4.394-6.621-4.394-10.605v-90c0-8.291 6.709-15 15-15s15 6.709 15 15v83.789l85.605 85.605c5.86 5.86 5.86 15.352 0 21.211zm37.281 37.281c-5.858 5.858-15.355 5.858-21.213 0s-5.858-15.355 0-21.213c5.858-5.859 15.355-5.859 21.213 0 5.857 5.858 5.857 15.355 0 21.213zm57.114-137.886c0 8.291-6.709 15-15 15h-30c-8.291 0-15-6.709-15-15s6.709-15 15-15h30c8.291 0 15 6.709 15 15z" fill="currentColor" data-original="currentColor"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <h1 class="dash__side-bar__item__txt">Set availability</h1>
                </a>

                <a href="./dash-instructor-profile.php" class="dash__side-bar__item">
                    <div class="dash__side-bar__item__icon">
                        <svg class="dash__side-bar__item__icon-svg" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 460.8 460.8" style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <g>
                                            <path d="M230.432,239.282c65.829,0,119.641-53.812,119.641-119.641C350.073,53.812,296.261,0,230.432,0     S110.792,53.812,110.792,119.641S164.604,239.282,230.432,239.282z" fill="currentColor" data-original="currentColor"></path>
                                            <path d="M435.755,334.89c-3.135-7.837-7.314-15.151-12.016-21.943c-24.033-35.527-61.126-59.037-102.922-64.784     c-5.224-0.522-10.971,0.522-15.151,3.657c-21.943,16.196-48.065,24.555-75.233,24.555s-53.29-8.359-75.233-24.555     c-4.18-3.135-9.927-4.702-15.151-3.657c-41.796,5.747-79.412,29.257-102.922,64.784c-4.702,6.792-8.882,14.629-12.016,21.943     c-1.567,3.135-1.045,6.792,0.522,9.927c4.18,7.314,9.404,14.629,14.106,20.898c7.314,9.927,15.151,18.808,24.033,27.167     c7.314,7.314,15.673,14.106,24.033,20.898c41.273,30.825,90.906,47.02,142.106,47.02s100.833-16.196,142.106-47.02     c8.359-6.269,16.718-13.584,24.033-20.898c8.359-8.359,16.718-17.241,24.033-27.167c5.224-6.792,9.927-13.584,14.106-20.898     C436.8,341.682,437.322,338.024,435.755,334.89z" fill="currentColor" data-original="currentColor"></path>
                                        </g>
                                    </g>
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                </g>
                            </g>
                        </svg>
                    </div>
                    <h1 class="dash__side-bar__item__txt">My profile</h1>
                </a>

                <a href="#" class="dash__side-bar__item">
                    <div class="dash__side-bar__item__icon">
                        <svg class="dash__side-bar__item__icon-svg" id="QA-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46.48 46.48">
                            <path id="Path_1041" data-name="Path 1041" d="M30.088,20.636,30.054,4.077A4.092,4.092,0,0,0,25.969,0H4.085A4.09,4.09,0,0,0,0,4.085V20.607a4.09,4.09,0,0,0,4.085,4.085H6.9v2.723A1.363,1.363,0,0,0,9.078,28.5l5.082-3.811,11.831.036A4.082,4.082,0,0,0,30.088,20.636ZM14.979,19.154a1.362,1.362,0,1,1,1.362-1.362A1.362,1.362,0,0,1,14.979,19.154Zm1.452-5.68v.143a1.362,1.362,0,0,1-2.723,0v-.85a1.819,1.819,0,0,1,1.555-1.8,1.366,1.366,0,0,0,1.169-1.348A1.419,1.419,0,0,0,14.087,8.58a1.362,1.362,0,0,1-1.468-2.294,4.281,4.281,0,0,1,4.41-.248,4.086,4.086,0,0,1-.6,7.437Z" transform="translate(0 0)" fill="currentColor" />
                            <path id="Path_1042" data-name="Path 1042" d="M206.963,210.995h-9.586l0,1.476a6.807,6.807,0,0,1-5.486,6.695h12.255a1.362,1.362,0,1,1,0,2.723H187.809a1.361,1.361,0,0,1-.553-2.605L181,219.264v12.247a4.09,4.09,0,0,0,4.085,4.085H194.3l5.159,2.58a1.363,1.363,0,0,0,1.971-1.218V235.6h5.538a4.09,4.09,0,0,0,4.085-4.085V215.08A4.09,4.09,0,0,0,206.963,210.995Zm-2.814,16.34H187.809a1.362,1.362,0,1,1,0-2.723h16.341a1.362,1.362,0,1,1,0,2.723Z" transform="translate(-164.569 -191.841)" fill="currentColor" />
                        </svg>
                    </div>
                    <h1 class="dash__side-bar__item__txt">Q&A</h1>
                </a>

                <a href="#" class="dash__side-bar__item ">
                    <div class="dash__side-bar__item__icon">
                        <svg class="dash__side-bar__item__icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46.917 46.917">
                            <g id="logout-icon" transform="translate(0 -0.004)">
                                <path id="Path_1043" data-name="Path 1043" d="M29.323,25.417a1.954,1.954,0,0,0-1.955,1.955v7.82a1.957,1.957,0,0,1-1.955,1.955H19.548V7.823a3.94,3.94,0,0,0-2.662-3.716l-.579-.194h9.106a1.957,1.957,0,0,1,1.955,1.955v5.865a1.955,1.955,0,0,0,3.909,0V5.868A5.872,5.872,0,0,0,25.413,0H4.4a1.535,1.535,0,0,0-.209.043C4.1.039,4.005,0,3.91,0A3.913,3.913,0,0,0,0,3.913V39.1a3.94,3.94,0,0,0,2.662,3.716l11.765,3.922a4.047,4.047,0,0,0,1.212.182,3.913,3.913,0,0,0,3.909-3.91V41.056h5.865a5.872,5.872,0,0,0,5.865-5.865v-7.82a1.954,1.954,0,0,0-1.955-1.955Zm0,0" fill="currentColor" />
                                <path id="Path_1044" data-name="Path 1044" d="M298.263,115.058l-7.82-7.819a1.954,1.954,0,0,0-3.337,1.382v5.865h-7.819a1.955,1.955,0,1,0,0,3.909h7.819v5.865a1.954,1.954,0,0,0,3.337,1.382l7.82-7.82a1.953,1.953,0,0,0,0-2.764Zm0,0" transform="translate(-251.919 -96.888)" fill="currentColor" />
                            </g>
                        </svg>
                    </div>
                    <h1 class="dash__side-bar__item__txt">Sign out</h1>
                </a>
            </div>
        </div>

        <div class="dash__container">
            <nav class="dash__top-bar">
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

                        <!-- <a href="#">
                            <div class="dash__top-bar__svg-container">
                                <svg class="dash__top-bar__svg" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 43.026 34.421">
                                    <g id="message-icon" transform="translate(0)">
                                        <path id="Path_1045" data-name="Path 1045"
                                            d="M43.921,8.5A5.284,5.284,0,0,0,38.711,4H6.266a5.284,5.284,0,0,0-5.21,4.5L22.489,22.371Z"
                                            transform="translate(-0.976 -4)" fill="currentColor" />
                                        <path id="Path_1046" data-name="Path 1046"
                                            d="M23.292,22.9a1.434,1.434,0,0,1-1.558,0L1,9.486V30.748a5.3,5.3,0,0,0,5.291,5.291H38.735a5.3,5.3,0,0,0,5.291-5.291V9.485Z"
                                            transform="translate(-1 -1.618)" fill="currentColor" />
                                    </g>
                                </svg>
                            </div>
                        </a> -->
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




                    </div>

                    <div class="dash__top-bar__container__right">
                        <h1 class="dash__top-bar__fullname"><?php echo $user->fullname ?></h1>
                        <div class="dash__top-bar__img-container">
                            <img class="dash__top-bar__img" src="<?php echo '../uploads/' . $user->img_url ?>" alt="">
                        </div>
                    </div>
                </div>

                <a href="" class="secondary-btn secondary-btn-topbar">
                    Submit for validation

                    <div class="secondary-btn__svg-container">

                        <svg class="secondary-btn__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52.779 52.779">
                            <path id="add-icon" d="M52.779,26.389A26.389,26.389,0,0,1,0,26.389a2.062,2.062,0,0,1,4.123,0A22.266,22.266,0,1,0,26.389,4.123a2.062,2.062,0,0,1,0-4.123A26.375,26.375,0,0,1,52.779,26.389ZM16.535,6.371l2.667-1.1a2.062,2.062,0,1,0-1.578-3.809l-2.667,1.1a2.062,2.062,0,0,0,1.578,3.809ZM9.625,11.665l2.041-2.041A2.062,2.062,0,0,0,8.75,6.709L6.709,8.75a2.062,2.062,0,0,0,2.916,2.916ZM2.572,20.318A2.062,2.062,0,0,0,5.266,19.2l1.1-2.667a2.062,2.062,0,0,0-3.809-1.578l-1.1,2.667A2.062,2.062,0,0,0,2.572,20.318Zm23.817-4.237a2.062,2.062,0,0,0-2.062,2.062v6.185H18.143a2.062,2.062,0,0,0,0,4.123h6.185v6.185a2.062,2.062,0,0,0,4.123,0V28.451h6.185a2.062,2.062,0,0,0,0-4.123H28.451V18.143A2.062,2.062,0,0,0,26.389,16.081Z" fill="currentColor" />
                        </svg>

                    </div>
                </a>

            </nav>

            <div class="dash__content">
                <div class="dash__instructor-my-courses">
                    
                <div class="sort_btn_line">
                <div class="dash__instructor-my-courses__title" ><a href="dash_instructor-chapter-add.php?id=<?php echo $_GET['id_f']; ?>" class="dash__instructor-my-courses__title sort_back_btn">Back</a>
                </div>
            
                    <a href="dashboard_instructor_question_sort.php?id_f=<?php echo $_GET['id_f']; ?>&id_l=<?php echo $_GET['id_l']; ?>" class="dash__instructor-my-courses__title sort_btn" style="margin-left: 51rem;"><i class="fas fa-sort-amount-up-alt"></i> Sort</a>
                    </div>



                    <!-- part2------------- -->
                    <div class="public_information">

                        <div class="course__add" style="padding: 0rem 0rem;">
                            <?php
                            $i == 0;
                            foreach ($listeQuestions as $question) {
                                $i++;
                            ?>


                                <!--new chapter created -->
                                <div style="padding: 1rem 0rem;">
                                    <div class="chapter add_quiz_content_l1">
                                        <h4><span style="">Question <?php echo $i; ?>: &nbsp</span><?php echo $question['question_content']; ?></h4>


                                        <div style="padding-right: 1.9rem;">
                                        <!--bouton trier-->
                                        <a href="dashboard_instructor_option_sort.php?id_f=<?php echo $_GET['id_f']; ?>&id_l=<?php echo $_GET['id_l']; ?>&id=<?php echo $question['question_id']; ?>" class="delete-button trier_btn trier_btn_quetion" ><i class="fas fa-sort-amount-up-alt"></i></a>
                                        
                                        <!--bouton trier-->
                                            <!--bouton modifier-->

                                            <span id="modifier_chapter_btn<?php echo $i; ?>" onclick="show_update_chapter_button( x='<?php echo $i; ?>')">
                                                <svg class="delete-button quiz_btn_l1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </span>

                                            <!--bouton modifier-->

                                            <!--bouton supprimer-->
                                            <a style="color:currentColor; text-decoration: none;" href="formation_code/delete_question.php?id=<?php echo $question['question_id']; ?>&id_l=<?php echo $_GET['id_l']; ?>&id_f=<?php echo $_GET['id_f']; ?>">
                                                <svg class="delete-button quiz_btn_l1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                            <!--bouton supprimer-->

                                            <!--bouton up-->
                                            <span id="up_button<?php echo $i; ?>" class="up_button_test" onclick="up_button_toggle( x='<?php echo $i; ?>'  )">
                                                <svg class="up-button quiz_btn_l1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                                                </svg>
                                            </span>
                                            <!--bouton up-->

                                            <!--bouton down-->
                                            <span id="down_button<?php echo $i; ?>" class="down_button_test" onclick="down_button_toggle( x='<?php echo $i; ?>' )" style="display:none;">
                                                <svg class="up-button quiz_btn_l1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                </svg>
                                            </span>
                                            <!--bouton down-->


                                        </div>
                                    </div>

                                    <!--lesson line-->
                                    <?php include("formation_code/dashboard_instructor_quiz_line.php"); ?>
                                    <!--lesson line-->

                                    <!--show add new lesson-->
                                    <?php include("formation_code/dashboard_instructor_add_new_option.php"); ?>
                                    <!--show add new lesson-->





                                    <div class="chapter-add-lesson add_option_content_l1" >
                                        <svg id="lesson_hover" class="lesson_icon" style="width: 2.5rem; margin-right:1rem;    " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z">
                                            </path>
                                        </svg>
                                        <div id="lesson_hover_v1<?php echo $i; ?>" class="cursor lesson_btn_hover" onclick="lesson_add_button_show( x='<?php echo $i; ?>'  )">
                                            <h6>Add Option</h6>
                                        </div>
                                        </a>




                                    </div>


                                </div>
                                <!--new chapter created end-->





                                <!--show update chapter-->
                                <?php include("formation_code/dashboard_instructor_show_update_question.php") ?>
                                <!--show update chapter-->





                            <?php
                            }
                            ?>

                        </div>
                        <!--cursus end-->


                    </div>
                    <!--end part 2 add formation -->






                    <!--create a question button-->
                    <div class="public_information">

                        <div class="course__add">

                            <div class="course__add-v1" style="padding:0rem">
                                <a id="create_chapter" href="#" style="margin-top: 1rem; margin-left: 1.7rem;margin-bottom: 1rem; max-width: 26rem; ;" class="img_secondary-btn img_secondary-btn-topbar">
                                    <div>

                                        <svg style="position: relative; right: 20px;" class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z">
                                            </path>
                                        </svg>

                                    </div>
                                    Add New Question
                                </a>
                                <button id="popup_id2" class="popup" onmouseenter="myFunction2()" onmouseleave="myFunction2()" style="background-color: transparent; border-color: transparent;">
                                    <svg id="more_info_button" viewBox="0 0 24 24" fill="grey" xmlns="http://www.w3.org/2000/svg">
                                        <style>
                                            @keyframes n-info-ques {

                                                0%,
                                                to {
                                                    transform: rotate(0deg);
                                                    transform-origin: center
                                                }

                                                10%,
                                                90% {
                                                    transform: rotate(2deg)
                                                }

                                                20%,
                                                40%,
                                                60% {
                                                    transform: rotate(-6deg)
                                                }

                                                30%,
                                                50%,
                                                70% {
                                                    transform: rotate(6deg)
                                                }

                                                80% {
                                                    transform: rotate(-2deg)
                                                }
                                            }
                                        </style>
                                        <circle cx="12" cy="12" r="8" stroke="none" stroke-width="1.5" />
                                        <path fill="white" d="M14.325 9.956c0 .298-.103.605-.308.924a3.726 3.726 0 01-.68.786c-.657.566-.987.983-.987 1.252 0 .595-.233.892-.7.892a.688.688 0 01-.531-.233c-.135-.156-.202-.365-.202-.627s.064-.506.191-.732c.135-.234.294-.44.478-.616.184-.184.368-.361.552-.531.453-.41.68-.782.68-1.115a.627.627 0 00-.277-.53.957.957 0 00-.615-.213.943.943 0 00-.606.212c-.17.135-.332.273-.488.414a.738.738 0 01-.51.202.614.614 0 01-.467-.19.68.68 0 01-.18-.468c0-.333.23-.669.69-1.009a2.47 2.47 0 011.518-.52c.722 0 1.31.202 1.763.605.452.404.679.903.679 1.497zm-2.697 4.449c.248 0 .443.081.584.244.142.156.213.35.213.584a.959.959 0 01-.245.637.787.787 0 01-.615.276.721.721 0 01-.574-.244.903.903 0 01-.201-.595c0-.234.078-.442.233-.626a.776.776 0 01.605-.276z" style="animation:n-info-ques .8s cubic-bezier(.455,.03,.515,.955) both infinite" />
                                    </svg>

                                    <span class="popuptext" id="myPopup2" style="font-size: 1rem;">click here for more
                                        information.</span>

                                </button>


                            </div>

                            <!--create a question button-->


                            <!---------------------------show_create_question-------------------->
                            <div id="show_create_chapter" hidden>
                                <div id="x_button" class="x_botton">
                                    <svg id="x_button_x" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#4a5bcf">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="show_create_chapter">


                                    <form method="POST" id="add_chapter_id" action="formation_code/add_question.php?id_l=<?php echo $_GET['id_l']; ?>&id_f=<?php echo $_GET['id_f']; ?>">


                                        <div class="form__input__group">
                                            <label for="question_content" class="form__input__label">Question content<span>*</span></label>
                                            <input id="question_content" name="question_content" type="text" class="form__input" style="padding-left:1.5rem" placeholder="Question content">
                                        </div>

                                        
                                        <input class="primary-btn primary-btn-form" type="submit" value="Add New Question" style="width:100%">

                                    </form>


                                </div>
                            </div>

                            <!---------------------------show_create_question-------------------->
                        </div>
                        <!--cursus info-->
                        <div id="bande_annance" class="course_information" hidden>
                            <p>
                            <div class="info_title_v1">
                                <div style="padding-right: 0.5rem; position: relative; right: 0.5rem; bottom: 0.6rem;">
                                    <svg class="w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="rgba(255, 115, 68, 0.85)">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                        </path>
                                    </svg>
                                </div>
                                <h2 class="info_title">Cursus</h2>
                            </div>

                            <ul>
                                <li class="info_description">Your course curriculum represents all videos organized in
                                    chapters and lessons.</li>
                                <li class="info_description">A course contains one or more chapters and a chapter
                                    contains one or more lessons.</li>
                                <li class="info_description">A lesson can be a video or a quiz.</li>
                                <li class="info_description">Try to keep your videos short so that users can easily
                                    follow your course. (The golden rule is a topic per video).</li>
                                <li class="info_description">Create your chapters and within them create your lessons.
                                </li>
                            </ul>

                            </p>

                        </div>
                        <!--cursus info end-->
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>





    <script src="../contents/js/revenue-chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../contents/js/addFormation.js"></script>



    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>


    <script>
        //show update_chapter
        $(document).ready(function() {
            $("#modifier_chapter_btn").click(function() {
                $("#show_update_chapter").show(300)

            });

        });

        //hide update_chapter
        $(document).ready(function() {
            $("#x_update_chapter").click(function() {
                $("#show_update_chapter").hide(300)

            });

        });


        $(document).ready(function() {
            $("#create_chapter").click(function() {
                $("#show_create_chapter").show(300)

            });

        });

        //hide update_quiz
        $(document).ready(function() {
            $("#x_button_quiz").click(function() {
                $("#show_update_quiz").hide(300)

            });

        });


        $(document).ready(function() {
            $("#create_chapter").click(function() {
                $("#show_create_chapter").show(300)

            });

        });

        //hide update_quiz_p1
        $(document).ready(function() {
            $("#x_button_quiz_p1").click(function() {
                $("#show_update_quiz_p1").hide(0)

            });

        });


        $(document).ready(function() {
            $("#edit_quiz").click(function() {
                $("#show_update_quiz_p1").show(0)

            });

        });



        var $add_question = $('#add_new_question_form_id');
        if ($add_question.length) {
            $add_question.validate({
                rules: {
                    question_content: {
                        required: true
                    }
                },
                messages: {
                    question_content: {
                        //error message for the required field
                        required: '*Please enter the question content!'
                    }
                }
            });
        }



        var $add_option = $('#add_option_form_id');
        if ($add_option.length) {
            $add_option.validate({
                rules: {
                    reponse_content: {
                        required: true
                    }
                },
                messages: {
                    reponse_content: {
                        //error message for the required field
                        required: '*Please enter the option content!'
                    }
                }
            });
        }


        //chapter add----------------------------------------------------------------------------------
        $.validator.addMethod('positiveNumber',
            function(value) {
                return Number(value) > 0;
            }, 'Enter a positive number.');
        var $add_chapter = $('#add_chapter_id');
        if ($add_chapter.length) {
            $add_chapter.validate({
                rules: {
                    question_content: {
                        required: true
                    },
                    chapter_description: {
                        required: true,
                    },
                    chapter_duration: {
                        required: true,
                        positiveNumber: true
                    }
                },
                messages: {
                    question_content: {
                        //error message for the required field
                        required: '*Please enter the chapter title!'
                    },
                    chapter_description: {
                        //error message for the required field
                        required: '*Please enter the chapter description!'
                    },
                    chapter_duration: {
                        //error message for the required field
                        required: '*Please enter the chapter duration!'
                    }
                }
            });
        }


        //update chapter
        var $update_chapter = $('#update_chapter_id');
        if ($update_chapter.length) {
            $update_chapter.validate({
                rules: {
                    question_content: {
                        required: true
                    },
                    chapter_description: {
                        required: true,
                    }
                },
                messages: {
                    question_content: {
                        //error message for the required field
                        required: '*Please enter the chapter title!'
                    },
                    chapter_description: {
                        //error message for the required field
                        required: '*Please enter the chapter description!'
                    }
                }
            });
        }




        //controle de saisie du lesson
        var $add_lesson = $('#add_new_lesson_form');
        if ($add_lesson.length) {
            $add_lesson.validate({
                rules: {
                    lesson_title: {
                        required: true
                    },
                    lesson_description: {
                        required: true,
                    },
                    lesson_type: {
                        required: true,
                    },
                    lesson_video: {
                        required: true,
                    }
                },
                messages: {
                    lesson_title: {
                        //error message for the required field
                        required: '*Please enter the lesson title!'
                    },
                    lesson_description: {
                        //error message for the required field
                        required: '*Please enter the lesson description!'
                    },
                    lesson_type: {
                        //error message for the required field
                        required: '*Please select the lesson type!'
                    },
                    lesson_video: {
                        //error message for the required field
                        required: '*Please enter lesson video!'
                    }
                }
            });
        }

        //fin du controle de saisie du lesson

        //lessons toggle



        function up_button_toggle(x) {

            $("#lesson_lines" + x).toggle(10);
            $("#down_button" + x).toggle();
            $("#up_button" + x).toggle();

        }

        function down_button_toggle(x) {

            $("#lesson_lines" + x).toggle(10)
            $("#down_button" + x).toggle()
            $("#up_button" + x).toggle()

        }

        //lesson add button show 

        function lesson_add_button_show(x) {
            $("#show_add_new_lesson" + x).show(0)
        }

        //hover lesson


        function lesson_select_option(x) {
            $id =
                $("#select_option" + x).change(function() {
                    var val = $(this).val();
                    if (val == "video") {
                        $("#quiz_add_comment" + x).hide()
                        $("#drop_video" + x).show(300)
                    }
                    if (val == "quiz") {
                        $("#drop_video" + x).hide()
                        $("#quiz_add_comment" + x).show(300)
                    }
                });
        }

        //end hover lesson
    </script>

    
</body>

</html>