<?php
include 'register.php';
 ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> AAU Tutor</title>
        <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>

    <body>
        <div class="wrapper">
            <header>
                <nav>
                    <div class="menu-icon">
                        <i class="fa fa-bars fa-2x"></i>
                    </div>

                    <div class="logo">
                        <a href=""><i class="fab fa-leanpub"></i><span class="highlight"> AAU</span>Tutor</a>
                    </div>

                    <div class="menu">
                        <ul>
                            <li><a class="modal-button" data-modal="modalLogin">Login</a></li>
                        </ul>
                    </div>
                </nav>
            </header>

            <section class="home-hero">
                <div class="container">
                    <h1 class="title">In need of a tutor?
                        <span>Find a tutor at AAU for your needs</span>
                    </h1>
                    <div class="home_hero_signup_button">
                        <a class="modal-button button" data-modal="modalSignUp">Sign up now!</a>
                    </div>
                    <div>
                        <h2>or search for tutors here...</h2>
                    </div>
                    <div class="wrap-frontpage">
                        <div class="searchbox">
                            <form action="search.php">
                                <input type="text" class="searchterm" placeholder="Search..." name="search">
                                <button class="modal-button searchbtn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <div class="clearfix"></div>

            <div class="container">
                <section class="home-about">
                    <div class="home-about-textbox">
                        <h1>Who we are</h1>
                        <p>AAU Tutor is the best way to find a tutor</p>
                        <p>AAU Tutor is a community where members can find a tutor, or tutor other students at AAU</p>
                    </div>
                </section>
            </div>

            <section class="services">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <i class="far fa-calendar-alt fa-5x"></i>
                            <h3>See availibility</h3>
                            <p>Have a look at the calendar</p>
                        </div>
                        <div class="col-4">
                            <i class="fas fa-tasks fa-5x"></i>
                            <h3>Read reviews</h3>
                            <p>Read reviews of the tutors</p>
                        </div>
                        <div class="col-4">
                            <i class="fas fa-comments fa-5x"></i>
                            <h3>Contact tutors</h3>
                            <p>Contact tutors for free</p>
                        </div>
                    </div>
                </div>
            </section>

            <footer>
                <div class="container">
                    <p>AAU Tutor, Copyright &copy; 2018</p>
                </div>
            </footer>


            <!-- MODALS -->

            <section class="modal-windows">
                <?php
                    include 'modals.php';
                    ?>
            </section>

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/modal.js"></script>
        <script src="js/toggle.js"></script>
        <script src="js/validate_form.js"></script>
        <script src="js/validate_login.js"></script>
        <script src="js/validate_newsession.js"></script>

    </body>

    </html>