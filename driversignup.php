<?php include_once 'header.php'; ?>	
<!-- Default form register -->
<div class="row">
	<div class="text-center col-lg-12">
		<a href="index.php" class="icon-link"><i class="material-icons f-left m-icon text-dark">arrow_back</i></a>
	</div>
	<div class="col-lg-4 col-sm-6 col-12 offset-lg-4 offset-sm-3">
		<form class="text-center" id="driverSignUp">
			<div class="card shadow">
				<img src="images/driver.png" class="card-img-top" alt="...">
				<h2 class="h2">SignUp to Drive</h2>
				<div class="card-body m-2 p-3">
					<!-- First name -->
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<input type="text" id="defaultRegisterFormFirstName" class="form-control p-4" placeholder="First name" name="DriverSignUpFirstname">
							</div>
						</div>	
						<!-- Last name -->
						<div class="col-lg-12">
							<div class="form-group">
								<input type="text" id="defaultRegisterFormLastName" class="form-control p-4" placeholder="Last name" name="DriverSignUpLastname">
							</div>
						</div>
						<!-- E-mail -->
						<div class="col-lg-12">
							<div class="form-group">
								<input type="email" id="defaultRegisterFormEmail" class="form-control p-4" placeholder="E-mail" name="DriverSignUpEmail">
							</div>
						</div>
						<!-- Phone number -->
						<div class="col-lg-12">
							<div class="form-group">
								<input type="text" id="defaultRegisterPhonePassword" class="form-control p-4" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock" name="DriverSignUpPhone">
							</div>
						</div>
						<!-- Password -->
						<div class="col-lg-12">
							<div class="form-group">
								<input type="password" id="defaultRegisterFormPassword" class="form-control p-4" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" name="DriverSignUpPassword" oninput ="checkPasswordStrength();">
								<small class="text-muted passStrength"></small>
							</div>
						</div>
						<!-- Sign up button -->
						<div class="col-lg-12">
							<div class="row">
								<div class="col-lg-6 offset-lg-3">
									<input class="btn btn-info my-4 btn-block butts shadow" disabled="disabled" type="submit" value="Sign up" id="signBtn">
								</div>
							</div>
						</div>
					</div>
					<a class="nav-link" href="driverLogin.php">Already got an account? log in</a>
					<hr>
					<!-- Terms of service -->
					<p class="text-muted">By clicking Sign up you agree to our <a href="" target="_blank">terms of service</a></p>
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