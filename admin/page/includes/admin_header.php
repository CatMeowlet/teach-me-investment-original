<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <!-- BOOTSTRAP -->
    <?php
    include('../../includes/include_meta.php');
    include('../../includes/bootstrap_style.php');
    require('../../includes/bootstrap_js.php');
    ?>

    <script src="http://localhost/capstone/js/image-validation.js"></script>
   

</head>

<body>

    <!-- TOP MOST -->
    <div class="jumbotron jumbotron-fluid no-margin-bottom bg-primary text-white">
        <div class="container">
            <h1 class="display-4">Teach Me Investment - ADMIN</h1>
            <hr class="my-4">
            <p class="lead">Let's learn how to invest and be succesful in the future.</p>
        </div>
    </div>
    <!--
			MENU
		-->
    <nav class="navbar navbar-dark navbar-expand-md bg-dark justify-content-center">
        <a class="nnavbar-brand d-flex w-50 mr-auto" href="home.php"><img src="../../img/logo_bulb.png"><span class="navbar-text py-3 px-3 ">Teach Me Investment</span></a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">

            <!--
				CENTER LINK MENU
			-->
            <ul class="navbar-nav w-100 justify-content-center">

                <li class="nav-item dropdown px-2 <?php if ($page == 'News') {
                                                        echo 'active';
                                                    } ?>">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">News</a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="./news-add.php">News Add</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./content-edit.php">News Edit</a>
                    </div>
                </li>
                <li class="nav-item dropdown px-2 <?php if ($page == 'stocks' || $page == 'company') {
                                                        echo 'active';
                                                    } ?>">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Stocks</a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="company.php">Company Add | Edit</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="stocks.php">Stocks Edit | Update</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="game_stocks.php">Game Stock Edit</a>
                    </div>
                </li>
                <li class="nav-item dropdown px-2 <?php if ($page == 'content-maker') {
                                                        echo 'active';
                                                    } ?>">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Lesson</a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="./content-maker.php">Lesson Add</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="./content-edit.php">Lesson Edit</a>
                    </div>
                </li>


            </ul>
            <!--
				RIGHT LINK MENU
			-->
            <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
                <li class="nav-item">
                    <a class="nav-link mr-10 ml-2 " href="../../controller/logout-process.php"><i class="fas fa-sign-out-alt"></i><strong>&nbsp Logout </strong></a>
                </li>
            </ul>
        </div><!-- END OF NAV COLLAPSE -->
    </nav><!-- END OF MENU -->

    <!-----------------
		RESERVE ONLY FOR CONTENT

        -------------------->