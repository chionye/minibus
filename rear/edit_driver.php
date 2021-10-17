	<?php include_once 'header.php' ?>
	<!-- start page content -->
	<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	} else {
		$id = '';
	}
	?>
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-bar">
				<div class="page-title-breadcrumb">
					<div class=" pull-left">
						<div class="page-title">Add Driver</div>
					</div>
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li><a class="parent-item" href="#">Drivers</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li class="active">Add Driver</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="card-box">
						<div class="card-head">
							<header>Edit Driver</header>
							<button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
								<i class="material-icons">more_vert</i>
							</button>
							<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="panel-button">
								<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
								</li>
								<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
								</li>
								<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
								here</li>
							</ul>
						</div>
						<form id="editDriver">
							<?php
							$sql = $id != '' ? $obj->generalSelectStatement(sel . drv . " " . wh . "'$id'")->_general_result[0] : '';
							?>
							<div class="card-body row">
								<div class="col-lg-12">
									<h3>Basic Information</h3>
								</div>
								<div class="col-lg-6 p-t-20">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input class="mdl-textfield__input" type="hidden" id="driverId" name="driverId" value="<?php if (isset($sql->id)) {echo $sql->id;} ?>">
										<input class="mdl-textfield__input" type="text" id="driverFirstName" name="editdriverFirstName" value="<?php if (isset($sql->firstname)) {echo $sql->firstname;} ?>">
										<label class="mdl-textfield__label">First Name</label>
									</div>
								</div>
								<div class="col-lg-6 p-t-20">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input class="mdl-textfield__input" type="text" id="driverLastName" name="edittdriverLastName" value="<?php if (isset($sql->lastname)) {echo $sql->lastname;} ?>">
										<label class="mdl-textfield__label">Last Name</label>
									</div>
								</div>
								<div class="col-lg-6 p-t-20">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input class="mdl-textfield__input" type="text" id="driverCompanyName" name="editdriverCompanyName" value="<?php if (isset($sql->company)) {echo $sql->company;} ?>">
										<label class="mdl-textfield__label">Company Name</label>
									</div>
								</div>
								<div class="col-lg-6 p-t-20">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input class="mdl-textfield__input" type="text" id="driversa1" name="editdriversa1" value="<?php if (isset($sql->address1)) {echo $sql->address1;} ?>">
										<label class="mdl-textfield__label">Street address 1</label>
									</div>
								</div>
								<div class="col-lg-6 p-t-20">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input class="mdl-textfield__input" type="text" id="driversa2" name="editdriversa2" value="<?php if (isset($sql->address2)) {echo $sql->address2;} ?>">
										<label class="mdl-textfield__label">Street address 2</label>
									</div>
								</div>
								<div class="col-lg-6 p-t-20">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input class="mdl-textfield__input" type="text" id="driverCity" name="editdriverCity" value="<?php if (isset($sql->city)) {echo $sql->city;} ?>">
										<label class="mdl-textfield__label">City</label>
									</div>
								</div>
								<div class="col-lg-6 p-t-20">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input class="mdl-textfield__input" type="text" id="driverCountry" name="editdriverCountry" value="<?php if (isset($sql->country)) {echo $sql->country;} ?>">
										<label class="mdl-textfield__label">Country</label>
									</div>
								</div>
								<div class="col-lg-6 p-t-20">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="textZip" name="edittextZip" value="<?php if (isset($sql->zipcode)) {echo $sql->zipcode;} ?>">
										<label class="mdl-textfield__label" for="driverZip">Zip Code</label>
										<span class="mdl-textfield__error">Number required!</span>
									</div>
								</div>
								<div class="col-lg-6 p-t-20">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input class="mdl-textfield__input" type="email" id="driveremail" name="editdriveremail" value="<?php if (isset($sql->email)) {echo $sql->email;} ?>">
										<label class="mdl-textfield__label">Email</label>
										<span class="mdl-textfield__error">Enter Valid Email Address!</span>
									</div>
								</div>
								<div class="col-lg-6 p-t-20">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="driverMobile" name="editdriverMobile" value="<?php if (isset($sql->phone)) {echo $sql->phone;} ?>">
										<label class="mdl-textfield__label" for="text5">Mobile Number</label>
										<span class="mdl-textfield__error">Number required!</span>
									</div>
								</div>
								<div class="col-lg-6 p-t-20">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
										<input class="mdl-textfield__input" type="text" id="sample2" value="" readonly tabIndex="-1" name="editsample2">
										<label for="sample2" class="pull-right margin-0">
											<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
										</label>
										<label for="sample2" class="mdl-textfield__label">Gender</label>
										<ul data-mdl-for="sample2" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
											<li class="mdl-menu__item" data-val="DE">Male</li>
											<li class="mdl-menu__item" data-val="BY">Female</li>
										</ul>
									</div>
								</div>
								<div class="col-lg-6 p-t-20">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
										<input class="mdl-textfield__input" type="text" id="status" value="<?php if (isset($sql->status)) {echo $sql->status;} ?>" readonly tabIndex="-1" name="editstatus">
										<label for="status" class="pull-right margin-0">
											<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
										</label>
										<label for="status" class="mdl-textfield__label">Status</label>
										<ul data-mdl-for="status" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
											<li class="mdl-menu__item" data-val="AE">Active</li>
											<li class="mdl-menu__item" data-val="FY">Suspended</li>
											<li class="mdl-menu__item" data-val="AP">Pending</li>
										</ul>
									</div>
								</div>
								<div class="col-lg-12 p-t-20 text-center">
									<input type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end page content -->
	<?php include_once 'footer.php' ?>