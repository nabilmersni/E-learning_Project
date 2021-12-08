<?php

include_once('../controllers/requirementC.php');
include_once('../controllers/outcomeC.php');

$requirementC = new RequirementC();
$listeRequirements = $requirementC->afficher_requirements($_GET['id']);

$outcomeC = new OutcomeC();
$listeOutcomes = $outcomeC->afficher_outcomes($_GET['id']);


?>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../contents/sass/style.css" />
    <link rel="stylesheet" href="../contents/css/chart_style.css" />
    <link rel="stylesheet" href="../contents/css/dash_instructor-courses.css" />


    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
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
            padding-left: 1.7rem;
        }

        .ql-image,
        .ql-video {
            display: none !important;
        }

        .quill-editor-full {
            height: 150px !important;
            color: black;
            border-radius: 0rem
        }


        .button_b2 {
            background-color: #ff8860;
            border-color: #ff8860;
            color: white;
        }

        .button_b2:hover {
            background-color: #ff8860;
            border-color: #ff8860;
            color: white;

        }

        .button_b3:hover {
            background-color: #ff8860;
            border-color: #ff8860;
            color: white;

        }

        .button_b4:hover {
            background-color: #ff8860;
            border-color: #ff8860;
            color: white;

        }

        .button_b5:hover {
            background-color: #ff8860;
            border-color: #ff8860;
            color: white;

        }
    </style>
</head>

