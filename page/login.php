<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<!-- BOOTSTRAP -->
	<?php
	include('../includes/bootstrap_style.php');
	?>
</head>
<body>
	<hr>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card mt-5">
					<article class="card-body">
						<h4 class="card-title text-center mb-4 mt-1">Sign in</h4>
						<hr>
			<!--
			-controller
				-login-process <-- call this action (target dir)

			-page
				-login <- current dir
			-->
			<form action="../controller/login-process.php" method="POST">
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-user"></i> </span>
						</div>
						<input name="user" class="form-control" placeholder="Username" type="text">
					</div> <!-- input-group.// -->
				</div> <!-- form-group// -->
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
						</div>
						<input name="pass" class="form-control" placeholder="**********" type="password">
					</div> <!-- input-group.// -->
				</div> <!-- form-group// -->
				<div class="form-group">
					<button  id="login" type="submit" class="btn btn-primary btn-block"> Login  </button>
				</div> <!-- form-group// -->
			</form>
		</article>
		<div class="border-top card-body text-center">Don't have an account? <a href="register.php">Register here</a></div>
	</div> <!-- card.// -->
</div>
</div><!-- row.// -->
</div><!-- container.// -->
<br><br>
</body>
<footer class="footer fixed-bottom">
<article class="bg-secondary mb-3">
	<div class="card-body text-center">
		<h3 class="text-white mt-3">Teach Me Investment</h3>
		<p class="h5 text-white">Learn Investment and Strategy  <br> for Future Investor </p>   <br>
	</div>
	<br><br>
</article>
</footer>


</html>