<?php 
    session_start();
    if (isset($_SESSION['user'])){
        $user = $_SESSION['user'];
        if($user->role != 'admin'){
            header('location:../views/login.php');
        }
    }else {
        header('location:../views/login.php?auth=false');
    }

    require_once "../models/notification.php";

    $notifCount = Notification::getNotifAdminNumber()->total;
    $notifications = Notification::getAllNotifAdmin();

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../contents/css/notif.css" />
    <link rel="stylesheet" href="../contents/sass/style.css" />
    <link rel="stylesheet" href="../contents/css/chart_style.css" />

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <link rel="icon" href="../contents/img/logo-icon-nobg.png">
    <title>I learn-dash</title>
</head>

<body>

    <div class="dash">
        <div class="dash__side-bar">
            <img class="dash__side-bar__logo" src="../contents/img/logo-icon-nobg.png" alt="logo">

            <div class="dash__side-bar__list">
                <a href="./dash_admin-home.php" class="dash__side-bar__item ">
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

                <a href="./dash_admin-users.php" class="dash__side-bar__item">
                    <div class="dash__side-bar__item__icon">

                        <svg class="dash__side-bar__item__icon-svg" xmlns="http://www.w3.org/2000/svg" version="1.1"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0"
                            viewBox="0 0 490.667 490.667" style="enable-background:new 0 0 512 512"
                            xml:space="preserve">
                            <g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <circle cx="245.333" cy="160" r="74.667" fill="currentColor"
                                            data-original="currentColor" class=""></circle>
                                    </g>
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <circle cx="394.667" cy="224" r="53.333" fill="currentColor"
                                            data-original="currentColor" class=""></circle>
                                    </g>
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <circle cx="97.515" cy="224" r="53.333" fill="currentColor"
                                            data-original="currentColor" class=""></circle>
                                    </g>
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="M245.333,256c-76.459,0-138.667,62.208-138.667,138.667c0,5.888,4.779,10.667,10.667,10.667h256    c5.888,0,10.667-4.779,10.667-10.667C384,318.208,321.792,256,245.333,256z"
                                            fill="currentColor" data-original="currentColor" class=""></path>
                                    </g>
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="M115.904,300.971c-6.528-1.387-13.163-2.304-19.904-2.304c-52.928,0-96,43.072-96,96c0,5.888,4.779,10.667,10.667,10.667    h76.629c-1.195-3.349-1.963-6.912-1.963-10.667C85.333,359.659,96.768,327.339,115.904,300.971z"
                                            fill="currentColor" data-original="currentColor" class=""></path>
                                    </g>
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="M394.667,298.667c-6.741,0-13.376,0.917-19.904,2.304c19.136,26.368,30.571,58.688,30.571,93.696    c0,3.755-0.768,7.317-1.963,10.667H480c5.888,0,10.667-4.779,10.667-10.667C490.667,341.739,447.595,298.667,394.667,298.667z"
                                            fill="currentColor" data-original="currentColor" class=""></path>
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
                    <h1 class="dash__side-bar__item__txt">Users</h1>
                </a>

                <a href="./dash_admin-instructors.php" class="dash__side-bar__item ">
                    <div class="dash__side-bar__item__icon">
                        <svg class="dash__side-bar__item__icon-svg" xmlns="http://www.w3.org/2000/svg" version="1.1"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0"
                            viewBox="0 0 490.667 490.667" style="enable-background:new 0 0 512 512"
                            xml:space="preserve">
                            <g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <circle cx="245.333" cy="160" r="74.667" fill="currentColor"
                                            data-original="currentColor" class=""></circle>
                                    </g>
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <circle cx="394.667" cy="224" r="53.333" fill="currentColor"
                                            data-original="currentColor" class=""></circle>
                                    </g>
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <circle cx="97.515" cy="224" r="53.333" fill="currentColor"
                                            data-original="currentColor" class=""></circle>
                                    </g>
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="M245.333,256c-76.459,0-138.667,62.208-138.667,138.667c0,5.888,4.779,10.667,10.667,10.667h256    c5.888,0,10.667-4.779,10.667-10.667C384,318.208,321.792,256,245.333,256z"
                                            fill="currentColor" data-original="currentColor" class=""></path>
                                    </g>
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="M115.904,300.971c-6.528-1.387-13.163-2.304-19.904-2.304c-52.928,0-96,43.072-96,96c0,5.888,4.779,10.667,10.667,10.667    h76.629c-1.195-3.349-1.963-6.912-1.963-10.667C85.333,359.659,96.768,327.339,115.904,300.971z"
                                            fill="currentColor" data-original="currentColor" class=""></path>
                                    </g>
                                </g>
                                <g xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path
                                            d="M394.667,298.667c-6.741,0-13.376,0.917-19.904,2.304c19.136,26.368,30.571,58.688,30.571,93.696    c0,3.755-0.768,7.317-1.963,10.667H480c5.888,0,10.667-4.779,10.667-10.667C490.667,341.739,447.595,298.667,394.667,298.667z"
                                            fill="currentColor" data-original="currentColor" class=""></path>
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
                    <h1 class="dash__side-bar__item__txt">Instructors</h1>
                </a>

                <a href="./dash_admin-courses.php" class="dash__side-bar__item">
                    <div class="dash__side-bar__item__icon">
                        <svg class="dash__side-bar__item__icon-svg" id="course-icon" xmlns="http://www.w3.org/2000/svg"
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
                    <h1 class="dash__side-bar__item__txt">Courses</h1>
                </a>

                <a href="#" class="dash__side-bar__item active">
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
                        <h1 class="dash__top-bar__fullname"><?php echo $user->fullname ?></h1>
                        <div class="dash__top-bar__img-container">
                            <a href="./dash_admin-profile.php">
                                <img class="dash__top-bar__img" src="<?php echo '../uploads/' . $user->img_url ?>"
                                    alt="">
                            </a>
                        </div>
                    </div>

                    <a href="#" class="secondary-btn secondary-btn-topbar">
                        Generate Coupons

                        <div class="secondary-btn__svg-container">

                            <svg class="secondary-btn__svg" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0"
                                y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512"
                                xml:space="preserve">
                                <g>
                                    <g xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="196" cy="211" r="15" fill="currentColor"
                                            data-original="currentColor"></circle>
                                        <circle cx="316" cy="301" r="15" fill="currentColor"
                                            data-original="currentColor"></circle>
                                        <path
                                            d="m467 106h-422c-24.814 0-45 20.186-45 45v60c0 8.291 6.709 15 15 15h15c16.538 0 30 13.462 30 30s-13.462 30-30 30h-15c-8.291 0-15 6.709-15 15v60c0 24.814 20.186 45 45 45h422c24.814 0 45-20.186 45-45v-60c0-8.291-6.709-15-15-15h-15c-16.538 0-30-13.462-30-30s13.462-30 30-30h15c8.291 0 15-6.709 15-15v-60c0-24.814-20.186-45-45-45zm-316 105c0-24.814 20.186-45 45-45s45 20.186 45 45-20.186 45-45 45-45-20.186-45-45zm35.624 131.719c-6.459-5.186-7.514-14.619-2.343-21.094l120-150c5.2-6.431 14.619-7.515 21.093-2.344 6.461 5.186 7.515 14.619 2.344 21.094l-120 150c-5.221 6.482-14.646 7.495-21.094 2.344zm129.376 3.281c-24.814 0-45-20.186-45-45s20.186-45 45-45 45 20.186 45 45-20.186 45-45 45z"
                                            fill="currentColor" data-original="currentColor"></path>
                                    </g>
                                </g>
                            </svg>

                        </div>
                    </a>

                </div>

                <!-- <a href="#" class="secondary-btn secondary-btn-topbar">
                    Add New Course

                    <div class="secondary-btn__svg-container">

                        <svg class="secondary-btn__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52.779 52.779">
                            <path id="add-icon"
                                d="M52.779,26.389A26.389,26.389,0,0,1,0,26.389a2.062,2.062,0,0,1,4.123,0A22.266,22.266,0,1,0,26.389,4.123a2.062,2.062,0,0,1,0-4.123A26.375,26.375,0,0,1,52.779,26.389ZM16.535,6.371l2.667-1.1a2.062,2.062,0,1,0-1.578-3.809l-2.667,1.1a2.062,2.062,0,0,0,1.578,3.809ZM9.625,11.665l2.041-2.041A2.062,2.062,0,0,0,8.75,6.709L6.709,8.75a2.062,2.062,0,0,0,2.916,2.916ZM2.572,20.318A2.062,2.062,0,0,0,5.266,19.2l1.1-2.667a2.062,2.062,0,0,0-3.809-1.578l-1.1,2.667A2.062,2.062,0,0,0,2.572,20.318Zm23.817-4.237a2.062,2.062,0,0,0-2.062,2.062v6.185H18.143a2.062,2.062,0,0,0,0,4.123h6.185v6.185a2.062,2.062,0,0,0,4.123,0V28.451h6.185a2.062,2.062,0,0,0,0-4.123H28.451V18.143A2.062,2.062,0,0,0,26.389,16.081Z"
                                fill="currentColor" />
                        </svg>

                    </div>
                </a> -->

            </nav>

            <div class="dash__content">
                <div class="dash__instructor-home">

                    <div class="update-profile-container">
                        <div class="update-profile">
                            <div class="update-profile__header">
                                <h2 class="update-profile__header__title">Update Profile</h2>
                            </div>

                            <div class="update-profile__body">
                                <div class="log">
                                    <form method="POST" action="../controllers/userController.php?event=updateMe"
                                        class="update-profile-form log__form updateForm" enctype="multipart/form-data">

                                        <div class="upload-file__container">

                                            <div class="upload-file-body">
                                                <!-- <h3 class="upload-file__title">Photo</h3> -->

                                                <div class="upload-file__img-container">
                                                    <img class="upload-file__img"
                                                        src="<?php echo '../uploads/' . $user->img_url ?>" alt="">
                                                </div>

                                                <div class="upload-file__btn-group">

                                                    <label for="file" class="btn upload-file__upload-btn">
                                                        <img style="width: 2.5rem; margin-right: 0.5rem;"
                                                            src="../contents/img/upload.png" alt="">
                                                        Upload
                                                    </label>

                                                    <!-- <button onclick="deleteImg()" type="button"
                                                        class="btn upload-file__annuler-btn">
                                                        <img style="width: 2.4rem; margin-right: 0.5rem;"
                                                            src="../contents/img/trash.png" alt="">
                                                        Delete
                                                    </button> -->

                                                    <input name="profileImg" onchange="loadFile(event)" id="file"
                                                        type="file" accept="image/jpeg, image/png"
                                                        style="visibility: hidden;width:0px;height:0px">

                                                </div>
                                            </div>
                                        </div>

                                        <div style="margin-top: 5rem;" class="form__input__group">
                                            <label for="about" class="form__input__label">About Me</label>
                                            <textarea style="padding: 1rem 2rem; height: auto;" class="form__input"
                                                name="about" id="about" cols="20" rows="5"
                                                placeholder="Write here..."><?php echo $user->about_me ?></textarea>
                                        </div>

                                        <div class="form__input__divider">
                                            <div class="form__input__left-side">

                                                <div class="form__input__group">
                                                    <label for="fullname"
                                                        class="form__input__label">Fullname<span>*</span></label>
                                                    <input id="fullname" name="fullname" type="text" class="form__input"
                                                        placeholder="Fullname" value="<?php echo $user->fullname?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="form__input__icon">
                                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                        <circle cx="12" cy="7" r="4"></circle>
                                                    </svg>
                                                </div>

                                                <!---------------------------- ***input separation*** --------------------------->

                                                <div class="form__input__group">
                                                    <label for="email"
                                                        class="form__input__label">Email<span>*</span></label>
                                                    <input id="email" name="email" type="email" class="form__input"
                                                        placeholder="Email" value="<?php echo $user->email?>">

                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="form__input__icon">
                                                        <path
                                                            d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                        </path>
                                                        <polyline points="22,6 12,13 2,6"></polyline>
                                                    </svg>
                                                </div>

                                                <!---------------------------- ***input separation*** --------------------------->

                                                <div class="form__input__group">
                                                    <label for="facebook" class="form__input__label">Facebook</label>
                                                    <input id="facebook" name="facebook" type="text" class="form__input"
                                                        placeholder="Enter Your facebook URL"
                                                        value="<?php echo $user->fb_link?>">

                                                    <svg class="form__input__icon" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0"
                                                        viewBox="0 0 24 24" style="enable-background:new 0 0 512 512"
                                                        xml:space="preserve" stroke-width="0">
                                                        <g>
                                                            <path xmlns="http://www.w3.org/2000/svg"
                                                                d="m6.812 13.937h2.518v9.312c0 .414.335.75.75.75l4.007.001c.415 0 .75-.337.75-.75v-9.312h2.387c.378 0 .697-.282.744-.657l.498-4c.056-.446-.293-.843-.744-.843h-2.885c.113-2.471-.435-3.202 1.172-3.202 1.088-.13 2.804.421 2.804-.75v-3.577c0-.375-.277-.692-.648-.743-.314-.043-1.555-.166-3.094-.166-7.01 0-5.567 7.772-5.74 8.437h-2.519c-.414 0-.75.336-.75.75v4c0 .414.336.75.75.75zm.75-3.999h2.518c.414 0 .75-.336.75-.75v-3.151c0-2.883 1.545-4.536 4.24-4.536.878 0 1.686.043 2.242.087v2.149c-.402.205-3.976-.884-3.976 2.697v2.755c0 .414.336.75.75.75h2.786l-.312 2.5h-2.474c-.414 0-.75.336-.75.75v9.311h-2.505v-9.312c0-.414-.336-.75-.75-.75h-2.519z"
                                                                fill="#000000" data-original="#000000"></path>
                                                        </g>
                                                    </svg>

                                                </div>


                                            </div>

                                            <div class="form__input__right-side">

                                                <div class="form__input__group">
                                                    <label for="Username"
                                                        class="form__input__label">Username<span>*</span></label>
                                                    <input id="Username" name="username" type="text" class="form__input"
                                                        placeholder="Username" value="<?php echo $user->username?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="form__input__icon">
                                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                        <circle cx="12" cy="7" r="4"></circle>
                                                    </svg>
                                                </div>

                                                <!---------------------------- ***input separation*** --------------------------->

                                                <div class="form__input__group">
                                                    <label for="phone" class="form__input__label">Phone
                                                        Number<span>*</span></label>
                                                    <input id="phone" name="phone" type="number" class="form__input"
                                                        placeholder="Phone Number" value="<?php echo $user->phone?>">

                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        class="form__input__icon">
                                                        <path
                                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                        </path>
                                                    </svg>

                                                </div>

                                                <!---------------------------- ***input separation*** --------------------------->

                                                <div class="form__input__group">
                                                    <label for="linkedin" class="form__input__label">Linkedin</label>
                                                    <input id="linkedin" name="linkedin" type="text" class="form__input"
                                                        placeholder="Enter Your linkedin URL"
                                                        value="<?php echo $user->linkedin_link?>">

                                                    <svg class="form__input__icon" xmlns="http://www.w3.org/2000/svg"
                                                        version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                        xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0"
                                                        viewBox="0 0 512 512" style="enable-background:new 0 0 512 512"
                                                        xml:space="preserve" class="">
                                                        <g>
                                                            <g xmlns="http://www.w3.org/2000/svg"
                                                                transform="translate(1)">
                                                                <g>
                                                                    <g>
                                                                        <path
                                                                            d="M68.12,4.267c-18.773,0-35.84,6.827-48.64,19.627C5.827,37.547-1,54.613-1,72.533c0,18.773,7.68,35.84,20.48,48.64     c12.8,12.8,30.72,20.48,47.787,19.627c0,0,0.853,0,1.707,0c17.067,0,33.28-6.827,46.08-19.627     c12.8-12.8,20.48-29.867,20.48-48.64c0.853-17.92-6.827-34.987-19.627-47.787C103.107,11.093,86.04,4.267,68.12,4.267z      M103.107,109.227c-9.387,9.387-22.187,15.36-35.84,14.507c-12.8,0-26.453-5.12-35.84-14.507     c-10.24-9.387-15.36-23.04-15.36-36.693s5.12-26.453,15.36-36.693c9.387-9.387,22.187-14.507,36.693-14.507     c12.8,0,25.6,5.12,34.987,14.507c10.24,10.24,15.36,23.04,15.36,36.693S113.347,99.84,103.107,109.227z"
                                                                            fill="#000000" data-original="#000000"
                                                                            class="">
                                                                        </path>
                                                                        <path
                                                                            d="M101.4,157.867H32.28c-13.653,0-24.747,11.093-24.747,25.6v298.667c0,13.653,11.947,25.6,25.6,25.6H101.4     c13.653,0,25.6-11.947,25.6-24.747v-299.52C127,169.813,115.053,157.867,101.4,157.867z M109.933,482.987     c0,4.267-4.267,7.68-8.533,7.68H33.133c-4.267,0-8.533-4.267-8.533-8.533V183.467c0-4.267,3.413-8.533,7.68-8.533h69.12     c4.267,0,8.533,4.267,8.533,8.533V482.987z"
                                                                            fill="#000000" data-original="#000000"
                                                                            class="">
                                                                        </path>
                                                                        <path
                                                                            d="M391.533,149.333h-17.92c-33.28,0-64.853,14.507-85.333,37.547v-11.947c0-8.533-8.533-17.067-17.067-17.067H185.88     c-7.68,0-17.067,6.827-17.067,16.213v318.293c0,9.387,9.387,15.36,17.067,15.36h93.867c7.68,0,17.067-5.973,17.067-15.36v-184.32     c0-28.16,20.48-50.347,46.933-50.347c13.653,0,26.453,5.12,35.84,14.507c8.533,7.68,11.947,19.627,11.947,34.987v183.467     c0,8.533,8.533,17.067,17.067,17.067h85.333c8.533,0,17.067-8.533,17.067-17.067v-220.16     C511,202.24,458.947,149.333,391.533,149.333z M493.933,489.813l-0.853,0.853h-83.627L408.6,307.2     c0-20.48-5.12-35.84-16.213-46.933c-12.8-12.8-29.867-19.627-47.787-19.627c-35.84,0.853-64,29.867-64,67.413v182.613h-93.867     V174.933h84.48l0.853,0.853v53.76l23.04-23.04l0.853-0.853c17.067-23.893,46.933-39.253,78.507-39.253h17.92     c57.173,0,101.547,46.08,101.547,104.107V489.813z"
                                                                            fill="#000000" data-original="#000000"
                                                                            class="">
                                                                        </path>
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

                                            </div>

                                        </div>

                                        <!---------------------------- ***input separation*** --------------------------->
                                        <!-- <div class="form__input__group-password">
                                            <div class="form__input__group" style="margin-right: 10px; flex: 1;">
                                                <label for="password"
                                                    class="form__input__label">Password<span>*</span></label>
                                                <input id="password" name="password" type="password" class="form__input"
                                                    placeholder="Password">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="form__input__icon">
                                                    <path
                                                        d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                                                    </path>
                                                </svg>
                                            </div>
        
                                            <div style="flex: 1" class="form__input__group">
                                                <label for="repassword" class="form__input__label">Confirm
                                                    Password<span>*</span></label>
                                                <input id="repassword" name="repassword" type="password"
                                                    class="form__input" placeholder="Password">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="form__input__icon">
                                                    <path
                                                        d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4">
                                                    </path>
                                                </svg>
                                            </div>
        
                                        </div> -->

                                        <!---------------------------- ***input separation*** --------------------------->

                                        <input type="hidden" value="<?php echo $user->user_id ?>" name="user_id">

                                        <input style="max-width: 20rem; margin-bottom: 4rem;"
                                            class="primary-btn primary-btn-form" type="submit" value="Save changes">

                                    </form>

                                    <form action="../controllers/userController.php?event=deleteMe" method="POST">
                                        <input type="hidden" value="<?php echo $user->user_id ?>" name="user_id">

                                        <button style="max-width: 18rem;position: absolute; top: 14rem;
                                        left: 16rem;" class="primary-btn primary-btn-form">Delete Account
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <script src="../contents/js/revenue-chart.js"></script>

    <script>
    var loadFile = function(event) {
        var image = document.querySelector('.upload-file__img');
        image.src = URL.createObjectURL(event.target.files[0]);
    };

    var deleteImg = () => {
        var image = document.querySelector('.upload-file__img');
        image.src = '<?php echo '../uploads/' . $user->img_url ?>';
    }
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="../contents/js/formValidator.js"></script>
</body>

</html>