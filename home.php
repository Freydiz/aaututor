<?php
include '_home.php';
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

    <body class="sub-pages">

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
                            <li><a class="modal-button modal-button-user" data-modal="modalEditUser"><i class="far fa-user"></i>  Hello <?php echo $_SESSION["firstName"];?>!</a></li>
                            <li>
                                <form action='_home.php' method='post'><button class="logout_button" type="submit" name="logOutBtn" id="logOutBtn">Log Out</button></form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <section class="content">
                <div class="wrap-subpage">
                    <div class="searchbox">
                        <div class="searchbox-title">
                            <!-- search form, takes you to the search.php page and parses the input 'search' through the url -->
                            <h2>Search for tutors here</h2>
                            <form action="search.php">
                                <input type="text" class="searchterm" placeholder="Search..." name="search">
                                <button class="modal-button searchbtn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="wrap-sessions">
                    <div class="dark" id="sessBox">
                        <div id="btnSess" style="display: none;">
                            <a class="modal-button button" data-modal="modalCreateSession" style="font-size: 18px; margin: 1em;">Create new session</a>
                        </div>
                        <hr>
                        <h2>Your scheduled sessions</h2>
                        <hr>
                        <div>
                            <!-- calls the php file that contains the functions that retrieve the user's sessions -->
                            <?php include 'sessions.php' ?>
                        </div>
                        <hr>
                    </div>

                </div>
            </section>

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