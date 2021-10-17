<?php include_once 'header.php'; ?>	
<!-- Default form register -->
<!-- Button trigger modal -->
<div class="row">
	<div class="text-center col-lg-12">
		<a href="index.php" class="icon-link"><i class="material-icons f-left m-icon text-dark">arrow_back</i></a>
	</div>
	<div class="col-lg-4 col-sm-6 col-12 offset-lg-4 offset-sm-3">
		<form class="text-center" id="DriverLoginPage">
			<div class="card shadow">
				<img src="images/drvsgn.png" class="card-img-top" alt="...">
				<h2 class="h2">Driver Login</h2>
				<div class="card-body m-2 p-3">
					<!-- First name -->
					<div class="row">
						<!-- E-mail -->
						<div class="col-lg-12">
							<div class="form-group">
								<input type="email" id="defaultLoginFormEmail" class="form-control p-4" placeholder="E-mail" name="DriverLoginEmail">
							</div>
						</div>
						<!-- Password -->
						<div class="col-lg-12">
							<div class="form-group">
								<input type="password" id="defaultLoginFormPassword" class="form-control p-4" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="DriverLoginPassword">
								<small class="text-muted passStrength"></small>
							</div>
						</div>
						<!-- Sign up button -->
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-6 offset-lg-3">
									<input class="btn btn-info my-4 btn-block butts shadow" type="submit" value="Sign up">
								</div>
							</div>
						</div>
					</div>
					<a class="nav-link" href="driversignup.php">Dont have an account? Sign up</a>
					<hr>
					<!-- Terms of service -->
				</div>
			</div>
		</form>
	</div>
</div>
<div class="entire-page mt-2">
	<div class="foots" style="height: 200px"></div>
	<p class="text-muted text-right pos-txt pr-2"><a href="index.php"><img src="images/minibus.png" class="logobottom"></a></p>
</div>
<!-- Default form register -->
<?php include_once 'footer.php'; ?>