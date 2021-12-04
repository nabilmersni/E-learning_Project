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
        if($user->cv_status == 1){
            header('location:../views/dash_instructor.php');
        }
    }else {
        header('location:../views/login.php?auth=false');
    }


    require_once "../models/notification.php";
    $notifCount = Notification::getNotifUserNumber($user->user_id)->total;
    $notifications = Notification::getAllNotifUser($user->user_id);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../contents/css/notif.css" />
    <link rel="stylesheet" href="../contents/sass/style.css" />

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="icon" href="../contents/img/logo-icon-nobg.png">
    <title>I learn-dash</title>
</head>

<body>

    <div class="dash">
        <div class="dash__side-bar">
            <img class="dash__side-bar__logo" src="../contents/img/logo-icon-nobg.png" alt="logo">

            <div class="dash__side-bar__list">
                <a href="#" class="dash__side-bar__item active">
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

                <a href="./dash_instructor-courses.php" class="dash__side-bar__item">
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
                        <svg class="dash__side-bar__item__icon-svg" xmlns="http://www.w3.org/2000/svg" version="1.1"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0"
                            viewBox="0 0 460.8 460.8" style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <g>
                                            <path
                                                d="M230.432,239.282c65.829,0,119.641-53.812,119.641-119.641C350.073,53.812,296.261,0,230.432,0     S110.792,53.812,110.792,119.641S164.604,239.282,230.432,239.282z"
                                                fill="currentColor" data-original="currentColor"></path>
                                            <path
                                                d="M435.755,334.89c-3.135-7.837-7.314-15.151-12.016-21.943c-24.033-35.527-61.126-59.037-102.922-64.784     c-5.224-0.522-10.971,0.522-15.151,3.657c-21.943,16.196-48.065,24.555-75.233,24.555s-53.29-8.359-75.233-24.555     c-4.18-3.135-9.927-4.702-15.151-3.657c-41.796,5.747-79.412,29.257-102.922,64.784c-4.702,6.792-8.882,14.629-12.016,21.943     c-1.567,3.135-1.045,6.792,0.522,9.927c4.18,7.314,9.404,14.629,14.106,20.898c7.314,9.927,15.151,18.808,24.033,27.167     c7.314,7.314,15.673,14.106,24.033,20.898c41.273,30.825,90.906,47.02,142.106,47.02s100.833-16.196,142.106-47.02     c8.359-6.269,16.718-13.584,24.033-20.898c8.359-8.359,16.718-17.241,24.033-27.167c5.224-6.792,9.927-13.584,14.106-20.898     C436.8,341.682,437.322,338.024,435.755,334.89z"
                                                fill="currentColor" data-original="currentColor"></path>
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
                                    <svg class="dash__top-bar__svg" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                        x="0" y="0" viewBox="0 0 48 48" style="enable-background:new 0 0 512 512"
                                        xml:space="preserve">
                                        <g>
                                            <g xmlns="http://www.w3.org/2000/svg" id="Line">
                                                <path
                                                    d="m24 2a15 15 0 0 0 -15 15v11.7l-3.32 5a4.08 4.08 0 0 0 3.39 6.3h29.86a4.08 4.08 0 0 0 3.39-6.33l-3.32-4.97v-11.7a15 15 0 0 0 -15-15z"
                                                    fill="currentColor" data-original="currentColor"></path>
                                                <path d="m24 46a6 6 0 0 0 5.65-4h-11.3a6 6 0 0 0 5.65 4z"
                                                    fill="currentColor" data-original="currentColor"></path>
                                            </g>
                                        </g>
                                    </svg>
                                </div>
                            </div>

                            <div class="dropdown">

                                <?php if($notifCount ==0){
                                    echo '<div class="empty_alert">
                                    There is no notifications
                                </div>';
                                } ?>

                                <?php 
                                    while($notification = $notifications->fetchObject()) {
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
                                        <a style="text-decoration:none; color:inherit"
                                            href="../controllers/notificationController.php?event=deleteNotif&notif_id=<?php echo $notification->notif_id ?>">
                                            <svg class="notify_read_icon" xmlns="http://www.w3.org/2000/svg"
                                                version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 32 32"
                                                style="enable-background:new 0 0 512 512" xml:space="preserve">
                                                <g>
                                                    <path xmlns="http://www.w3.org/2000/svg"
                                                        d="m16 5.5c-6.76001 0-13 3.94-15.89996 10.04999-.13.28998-.13.63 0 .90997 2.90997 6.10004 9.14996 10.04004 15.89996 10.04004s12.98999-3.94 15.90002-10.04004c.13-.27997.13-.62 0-.90997-2.90002-6.10999-9.14001-10.04999-15.90002-10.04999zm0 16.83997c-3.48999 0-6.33997-2.84998-6.33997-6.33997s2.84998-6.34003 6.33997-6.34003 6.34003 2.85004 6.34003 6.34003-2.85004 6.33997-6.34003 6.33997z"
                                                        fill="currentColor" data-original="currentColor"></path>
                                                    <circle xmlns="http://www.w3.org/2000/svg" cx="16" cy="16" r="4.2"
                                                        fill="currentColor" data-original="currentColor"></circle>
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
                        <h1 class="dash__top-bar__fullname">
                            <?php echo $user->fullname ?>
                        </h1>
                        <div class="dash__top-bar__img-container">
                            <img class="dash__top-bar__img" src="<?php echo '../uploads/' . $user->img_url ?>" alt="">
                        </div>
                    </div>
                </div>

            </nav>

            <div class="dash__content">
                <div class="dash__instructor-home">

                    <div class="dash__instructor-home__welcome">
                        <p class="dash__instructor-home__welcome__txt-1">Hello
                            <?php echo $user->fullname ?> !
                        </p>
                        <h1 class="dash__instructor-home__welcome__txt-2">Welcome to the <span>Instructor area</span>
                        </h1>
                        <p class="dash__instructor-home__welcome__txt-3">Here you can publish your courses, view your
                            earnings, and request withdrawal.
                        </p>

                        <lottie-player class="dash__instructor-home__welcome__ill"
                            src="https://assets3.lottiefiles.com/packages/lf20_sqfka1nk.json" background="transparent"
                            speed="1" loop autoplay></lottie-player>
                    </div>

                    <div class="dash__instructor-home__content">

                        <?php 
                    if($user->cv_url == null){ ?>
                        <form method="POST" action="../controllers/userController.php?event=uploadCV"
                            class="form__uploadCV uploadCVForm" enctype="multipart/form-data">

                            <p style="margin-bottom: 2rem;" class="dash__instructor-home__welcome__txt-1">
                                Please upload your cv to make sure about your expertise and to ensure a good experience
                                for our students.
                            </p>

                            <div class="file-upload-wrapper" data-text="Select your file!">
                                <input name="uploadCV" type="file" class="file-upload-field"
                                    accept="application/pdf, image/*">
                            </div>

                            <input type="hidden" value="<?php echo $user->user_id ?>" name="user_id">

                            <input style=" max-width: 20rem; margin-bottom: 4rem;" class="primary-btn primary-btn-form"
                                type="submit" value="Submit">
                        </form>
                        <?php } else{?>
                        <div class="dash__instructor-home__welcome">
                            <h1 class="dash__instructor-home__welcome__txt-2">
                                Your cv is <span>under review</span>
                            </h1>
                        </div>

                        <?php }?>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="../contents/js/formValidator.js"></script>
    <script>
    $(".form__uploadCV").on("change", ".file-upload-field", function() {
        $(this).parent(".file-upload-wrapper").attr("data-text", $(this).val().replace(/.*(\/|\\)/, ''));
    });
    </script>
</body>

</html>