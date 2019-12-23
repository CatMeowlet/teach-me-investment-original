<?php
if(isset($_POST['gender'])){
	$gen = $_POST['gender'];
	$countriesOption = $_POST['countriesOption'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<!-- BOOTSTRAP -->
	<?php
		include '../includes/bootstrap_style.php';
		include '../includes/bootstrap_js.php';
	?>
	<!------<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	 Include the above in your HEAD tag

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">---------->

</head>
<body>
	<?php
	include_once("includes/countries.php");
	ksort($countries);
	?>
	<div class="container">
		<hr>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<header class="card-header">
						<a href="login.php" class="float-right btn btn-outline-primary mt-1">Log in</a>
						<h4 class="card-title mt-2">Sign up</h4>
					</header>
					<article class="card-body">
						<form action="../controller/register-process.php" method="POST">
							<div class="form-row">
								<div class="col form-group">
									<label>First name </label>
									<input type="text" class="form-control" placeholder="First Name" name="fname">
								</div> <!-- form-group end.// -->
								<div class="col form-group">
									<label>Last name</label>
									<input type="text" class="form-control" placeholder="Last Name" name="lname">
								</div> <!-- form-group end.// -->
							</div> <!-- form-row end.// -->
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" placeholder="" name="user">
								<small class="form-text text-muted">Use for login.</small>
								<div class="form-group">
									<label>Email address</label>
									<input type="email" class="form-control" placeholder="" name="email">
									<small class="form-text text-muted">We'll never share your email with anyone else.</small>
								</div> <!-- form-group end.// -->
								<div class="form-group">
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="gender" value="Male" checked="true">
										<span class="form-check-label"> Male </span>
									</label>
									<label class="form-check form-check-inline">
										<input class="form-check-input" type="radio" name="gender" value="Female">
										<span class="form-check-label"> Female</span>
									</label>
								</div> <!-- form-group end.// -->
								<div class="form-row">
									<div class="form-group col-md-6">
										<label>City</label>
										<input type="text" class="form-control"  name="address">
									</div> <!-- form-group end.// -->
									<div class="form-group col-md-6">
										<label>Country</label>
										<select id="inputState" name="countriesOption" class="form-control">
											<?php

											foreach($countries as $key => $value) {

												?>
												<option value="<?= $key ?>" title="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($value) ?></option>
												<?php

											}//end of for each

											?>
										</select>
									</div> <!-- form-group end.// -->
								</div> <!-- form-row.// -->
								<div class="form-group">
									<label>Create password</label>
									<input class="form-control" type="password"  name="pass">
								</div> <!-- form-group end.// -->
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block"> Register  </button>
								</div> <!-- form-group// -->
								<small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>
							</form>
						</article> <!-- card-body end .// -->
						<div class="border-top card-body text-center">Have an account? <a href="login.php">Log In</a></div>
					</div> <!-- card.// -->
				</div> <!-- col.//-->

			</div> <!-- row.//-->


		</div>
		<!--container end.//-->

		<br><br>
		<article class="bg-secondary mb-3">
			<div class="card-body text-center">
				<h3 class="text-white mt-3">Teach Me Investment</h3>
				<p class="h5 text-white">Learn Investment and Strategy  <br> for Future Investor </p>   <br>
				</div>
				<br><br>
			</article>
		</div> <!-- card.// -->
	</div>
</body>
</html>