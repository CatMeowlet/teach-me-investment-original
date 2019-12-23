<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <!-- BOOTSTRAP -->
    <?php
    include($_SERVER['DOCUMENT_ROOT'].'/capstone/includes/include_meta.php');

    include($_SERVER['DOCUMENT_ROOT'].'/capstone/includes/bootstrap_js.php');

    include($_SERVER['DOCUMENT_ROOT'].'/capstone/includes/bootstrap_style.php');

    ?>

    <link rel="stylesheet" href="http://localhost/capstone/css/custom.css">
    <script src="http://localhost/capstone/js/custom_search.js"></script>
    <script src="http://localhost/capstone/js/modalWindow.js"></script>
    <script src="http://localhost/capstone/js/stock-js/calculate.js"></script>
    <script src="http://localhost/capstone/js/stock-js/function.js"></script>
    <script src="http://localhost/capstone/js/canvasjs.min.js"></script>
    <!--<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>-->
</head>

<body>

    <!-- TOP MOST -->
    <div class="jumbotron jumbotron-fluid  no-margin-bottom" id="jmbTrn ">
        <div class="container">
            <h1 class="display-4">Teach Me Investment</h1>
            <p class="lead">Let's learn how to invest and be succesful in the future.</p>
        </div>
    </div>
    <!--
			MENU
		-->
        <nav class="navbar navbar-dark  navbar-expand-sm navbar-expand-md bg-dark justify-content-center">
            <a class="navbar-brand d-flex w-40 mr-auto" href="home.php"><img src="http://localhost/capstone/img/logo_bulb.png"><span class="navbar-text py-3 px-3 ">Teach Me Investment</span></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar3">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">

            <!--
				CENTER LINK MENU
			-->
            <ul class="navbar-nav w-100 justify-content-center">
                <li class="nav-item px-2  py-0 <?php if($page == 'home'){echo 'active';}?>">
                    <a class="nav-link " href="http://localhost/capstone/page/home.php">Home</a>
                </li>
                <li class="nav-item px-2  py-0 <?php if($page == 'guide'){echo 'active';}?>">
                    <a class="nav-link" href="http://localhost/capstone/page/guide.php">Guide</a>
                </li>
                <li class="nav-item px-2  py-0 <?php if($page == 'companyList'){echo 'active';}?>">
                    <a class="nav-link" href="http://localhost/capstone/page/company-list.php" >Company List</a>
                </li>
                <li class="nav-item px-2  py-0 <?php if($page == 'calculator'){echo 'active';}?>">
                    <a class="nav-link" href="http://localhost/capstone/page/calculator-stock.php" >Calculator</a>
                </li>
            </li>
        </ul>
            <!--
				RIGHT LINK MENU
			-->
            <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
               <form class="form-inline" action="http://localhost/capstone/controller/redirect.php" method="post">
                <li class="nav-item ">
                  <input class="form-control mr-sm-2 mr-md-2 mr-lg-2 mr-xl-2" type="search" placeholder="Search Symbol" aria-label="Search" autocomplete="off" id="searchStockSymbol" name="searchStockSymbol" >
                  <button class="btn btn-outline-success my-sm-2 my-md-2 my-lg-2" type="submit" name="submitSearch">Search</button>
              </li>
          </form>
      </ul>

      <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
    <!--    <li class="nav-item <?php //if($page == 'virtual'){echo 'active';}?>">
            <a class="nav-link mr-10 mx-2 " href="http://localhost/capstone/page/virtual-game/index.php"><i class="fas fa-gamepad"></i><strong>&nbsp Virtual Game </strong></a>
        </li> -->
        <li class="nav-item dropdown px-2 <?php if($page == 'virtual' || $page == 'leaderboards'){echo 'active';}?>">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false"><i class="fas fa-gamepad"></i><strong>&nbsp Virtual</strong></a>
            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="http://localhost/capstone/page/virtual-game/index.php">Virtual Game</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="http://localhost/capstone/page/virtual-game/leaderboards.php">Virtual Leaderboard</a>
                 <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="http://localhost/capstone/page/virtual-game/watchlist.php">Virtual Stock Watchlist</a>
            </div>
        </li>
        <li class="nav-item <?php if($page == 'profile'){echo 'active';}?>">
            <a class="nav-link mx-2" href="http://localhost/capstone/page/profile.php"><i class="fas fa-user-cog"></i><strong>&nbsp Profile </strong></a>
        </li>
        <li class="nav-item">
            <a class="nav-link mr-10 ml-2 " href="http://localhost/capstone/controller/logout-process.php"><i class="fas fa-sign-out-alt"></i><strong>&nbsp Logout </strong></a>
        </li>
    </ul>

</div><!-- END OF NAV COLLAPSE -->
</nav><!-- END OF MENU -->

    <!-----------------

		RESERVE ONLY FOR CONTENT

		CODE IN OTHER PAGE

     --------------------->
