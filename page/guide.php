<?php
$page = "guide";
require 'includes/isGuest-header.php';
//check if there is a user log
if(!isset($_SESSION['userType_session'])){
	header('location: http://localhost/capstone/page/login.php');
}
?>
<!--<div class="container mt-5">
	<div class="row-fluid ">
		 foreach ($result as $result) :
			<div class="col-sm-4 ">
				<div class="card-columns-fluid">
					<div class="card  bg-light" style = "width: 22rem; " >
						<div class="card-body">
							<h2 class="card-title"><b> echo $result['title']; </b></h2>
							<a href="#" class="btn btn-secondary">Full Details</a>
						</div>
					</div>
				</div>
			</div>
		 endforeach; 	</div>
</div>
-->

<div class="container mt-5">
	<!-- Card deck -->
	<div class="card-deck">

		<!-- Card -->
		<div class="card mb-4">

			<!--Card image-->
			<div class="view overlay">
				<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg" alt="Card image cap">
				<a href="#!">
					<div class="mask rgba-white-slight"></div>
				</a>
			</div>

			<!--Card content-->
			<div class="card-body">

				<!--Title-->
				<h1 class="card-title">Beginner</h1>
				<!--Text-->
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
				<a href="view/beginner.php" class="btn btn-info" role="button">Get Started</a>

			</div>

		</div>
		<!-- Card -->

		<!-- Card -->
		<div class="card mb-4">

			<!--Card image-->
			<div class="view overlay">
				<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/14.jpg" alt="Card image cap">
				<a href="#!">
					<div class="mask rgba-white-slight"></div>
				</a>
			</div>

			<!--Card content-->
			<div class="card-body">

				<!--Title-->
				<h1 class="card-title">Intermediate</h1>
				<!--Text-->
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
				<a href="view/intermediated.php" class="btn btn-info" role="button">Get Started</a>

			</div>

		</div>
		<!-- Card -->

		<!-- Card -->
		<div class="card mb-4">

			<!--Card image-->
			<div class="view overlay">
				<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/15.jpg" alt="Card image cap">
				<a href="#!">
					<div class="mask rgba-white-slight"></div>
				</a>
			</div>

			<!--Card content-->
			<div class="card-body">

				<!--Title-->
				<h1 class="card-title">Advance</h1>
				<!--Text-->
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
				<a href="view/advance.php" class="btn btn-info" role="button">Get Started</a>

			</div>

		</div>
		<!-- Card -->

	</div>
	<!-- Card deck -->
</div>
<?php
require 'includes/footer.php'
?>