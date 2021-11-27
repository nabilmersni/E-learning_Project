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

    include_once('../controllers/formationC.php');
     
    $formationC = new FormationC();
    $listeFormations = $formationC->afficher_formations();

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
                <a href="./dash_admin-home.html" class="dash__side-bar__item ">
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

                <a href="./dash_admin-users.html" class="dash__side-bar__item">
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

                <a href="./dash_admin-instructors.html" class="dash__side-bar__item ">
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
                    <h1 class="dash__side-bar__item__txt">Courses</h1>
                </a>

                <a href="./dash_admin-profile.html" class="dash__side-bar__item">
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
                    <div class="dash__top-bar__container__left">

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

                        <div class="divider"></div>

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

                    </div>

                    <div class="dash__top-bar__container__right">
                        <h1 class="dash__top-bar__fullname">Nabil Mersni</h1>
                        <div class="dash__top-bar__img-container">
                            <a href="./dash_admin-profile.html">
                                <img class="dash__top-bar__img" src="../contents/img/me.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>


            </nav>

            <div class="dash__content">
                <div class="dash__instructor-my-courses">
                    <h1 style="margin-bottom: 7rem; color: #6568F3; font-size: 3rem;" class="dash__instructor-my-courses__title">Courses List</h1>
                    <?php

                        foreach($listeFormations as $formation){ 
                    ?>
                    <div class="course__card-v2">
                        <div class="course__card-v2__img-container">
                            <img src="formation_code/uploads/<?php echo $formation['image']; ?>" alt="" class="course__card-v2__img">
                        </div>

                        <div class="course__card-v2__content">
                            <h1 class="course__card-v2__title">
                                <?php echo $formation['name']; ?>
                            </h1>

                            <div class="course__card-v2__cate-action">
                                <div class="course__card-v2__category">
                                    <?php echo $formation['categorie']; ?>
                                </div>

                                <div class="course__card-v2__action-btns">
                                    <a href="course-details.php?id=<?php echo $formation['formation_id']; ?>" class="course__card-v2__btn course__card-v2__btn-view">
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

                                    <a href="./formation_code/delete_formation.php?id=<?php echo $formation['formation_id']; ?>" class="course__card-v2__btn course__card-v2__btn-delete">

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

                    <?php       
                        }  
                    ?>

                </div>
            </div>
        </div>
    </div>


    <script src="../contents/js/revenue-chart.js"></script>
</body>

</html>