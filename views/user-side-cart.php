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

    $data = Panier::getAllPaniers($user->user_id);
    $empty = true;
    $totalPrice = 0;
    $formationIDArray = [];

    $paniertStat = Panier::getPanierNumber($user->user_id);
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
        <a href="user-side-courses.php">
            <img src="../contents/img/logo-icon-nobg.png" alt="" class="user-side__top-bar__logo">
        </a>

        <ul class="navigation__list">
            <li class="navigation__item"><a href="./user-side-courses.php"
                    class="navigation__link user-side__top-bar__link">Home</a>
            </li>

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
                <a style="text-decoration: none;" href="#">
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

    <main class="cart">

        <section class="cart__container">
            <div class="cart__header">
                <h2 class="cart__header__title">Cart</h2>
                <lottie-player class="cart__header__ill"
                    src="https://assets1.lottiefiles.com/packages/lf20_sz668bkw.json" background="transparent" speed="1"
                    loop autoplay>
                </lottie-player>
            </div>

            <div class="cart__content">
                <div class="cart__content__left">
                    <div class="cart__content__left__title">item(s)</div>
                    <div class="cart__content__left__item-group">
                        <?php 
                            while($panier = $data->fetchObject()) {
                            $empty = false;
                            $totalPrice += $panier->price;
                            array_push($formationIDArray, $panier->formation_id);
                        ?>

                        <div class="cart__content__left__item">
                            <div class="cart__content__left__item__img-container">
                                <img src="./formation_code/uploads/<?php echo $panier->image ?>" alt=""
                                    class="cart__content__left__item__img">
                            </div>

                            <div class="cart__content__left__item__info">
                                <h2 class="cart__content__left__item__info__title">
                                    <?php echo $panier->name ?>
                                </h2>
                                <h2 class="cart__content__left__item__info__price">$<?php echo $panier->price ?></h2>
                            </div>

                            <div class="cart__content__left__item__info__btn">
                                <form action="../controllers/panierController.php?event=deletePanier" method="POST">

                                    <input type="hidden" name="panier_id" value="<?php echo $panier->panier_id;?>">
                                    <button style="border:none;cursor:pointer;"
                                        class="course__card-v2__btn course__card-v2__btn-delete">
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
                                    </button>
                                </form>

                            </div>
                        </div>

                        <?php } ?>

                        <?php if($empty){?>
                        <div class="empty_alert">
                            There is no item in the cart
                        </div>
                        <?php }?>
                    </div>
                </div>

                <div class="cart__content__divider"></div>

                <div class="cart__content__right">
                    <div class="cart__content__right__customer_details-container">
                        <div class="cart__content__right__customer_details">
                            <h2 class="cart__content__right__customer_details__title">
                                Customer details
                            </h2>
                            <h2 class="cart__content__right__customer_details__fullname">
                                Full name
                            </h2>
                            <h2 class="cart__content__right__customer_details__name">
                                <?php echo $user->fullname ?>
                            </h2>
                            <h2 class="cart__content__right__customer_details__fullname">
                                Phone number
                            </h2>
                            <h2 class="cart__content__right__customer_details__name">
                                <?php echo $user->phone ?>
                            </h2>

                        </div>
                    </div>

                    <div class="cart__pay">
                        <h2 class="cart__pay__title">Payment methods</h2>
                        <div class="cart__pay__group">
                            <div class="cart__pay__item">
                                <img src="../contents/img/visa.png" alt="" class="cart__pay__item__img">
                                <p class="cart__pay__item__name">Visa</p>
                            </div>

                            <div class="cart__pay__item">
                                <img src="../contents/img/visa.png" alt="" class="cart__pay__item__img">
                                <p class="cart__pay__item__name">Visa</p>
                            </div>

                            <div class="cart__pay__item">
                                <img src="../contents/img/visa.png" alt="" class="cart__pay__item__img">
                                <p class="cart__pay__item__name">Visa</p>
                            </div>

                            <div class="cart__pay__item">
                                <img src="../contents/img/visa.png" alt="" class="cart__pay__item__img">
                                <p class="cart__pay__item__name">Visa</p>
                            </div>
                        </div>
                    </div>

                    <div class="cart__total">
                        <h2 class="cart__total__title">Total</h2>
                        <h2 class="cart__total__price">$<?php echo $totalPrice;?></h2>
                    </div>



                    <form action="../controllers/achatController.php?event=addAchat" method="POST">
                        <input type="hidden" value="<?php echo $user->user_id ?>" name="user_id">
                        <?php 
                            foreach ($formationIDArray as $formation_id) {
                        ?>
                        <input type="hidden" value="<?php echo $formation_id ?>" name="formationIDArray[]">
                        <?php } ?>
                        <button style="border-radius: 50rem; text-align: center; width: 20rem; margin-top: 2rem;"
                            class="primary-btn primary-btn-form">Checkout
                        </button>
                    </form>
                </div>
            </div>

        </section>

    </main>


</body>

</html>