<body>

    <div class="dash">
        <div class="dash__side-bar">
            <img class="dash__side-bar__logo" src="../contents/img/logo-icon-nobg.png" alt="logo">

            <div class="dash__side-bar__list">
                <a href="./dash_instructor.php" class="dash__side-bar__item">
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

                <a href="#" class="dash__side-bar__item active">
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

                <a href="#" class="dash__side-bar__item">
                    <div class="dash__side-bar__item__icon">
                        <svg class="dash__side-bar__item__icon-svg" id="dollar-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 45.958 45.958">
                            <g id="Group_27" data-name="Group 27">
                                <path id="Path_1036" data-name="Path 1036" d="M22.979,0A22.979,22.979,0,1,0,45.958,22.979,22.978,22.978,0,0,0,22.979,0ZM24.37,33.215v2.66a.712.712,0,0,1-.739.717H21.858a.722.722,0,0,1-.751-.717V33.449a15.221,15.221,0,0,1-4.524-.9,1.42,1.42,0,0,1-.872-1.679L16,29.748a1.422,1.422,0,0,1,1.89-.972,11.409,11.409,0,0,0,4.086.793c1.906,0,3.211-.736,3.211-2.074,0-1.271-1.07-2.074-3.546-2.911-3.579-1.2-6.03-2.876-6.03-6.121,0-2.943,2.083-5.251,5.644-5.954V10.083a.8.8,0,0,1,.771-.787H23.8a.757.757,0,0,1,.721.787v2.191a13.2,13.2,0,0,1,3.621.6,1.425,1.425,0,0,1,.944,1.7l-.254,1.008A1.419,1.419,0,0,1,27,16.58a10.241,10.241,0,0,0-3.38-.559c-2.174,0-2.877.937-2.877,1.874,0,1.1,1.171,1.806,4.014,2.877,3.98,1.405,5.579,3.245,5.579,6.254C30.33,30,28.227,32.547,24.37,33.215Z" fill="currentColor" />
                            </g>
                        </svg>
                    </div>
                    <h1 class="dash__side-bar__item__txt">My earning</h1>
                </a>

                <a href="#" class="dash__side-bar__item">
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

                        <div class="dash__top-bar__svg-container">
                            <svg class="dash__top-bar__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46.917 46.917">
                                <g id="logout-icon" transform="translate(0 -0.004)">
                                    <path id="Path_1043" data-name="Path 1043" d="M29.323,25.417a1.954,1.954,0,0,0-1.955,1.955v7.82a1.957,1.957,0,0,1-1.955,1.955H19.548V7.823a3.94,3.94,0,0,0-2.662-3.716l-.579-.194h9.106a1.957,1.957,0,0,1,1.955,1.955v5.865a1.955,1.955,0,0,0,3.909,0V5.868A5.872,5.872,0,0,0,25.413,0H4.4a1.535,1.535,0,0,0-.209.043C4.1.039,4.005,0,3.91,0A3.913,3.913,0,0,0,0,3.913V39.1a3.94,3.94,0,0,0,2.662,3.716l11.765,3.922a4.047,4.047,0,0,0,1.212.182,3.913,3.913,0,0,0,3.909-3.91V41.056h5.865a5.872,5.872,0,0,0,5.865-5.865v-7.82a1.954,1.954,0,0,0-1.955-1.955Zm0,0" fill="currentColor" />
                                    <path id="Path_1044" data-name="Path 1044" d="M298.263,115.058l-7.82-7.819a1.954,1.954,0,0,0-3.337,1.382v5.865h-7.819a1.955,1.955,0,1,0,0,3.909h7.819v5.865a1.954,1.954,0,0,0,3.337,1.382l7.82-7.82a1.953,1.953,0,0,0,0-2.764Zm0,0" transform="translate(-251.919 -96.888)" fill="currentColor" />
                                </g>
                            </svg>
                        </div>

                        <div class="divider"></div>

                        <div class="dash__top-bar__svg-container">
                            <svg class="dash__top-bar__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 43.026 34.421">
                                <g id="message-icon" transform="translate(0)">
                                    <path id="Path_1045" data-name="Path 1045" d="M43.921,8.5A5.284,5.284,0,0,0,38.711,4H6.266a5.284,5.284,0,0,0-5.21,4.5L22.489,22.371Z" transform="translate(-0.976 -4)" fill="currentColor" />
                                    <path id="Path_1046" data-name="Path 1046" d="M23.292,22.9a1.434,1.434,0,0,1-1.558,0L1,9.486V30.748a5.3,5.3,0,0,0,5.291,5.291H38.735a5.3,5.3,0,0,0,5.291-5.291V9.485Z" transform="translate(-1 -1.618)" fill="currentColor" />
                                </g>
                            </svg>
                        </div>

                    </div>

                    <div class="dash__top-bar__container__right">
                        <h1 class="dash__top-bar__fullname">Braiek Ali</h1>
                        <div class="dash__top-bar__img-container">
                            <img class="dash__top-bar__img" src="../contents/img/ali.jpg" alt="">
                        </div>
                    </div>
                </div>

                <a href="#" class="secondary-btn secondary-btn-topbar">
                    submit for validation

                    <div class="secondary-btn__svg-container">

                        <svg class="secondary-btn__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52.779 52.779">
                            <path id="add-icon" d="M52.779,26.389A26.389,26.389,0,0,1,0,26.389a2.062,2.062,0,0,1,4.123,0A22.266,22.266,0,1,0,26.389,4.123a2.062,2.062,0,0,1,0-4.123A26.375,26.375,0,0,1,52.779,26.389ZM16.535,6.371l2.667-1.1a2.062,2.062,0,1,0-1.578-3.809l-2.667,1.1a2.062,2.062,0,0,0,1.578,3.809ZM9.625,11.665l2.041-2.041A2.062,2.062,0,0,0,8.75,6.709L6.709,8.75a2.062,2.062,0,0,0,2.916,2.916ZM2.572,20.318A2.062,2.062,0,0,0,5.266,19.2l1.1-2.667a2.062,2.062,0,0,0-3.809-1.578l-1.1,2.667A2.062,2.062,0,0,0,2.572,20.318Zm23.817-4.237a2.062,2.062,0,0,0-2.062,2.062v6.185H18.143a2.062,2.062,0,0,0,0,4.123h6.185v6.185a2.062,2.062,0,0,0,4.123,0V28.451h6.185a2.062,2.062,0,0,0,0-4.123H28.451V18.143A2.062,2.062,0,0,0,26.389,16.081Z" fill="currentColor" />
                        </svg>

                    </div>
                </a>

            </nav>

            <div class="dash__content">
                <div class="dash__instructor-my-courses">
                    <!-- <h1 class="dash__instructor-my-courses__title">Course</h1>  -->


                    <div class="button_group">
                        <div>

                            <a class="button_b1 " href="dash_instructor-course-update.php?id=<?php echo $_GET['id']; ?>" id="button_b1_req">
                                <i class="fas fa-pen-nib" style="padding-right:0.5rem">
                                </i>
                                Basics
                            </a>
                        </div>

                        <button class="button_b2 " id="button_b2_req">
                            <i class="far fa-bell-exclamation" style="padding-right:0.5rem"></i>
                            Requirements</button>
                        <button class="button_b3 " id="button_b3_req">
                            <i class="fas fa-arrows-alt" style="padding-right:0.5rem"></i>
                            Outcomes</button>
                        <!--    <button class="button_b4 ">
                        <i class="fas fa-yen-sign" style="padding-right:0.5rem"></i>
                        Pricing</button>  -->
                        <button class="button_b5 " id="button_b5_req">
                            <i class="fal fa-check-circle" style="padding-right:0.5rem"></i>
                            Finish</button>
                    </div>





                    <!------------------------------------requirement------------------------->
                    <div class="public_information" id="requirement_id">
                        <!-- part1------------- -->
                        <div class="course__add">

                            <div class="course__add-v1">
                                <h1 class="course__add-v1__info">
                                    Course requirements
                                </h1>
                                <button id="popup_id" class="popup" onmouseenter="myFunction()" onmouseleave="myFunction()" style="background-color: transparent; border-color: transparent;">
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

                                    <span class="popuptext" id="myPopup" style="font-size: 1rem;">click here for more
                                        information.</span>

                                </button>
                            </div>


                            <!--*********************************************Add new Requirement******************************************************-->

                            <?php
                            foreach ($listeRequirements as $req) {
                            ?>
                                <div class="req_align">
                                    <div class="req_added">
                                        <?php echo $req['req_content']; ?>
                                    </div>
                                    <!--delete btn-->
                                    <a class="delete_req_btn " href="formation_code/delete_requirement.php?id=<?php echo $_GET['id']; ?>&req_id=<?php echo $req['req_id']; ?>">
                                        <i class="fas fa-minus fa-lg" style="padding-right:0.5rem"></i>
                                        <!--delete btn-->

                                        <!--update btn-->
                                        <a class="update_req_btn " href="update_requirement.php?id=<?php echo $_GET['id']; ?>&req_id=<?php echo $req['req_id']; ?>">
                                            <i class="fas fa-edit fa-lg" style="padding-right:0.5rem; "></i>
                                            <!--update btn-->
                                        </a>

                                </div>
                            <?php
                            }
                            ?>


                            <button class="add_new_requirement_btn" id="add_new_req_btn">
                                Add New Requirement
                            </button>



                            <!--show add new requirement-->
                            <div id="show_add_new_req" style="display:none">
                                <div class="add_new_req">



                                    <div class="add_new_req_v1">
                                        <div class="add_lesson_header">
                                            <div class="add_new_lesson_v1_title">Add a requirement</div>
                                            <div id="x_button_req" class="x_botton_lesson">
                                                <svg id="x_button_x_lesson" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#4a5bcf">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                                </svg>

                                            </div>

                                        </div>



                                        <hr class="hr-border" style="position: relative; bottom: 10px; ">
                                        <div class="dash__content" style="position: relative;bottom: 100px;">

                                            <form action="formation_code/add_requirement.php?id=<?php echo $_GET['id']; ?>" method="POST">
                                                <div class="dash__instructor-my-courses">
                                                    <div class="add_new_lesson-v1__item">
                                                        <h4>Requirement</h4>
                                                    </div>

                                                    <div>
                                                        <input class="add_new_lesson-v1__input-border" name="req_content" placeholder="My course requirement">
                                                    </div>


                                                </div>

                                                <input class="save-btn save-btn-topbar" type="submit" style="position:relative;bottom:10rem;" value="Save">

                                        </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <!--show add new requirement-->





                        </div>
                        <!--course add end-->
                        <div class="course_information" hidden>
                            <p>
                            <div class="info_title_v1">
                                <div style="padding-right: 0.5rem; position: relative; right: 0.5rem; bottom: 0.6rem;">
                                    <svg class="w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="rgba(255, 115, 68, 0.85)">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                        </path>
                                    </svg>
                                </div>
                                <h2 class="info_title">Public course information</h2>
                            </div>

                            <ul>
                                <li class="info_description">Here you can set the title and description of your course.</li>
                                <li class="info_description">Select a category for your course (Choose the closest category).</li>
                                <li class="info_description">Set the price of your course (in USD, EUR and TND).
                                </li>
                                <li class="info_description">The course photo must be 1920x1080 and not use any text.</li>
                            </ul>

                            </p>

                        </div>


                    </div>
                    <!------------------------------------requirement end------------------------->

                    <!------------------------------------Outcomes------------------------->
                    <div class="public_information" id="outcomes_id" style="display:none;">
                        <!-- part1------------- -->
                        <div class="course__add">

                            <div class="course__add-v1">
                                <h1 class="course__add-v1__info">
                                    Course Outcomes
                                </h1>
                                <button id="popup_id" class="popup" onmouseenter="myFunction()" onmouseleave="myFunction()" style="background-color: transparent; border-color: transparent;">
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

                                    <span class="popuptext" id="myPopup" style="font-size: 1rem;">click here for more
                                        information.</span>

                                </button>
                            </div>


                            <!--*********************************************Add new outcomes******************************************************-->

                            <?php
                            foreach ($listeOutcomes as $out) {
                            ?>
                                <div class="req_align">
                                    <div class="req_added">
                                        <?php echo $out['out_content']; ?>
                                    </div>
                                    <!--delete btn-->
                                    <a class="delete_req_btn " href="formation_code/delete_outcome.php?id=<?php echo $_GET['id']; ?>&out_id=<?php echo $out['out_id']; ?>">
                                        <i class="fas fa-minus fa-lg" style="padding-right:0.5rem"></i>
                                        <!--delete btn-->

                                        <!--update btn-->
                                        <a class="update_req_btn " href="update_outcome.php?id=<?php echo $_GET['id']; ?>&out_id=<?php echo $out['out_id']; ?>">
                                            <i class="fas fa-edit fa-lg" style="padding-right:0.5rem; "></i>
                                            <!--update btn-->
                                        </a>

                                </div>
                            <?php
                            }
                            ?>


                            <button class="add_new_requirement_btn" id="add_new_out_btn">
                                Add New Outcome
                            </button>
                            <form method="POST" action="formation_code/add_requirement.php" id="add_requirement">


                            </form>



                            <!--show add new requirement-->
                            <div id="show_add_new_out" style="display:none">
                                <div class="add_new_req">



                                    <div class="add_new_req_v1">
                                        <div class="add_lesson_header">
                                            <div class="add_new_lesson_v1_title">Add a requirement</div>
                                            <div id="x_button_out" class="x_botton_lesson">
                                                <svg id="x_button_x_lesson" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="#4a5bcf">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                                </svg>

                                            </div>

                                        </div>



                                        <hr class="hr-border" style="position: relative; bottom: 10px; ">
                                        <div class="dash__content" style="position: relative;bottom: 100px;">

                                            <form action="formation_code/add_outcome.php?id=<?php echo $_GET['id']; ?>" method="POST">
                                                <div class="dash__instructor-my-courses">
                                                    <div class="add_new_lesson-v1__item">
                                                        <h4>Outcome</h4>
                                                    </div>

                                                    <div>
                                                        <input class="add_new_lesson-v1__input-border" name="out_content" placeholder="Outcomes">
                                                    </div>


                                                </div>

                                                <input class="save-btn save-btn-topbar" type="submit" style="position:relative;bottom:10rem;" value="Save">

                                        </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <!--show add new requirement-->



                        </div>
                        <!--course add end-->
                        <div class="course_information" hidden>
                            <p>
                            <div class="info_title_v1">
                                <div style="padding-right: 0.5rem; position: relative; right: 0.5rem; bottom: 0.6rem;">
                                    <svg class="w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="rgba(255, 115, 68, 0.85)">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z">
                                        </path>
                                    </svg>
                                </div>
                                <h2 class="info_title">Public course information</h2>
                            </div>

                            <ul>
                                <li class="info_description">Here you can set the title and description of your course.</li>
                                <li class="info_description">Select a category for your course (Choose the closest category).</li>
                                <li class="info_description">Set the price of your course (in USD, EUR and TND).
                                </li>
                                <li class="info_description">The course photo must be 1920x1080 and not use any text.</li>
                            </ul>

                            </p>

                        </div>


                    </div>
                    <!------------------------------------Outcomes end------------------------->


                    <!------------------------------------Finish------------------------->
                    <div class="public_information" id="finish_id" style="display:none;">
                        <!-- part1------------- -->
                        <div class="course__add">
                            <div style="padding:2rem">
                                <div class="finish_icon">
                                    <i class="fal fa-check-double fa-3x"></i>
                                </div>

                                <div class="finish_l1">Thank you !</div>
                                <div class="finish_l2">You are just one click away</div>
                                <div class="finish_btn" style="padding-bottom: 1rem;">
                                    <a class="finish_btn-v1" href="./dash_instructor-chapter-add.php?id=<?php echo $_GET['id']; ?>">Submit</a>
                                </div>



                            </div>
                        </div>
                        <!--course add end-->


                    </div>
                    <!------------------------------------finish end------------------------->
                    <!--end part 1 add formation -->
                    <!--end part 1 add formation -->
                    <!--end part 1 add formation -->


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
        $(function() {
            $("#course_file_upload").change(function(event) {
                var x = URL.createObjectURL(event.target.files[0]);
                $("#course_file_img").attr("src", x);
                console.log(event);
            });
        })
    </script>

    <script>
        $(document).ready(function() {
            $("#add_new_req_btn").click(function() {
                $("#show_add_new_req").show(300)

            });

        });

        $(document).ready(function() {
            $("#x_button_req").click(function() {
                $("#show_add_new_req").hide(300)

            });

        });



        $(document).ready(function() {
            $("#add_new_out_btn").click(function() {
                $("#show_add_new_out").show(300)

            });

        });

        $(document).ready(function() {
            $("#x_button_out").click(function() {
                $("#show_add_new_out").hide(300)

            });

        });
    </script>
    <script>
        var $add_formation = $('#add_formation');
        if ($add_formation.length) {
            $add_formation.validate({
                rules: {
                    course_title: {
                        required: true
                    },
                    short_description: {
                        required: true
                    },
                    course_description: {
                        required: true
                    },
                    course_categorie: {
                        required: true
                    },
                    course_level: {
                        required: true
                    },
                    course_price: {
                        required: true
                    },
                    course_image: {
                        required: true
                    }
                },
                messages: {
                    course_title: {
                        //error message for the required field
                        required: '*Please enter the course title!'
                    },
                    short_description: {
                        required: '*Please enter the short description!'
                    },
                    course_description: {
                        required: '*Please enter the course description!'
                    },
                    course_categorie: {
                        required: '*Please choose a category for your course!'
                    },
                    course_level: {
                        required: '*Please select a level!'
                    },
                    course_price: {
                        required: '*Please enter the course price!'
                    },
                    course_image: {
                        required: '*Please choose a photo for your course!'
                    }
                }
            });
        }
    </script>

    <!--hide/show req/outc---->
    .button_b2 {
    background-color: #ff8860;
    border-color: #ff8860;
    color: white;
    }
    
    <!-- include_oncethe Quill library -->
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var quill = new Quill('#editor', {
            modules: {
                toolbar: [
                    [{
                        'font': []
                    }],
                    [{
                        'size': ['small', false, 'large', 'huge']
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    ['blockquote', 'code-block'],
                    [{
                        'header': 1
                    }, {
                        'header': 2
                    }],
                    [{
                        'list': 'ordered'
                    }, {
                        list: 'bullet'
                    }],
                    [{
                        'script': 'sub'
                    }, {
                        script: 'super'
                    }],
                    [{
                        'indent': '-1'
                    }, {
                        indent: '+1'
                    }],
                    [{
                        'direction': 'rtl'
                    }],
                    [{
                        'align': []
                    }],
                ]
            },
            placeholder: 'Compose an epic...',
            theme: 'snow'
        });

        $("#add_formation").submit(function() {
            $("#hiddenArea").val(JSON.stringify(quill.getContents()));
            consolole.log("#hiddenArea");
        });
    </script>







    <!-- Template Main JS File -->
    <script src="../contents/assets/js/main.js"></script>
</body>

</html>