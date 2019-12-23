<?php
$page = "guide";
require '../includes/isGuest-header.php';
include '../../includes/nbbc.php';
//check if there is a user log
if(!isset($_SESSION['userType_session'])){
	header('location: http://localhost/capstone/page/login.php');
}
	// determine which page number visitor is curr on
if(isset($_GET['id'])){
	$page = $_GET['id'];
}else{
	$page = 1;

}
if(isset($_GET['mode'])){
	$id = $_GET['id'];
	$mode = $_GET['mode'];
	$bbcode = new bbcode();
	switch ($mode) {
		case 'BEGINNER':
		$query = "SELECT * FROM lessons_b WHERE id= '$id' AND mode = 'BEGINNER' ";
		$maxQuery = "SELECT * FROM lessons_b WHERE mode = '$mode' ";
		break;
		case 'INTERMEDIATE':
		$query = "SELECT * FROM lessons_i WHERE id= '$id' AND mode = 'INTERMEDIATE' ";
		$maxQuery = "SELECT * FROM lessons_i WHERE mode = '$mode' ";
		break;
		case 'ADVANCE':
		$query = "SELECT * FROM lessons_a WHERE id= '$id' AND mode = 'ADVANCE' ";
		$maxQuery = "SELECT * FROM lessons_a WHERE mode = '$mode' ";
		break;
	}


	$link = mysqli_connect("localhost","root","","capstone");


	$res = mysqli_query($link, $query);

		//number of result for page

	while($row = mysqli_fetch_assoc($res)){
		$title = $row['title'];
		$content = $row['content'];
	}

}

?>

<div class="container mt-5">
	<div class="card">

		<div class="card-body p-5">
			<div class ="row justify-content-center">
				<h1 class="display-3"><strong><?= $bbcode->Parse($title);?></strong></h1>
			</div>
			<div class ="row justify-content-start p-5">
				<p class="p-4"><?= $content; ?></p>
			</div>
		</div>
		<div class ="row justify-content-start p-5">
			<?php

			$maxRes = mysqli_query($link, $maxQuery);
			$maxPages = mysqli_num_rows($maxRes);
			console_log($page);
			?>
			<div class="col col-md-3">
				<?php
				if ($page > 1){

					echo "<a href='content.php?id=".($page-1).'&mode='.$mode." ' class='btn btn-primary btn-lg btn-block active' role='button' style='font-size: 15px'  aria-pressed='true' >PREVIOUS TOPIC</a>";
				}
				?>
			</div>
			<div class="col col-md-6">
				<?php
				if ($page == $maxPages){
					switch($mode){
						case 'BEGINNER':
						echo "<a href='quiz_b.php' class='btn btn-primary btn-lg btn-block active' role='button' style='font-size: 15px' aria-pressed='true' >TAKE A QUIZ</a>";
						break;
						case 'INTERMEDIATE':
						echo "<a href='quiz_i.php' class='btn btn-primary btn-lg btn-block active' role='button' style='font-size: 15px' aria-pressed='true' >TAKE A QUIZ</a>";
						break;
						case 'ADVANCE':
						echo "<a href='quiz_a.php' class='btn btn-primary btn-lg btn-block active' role='button' style='font-size: 15px' aria-pressed='true' >TAKE A QUIZ</a>";
						break;
					}
				}
				?>
			</div>
			<div class="col col-md-3">
				<?php
				if ($page != $maxPages){
					echo "<a href='content.php?id=".($page+1).'&mode='.$mode." ' class='btn btn-primary btn-lg btn-block active' role='button' style='font-size: 15px' aria-pressed='true' >NEXT TOPIC</a>";

				}
				?>
			</div>
		</div>
	</div>
</div>
<?php
require '../includes/footer.php'
?>