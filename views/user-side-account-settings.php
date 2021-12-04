<?php 
    require_once "../models/user.php";
    require_once "../models/panier.php";

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

    $paniertStat = Panier::getPanierNumber($user->user_id);


    require_once "../models/notification.php";

    if($user->role == 'admin'){
        $notifCount = Notification::getNotifAdminNumber()->total;
        $notifications = Notification::getAllNotifAdmin();
    }else{
        $notifCount = Notification::getNotifUserNumber($user->user_id)->total;
        $notifications = Notification::getAllNotifUser($user->user_id);
    }

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
    <title>I learn</title>
</head>

<body class="all-course-body">
    <nav class="dash__top-bar user-side__top-bar">
        <a href="#">
            <img src="../contents/img/logo-icon-nobg.png" alt="" class="user-side__top-bar__logo">
        </a>

        <ul class="navigation__list">
            <li class="navigation__item"><a href="./user-side-courses.php"
                    class="navigation__link user-side__top-bar__link">Home</a></li>
            <li class="navigation__item"><a href="#" class="navigation__link user-side__top-bar__link">Account
                    settings</a>
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
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" x="0"
                                y="0" viewBox="0 0 48 48" style="enable-background:new 0 0 512 512"
                                xml:space="preserve">
                                <g>
                                    <g xmlns="http://www.w3.org/2000/svg" id="Line">
                                        <path
                                            d="m24 2a15 15 0 0 0 -15 15v11.7l-3.32 5a4.08 4.08 0 0 0 3.39 6.3h29.86a4.08 4.08 0 0 0 3.39-6.33l-3.32-4.97v-11.7a15 15 0 0 0 -15-15z"
                                            fill="currentColor" data-original="currentColor"></path>
                                        <path d="m24 46a6 6 0 0 0 5.65-4h-11.3a6 6 0 0 0 5.65 4z" fill="currentColor"
                                            data-original="currentColor"></path>
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
                                    <svg class="notify_read_icon" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                        x="0" y="0" viewBox="0 0 32 32" style="enable-background:new 0 0 512 512"
                                        xml:space="preserve">
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

                <div class="divider"></div>

                <?php 
                    if($user->role == 'student'){
                ?>
                <a style="text-decoration: none;" href="./user-side-cart.php">
                    <div style="margin-top: .3rem;" class="dash__top-bar__svg-container cart-icon">
                        <span class="cart-icon__span"><?php echo $paniertStat->total; ?> </span>
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
                <h1 class="dash__top-bar__fullname"><?php echo $user->fullname ?></h1>
                <div class="dash__top-bar__img-container">
                    <a href="./user-side-profile-info.php">
                        <img class="dash__top-bar__img" src="<?php echo '../uploads/' . $user->img_url ?>" alt="">
                    </a>
                </div>
            </div>
        </div>


    </nav>

    <main class="all-courses">

        <div class="dash__instructor-home">

            <div class="update-profile-container">
                <div class="update-profile">
                    <div class="update-profile__header">
                        <h2 class="update-profile__header__title">Update your profile</h2>
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

                                            <input name="profileImg" onchange="loadFile(event)" id="file" type="file"
                                                accept="image/jpeg, image/png"
                                                style="visibility: hidden;width:0px;height:0px">

                                        </div>
                                    </div>
                                </div>

                                <div style="margin-top: 5rem;" class="form__input__group">
                                    <label for="about" class="form__input__label">About Me</label>
                                    <textarea style="padding: 1rem 2rem; height: auto;" class="form__input" name="about"
                                        id="about" cols="20" rows="5"
                                        placeholder="Write here..."><?php echo $user->about_me ?></textarea>
                                </div>

                                <div class="form__input__divider">
                                    <div class="form__input__left-side">

                                        <div class="form__input__group">
                                            <label for="fullname"
                                                class="form__input__label">Fullname<span>*</span></label>
                                            <input id="fullname" name="fullname" type="text" class="form__input"
                                                placeholder="Fullname" value="<?php echo $user->fullname ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="form__input__icon">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </div>

                                        <!---------------------------- ***input separation*** --------------------------->

                                        <div class="form__input__group">
                                            <label for="email" class="form__input__label">Email<span>*</span></label>
                                            <input id="email" name="email" type="email" class="form__input"
                                                placeholder="Email" value="<?php echo $user->email ?>">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="form__input__icon">
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
                                                value="<?php echo $user->fb_link ?>">

                                            <svg class="form__input__icon" xmlns="http://www.w3.org/2000/svg"
                                                version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 24 24"
                                                style="enable-background:new 0 0 512 512" xml:space="preserve"
                                                stroke-width="0">
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
                                                placeholder="Username" value="<?php echo $user->username ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="form__input__icon">
                                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                        </div>

                                        <!---------------------------- ***input separation*** --------------------------->

                                        <div class="form__input__group">
                                            <label for="phone" class="form__input__label">Phone
                                                Number<span>*</span></label>
                                            <input id="phone" name="phone" type="number" class="form__input"
                                                placeholder="Phone Number" value="<?php echo $user->phone ?>">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" class="form__input__icon">
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
                                                value="<?php echo $user->linkedin_link ?>">

                                            <svg class="form__input__icon" xmlns="http://www.w3.org/2000/svg"
                                                version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                                xmlns:svgjs="http://svgjs.com/svgjs" x="0" y="0" viewBox="0 0 512 512"
                                                style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                                <g>
                                                    <g xmlns="http://www.w3.org/2000/svg" transform="translate(1)">
                                                        <g>
                                                            <g>
                                                                <path
                                                                    d="M68.12,4.267c-18.773,0-35.84,6.827-48.64,19.627C5.827,37.547-1,54.613-1,72.533c0,18.773,7.68,35.84,20.48,48.64     c12.8,12.8,30.72,20.48,47.787,19.627c0,0,0.853,0,1.707,0c17.067,0,33.28-6.827,46.08-19.627     c12.8-12.8,20.48-29.867,20.48-48.64c0.853-17.92-6.827-34.987-19.627-47.787C103.107,11.093,86.04,4.267,68.12,4.267z      M103.107,109.227c-9.387,9.387-22.187,15.36-35.84,14.507c-12.8,0-26.453-5.12-35.84-14.507     c-10.24-9.387-15.36-23.04-15.36-36.693s5.12-26.453,15.36-36.693c9.387-9.387,22.187-14.507,36.693-14.507     c12.8,0,25.6,5.12,34.987,14.507c10.24,10.24,15.36,23.04,15.36,36.693S113.347,99.84,103.107,109.227z"
                                                                    fill="#000000" data-original="#000000" class="">
                                                                </path>
                                                                <path
                                                                    d="M101.4,157.867H32.28c-13.653,0-24.747,11.093-24.747,25.6v298.667c0,13.653,11.947,25.6,25.6,25.6H101.4     c13.653,0,25.6-11.947,25.6-24.747v-299.52C127,169.813,115.053,157.867,101.4,157.867z M109.933,482.987     c0,4.267-4.267,7.68-8.533,7.68H33.133c-4.267,0-8.533-4.267-8.533-8.533V183.467c0-4.267,3.413-8.533,7.68-8.533h69.12     c4.267,0,8.533,4.267,8.533,8.533V482.987z"
                                                                    fill="#000000" data-original="#000000" class="">
                                                                </path>
                                                                <path
                                                                    d="M391.533,149.333h-17.92c-33.28,0-64.853,14.507-85.333,37.547v-11.947c0-8.533-8.533-17.067-17.067-17.067H185.88     c-7.68,0-17.067,6.827-17.067,16.213v318.293c0,9.387,9.387,15.36,17.067,15.36h93.867c7.68,0,17.067-5.973,17.067-15.36v-184.32     c0-28.16,20.48-50.347,46.933-50.347c13.653,0,26.453,5.12,35.84,14.507c8.533,7.68,11.947,19.627,11.947,34.987v183.467     c0,8.533,8.533,17.067,17.067,17.067h85.333c8.533,0,17.067-8.533,17.067-17.067v-220.16     C511,202.24,458.947,149.333,391.533,149.333z M493.933,489.813l-0.853,0.853h-83.627L408.6,307.2     c0-20.48-5.12-35.84-16.213-46.933c-12.8-12.8-29.867-19.627-47.787-19.627c-35.84,0.853-64,29.867-64,67.413v182.613h-93.867     V174.933h84.48l0.853,0.853v53.76l23.04-23.04l0.853-0.853c17.067-23.893,46.933-39.253,78.507-39.253h17.92     c57.173,0,101.547,46.08,101.547,104.107V489.813z"
                                                                    fill="#000000" data-original="#000000" class="">
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


                                <!---------------------------- ***input separation*** --------------------------->



                                <input type="hidden" value="<?php echo $user->user_id ?>" name="user_id">

                                <!-- <a href="#" class="primary-btn primary-btn-form">Sign Up</a> -->
                                <input style="max-width: 20rem; margin-bottom: 4rem;"
                                    class="primary-btn primary-btn-form" type="submit" value="Save changes">

                            </form>
                            <form action="../controllers/userController.php?event=deleteMe" method="POST">
                                <input type="hidden" value="<?php echo $user->user_id ?>" name="user_id">

                                <button style="max-width: 18rem;position: absolute; top: 14rem;
                                        left: 19rem;" class="primary-btn primary-btn-form">Delete Account
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>


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