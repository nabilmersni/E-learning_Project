<?php 
    session_start();
    if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
        $user = $_SESSION['user'];
        if($user->role == 'student'){
            header('location:./views/user-side-courses.php');
        }elseif($user->role == 'admin'){
            header('location:./views/dash_admin-home.php');
        }elseif($user->role == 'instructor'){
            header('location:./views/dash_instructor.php');
        }
    }

?>


<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./contents/sass/style.css" />
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="icon" href="./contents/img/logo-icon-nobg.png">
    <title>I learn</title>
</head>

<body>
    <div class="navigation">
        <nav class="navigation__nav">
            <a href="#"><img class="navigation__logo" src="./contents/img/logo-txt-nobg.png" alt="platform-logo"></a>

            <ul class="navigation__list">
                <li class="navigation__item"><a href="#home" class="navigation__link">Home</a></li>
                <li class="navigation__item"><a href="#course" class="navigation__link">Course</a></li>
                <li class="navigation__item"><a href="#about" class="navigation__link">About</a></li>
                <li class="navigation__item"><a href="#instructor" class="navigation__link">Instructor</a></li>
                <li class="navigation__item"><a href="./views/login.php" class="navigation__link">Login</a></li>
                <div class="navigation__btn">
                    <a href="./views/signUp.php" class="primary-btn primary-btn-nav">Sign up</a>
                </div>
            </ul>
        </nav>
    </div>

    <header id="home" class="header">
        <img src="./contents/img/header-elipse.png" alt="" class="animated-elipse-1" />
        <img src="./contents/img/header-elipse.png" alt="" class="animated-elipse-2" />
        <img src="./contents/img/js.png" alt="" class="js-logo">
        <img src="./contents/img/java.png" alt="" class="java-logo">
        <img src="./contents/img/python.png" alt="" class="py-logo">
        <img src="./contents/img/design.png" alt="" class="design-logo">

        <div class="social-media">
            <a target="_blank" href="https://www.facebook.com/"><img src="./contents/img/fb.png" alt=""
                    class="social-media__logo"></a>

            <a target="_blank" href="https://twitter.com/"><img src="./contents/img/twitter.png" alt=""
                    class="social-media__logo"></a>

            <a target="_blank" href="https://www.instagram.com/"><img src="./contents/img/insta.png" alt=""
                    class="social-media__logo"></a>
        </div>

        <div class="header__content">
            <div class="header__content--box">
                <h1 class="header-heading">Start Your Learning <span>Now!!</span></h1>
                <br />
                <a class="primary-btn margin-top-s" href="./views/signUp.php">Join For Free</a>
            </div>
        </div>

        <div class="header__illustration">
            <lottie-player class="header__illustration__lottie-player"
                src="https://assets1.lottiefiles.com/packages/lf20_wxblkeyv.json" background="transparent" speed="1"
                loop autoplay></lottie-player>
        </div>

        <div class="scroll-down">
            <lottie-player class="scroll-down__player" src="https://assets7.lottiefiles.com/packages/lf20_tkczpnur.json"
                background="transparent" speed="1" loop autoplay></lottie-player>
        </div>
    </header>

    <main>
        <section class="courses">

            <img src="./contents/img/courses-elipse.png" alt="" class="animated-elipse-3" />
            <img src="./contents/img/courses-elipse.png" alt="" class="animated-elipse-4" />

            <div class="courses__shape1"></div>
            <div id="course" class="featured-box">
                <div class="featured__item">
                    <img src="./contents/img/video-icon.png" alt="icon" class="featured__item__icon">
                    <p class="featured__item__txt">1000+ Online Course1000+ Online Course</p>
                </div>

                <div class="featured__item">
                    <img src="./contents/img/hat-icon.png" alt="icon" class="featured__item__icon">
                    <p class="featured__item__txt">Expert Instruction</p>
                </div>

                <div class="featured__item">
                    <img src="./contents/img/inf-icon.png" alt="icon" class="featured__item__icon">
                    <p class="featured__item__txt">Lifetime Access</p>
                </div>
            </div>

            <div class="courses__shape2">
                <img src="./contents/img/course-shape2.png" alt="" class="courses__shape2__img">
                <h1 class="courses__shape2__heading">Explore Most Popular Courses</h1>
            </div>

            <div class="courses__container">
                <div class="courses__card__container">
                    <div class="course__card">
                        <div class="course__card__thumbnail-container">
                            <img src="./contents/img/course-cover.jpg" alt="course img" class="course__card__thumbnail">
                        </div>

                        <div class="course__card__category-price">
                            <p class="course__card__category">Development</p>
                            <p class="course__card__price">$235</p>
                        </div>

                        <h1 class="course__card__title">The Complete JavaScript Course 2021:
                            From Zero to Expert!
                        </h1>

                        <p class="course__card__instructor-name">Jonas Schmedtmann</p>

                        <div class="course__card__stat">

                            <div class="course__card__stat__rating-container">
                                <p class="course__card__stat__rating">5.0</p>
                                <div class="course__card__stat__stars">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                </div>
                                <p class="course__card__stat__rating-count">(256321)</p>

                            </div>

                            <div class="course__card__stat__student">
                                <img class="course__card__stat__student-icon" src="./contents/img/users-icon.png"
                                    alt="">
                                <p class="course__card__stat__student-count">256321</p>
                            </div>

                        </div>
                    </div>

                    <div class="course__card">
                        <div class="course__card__thumbnail-container">
                            <img src="./contents/img/course-cover.jpg" alt="course img" class="course__card__thumbnail">
                        </div>

                        <div class="course__card__category-price">
                            <p class="course__card__category">Development</p>
                            <p class="course__card__price">$235</p>
                        </div>

                        <h1 class="course__card__title">The Complete JavaScript Course 2021:
                            From Zero to Expert!
                        </h1>

                        <p class="course__card__instructor-name">Jonas Schmedtmann</p>

                        <div class="course__card__stat">

                            <div class="course__card__stat__rating-container">
                                <p class="course__card__stat__rating">5.0</p>
                                <div class="course__card__stat__stars">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                </div>
                                <p class="course__card__stat__rating-count">(256321)</p>

                            </div>

                            <div class="course__card__stat__student">
                                <img class="course__card__stat__student-icon" src="./contents/img/users-icon.png"
                                    alt="">
                                <p class="course__card__stat__student-count">256321</p>
                            </div>

                        </div>
                    </div>

                    <div class="course__card">
                        <div class="course__card__thumbnail-container">
                            <img src="./contents/img/course-cover.jpg" alt="course img" class="course__card__thumbnail">
                        </div>

                        <div class="course__card__category-price">
                            <p class="course__card__category">Development</p>
                            <p class="course__card__price">$235</p>
                        </div>

                        <h1 class="course__card__title">The Complete JavaScript Course 2021:
                            From Zero to Expert!
                        </h1>

                        <p class="course__card__instructor-name">Jonas Schmedtmann</p>

                        <div class="course__card__stat">

                            <div class="course__card__stat__rating-container">
                                <p class="course__card__stat__rating">5.0</p>
                                <div class="course__card__stat__stars">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                </div>
                                <p class="course__card__stat__rating-count">(256321)</p>

                            </div>

                            <div class="course__card__stat__student">
                                <img class="course__card__stat__student-icon" src="./contents/img/users-icon.png"
                                    alt="">
                                <p class="course__card__stat__student-count">256321</p>
                            </div>

                        </div>
                    </div>

                    <div class="course__card">
                        <div class="course__card__thumbnail-container">
                            <img src="./contents/img/course-cover.jpg" alt="course img" class="course__card__thumbnail">
                        </div>

                        <div class="course__card__category-price">
                            <p class="course__card__category">Development</p>
                            <p class="course__card__price">$235</p>
                        </div>

                        <h1 class="course__card__title">The Complete JavaScript Course 2021:
                            From Zero to Expert!
                        </h1>

                        <p class="course__card__instructor-name">Jonas Schmedtmann</p>

                        <div class="course__card__stat">

                            <div class="course__card__stat__rating-container">
                                <p class="course__card__stat__rating">5.0</p>
                                <div class="course__card__stat__stars">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                </div>
                                <p class="course__card__stat__rating-count">(256321)</p>

                            </div>

                            <div class="course__card__stat__student">
                                <img class="course__card__stat__student-icon" src="./contents/img/users-icon.png"
                                    alt="">
                                <p class="course__card__stat__student-count">256321</p>
                            </div>

                        </div>
                    </div>

                    <div class="course__card">
                        <div class="course__card__thumbnail-container">
                            <img src="./contents/img/course-cover.jpg" alt="course img" class="course__card__thumbnail">
                        </div>

                        <div class="course__card__category-price">
                            <p class="course__card__category">Development</p>
                            <p class="course__card__price">$235</p>
                        </div>

                        <h1 class="course__card__title">The Complete JavaScript Course 2021:
                            From Zero to Expert!
                        </h1>

                        <p class="course__card__instructor-name">Jonas Schmedtmann</p>

                        <div class="course__card__stat">

                            <div class="course__card__stat__rating-container">
                                <p class="course__card__stat__rating">5.0</p>
                                <div class="course__card__stat__stars">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                </div>
                                <p class="course__card__stat__rating-count">(256321)</p>

                            </div>

                            <div class="course__card__stat__student">
                                <img class="course__card__stat__student-icon" src="./contents/img/users-icon.png"
                                    alt="">
                                <p class="course__card__stat__student-count">256321</p>
                            </div>

                        </div>
                    </div>

                    <div class="course__card">
                        <div class="course__card__thumbnail-container">
                            <img src="./contents/img/course-cover.jpg" alt="course img" class="course__card__thumbnail">
                        </div>

                        <div class="course__card__category-price">
                            <p class="course__card__category">Development</p>
                            <p class="course__card__price">$235</p>
                        </div>

                        <h1 class="course__card__title">The Complete JavaScript Course 2021:
                            From Zero to Expert!
                        </h1>

                        <p class="course__card__instructor-name">Jonas Schmedtmann</p>

                        <div class="course__card__stat">

                            <div class="course__card__stat__rating-container">
                                <p class="course__card__stat__rating">5.0</p>
                                <div class="course__card__stat__stars">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                    <img src="./contents/img/star-icon.png" alt=""
                                        class="course__card__stat__star-icon">
                                </div>
                                <p class="course__card__stat__rating-count">(256321)</p>

                            </div>

                            <div class="course__card__stat__student">
                                <img class="course__card__stat__student-icon" src="./contents/img/users-icon.png"
                                    alt="">
                                <p class="course__card__stat__student-count">256321</p>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="courses-btn">
                    <a href="./views/view-all-course.php" class="primary-btn">View All Course</a>
                </div>
            </div>




        </section>

        <section id="about" class="about-us">
            <div class="benefits__container">
                <div class="benefits__shape">
                    <img src="./contents/img/benefits-shape.png" alt="" class="benefits__shape__img">
                    <div class="benefits__shape__txt">
                        <h1 class="benefits__shape__txt__title">Benefits Of Learning From <span>Us</span></h1>
                        <p class="benefits__shape__txt__parag">
                            Watch On-Demand Video Lectures From
                            Renowned Instructors In Subjects Such As
                            Programing, Business, Computer Science,
                            Data Science, And Language Learning.
                        </p>

                        <div class="benefits__shape__txt__btn">
                            <a href="./views/signUp.php" class="primary-btn ">Start Learning</a>
                        </div>
                    </div>
                </div>

                <div class="benefits__ill">
                    <lottie-player class="benefits__ill__lottie-player"
                        src="https://assets7.lottiefiles.com/packages/lf20_nhniokpt.json" background="transparent"
                        speed="1" loop autoplay>
                    </lottie-player>
                </div>
            </div>

            <div class="testimonial">

                <img src="./contents/img/testimonial-elipse.png" alt="" class="animated-elipse-4" />
                <img src="./contents/img/testimonial-elipse-2.png" alt="" class="animated-elipse-5" />

                <h1 class="testimonial__heading">What Our Student Say
                    <br>
                    <span>About Us</span>
                </h1>

                <div class="testimonial__container">
                    <div class="testimonial__card">
                        <div class="testimonial__card__img-shape">
                            <img src="./contents/img/user1.jpg" alt="" class="testimonial__card__img">
                        </div>

                        <div class="testimonial__card__txt">
                            <h1 class="testimonial__card__txt__title">
                                ❝Honestly awesome UI UX design course❞
                            </h1>
                            <p class="testimonial__card__txt__parag">
                                Amazing content from google, they not only cover
                                figma also they concentrated on UX and other design
                                aspects, Very helpful to build by career. Thank you!
                            </p>

                            <div class="testimonial__card__txt__stat">
                                <p class="testimonial__card__txt__stat__user-name">
                                    Alex Smith
                                </p>

                                <div class="testimonial__card__txt__stat__stars-container">
                                    <p class="testimonial__card__txt__stat__rating">5.0</p>
                                    <div class="testimonial__card__txt__stat__stars">
                                        <img src="./contents/img/star-icon.png" alt=""
                                            class="testimonial__card__txt__stat__star-icon">
                                        <img src="./contents/img/star-icon.png" alt=""
                                            class="testimonial__card__txt__stat__star-icon">
                                        <img src="./contents/img/star-icon.png" alt=""
                                            class="testimonial__card__txt__stat__star-icon">
                                        <img src="./contents/img/star-icon.png" alt=""
                                            class="testimonial__card__txt__stat__star-icon">
                                        <img src="./contents/img/star-icon.png" alt=""
                                            class="testimonial__card__txt__stat__star-icon">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="testimonial__card">
                        <div class="testimonial__card__img-shape">
                            <img src="./contents/img/user1.jpg" alt="" class="testimonial__card__img">
                        </div>

                        <div class="testimonial__card__txt">
                            <h1 class="testimonial__card__txt__title">
                                ❝Honestly awesome UI UX design course❞
                            </h1>
                            <p class="testimonial__card__txt__parag">
                                Amazing content from google, they not only cover
                                figma also they concentrated on UX and other design
                                aspects, Very helpful to build by career. Thank you!
                            </p>

                            <div class="testimonial__card__txt__stat">
                                <p class="testimonial__card__txt__stat__user-name">
                                    Alex Smith
                                </p>

                                <div class="testimonial__card__txt__stat__stars-container">
                                    <p class="testimonial__card__txt__stat__rating">5.0</p>
                                    <div class="testimonial__card__txt__stat__stars">
                                        <img src="./contents/img/star-icon.png" alt=""
                                            class="testimonial__card__txt__stat__star-icon">
                                        <img src="./contents/img/star-icon.png" alt=""
                                            class="testimonial__card__txt__stat__star-icon">
                                        <img src="./contents/img/star-icon.png" alt=""
                                            class="testimonial__card__txt__stat__star-icon">
                                        <img src="./contents/img/star-icon.png" alt=""
                                            class="testimonial__card__txt__stat__star-icon">
                                        <img src="./contents/img/star-icon.png" alt=""
                                            class="testimonial__card__txt__stat__star-icon">
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="testimonial__btn">

                    <button class="testimonial__btn__next testimonial__btn__prev">
                        <svg class="testimonial__btn__next-icon" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 26.389 39.584">
                            <path id="Arrow"
                                d="M49.2,29.251,29.408,12.759a3.3,3.3,0,1,0-4.226,5.07l16.75,13.957L25.182,45.743a3.3,3.3,0,0,0,4.226,5.07L49.2,34.321a3.3,3.3,0,0,0,0-5.07Z"
                                transform="translate(-23.995 -11.994)" />
                        </svg>
                    </button>

                    <button class="testimonial__btn__next">
                        <svg class="testimonial__btn__next-icon" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 26.389 39.584">
                            <path id="Arrow"
                                d="M49.2,29.251,29.408,12.759a3.3,3.3,0,1,0-4.226,5.07l16.75,13.957L25.182,45.743a3.3,3.3,0,0,0,4.226,5.07L49.2,34.321a3.3,3.3,0,0,0,0-5.07Z"
                                transform="translate(-23.995 -11.994)" />
                        </svg>
                    </button>
                </div>
            </div>
        </section>

        <section id="instructor" class="instructor-call">
            <img src="./contents/img/instructor-call-img.png" alt="" class="instructor-call__img">
            <div class="instructor-call__content">
                <h1 class="instructor-call__content__txt">
                    Are you interested in <br> becoming an instructor?
                </h1>

                <div class="instructor-call__content__btn">
                    <a href="./views/signUp.php" class="primary-btn ">Join Us</a>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer__container">
            <img src="./contents/img/logo-icon-nobg.png" alt="" class="footer__logo">
            <div class="footer__content">
                <h1 class="footer__content__title">
                    Get In Touch
                </h1>
                <p class="footer__content__parag">
                    Follow us on Social media and
                    stay updated with the latest
                    information about our services
                </p>
                <div class="footer__content__social-media">
                    <a target="_blank" href="https://www.facebook.com/"><img src="./contents/img/fb.png" alt=""
                            class="social-media__logo footer__content__social-media-icon"></a>

                    <a target="_blank" href="https://twitter.com/"><img src="./contents/img/twitter.png" alt=""
                            class="social-media__logo footer__content__social-media-icon"></a>

                    <a target="_blank" href="https://www.instagram.com/"><img src="./contents/img/insta.png" alt=""
                            class="social-media__logo footer__content__social-media-icon"></a>
                </div>
            </div>
        </div>
        <div class="footer__copyright__shape">
            <p class="footer__copyright__shape__txt">
                © 2021 All Right Reserved
            </p>
        </div>
    </footer>

    <script src="./contents/js/navScript.js"></script>
</body>

</html>