<?php 
    require_once "../models/user.php";

    session_start();
    if (isset($_SESSION['user'])){
        $_SESSION['user'] = User::getOneUser($_SESSION['user']->user_id);
        $user = $_SESSION['user'];
        if($user->role == 'instructor' && $user->cv_status == 0){
            header('location:../views/dash_instructor-uploadCV.php');
        }
        if($user->status == 0){
            session_unset();
            session_destroy();
            header('location:../views/login.php?accountDisbaled=true');
        }
    }else {
        header('location:../views/login.php?auth=false');
    }

?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../contents/sass/style.css" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="icon" href="../contents/img/logo-icon-nobg.png">
    <title>I learn</title>
</head>

<body class="all-course-body">
    <nav class="dash__top-bar user-side__top-bar">
        <a href="#">
            <img src="../contents/img/logo-icon-nobg.png" alt="" class="user-side__top-bar__logo">
        </a>

        <ul class="navigation__list">
            <li class="navigation__item"><a href="#" class="navigation__link user-side__top-bar__link">Home</a></li>
            <!-- <form action="./user-side-account-settings.php" method="POST">
                <li class="navigation__item">
                    <button
                        style="border:none; background-color:transparent;font-family:inherit;font-weight:inherit;cursor:pointer;"
                        class="navigation__link user-side__top-bar__link">Account
                        settings
                    </button>
                    <input type="hidden" name="user_id" value=" <?php //echo $user->user_id ?>">
                </li>
            </form> -->

            <li class="navigation__item">
                <a href="./user-side-account-settings.php" class="navigation__link user-side__top-bar__link">Account
                    settings
                </a>
                <input type="hidden" name="user_id" value=" <?php echo $user->user_id ?>">
            </li>
            <li class="navigation__item"><a href="./user-side-profile-info.php"
                    class="navigation__link user-side__top-bar__link">View profile</a>
            </li>

            <?php 
                    if($user->role != 'student'){
            ?>
            <li class="navigation__item"><a href="./login.php"
                    class="navigation__link user-side__top-bar__link">Dashboard</a>
            </li>
            <?php }?>

        </ul>

        <div class="dash__top-bar__container">
            <div class="dash__top-bar__container__left">

                <a href="../controllers/userController.php?event=logout">
                    <div class="dash__top-bar__svg-container">
                        <svg class="dash__top-bar__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46.917 46.917">
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
                        <svg class="dash__top-bar__svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 43.026 34.421">
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

                <div class="divider"></div>

                <?php 
                    if($user->role == 'student'){
                ?>
                <a href="#">
                    <div style="margin-top: .3rem;" class="dash__top-bar__svg-container">

                        <svg class="dash__top-bar__svg" xmlns="http://www.w3.org/2000/svg" version="1.1"
                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0"
                            viewBox="0 0 512.00033 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <g>
                                <path xmlns="http://www.w3.org/2000/svg"
                                    d="m166 300.003906h271.003906c6.710938 0 12.597656-4.4375 14.414063-10.882812l60.003906-210.003906c1.289063-4.527344.40625-9.390626-2.433594-13.152344-2.84375-3.75-7.265625-5.964844-11.984375-5.964844h-365.632812l-10.722656-48.25c-1.523438-6.871094-7.617188-11.75-14.648438-11.75h-91c-8.289062 0-15 6.710938-15 15 0 8.292969 6.710938 15 15 15h78.960938l54.167968 243.75c-15.9375 6.929688-27.128906 22.792969-27.128906 41.253906 0 24.8125 20.1875 45 45 45h271.003906c8.292969 0 15-6.707031 15-15 0-8.289062-6.707031-15-15-15h-271.003906c-8.261719 0-15-6.722656-15-15s6.738281-15 15-15zm0 0"
                                    fill="currentColor" data-original="#000000"></path>
                                <path xmlns="http://www.w3.org/2000/svg"
                                    d="m151 405.003906c0 24.816406 20.1875 45 45.003906 45 24.8125 0 45-20.183594 45-45 0-24.8125-20.1875-45-45-45-24.816406 0-45.003906 20.1875-45.003906 45zm0 0"
                                    fill="currentColor" data-original="#000000"></path>
                                <path xmlns="http://www.w3.org/2000/svg"
                                    d="m362.003906 405.003906c0 24.816406 20.1875 45 45 45 24.816406 0 45-20.183594 45-45 0-24.8125-20.183594-45-45-45-24.8125 0-45 20.1875-45 45zm0 0"
                                    fill="currentColor" data-original="#000000"></path>
                            </g>
                        </svg>
                    </div>
                </a>
                <?php }?>
            </div>

            <div class="dash__top-bar__container__right">
                <h1 class="dash__top-bar__fullname"> <?php echo $user->fullname ?> </h1>
                <div class="dash__top-bar__img-container">
                    <a href="./user-side-profile-info.php">
                        <img class="dash__top-bar__img" src="<?php echo '../uploads/' . $user->img_url ?>" alt="">
                    </a>
                </div>
            </div>
        </div>

        <!-- <a href="#" class="secondary-btn">
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

    <main class="all-courses">
        <h1 class="all-courses__title">Browse All Courses</h1>

        <section class="all-courses__container">
            <div class="all-courses__categorie__container">
                <h1 class="all-courses__categorie__title">Category</h1>
                <div class="all-courses__categorie__list">
                    <a href="#" class="all-courses__categorie__item all-courses__categorie__item-active">All courses</a>
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

                    <a style="text-decoration: none;" href="./user-side-course-detail.php">
                        <div class="course__card-v3">
                            <div class="course__card-v3__thumbnail-container">
                                <img src="../contents/img/course-cover.jpg" alt="course img"
                                    class="course__card-v3__thumbnail">
                            </div>

                            <div class="course__card-v3__category-price">
                                <p class="course__card-v3__category">Development</p>
                                <p class="course__card-v3__price">$235</p>
                            </div>

                            <h1 class="course__card-v3__title">The Complete JavaScript Course 2021:
                                From Zero to Expert!
                            </h1>

                            <p class="course__card-v3__instructor-name">Jonas Schmedtmann</p>

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

                    <a style="text-decoration: none;" href="./user-side-course-detail.php">
                        <div class="course__card-v3">
                            <div class="course__card-v3__thumbnail-container">
                                <img src="../contents/img/course-cover.jpg" alt="course img"
                                    class="course__card-v3__thumbnail">
                            </div>

                            <div class="course__card-v3__category-price">
                                <p class="course__card-v3__category">Development</p>
                                <p class="course__card-v3__price">$235</p>
                            </div>

                            <h1 class="course__card-v3__title">The Complete JavaScript Course 2021:
                                From Zero to Expert!
                            </h1>

                            <p class="course__card-v3__instructor-name">Jonas Schmedtmann</p>

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

                    <a style="text-decoration: none;" href="./user-side-course-detail.php">
                        <div class="course__card-v3">
                            <div class="course__card-v3__thumbnail-container">
                                <img src="../contents/img/course-cover.jpg" alt="course img"
                                    class="course__card-v3__thumbnail">
                            </div>

                            <div class="course__card-v3__category-price">
                                <p class="course__card-v3__category">Development</p>
                                <p class="course__card-v3__price">$235</p>
                            </div>

                            <h1 class="course__card-v3__title">The Complete JavaScript Course 2021:
                                From Zero to Expert!
                            </h1>

                            <p class="course__card-v3__instructor-name">Jonas Schmedtmann</p>

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

                    <a style="text-decoration: none;" href="./user-side-course-detail.php">
                        <div class="course__card-v3">
                            <div class="course__card-v3__thumbnail-container">
                                <img src="../contents/img/course-cover.jpg" alt="course img"
                                    class="course__card-v3__thumbnail">
                            </div>

                            <div class="course__card-v3__category-price">
                                <p class="course__card-v3__category">Development</p>
                                <p class="course__card-v3__price">$235</p>
                            </div>

                            <h1 class="course__card-v3__title">The Complete JavaScript Course 2021:
                                From Zero to Expert!
                            </h1>

                            <p class="course__card-v3__instructor-name">Jonas Schmedtmann</p>

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

                    <a style="text-decoration: none;" href="./user-side-course-detail.php">
                        <div class="course__card-v3">
                            <div class="course__card-v3__thumbnail-container">
                                <img src="../contents/img/course-cover.jpg" alt="course img"
                                    class="course__card-v3__thumbnail">
                            </div>

                            <div class="course__card-v3__category-price">
                                <p class="course__card-v3__category">Development</p>
                                <p class="course__card-v3__price">$235</p>
                            </div>

                            <h1 class="course__card-v3__title">The Complete JavaScript Course 2021:
                                From Zero to Expert!
                            </h1>

                            <p class="course__card-v3__instructor-name">Jonas Schmedtmann</p>

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

                    <a style="text-decoration: none;" href="./user-side-course-detail.php">
                        <div class="course__card-v3">
                            <div class="course__card-v3__thumbnail-container">
                                <img src="../contents/img/course-cover.jpg" alt="course img"
                                    class="course__card-v3__thumbnail">
                            </div>

                            <div class="course__card-v3__category-price">
                                <p class="course__card-v3__category">Development</p>
                                <p class="course__card-v3__price">$235</p>
                            </div>

                            <h1 class="course__card-v3__title">The Complete JavaScript Course 2021:
                                From Zero to Expert!
                            </h1>

                            <p class="course__card-v3__instructor-name">Jonas Schmedtmann</p>

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

                    <a style="text-decoration: none;" href="./user-side-course-detail.php">
                        <div class="course__card-v3">
                            <div class="course__card-v3__thumbnail-container">
                                <img src="../contents/img/course-cover.jpg" alt="course img"
                                    class="course__card-v3__thumbnail">
                            </div>

                            <div class="course__card-v3__category-price">
                                <p class="course__card-v3__category">Development</p>
                                <p class="course__card-v3__price">$235</p>
                            </div>

                            <h1 class="course__card-v3__title">The Complete JavaScript Course 2021:
                                From Zero to Expert!
                            </h1>

                            <p class="course__card-v3__instructor-name">Jonas Schmedtmann</p>

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

                    <a style="text-decoration: none;" href="./user-side-course-detail.php">
                        <div class="course__card-v3">
                            <div class="course__card-v3__thumbnail-container">
                                <img src="../contents/img/course-cover.jpg" alt="course img"
                                    class="course__card-v3__thumbnail">
                            </div>

                            <div class="course__card-v3__category-price">
                                <p class="course__card-v3__category">Development</p>
                                <p class="course__card-v3__price">$235</p>
                            </div>

                            <h1 class="course__card-v3__title">The Complete JavaScript Course 2021:
                                From Zero to Expert!
                            </h1>

                            <p class="course__card-v3__instructor-name">Jonas Schmedtmann</p>

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


                </div>
                <!-- <div class="courses-btn">
                    <a href="#" class="primary-btn">View All Course</a>
                </div> -->
            </div>

        </section>



    </main>


</body>

</html>