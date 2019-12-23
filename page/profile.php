<?php
$page = 'profile';
	//contain condition for checking user type
require 'includes/isGuest-header.php';
//check if there is a user log
if(!isset($_SESSION['userType_session'])){
	header('location: http://localhost/capstone/page/login.php');
}

?>

<div class="container bootstrap snippet">
	<div class="row">
		<div class="col-lg-10">
			<h1 class="ml-5 pl-5">PROFILE</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"><!--left col-->
			<div class="text-center">
				<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
				<h6><br>Upload a different photo...</h6>
				<input type="file" class="text-center center-block file-upload">
			</div>
			<br>


		</div><!--left /col-3-->

		<div class="col-sm-9">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Home</a></li>
			</ul>


			<div class="tab-content">
				<div class="tab-pane active" id="home">
					<br>
					<form class="form" method="post" action="../controller/profile-edit-process.php"  id="registrationForm">
						<div class="form-group">

							<div class="col-xs-6">
								<label for="first_name"><h4>First name</h4></label>
								<input type="text" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any." style="font-weight:bold; font-size: 14px;" value="<?= $u_fname;?>">

							</div>
						</div>
						<div class="form-group">

							<div class="col-xs-6">
								<label for="last_name"><h4>Last name</h4></label>
								<input type="text" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any." style="font-weight:bold; font-size: 14px;" value="<?= $u_lname;?>">
							</div>
						</div>

						<div class="form-group">

							<div class="col-xs-6">
								<label for="email"><h4>Email</h4></label>
								<input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email." style="font-weight:bold; font-size: 14px;" value="<?= $u_email;?>">
							</div>
						</div>
						<div class="form-group">

							<div class="col-xs-6">
								<label for="location"><h4>Address</h4></label>
								<input type="text" class="form-control" id="location" name="location"placeholder="somewhere" title="enter a location" style="font-weight:bold; font-size: 14px;" value="<?= $u_address;?>">
							</div>
						</div>
						<div class="form-group">

							<div class="col-xs-6">
								<label for="password"><h4>New Password</h4></label>
								<input type="password" class="form-control" name="new_password" id="password" placeholder="Enter New Password" title="enter your password." style="font-weight:bold; font-size: 14px;">
							</div>
						</div>
						<div class="form-group">

							<div class="col-xs-6">
								<label for="password2"><h4>Verify</h4></label>
								<input type="password" class="form-control" name="old_password" id="password2" placeholder="Enter Old Password" title="enter your password2." style="font-weight:bold; font-size: 14px;">
							</div>
						</div>
						<div class="form-group">
							<div class="col-xs-12">
								<br>
								<button class="btn btn-lg btn-success" type="submit"><i class="fas fa-save" name="btnSave"></i>&nbsp Save</button>
								<button class="btn btn-lg btn-danger" type="reset"><i class="fas fa-undo"></i>&nbsp Reset</button>
							</div>
						</div>
					</form>

					<hr>

				</div><!--/tab-pane-->

			</div><!--/tab-content-->

		</div><!--/col-9-->
	</div><!--/row-->
	<!--END OF CONTENT-->
	<?php
	include 'includes/footer.php';
	?>
