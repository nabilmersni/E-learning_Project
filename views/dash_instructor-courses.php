<?php 
    require_once "../models/user.php";

    session_start();
    if (isset($_SESSION['user'])){

        $_SESSION['user'] = User::getOneUser($_SESSION['user']->user_id);
        
        $user = $_SESSION['user'];
        if($user->status == 0){
            session_unset();
            session_destroy();
            header('location:../views/login.php?accountDisbaled=true');
        }
        if($user->role != 'instructor'){
            header('location:../views/login.php');
        }
        if($user->cv_status == 0){
            header('location:../views/dash_instructor-uploadCV.php');
        }
    }else {
        header('location:../views/login.php?auth=false');
    }

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../contents/sass/style.css" />
    <link rel="stylesheet" href="../contents/css/chart_style.css" />

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <link rel="icon" href="../contents/img/logo-icon-nobg.png">
    <title>I learn-dash</title>
</head>

<body>

    <div class="dash">
        <div class="dash__side-bar">
            <img class="dash__side-bar__logo" src="../contents/img/logo-icon-nobg.png" alt="logo">

            <div class="dash__side-bar__list">
                <a href="./dash_instructor.php" class="dash__side-bar__item">
                    <div class="dash__side-bar__item__icon">
                        <svg class="dash__side-bar__item__icon-svg" id="dashboard-icon"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44.432 44.432">
                            <g id="dashboard-icon-2" data-name="dashboard-icon">
                                <path id="Path_1025" data-name="Path 1025"
                                    d="M17.125,0H3.24A3.243,3.243,0,0,0,0,3.24v8.331a3.243,3.243,0,0,0,3.24,3.24H17.125a3.243,3.243,0,0,0,3.24-3.24V3.24A3.243,3.243,0,0,0,17.125,0Zm0,0"
                                    fill="currentColor" />
                                <path id="Path_1026" data-name="Path 1026"
                                    d="M17.125,213.332H3.24A3.243,3.243,0,0,0,0,216.572v19.439a3.243,3.243,0,0,0,3.24,3.24H17.125a3.243,3.243,0,0,0,3.24-3.24V216.572A3.243,3.243,0,0,0,17.125,213.332Zm0,0"
                                    transform="translate(0 -194.819)" fill="currentColor" />
                                <path id="Path_1027" data-name="Path 1027"
                                    d="M294.457,341.332H280.572a3.243,3.243,0,0,0-3.24,3.24V352.9a3.243,3.243,0,0,0,3.24,3.24h13.885a3.243,3.243,0,0,0,3.24-3.24v-8.331A3.243,3.243,0,0,0,294.457,341.332Zm0,0"
                                    transform="translate(-253.265 -311.711)" fill="currentColor" />
                                <path id="Path_1028" data-name="Path 1028"
                                    d="M294.457,0H280.572a3.243,3.243,0,0,0-3.24,3.24V22.679a3.243,3.243,0,0,0,3.24,3.24h13.885a3.243,3.243,0,0,0,3.24-3.24V3.24A3.243,3.243,0,0,0,294.457,0Zm0,0"
                                    transform="translate(-253.265)" fill="currentColor" />
                            </g>
                        </svg>
                    </div>
                    <h1 class="dash__side-bar__item__txt">Dashboard</h1>
                </a>

                <a href="#" class="dash__side-bar__item active">
                    <div class="dash__side-bar__item__icon">
                        <svg class="dash__side-bar__item__icon-svg id=" course-icon" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 49 37.435">
                            <g id="Group_26" data-name="Group 26" transform="translate(0 0)">
                                <g id="Group_25" data-name="Group 25">
                                    <g id="Group_24" data-name="Group 24">
                                        <path id="Path_1032" data-name="Path 1032"
                                            d="M36.582,35.049h0a1.728,1.728,0,0,0-1.228.509,1.746,1.746,0,0,0-.516,1.244V63.1a1.759,1.759,0,0,0,1.756,1.753c4.081.01,10.919.86,15.636,5.8V43.129a1.68,1.68,0,0,0-.241-.888C48.112,36.006,40.672,35.059,36.582,35.049Z"
                                            transform="translate(-29.086 -35.049)" fill="currentColor" />
                                        <path id="Path_1033" data-name="Path 1033"
                                            d="M174.143,63.094V36.8a1.746,1.746,0,0,0-.516-1.244,1.729,1.729,0,0,0-1.228-.509h0c-4.09.01-11.531.957-15.4,7.192a1.68,1.68,0,0,0-.241.888V70.644c4.717-4.936,11.555-5.787,15.636-5.8A1.759,1.759,0,0,0,174.143,63.094Z"
                                            transform="translate(-130.89 -35.048)" fill="currentColor" />
                                        <path id="Path_1034" data-name="Path 1034"
                                            d="M190.437,71.8h-1.271V93.784a4.486,4.486,0,0,1-4.471,4.475c-3.462.008-9.17.685-13.213,4.511,6.992-1.712,14.362-.6,18.563.358a1.753,1.753,0,0,0,2.146-1.708V73.554A1.755,1.755,0,0,0,190.437,71.8Z"
                                            transform="translate(-143.19 -65.737)" fill="currentColor" />
                                        <path id="Path_1035" data-name="Path 1035"
                                            d="M3.024,93.784V71.8H1.753A1.755,1.755,0,0,0,0,73.554v27.865a1.753,1.753,0,0,0,2.146,1.708c4.2-.957,11.571-2.07,18.562-.358-4.042-3.826-9.751-4.5-13.212-4.511A4.486,4.486,0,0,1,3.024,93.784Z"
                                            transform="translate(0 -65.737)" fill="currentColor" />
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <h1 class="dash__side-bar__item__txt">My courses</h1>
                </a>

                <a href="./dash_instructor-availability.php" class="dash__side-bar__item">
                    <div class="dash__side-bar__item__icon">
                        <svg class="dash__side-bar__item__icon-svg" xmlns="http://www.w3.org/2000/svg" version="1.1"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0"
                            viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m256 0c-140.61 0-256 115.39-256 256s115.39 256 256 256 256-115.39 256-256-115.39-256-256-256zm116.673 118.114c5.858-5.858 15.355-5.858 21.213 0s5.858 15.355 0 21.213-15.355 5.858-21.213 0-5.858-15.355 0-21.213zm-131.673-42.114c0-8.291 6.709-15 15-15s15 6.709 15 15v30c0 8.291-6.709 15-15 15s-15-6.709-15-15zm-165 195c-8.291 0-15-6.709-15-15s6.709-15 15-15h30c8.291 0 15 6.709 15 15s-6.709 15-15 15zm63.327 122.886c-5.858 5.858-15.355 5.858-21.213 0s-5.858-15.355 0-21.213c5.858-5.859 15.355-5.859 21.213 0 5.858 5.858 5.858 15.355 0 21.213zm0-254.559c-5.858 5.858-15.355 5.858-21.213 0s-5.858-15.355 0-21.213 15.355-5.858 21.213 0 5.858 15.355 0 21.213zm131.673 296.673c0 8.291-6.709 15-15 15s-15-6.709-15-15v-30c0-8.291 6.709-15 15-15s15 6.709 15 15zm85.605-79.395c-5.859 5.859-15.352 5.859-21.211 0l-90-90c-2.812-2.812-4.394-6.621-4.394-10.605v-90c0-8.291 6.709-15 15-15s15 6.709 15 15v83.789l85.605 85.605c5.86 5.86 5.86 15.352 0 21.211zm37.281 37.281c-5.858 5.858-15.355 5.858-21.213 0s-5.858-15.355 0-21.213c5.858-5.859 15.355-5.859 21.213 0 5.857 5.858 5.857 15.355 0 21.213zm57.114-137.886c0 8.291-6.709 15-15 15h-30c-8.291 0-15-6.709-15-15s6.709-15 15-15h30c8.291 0 15 6.709 15 15z"
                                        fill="currentColor" data-original="currentColor"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <h1 class="dash__side-bar__item__txt">Set availability</h1>
                </a>

                <a href="./dash-instructor-profile.php" class="dash__side-bar__item">
                    <div class="dash__side-bar__item__icon">
                        <svg class="dash__side-bar__item__icon-svg" id="profile-icon" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 35.092 42.062">
                            <g id="user-icon">
                                <path id="Path_1029" data-name="Path 1029"
                                    d="M97.163,20.261a9.8,9.8,0,0,0,7.163-2.968,9.8,9.8,0,0,0,2.968-7.163,9.8,9.8,0,0,0-2.968-7.163A10.128,10.128,0,0,0,90,2.968a9.8,9.8,0,0,0-2.968,7.163A9.8,9.8,0,0,0,90,17.294,9.8,9.8,0,0,0,97.163,20.261Zm0,0"
                                    transform="translate(-79.882 0)" fill="currentColor" />
                                <path id="Path_1030" data-name="Path 1030"
                                    d="M35.007,259.342a25.018,25.018,0,0,0-.341-2.658,20.937,20.937,0,0,0-.654-2.672,13.2,13.2,0,0,0-1.1-2.492,9.4,9.4,0,0,0-1.657-2.159,7.3,7.3,0,0,0-2.379-1.5,8.224,8.224,0,0,0-3.038-.55,3.083,3.083,0,0,0-1.647.7c-.494.322-1.071.694-1.715,1.106a9.829,9.829,0,0,1-2.219.978,8.618,8.618,0,0,1-5.429,0,9.806,9.806,0,0,1-2.218-.977c-.638-.408-1.216-.78-1.717-1.106a3.079,3.079,0,0,0-1.646-.7,8.213,8.213,0,0,0-3.037.55,7.3,7.3,0,0,0-2.38,1.5,9.406,9.406,0,0,0-1.656,2.158,13.225,13.225,0,0,0-1.1,2.492,20.989,20.989,0,0,0-.653,2.672,24.933,24.933,0,0,0-.341,2.659c-.056.8-.084,1.64-.084,2.484a6.984,6.984,0,0,0,2.074,5.284,7.467,7.467,0,0,0,5.345,1.95H27.672a7.466,7.466,0,0,0,5.345-1.95,6.981,6.981,0,0,0,2.075-5.284c0-.848-.029-1.683-.085-2.484Zm0,0"
                                    transform="translate(0 -226.999)" fill="currentColor" />
                            </g>
                        </svg>
                    </div>
                    <h1 class="dash__side-bar__item__txt">My profile</h1>
                </a>

                <a href="#" class="dash__side-bar__item">
                    <div class="dash__side-bar__item__icon">
                        <svg class="dash__side-bar__item__icon-svg" id="QA-icon" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 46.48 46.48">
                            <path id="Path_1041" data-name="Path 1041"
                                d="M30.088,20.636,30.054,4.077A4.092,4.092,0,0,0,25.969,0H4.085A4.09,4.09,0,0,0,0,4.085V20.607a4.09,4.09,0,0,0,4.085,4.085H6.9v2.723A1.363,1.363,0,0,0,9.078,28.5l5.082-3.811,11.831.036A4.082,4.082,0,0,0,30.088,20.636ZM14.979,19.154a1.362,1.362,0,1,1,1.362-1.362A1.362,1.362,0,0,1,14.979,19.154Zm1.452-5.68v.143a1.362,1.362,0,0,1-2.723,0v-.85a1.819,1.819,0,0,1,1.555-1.8,1.366,1.366,0,0,0,1.169-1.348A1.419,1.419,0,0,0,14.087,8.58a1.362,1.362,0,0,1-1.468-2.294,4.281,4.281,0,0,1,4.41-.248,4.086,4.086,0,0,1-.6,7.437Z"
                                transform="translate(0 0)" fill="currentColor" />
                            <path id="Path_1042" data-name="Path 1042"
                                d="M206.963,210.995h-9.586l0,1.476a6.807,6.807,0,0,1-5.486,6.695h12.255a1.362,1.362,0,1,1,0,2.723H187.809a1.361,1.361,0,0,1-.553-2.605L181,219.264v12.247a4.09,4.09,0,0,0,4.085,4.085H194.3l5.159,2.58a1.363,1.363,0,0,0,1.971-1.218V235.6h5.538a4.09,4.09,0,0,0,4.085-4.085V215.08A4.09,4.09,0,0,0,206.963,210.995Zm-2.814,16.34H187.809a1.362,1.362,0,1,1,0-2.723h16.341a1.362,1.362,0,1,1,0,2.723Z"
                                transform="translate(-164.569 -191.841)" fill="currentColor" />
                        </svg>
                    </div>
                    <h1 class="dash__side-bar__item__txt">Q&A</h1>
                </a>

                <a href="#" class="dash__side-bar__item ">
                    <div class="dash__side-bar__item__icon">
                        <svg class="dash__side-bar__item__icon-svg" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 46.917 46.917">
                            <g id="logout-icon" transform="translate(0 -0.004)">
                                <path id="Path_1043" data-name="Path 1043"
                                    d="M29.323,25.417a1.954,1.954,0,0,0-1.955,1.955v7.82a1.957,1.957,0,0,1-1.955,1.955H19.548V7.823a3.94,3.94,0,0,0-2.662-3.716l-.579-.194h9.106a1.957,1.957,0,0,1,1.955,1.955v5.865a1.955,1.955,0,0,0,3.909,0V5.868A5.872,5.872,0,0,0,25.413,0H4.4a1.535,1.535,0,0,0-.209.043C4.1.039,4.005,0,3.91,0A3.913,3.913,0,0,0,0,3.913V39.1a3.94,3.94,0,0,0,2.662,3.716l11.765,3.922a4.047,4.047,0,0,0,1.212.182,3.913,3.913,0,0,0,3.909-3.91V41.056h5.865a5.872,5.872,0,0,0,5.865-5.865v-7.82a1.954,1.954,0,0,0-1.955-1.955Zm0,0"
                                    fill="currentColor" />
                                <path id="Path_1044" data-name="Path 1044"
                                    d="M298.263,115.058l-7.82-7.819a1.954,1.954,0,0,0-3.337,1.382v5.865h-7.819a1.955,1.955,0,1,0,0,3.909h7.819v5.865a1.954,1.954,0,0,0,3.337,1.382l7.82-7.82a1.953,1.953,0,0,0,0-2.764Zm0,0"
                                    transform="translate(-251.919 -96.888)" fill="currentColor" />
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
                    <ul class="navigation__list">
                        <li class="navigation__item"><a href="./user-side-courses.php"
                                class="navigation__link user-side__top-bar__link">Go to Student view</a></li>
                    </ul>
                    <div class="dash__top-bar__container__left">

                        <a href="../controllers/userController.php?event=logout">
                            <div class="dash__top-bar__svg-container">
                                <svg class="dash__top-bar__svg" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 46.917 46.917">
                                    <g id="logout-icon" transform="translate(0 -0.004)">
                                        <path id="Path_1043" data-name="Path 1043"
                                            d="M29.323,25.417a1.954,1.954,0,0,0-1.955,1.955v7.82a1.957,1.957,0,0,1-1.955,1.955H19.548V7.823a3.94,3.94,0,0,0-2.662-3.716l-.579-.194h9.106a1.957,1.957,0,0,1,1.955,1.955v5.865a1.955,1.955,0,0,0,3.909,0V5.868A5.872,5.872,0,0,0,25.413,0H4.4a1.535,1.535,0,0,0-.209.043C4.1.039,4.005,0,3.91,0A3.913,3.913,0,0,0,0,3.913V39.1a3.94,3.94,0,0,0,2.662,3.716l11.765,3.922a4.047,4.047,0,0,0,1.212.182,3.913,3.913,0,0,0,3.909-3.91V41.056h5.865a5.872,5.872,0,0,0,5.865-5.865v-7.82a1.954,1.954,0,0,0-1.955-1.955Zm0,0"
                                            fill="currentColor" />
                                        <path id="Path_1044" data-name="Path 1044"
                                            d="M298.263,115.058l-7.82-7.819a1.954,1.954,0,0,0-3.337,1.382v5.865h-7.819a1.955,1.955,0,1,0,0,3.909h7.819v5.865a1.954,1.954,0,0,0,3.337,1.382l7.82-7.82a1.953,1.953,0,0,0,0-2.764Zm0,0"
                                            transform="translate(-251.919 -96.888)" fill="currentColor" />
                                    </g>
                                </svg>
                            </div>
                        </a>

                        <div class="divider"></div>

                        <a href="#">
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
                        </a>

                    </div>

                    <div class="dash__top-bar__container__right">
                        <h1 class="dash__top-bar__fullname"><?php echo $user->fullname ?></h1>
                        <div class="dash__top-bar__img-container">
                            <img class="dash__top-bar__img" src="<?php echo '../uploads/' . $user->img_url ?>" alt="">
                        </div>
                    </div>
                </div>

                <a href="#" class="secondary-btn secondary-btn-topbar">
                    Add New Course

                    <div class="secondary-btn__svg-container">

                        <svg class="secondary-btn__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52.779 52.779">
                            <path id="add-icon"
                                d="M52.779,26.389A26.389,26.389,0,0,1,0,26.389a2.062,2.062,0,0,1,4.123,0A22.266,22.266,0,1,0,26.389,4.123a2.062,2.062,0,0,1,0-4.123A26.375,26.375,0,0,1,52.779,26.389ZM16.535,6.371l2.667-1.1a2.062,2.062,0,1,0-1.578-3.809l-2.667,1.1a2.062,2.062,0,0,0,1.578,3.809ZM9.625,11.665l2.041-2.041A2.062,2.062,0,0,0,8.75,6.709L6.709,8.75a2.062,2.062,0,0,0,2.916,2.916ZM2.572,20.318A2.062,2.062,0,0,0,5.266,19.2l1.1-2.667a2.062,2.062,0,0,0-3.809-1.578l-1.1,2.667A2.062,2.062,0,0,0,2.572,20.318Zm23.817-4.237a2.062,2.062,0,0,0-2.062,2.062v6.185H18.143a2.062,2.062,0,0,0,0,4.123h6.185v6.185a2.062,2.062,0,0,0,4.123,0V28.451h6.185a2.062,2.062,0,0,0,0-4.123H28.451V18.143A2.062,2.062,0,0,0,26.389,16.081Z"
                                fill="currentColor" />
                        </svg>

                    </div>
                </a>

            </nav>

            <div class="dash__content">
                <div class="dash__instructor-my-courses">
                    <h1 class="dash__instructor-my-courses__title">My Courses</h1>
                    <div class="course__card-v2">
                        <div class="course__card-v2__img-container">
                            <img src="../contents/img/course-cover.jpg" alt="" class="course__card-v2__img">
                        </div>

                        <div class="course__card-v2__content">
                            <h1 class="course__card-v2__title">
                                The Complete JavaScript Course 2021:From Zero to Expert!
                            </h1>

                            <div class="course__card-v2__cate-action">
                                <div class="course__card-v2__category">
                                    Development
                                </div>

                                <div class="course__card-v2__action-btns">
                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-view">
                                        <svg class="course__card-v2__btn-icon" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 31.995 21">
                                            <g id="see-icon" transform="translate(-0.002 -5.5)">
                                                <path id="Path_1047" data-name="Path 1047"
                                                    d="M16,5.5A17.674,17.674,0,0,0,.1,15.55a1.11,1.11,0,0,0,0,.91,17.61,17.61,0,0,0,31.8,0,1.11,1.11,0,0,0,0-.91A17.674,17.674,0,0,0,16,5.5Zm0,16.84A6.34,6.34,0,1,1,22.34,16,6.355,6.355,0,0,1,16,22.34Z"
                                                    fill="#fff" />
                                                <circle id="Ellipse_34" data-name="Ellipse 34" cx="4.2" cy="4.2" r="4.2"
                                                    transform="translate(11.8 11.8)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </a>

                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-update">

                                        <svg class="course__card-v2__btn-icon course__card-v2__btn-icon-update"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35.816 35.972">
                                            <g id="update-icon" transform="translate(-0.757)">
                                                <g id="Group_34" data-name="Group 34" transform="translate(0.757)">
                                                    <path id="Path_1056" data-name="Path 1056"
                                                        d="M119.026,1.212l-.043-.039a4.482,4.482,0,0,0-6.332.286L96.633,19a1.546,1.546,0,0,0-.325.554L94.424,25.2a2.147,2.147,0,0,0,2.033,2.827h0a2.139,2.139,0,0,0,.862-.181l5.453-2.386a1.545,1.545,0,0,0,.522-.374L119.313,7.545A4.487,4.487,0,0,0,119.026,1.212ZM98.033,24.152l1.105-3.313.093-.1,2.095,1.913-.093.1Zm19-18.694L103.412,20.366l-2.095-1.913L114.934,3.545a1.389,1.389,0,0,1,1.963-.088l.043.039A1.39,1.39,0,0,1,117.029,5.459Z"
                                                        transform="translate(-84.668)" fill="#fff" />
                                                    <path id="Path_1057" data-name="Path 1057"
                                                        d="M32.008,43.208a1.547,1.547,0,0,0-1.547,1.547v13.13a3.938,3.938,0,0,1-3.933,3.933H7.783A3.938,3.938,0,0,1,3.85,57.885V39.292a3.938,3.938,0,0,1,3.933-3.933H21.351a1.547,1.547,0,1,0,0-3.093H7.783A7.034,7.034,0,0,0,.757,39.292V57.885a7.034,7.034,0,0,0,7.026,7.026H26.528a7.034,7.034,0,0,0,7.026-7.026V44.754A1.546,1.546,0,0,0,32.008,43.208Z"
                                                        transform="translate(-0.757 -28.939)" fill="#fff" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>

                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-delete">

                                        <svg class="course__card-v2__btn-icon course__card-v2__btn-icon-delete"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.884 34.856">
                                            <g id="delete-icon" transform="translate(-9 -4.998)">
                                                <g id="Icons" transform="translate(9 4.998)">
                                                    <path id="Path_1060" data-name="Path 1060"
                                                        d="M36.884,10.228h-6.1V8.267A3.381,3.381,0,0,0,27.3,5H18.585A3.381,3.381,0,0,0,15.1,8.267v1.961H9v1.743h1.743V33.755a6.1,6.1,0,0,0,6.1,6.1h12.2a6.1,6.1,0,0,0,6.1-6.1V11.971h1.743ZM16.842,8.267a1.647,1.647,0,0,1,1.743-1.525H27.3a1.647,1.647,0,0,1,1.743,1.525v1.961h-12.2ZM33.4,33.755a4.357,4.357,0,0,1-4.357,4.357h-12.2a4.357,4.357,0,0,1-4.357-4.357V11.971H33.4Z"
                                                        transform="translate(-9 -4.998)" fill="#fff" />
                                                    <path id="Path_1061" data-name="Path 1061"
                                                        d="M19,19h1.743V34.685H19Z"
                                                        transform="translate(-10.286 -6.799)" fill="#fff" />
                                                    <path id="Path_1062" data-name="Path 1062"
                                                        d="M29,19h1.743V34.685H29Z"
                                                        transform="translate(-11.573 -6.799)" fill="#fff" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="course__card-v2">
                        <div class="course__card-v2__img-container">
                            <img src="../contents/img/course-cover.jpg" alt="" class="course__card-v2__img">
                        </div>

                        <div class="course__card-v2__content">
                            <h1 class="course__card-v2__title">
                                The Complete JavaScript Course 2021:From Zero to Expert!
                            </h1>

                            <div class="course__card-v2__cate-action">
                                <div class="course__card-v2__category">
                                    Development
                                </div>

                                <div class="course__card-v2__action-btns">
                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-view">
                                        <svg class="course__card-v2__btn-icon" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 31.995 21">
                                            <g id="see-icon" transform="translate(-0.002 -5.5)">
                                                <path id="Path_1047" data-name="Path 1047"
                                                    d="M16,5.5A17.674,17.674,0,0,0,.1,15.55a1.11,1.11,0,0,0,0,.91,17.61,17.61,0,0,0,31.8,0,1.11,1.11,0,0,0,0-.91A17.674,17.674,0,0,0,16,5.5Zm0,16.84A6.34,6.34,0,1,1,22.34,16,6.355,6.355,0,0,1,16,22.34Z"
                                                    fill="#fff" />
                                                <circle id="Ellipse_34" data-name="Ellipse 34" cx="4.2" cy="4.2" r="4.2"
                                                    transform="translate(11.8 11.8)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </a>

                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-update">

                                        <svg class="course__card-v2__btn-icon course__card-v2__btn-icon-update"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35.816 35.972">
                                            <g id="update-icon" transform="translate(-0.757)">
                                                <g id="Group_34" data-name="Group 34" transform="translate(0.757)">
                                                    <path id="Path_1056" data-name="Path 1056"
                                                        d="M119.026,1.212l-.043-.039a4.482,4.482,0,0,0-6.332.286L96.633,19a1.546,1.546,0,0,0-.325.554L94.424,25.2a2.147,2.147,0,0,0,2.033,2.827h0a2.139,2.139,0,0,0,.862-.181l5.453-2.386a1.545,1.545,0,0,0,.522-.374L119.313,7.545A4.487,4.487,0,0,0,119.026,1.212ZM98.033,24.152l1.105-3.313.093-.1,2.095,1.913-.093.1Zm19-18.694L103.412,20.366l-2.095-1.913L114.934,3.545a1.389,1.389,0,0,1,1.963-.088l.043.039A1.39,1.39,0,0,1,117.029,5.459Z"
                                                        transform="translate(-84.668)" fill="#fff" />
                                                    <path id="Path_1057" data-name="Path 1057"
                                                        d="M32.008,43.208a1.547,1.547,0,0,0-1.547,1.547v13.13a3.938,3.938,0,0,1-3.933,3.933H7.783A3.938,3.938,0,0,1,3.85,57.885V39.292a3.938,3.938,0,0,1,3.933-3.933H21.351a1.547,1.547,0,1,0,0-3.093H7.783A7.034,7.034,0,0,0,.757,39.292V57.885a7.034,7.034,0,0,0,7.026,7.026H26.528a7.034,7.034,0,0,0,7.026-7.026V44.754A1.546,1.546,0,0,0,32.008,43.208Z"
                                                        transform="translate(-0.757 -28.939)" fill="#fff" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>

                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-delete">

                                        <svg class="course__card-v2__btn-icon course__card-v2__btn-icon-delete"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.884 34.856">
                                            <g id="delete-icon" transform="translate(-9 -4.998)">
                                                <g id="Icons" transform="translate(9 4.998)">
                                                    <path id="Path_1060" data-name="Path 1060"
                                                        d="M36.884,10.228h-6.1V8.267A3.381,3.381,0,0,0,27.3,5H18.585A3.381,3.381,0,0,0,15.1,8.267v1.961H9v1.743h1.743V33.755a6.1,6.1,0,0,0,6.1,6.1h12.2a6.1,6.1,0,0,0,6.1-6.1V11.971h1.743ZM16.842,8.267a1.647,1.647,0,0,1,1.743-1.525H27.3a1.647,1.647,0,0,1,1.743,1.525v1.961h-12.2ZM33.4,33.755a4.357,4.357,0,0,1-4.357,4.357h-12.2a4.357,4.357,0,0,1-4.357-4.357V11.971H33.4Z"
                                                        transform="translate(-9 -4.998)" fill="#fff" />
                                                    <path id="Path_1061" data-name="Path 1061"
                                                        d="M19,19h1.743V34.685H19Z"
                                                        transform="translate(-10.286 -6.799)" fill="#fff" />
                                                    <path id="Path_1062" data-name="Path 1062"
                                                        d="M29,19h1.743V34.685H29Z"
                                                        transform="translate(-11.573 -6.799)" fill="#fff" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="course__card-v2">
                        <div class="course__card-v2__img-container">
                            <img src="../contents/img/course-cover.jpg" alt="" class="course__card-v2__img">
                        </div>

                        <div class="course__card-v2__content">
                            <h1 class="course__card-v2__title">
                                The Complete JavaScript Course 2021:From Zero to Expert!
                            </h1>

                            <div class="course__card-v2__cate-action">
                                <div class="course__card-v2__category">
                                    Development
                                </div>

                                <div class="course__card-v2__action-btns">
                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-view">
                                        <svg class="course__card-v2__btn-icon" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 31.995 21">
                                            <g id="see-icon" transform="translate(-0.002 -5.5)">
                                                <path id="Path_1047" data-name="Path 1047"
                                                    d="M16,5.5A17.674,17.674,0,0,0,.1,15.55a1.11,1.11,0,0,0,0,.91,17.61,17.61,0,0,0,31.8,0,1.11,1.11,0,0,0,0-.91A17.674,17.674,0,0,0,16,5.5Zm0,16.84A6.34,6.34,0,1,1,22.34,16,6.355,6.355,0,0,1,16,22.34Z"
                                                    fill="#fff" />
                                                <circle id="Ellipse_34" data-name="Ellipse 34" cx="4.2" cy="4.2" r="4.2"
                                                    transform="translate(11.8 11.8)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </a>

                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-update">

                                        <svg class="course__card-v2__btn-icon course__card-v2__btn-icon-update"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35.816 35.972">
                                            <g id="update-icon" transform="translate(-0.757)">
                                                <g id="Group_34" data-name="Group 34" transform="translate(0.757)">
                                                    <path id="Path_1056" data-name="Path 1056"
                                                        d="M119.026,1.212l-.043-.039a4.482,4.482,0,0,0-6.332.286L96.633,19a1.546,1.546,0,0,0-.325.554L94.424,25.2a2.147,2.147,0,0,0,2.033,2.827h0a2.139,2.139,0,0,0,.862-.181l5.453-2.386a1.545,1.545,0,0,0,.522-.374L119.313,7.545A4.487,4.487,0,0,0,119.026,1.212ZM98.033,24.152l1.105-3.313.093-.1,2.095,1.913-.093.1Zm19-18.694L103.412,20.366l-2.095-1.913L114.934,3.545a1.389,1.389,0,0,1,1.963-.088l.043.039A1.39,1.39,0,0,1,117.029,5.459Z"
                                                        transform="translate(-84.668)" fill="#fff" />
                                                    <path id="Path_1057" data-name="Path 1057"
                                                        d="M32.008,43.208a1.547,1.547,0,0,0-1.547,1.547v13.13a3.938,3.938,0,0,1-3.933,3.933H7.783A3.938,3.938,0,0,1,3.85,57.885V39.292a3.938,3.938,0,0,1,3.933-3.933H21.351a1.547,1.547,0,1,0,0-3.093H7.783A7.034,7.034,0,0,0,.757,39.292V57.885a7.034,7.034,0,0,0,7.026,7.026H26.528a7.034,7.034,0,0,0,7.026-7.026V44.754A1.546,1.546,0,0,0,32.008,43.208Z"
                                                        transform="translate(-0.757 -28.939)" fill="#fff" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>

                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-delete">

                                        <svg class="course__card-v2__btn-icon course__card-v2__btn-icon-delete"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.884 34.856">
                                            <g id="delete-icon" transform="translate(-9 -4.998)">
                                                <g id="Icons" transform="translate(9 4.998)">
                                                    <path id="Path_1060" data-name="Path 1060"
                                                        d="M36.884,10.228h-6.1V8.267A3.381,3.381,0,0,0,27.3,5H18.585A3.381,3.381,0,0,0,15.1,8.267v1.961H9v1.743h1.743V33.755a6.1,6.1,0,0,0,6.1,6.1h12.2a6.1,6.1,0,0,0,6.1-6.1V11.971h1.743ZM16.842,8.267a1.647,1.647,0,0,1,1.743-1.525H27.3a1.647,1.647,0,0,1,1.743,1.525v1.961h-12.2ZM33.4,33.755a4.357,4.357,0,0,1-4.357,4.357h-12.2a4.357,4.357,0,0,1-4.357-4.357V11.971H33.4Z"
                                                        transform="translate(-9 -4.998)" fill="#fff" />
                                                    <path id="Path_1061" data-name="Path 1061"
                                                        d="M19,19h1.743V34.685H19Z"
                                                        transform="translate(-10.286 -6.799)" fill="#fff" />
                                                    <path id="Path_1062" data-name="Path 1062"
                                                        d="M29,19h1.743V34.685H29Z"
                                                        transform="translate(-11.573 -6.799)" fill="#fff" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="course__card-v2">
                        <div class="course__card-v2__img-container">
                            <img src="../contents/img/course-cover.jpg" alt="" class="course__card-v2__img">
                        </div>

                        <div class="course__card-v2__content">
                            <h1 class="course__card-v2__title">
                                The Complete JavaScript Course 2021:From Zero to Expert!
                            </h1>

                            <div class="course__card-v2__cate-action">
                                <div class="course__card-v2__category">
                                    Development
                                </div>

                                <div class="course__card-v2__action-btns">
                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-view">
                                        <svg class="course__card-v2__btn-icon" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 31.995 21">
                                            <g id="see-icon" transform="translate(-0.002 -5.5)">
                                                <path id="Path_1047" data-name="Path 1047"
                                                    d="M16,5.5A17.674,17.674,0,0,0,.1,15.55a1.11,1.11,0,0,0,0,.91,17.61,17.61,0,0,0,31.8,0,1.11,1.11,0,0,0,0-.91A17.674,17.674,0,0,0,16,5.5Zm0,16.84A6.34,6.34,0,1,1,22.34,16,6.355,6.355,0,0,1,16,22.34Z"
                                                    fill="#fff" />
                                                <circle id="Ellipse_34" data-name="Ellipse 34" cx="4.2" cy="4.2" r="4.2"
                                                    transform="translate(11.8 11.8)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </a>

                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-update">

                                        <svg class="course__card-v2__btn-icon course__card-v2__btn-icon-update"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35.816 35.972">
                                            <g id="update-icon" transform="translate(-0.757)">
                                                <g id="Group_34" data-name="Group 34" transform="translate(0.757)">
                                                    <path id="Path_1056" data-name="Path 1056"
                                                        d="M119.026,1.212l-.043-.039a4.482,4.482,0,0,0-6.332.286L96.633,19a1.546,1.546,0,0,0-.325.554L94.424,25.2a2.147,2.147,0,0,0,2.033,2.827h0a2.139,2.139,0,0,0,.862-.181l5.453-2.386a1.545,1.545,0,0,0,.522-.374L119.313,7.545A4.487,4.487,0,0,0,119.026,1.212ZM98.033,24.152l1.105-3.313.093-.1,2.095,1.913-.093.1Zm19-18.694L103.412,20.366l-2.095-1.913L114.934,3.545a1.389,1.389,0,0,1,1.963-.088l.043.039A1.39,1.39,0,0,1,117.029,5.459Z"
                                                        transform="translate(-84.668)" fill="#fff" />
                                                    <path id="Path_1057" data-name="Path 1057"
                                                        d="M32.008,43.208a1.547,1.547,0,0,0-1.547,1.547v13.13a3.938,3.938,0,0,1-3.933,3.933H7.783A3.938,3.938,0,0,1,3.85,57.885V39.292a3.938,3.938,0,0,1,3.933-3.933H21.351a1.547,1.547,0,1,0,0-3.093H7.783A7.034,7.034,0,0,0,.757,39.292V57.885a7.034,7.034,0,0,0,7.026,7.026H26.528a7.034,7.034,0,0,0,7.026-7.026V44.754A1.546,1.546,0,0,0,32.008,43.208Z"
                                                        transform="translate(-0.757 -28.939)" fill="#fff" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>

                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-delete">

                                        <svg class="course__card-v2__btn-icon course__card-v2__btn-icon-delete"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.884 34.856">
                                            <g id="delete-icon" transform="translate(-9 -4.998)">
                                                <g id="Icons" transform="translate(9 4.998)">
                                                    <path id="Path_1060" data-name="Path 1060"
                                                        d="M36.884,10.228h-6.1V8.267A3.381,3.381,0,0,0,27.3,5H18.585A3.381,3.381,0,0,0,15.1,8.267v1.961H9v1.743h1.743V33.755a6.1,6.1,0,0,0,6.1,6.1h12.2a6.1,6.1,0,0,0,6.1-6.1V11.971h1.743ZM16.842,8.267a1.647,1.647,0,0,1,1.743-1.525H27.3a1.647,1.647,0,0,1,1.743,1.525v1.961h-12.2ZM33.4,33.755a4.357,4.357,0,0,1-4.357,4.357h-12.2a4.357,4.357,0,0,1-4.357-4.357V11.971H33.4Z"
                                                        transform="translate(-9 -4.998)" fill="#fff" />
                                                    <path id="Path_1061" data-name="Path 1061"
                                                        d="M19,19h1.743V34.685H19Z"
                                                        transform="translate(-10.286 -6.799)" fill="#fff" />
                                                    <path id="Path_1062" data-name="Path 1062"
                                                        d="M29,19h1.743V34.685H29Z"
                                                        transform="translate(-11.573 -6.799)" fill="#fff" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="course__card-v2">
                        <div class="course__card-v2__img-container">
                            <img src="../contents/img/course-cover.jpg" alt="" class="course__card-v2__img">
                        </div>

                        <div class="course__card-v2__content">
                            <h1 class="course__card-v2__title">
                                The Complete JavaScript Course 2021:From Zero to Expert!
                            </h1>

                            <div class="course__card-v2__cate-action">
                                <div class="course__card-v2__category">
                                    Development
                                </div>

                                <div class="course__card-v2__action-btns">
                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-view">
                                        <svg class="course__card-v2__btn-icon" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 31.995 21">
                                            <g id="see-icon" transform="translate(-0.002 -5.5)">
                                                <path id="Path_1047" data-name="Path 1047"
                                                    d="M16,5.5A17.674,17.674,0,0,0,.1,15.55a1.11,1.11,0,0,0,0,.91,17.61,17.61,0,0,0,31.8,0,1.11,1.11,0,0,0,0-.91A17.674,17.674,0,0,0,16,5.5Zm0,16.84A6.34,6.34,0,1,1,22.34,16,6.355,6.355,0,0,1,16,22.34Z"
                                                    fill="#fff" />
                                                <circle id="Ellipse_34" data-name="Ellipse 34" cx="4.2" cy="4.2" r="4.2"
                                                    transform="translate(11.8 11.8)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </a>

                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-update">

                                        <svg class="course__card-v2__btn-icon course__card-v2__btn-icon-update"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35.816 35.972">
                                            <g id="update-icon" transform="translate(-0.757)">
                                                <g id="Group_34" data-name="Group 34" transform="translate(0.757)">
                                                    <path id="Path_1056" data-name="Path 1056"
                                                        d="M119.026,1.212l-.043-.039a4.482,4.482,0,0,0-6.332.286L96.633,19a1.546,1.546,0,0,0-.325.554L94.424,25.2a2.147,2.147,0,0,0,2.033,2.827h0a2.139,2.139,0,0,0,.862-.181l5.453-2.386a1.545,1.545,0,0,0,.522-.374L119.313,7.545A4.487,4.487,0,0,0,119.026,1.212ZM98.033,24.152l1.105-3.313.093-.1,2.095,1.913-.093.1Zm19-18.694L103.412,20.366l-2.095-1.913L114.934,3.545a1.389,1.389,0,0,1,1.963-.088l.043.039A1.39,1.39,0,0,1,117.029,5.459Z"
                                                        transform="translate(-84.668)" fill="#fff" />
                                                    <path id="Path_1057" data-name="Path 1057"
                                                        d="M32.008,43.208a1.547,1.547,0,0,0-1.547,1.547v13.13a3.938,3.938,0,0,1-3.933,3.933H7.783A3.938,3.938,0,0,1,3.85,57.885V39.292a3.938,3.938,0,0,1,3.933-3.933H21.351a1.547,1.547,0,1,0,0-3.093H7.783A7.034,7.034,0,0,0,.757,39.292V57.885a7.034,7.034,0,0,0,7.026,7.026H26.528a7.034,7.034,0,0,0,7.026-7.026V44.754A1.546,1.546,0,0,0,32.008,43.208Z"
                                                        transform="translate(-0.757 -28.939)" fill="#fff" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>

                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-delete">

                                        <svg class="course__card-v2__btn-icon course__card-v2__btn-icon-delete"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.884 34.856">
                                            <g id="delete-icon" transform="translate(-9 -4.998)">
                                                <g id="Icons" transform="translate(9 4.998)">
                                                    <path id="Path_1060" data-name="Path 1060"
                                                        d="M36.884,10.228h-6.1V8.267A3.381,3.381,0,0,0,27.3,5H18.585A3.381,3.381,0,0,0,15.1,8.267v1.961H9v1.743h1.743V33.755a6.1,6.1,0,0,0,6.1,6.1h12.2a6.1,6.1,0,0,0,6.1-6.1V11.971h1.743ZM16.842,8.267a1.647,1.647,0,0,1,1.743-1.525H27.3a1.647,1.647,0,0,1,1.743,1.525v1.961h-12.2ZM33.4,33.755a4.357,4.357,0,0,1-4.357,4.357h-12.2a4.357,4.357,0,0,1-4.357-4.357V11.971H33.4Z"
                                                        transform="translate(-9 -4.998)" fill="#fff" />
                                                    <path id="Path_1061" data-name="Path 1061"
                                                        d="M19,19h1.743V34.685H19Z"
                                                        transform="translate(-10.286 -6.799)" fill="#fff" />
                                                    <path id="Path_1062" data-name="Path 1062"
                                                        d="M29,19h1.743V34.685H29Z"
                                                        transform="translate(-11.573 -6.799)" fill="#fff" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="course__card-v2">
                        <div class="course__card-v2__img-container">
                            <img src="../contents/img/course-cover.jpg" alt="" class="course__card-v2__img">
                        </div>

                        <div class="course__card-v2__content">
                            <h1 class="course__card-v2__title">
                                The Complete JavaScript Course 2021:From Zero to Expert!
                            </h1>

                            <div class="course__card-v2__cate-action">
                                <div class="course__card-v2__category">
                                    Development
                                </div>

                                <div class="course__card-v2__action-btns">
                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-view">
                                        <svg class="course__card-v2__btn-icon" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 31.995 21">
                                            <g id="see-icon" transform="translate(-0.002 -5.5)">
                                                <path id="Path_1047" data-name="Path 1047"
                                                    d="M16,5.5A17.674,17.674,0,0,0,.1,15.55a1.11,1.11,0,0,0,0,.91,17.61,17.61,0,0,0,31.8,0,1.11,1.11,0,0,0,0-.91A17.674,17.674,0,0,0,16,5.5Zm0,16.84A6.34,6.34,0,1,1,22.34,16,6.355,6.355,0,0,1,16,22.34Z"
                                                    fill="#fff" />
                                                <circle id="Ellipse_34" data-name="Ellipse 34" cx="4.2" cy="4.2" r="4.2"
                                                    transform="translate(11.8 11.8)" fill="#fff" />
                                            </g>
                                        </svg>
                                    </a>

                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-update">

                                        <svg class="course__card-v2__btn-icon course__card-v2__btn-icon-update"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 35.816 35.972">
                                            <g id="update-icon" transform="translate(-0.757)">
                                                <g id="Group_34" data-name="Group 34" transform="translate(0.757)">
                                                    <path id="Path_1056" data-name="Path 1056"
                                                        d="M119.026,1.212l-.043-.039a4.482,4.482,0,0,0-6.332.286L96.633,19a1.546,1.546,0,0,0-.325.554L94.424,25.2a2.147,2.147,0,0,0,2.033,2.827h0a2.139,2.139,0,0,0,.862-.181l5.453-2.386a1.545,1.545,0,0,0,.522-.374L119.313,7.545A4.487,4.487,0,0,0,119.026,1.212ZM98.033,24.152l1.105-3.313.093-.1,2.095,1.913-.093.1Zm19-18.694L103.412,20.366l-2.095-1.913L114.934,3.545a1.389,1.389,0,0,1,1.963-.088l.043.039A1.39,1.39,0,0,1,117.029,5.459Z"
                                                        transform="translate(-84.668)" fill="#fff" />
                                                    <path id="Path_1057" data-name="Path 1057"
                                                        d="M32.008,43.208a1.547,1.547,0,0,0-1.547,1.547v13.13a3.938,3.938,0,0,1-3.933,3.933H7.783A3.938,3.938,0,0,1,3.85,57.885V39.292a3.938,3.938,0,0,1,3.933-3.933H21.351a1.547,1.547,0,1,0,0-3.093H7.783A7.034,7.034,0,0,0,.757,39.292V57.885a7.034,7.034,0,0,0,7.026,7.026H26.528a7.034,7.034,0,0,0,7.026-7.026V44.754A1.546,1.546,0,0,0,32.008,43.208Z"
                                                        transform="translate(-0.757 -28.939)" fill="#fff" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>

                                    <a href="#" class="course__card-v2__btn course__card-v2__btn-delete">

                                        <svg class="course__card-v2__btn-icon course__card-v2__btn-icon-delete"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27.884 34.856">
                                            <g id="delete-icon" transform="translate(-9 -4.998)">
                                                <g id="Icons" transform="translate(9 4.998)">
                                                    <path id="Path_1060" data-name="Path 1060"
                                                        d="M36.884,10.228h-6.1V8.267A3.381,3.381,0,0,0,27.3,5H18.585A3.381,3.381,0,0,0,15.1,8.267v1.961H9v1.743h1.743V33.755a6.1,6.1,0,0,0,6.1,6.1h12.2a6.1,6.1,0,0,0,6.1-6.1V11.971h1.743ZM16.842,8.267a1.647,1.647,0,0,1,1.743-1.525H27.3a1.647,1.647,0,0,1,1.743,1.525v1.961h-12.2ZM33.4,33.755a4.357,4.357,0,0,1-4.357,4.357h-12.2a4.357,4.357,0,0,1-4.357-4.357V11.971H33.4Z"
                                                        transform="translate(-9 -4.998)" fill="#fff" />
                                                    <path id="Path_1061" data-name="Path 1061"
                                                        d="M19,19h1.743V34.685H19Z"
                                                        transform="translate(-10.286 -6.799)" fill="#fff" />
                                                    <path id="Path_1062" data-name="Path 1062"
                                                        d="M29,19h1.743V34.685H29Z"
                                                        transform="translate(-11.573 -6.799)" fill="#fff" />
                                                </g>
                                            </g>
                                        </svg>

                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../contents/js/revenue-chart.js"></script>
</body>

</html>