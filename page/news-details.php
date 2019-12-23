<?php
$page = "home";

require 'includes/isGuest-header.php';

//check if there is a user log
if (!isset($_SESSION['userType_session'])) {
	header('location: http://localhost/capstone/page/login.php');
}

?>
<div class="container">
	<div class="row" style="margin-top: 4%">

		<!-- Blog Entries Column -->
		<div class="col-md-8">

			<!-- Blog Post -->
			<?php
			$pid = intval($_GET['nid']);
			$con = mysqli_connect("localhost", "root", "", "capstone");
			$query = mysqli_query($con, "SELECT * FROM post where post_id ='$pid'");
			while ($row = mysqli_fetch_array($query)) {
				?>

				<div class="card mb-4">
					<img class="card-img-top" src="../<?php echo htmlentities($row['post_image']); ?>" alt="<?php echo htmlentities($row['posttitle']); ?>">
					<div class="card-body">
						<h2 class="card-title"><?php echo htmlentities($row['post_title']); ?></h2>
						<b> Posted on </b><?php echo htmlentities($row['post_date']); ?></p>
						<hr />
						<p class="card-text"><?php
													$pt = $row['post_content'];
													echo (substr($pt, 0)); ?></p>

					</div>
					<div class="card-footer text-muted">


					</div>
				</div>
			<?php } ?>






		</div>

		<!-- Sidebar Widgets Column -->
		<?php include('includes/sidebar.php'); ?>
	</div>
</div>

<?php
require 'includes/footer.php';
?>