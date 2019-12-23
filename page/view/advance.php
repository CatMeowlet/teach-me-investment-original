<?php
$page = "guide";
require '../includes/isGuest-header.php';
//check if there is a user log
if(!isset($_SESSION['userType_session'])){
	header('location: http://localhost/capstone/page/login.php');
}


$link = mysqli_connect("localhost","root","","capstone");

$query = "SELECT * FROM lessons_a WHERE mode = 'ADVANCE' ";

$res = mysqli_query($link, $query);

$num_rows = mysqli_num_rows($res);

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
				<!--<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg" alt="Card image cap">-->
				<a href="#!">
					<div class="mask rgba-white-slight"></div>
				</a>
			</div>

			<!--Card content-->
			<div class="card-body">

				<!--Title-->
				<h1 class="card-title">ADVANCE</h1>
				<!--Text-->
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				<!-- Provides extra visual weight and identifies the primary action in a set of buttons -->

			</div>

		</div>
		<!-- Card -->
	</div>
	<!-- Card deck -->
	<!-- Card deck -->
	<div class="card-deck">

		<!-- Card -->
		<div class="card mb-4">

			<!--Card image-->
			<div class="view overlay">
				<!--<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/images/16.jpg" alt="Card image cap">-->
				<a href="#!">
					<div class="mask rgba-white-slight"></div>
				</a>
			</div>

			<!--Card content-->
			<div class="card-body">

				<!--Title-->
				<h1 class="card-title">LESSON: <label class="color-green"><?=$num_rows; ?></label></h1>
				<table class="table" >
					<thead>
						<tr>
							<th class="text-left" colspan="3" >ADVANCE</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = 0;
						while ($row = mysqli_fetch_assoc($res)) {
							$count++;
							console_log($row);
							echo '<tr>
							<td colspan="2">
							<div class="row justify-content-center mx-3 py-3">

							<a href="content.php?id='.$row['id'].'&mode='.$row['mode'].'" class="btn btn-lg btn-block  " role="button">
							<span  style="font-size:20px">'.$count.'.</span>
							<span  style="font-size:20px">'.$row['title'].'</span>
							</a>

							</div>
							</td>
							</tr>';
						}
						?>
					</tbody>
					<tfoot>
						<tr>
							<th class="text-center" colspan="3"><a href='quiz_a.php' class='btn btn-primary btn-lg active' role='button' style='font-size: 15px' aria-pressed='true' >TAKE A QUIZ</a></th>
						</tr>
					</tfoot>
				</table>
			</div>

		</div>
		<!-- Card -->
	</div>
	<!-- Card deck -->
</div>
<?php
require '../includes/footer.php'
?>