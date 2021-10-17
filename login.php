<?php include_once 'header.php'; ?>	
<!-- Default form register -->
<div class="row">
	<div class="text-center col-lg-12">
		<a href="index.php" class="icon-link"><i class="material-icons f-left m-icon text-dark">arrow_back</i></a>
	</div>
	<div class="col-lg-4 col-sm-6 col-12 offset-lg-4 offset-sm-3">
		<form class="text-center" id="passengerLogin">
			<div class="card shadow">
				<img src="images/pass.png" class="card-img-top" alt="...">
				<h2 class="h2">Login</h2>
				<div class="card-body p-3">
					<div class="form-group">
						<input type="email" id="defaultLoginFormEmail" class="form-control p-4" placeholder="E-mail" name="passengerLoginEmail">
					</div>
					<!-- Password -->
					<div class="form-group">
						<input type="password" id="defaultLoginFormPassword" class="form-control p-4" placeholder="Password" aria-describedby="defaultLoginFormPasswordHelpBlock" name="passengeLoginPassword">
					</div>
					<!-- Login button -->
					<div class="row">
						<div class="col-lg-6 offset-lg-3">
							<input class="btn btn-info my-4 btn-block butts shadow" type="submit" value="Login">
						</div>
					</div>
					<a class="nav-link" href="signup.php">Don't have an account? Sign up</a>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="entire-page mt-2">
	<div class="foots" style="height: 200px"></div>
	<p class="text-muted text-right pos-txt"><a href="index.php"><img src="images/minibus.png" class="logobottom"></a></p>
</div>
<!-- Default form register -->
<?php include_once 'footer.php'; ?>