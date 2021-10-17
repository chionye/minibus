<?php include_once 'header.php' ?>
<!-- start page content -->
<?php 
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}else{
	$id = '';
}
?>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Edit Passenger Detail</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
						href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="all_passenger.php">Passengers</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Edit Passenger Detail</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Edit Passenger Detail</header>
						<button id="panel-button"
						class="mdl-button mdl-js-button mdl-button--icon pull-right"
						data-upgraded=",MaterialButton">
						<i class="material-icons">more_vert</i>
					</button>
					<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
					data-mdl-for="panel-button">
					<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
					</li>
					<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
					</li>
					<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
					here</li>
				</ul>
			</div>
			<form method="post" enctype="multipart/form-data" id="EditPassenger">
				<?php 
				$sql = $id != ''?$obj->generalSelectStatement(sel.mt." ".wh."'$id'")->_general_result[0]:'';
				?>
				<div class="card-body row">
					<div class="col-lg-12">
						<h3>Basic Information</h3>
					</div>
					<div class="col-lg-6 p-t-20">
						<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<input class="mdl-textfield__input" type="hidden" id="PassengerId" name="PassengerId" value="<?php if(isset($sql->id)){echo $sql->id;}?>">
						<input class="mdl-textfield__input" type="text" id="PassengerEditFirstName" name="PassengerEditFirstName" value="<?php if(isset($sql->first_name)){echo $sql->first_name;}?>">
						<label class="mdl-textfield__label">First Name</label>
					</div>
				</div>
				<div class="col-lg-6 p-t-20">
					<div
					class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					<input class="mdl-textfield__input" type="text" id="PassengerLastName" name="PassengerLastName" value="<?php if(isset($sql->lastname)){echo $sql->lastname;}?>">
					<label class="mdl-textfield__label">Last Name</label>
				</div>
			</div>
			<div class="col-lg-6 p-t-20">
				<div
				class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
				<input class="mdl-textfield__input" type="email" id="Passengeremail" name="Passengeremail"  value="<?php if(isset($sql->email)){echo $sql->email;}?>">
				<label class="mdl-textfield__label">Email</label>
				<span class="mdl-textfield__error">Enter Valid Email Address!</span>
			</div>
		</div>
		<div class="col-lg-6 p-t-20">
			<div
			class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
			<input class="mdl-textfield__input" type="text"
			pattern="-?[0-9]*(\.[0-9]+)?" id="PassengerMobile" name="PassengerMobile"  value="<?php if(isset($sql->phone)){echo $sql->phone;}?>">
			<label class="mdl-textfield__label" for="text5">Mobile Number</label>
			<span class="mdl-textfield__error">Number required!</span>
		</div>
	</div>
	<div class="col-lg-6 p-t-20">
		<div
		class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
		<input class="mdl-textfield__input" type="text"
		pattern="-?[0-9]*(\.[0-9]+)?" id="PassengerMobile" name="PassengeBalance"  value="<?php if(isset($sql->balance)){echo $sql->balance;}?>">
		<label class="mdl-textfield__label" for="text5">Wallet Balance</label>
		<span class="mdl-textfield__error">Number required!</span>
	</div>
</div>
<div class="col-lg-6 p-t-20">
	<div
	class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
	<input class="mdl-textfield__input" type="text" id="sample2" value="<?php if(isset($sql->status)){echo $sql->status;}?>"
	readonly tabIndex="-1" name="sample2">
	<label for="sample2" class="pull-right margin-0">
		<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
	</label>
	<label for="sample2" class="mdl-textfield__label">Status</label>
	<ul data-mdl-for="sample2"
	class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
	<li class="mdl-menu__item" data-val="DE">active</li>
	<li class="mdl-menu__item" data-val="BY">suspended</li>
	<li class="mdl-menu__item" data-val="BY">pending</li>
</ul>
</div>
</div>
<div class="col-lg-12 p-t-20 text-center">
	<input type="submit"
	class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<!-- end page content -->
<!-- start chat sidebar -->
<div class="chat-sidebar-container" data-close-on-body-click="false">
	<div class="chat-sidebar">
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a href="#quick_sidebar_tab_1" class="nav-link active tab-icon" data-toggle="tab">Theme
				</a>
			</li>

			<li class="nav-item">
				<a href="#quick_sidebar_tab_2" class="nav-link tab-icon" data-toggle="tab"> Settings
				</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane chat-sidebar-settings in show active animated shake" role="tabpanel"
			id="quick_sidebar_tab_1">
			<div class="slimscroll-style">
				<div class="theme-light-dark">
					<h6>Sidebar Theme</h6>
					<button type="button" data-theme="white"
					class="btn lightColor btn-outline btn-circle m-b-10 theme-button">Light
				Sidebar</button>
				<button type="button" data-theme="dark"
				class="btn dark btn-outline btn-circle m-b-10 theme-button">Dark
			Sidebar</button>
		</div>
		<div class="theme-light-dark">
			<h6>Sidebar Color</h6>
			<ul class="list-unstyled">
				<li class="complete">
					<div class="theme-color sidebar-theme">
						<a href="#" data-theme="white"><span class="head"></span><span
							class="cont"></span></a>
							<a href="#" data-theme="dark"><span class="head"></span><span
								class="cont"></span></a>
								<a href="#" data-theme="blue"><span class="head"></span><span
									class="cont"></span></a>
									<a href="#" data-theme="indigo"><span class="head"></span><span
										class="cont"></span></a>
										<a href="#" data-theme="cyan"><span class="head"></span><span
											class="cont"></span></a>
											<a href="#" data-theme="green"><span class="head"></span><span
												class="cont"></span></a>
												<a href="#" data-theme="red"><span class="head"></span><span
													class="cont"></span></a>
												</div>
											</li>
										</ul>
										<h6>Header Brand color</h6>
										<ul class="list-unstyled">
											<li class="theme-option">
												<div class="theme-color logo-theme">
													<a href="#" data-theme="logo-white"><span class="head"></span><span
														class="cont"></span></a>
														<a href="#" data-theme="logo-dark"><span class="head"></span><span
															class="cont"></span></a>
															<a href="#" data-theme="logo-blue"><span class="head"></span><span
																class="cont"></span></a>
																<a href="#" data-theme="logo-indigo"><span class="head"></span><span
																	class="cont"></span></a>
																	<a href="#" data-theme="logo-cyan"><span class="head"></span><span
																		class="cont"></span></a>
																		<a href="#" data-theme="logo-green"><span class="head"></span><span
																			class="cont"></span></a>
																			<a href="#" data-theme="logo-red"><span class="head"></span><span
																				class="cont"></span></a>
																			</div>
																		</li>
																	</ul>
																	<h6>Header color</h6>
																	<ul class="list-unstyled">
																		<li class="theme-option">
																			<div class="theme-color header-theme">
																				<a href="#" data-theme="header-white"><span class="head"></span><span
																					class="cont"></span></a>
																					<a href="#" data-theme="header-dark"><span class="head"></span><span
																						class="cont"></span></a>
																						<a href="#" data-theme="header-blue"><span class="head"></span><span
																							class="cont"></span></a>
																							<a href="#" data-theme="header-indigo"><span class="head"></span><span
																								class="cont"></span></a>
																								<a href="#" data-theme="header-cyan"><span class="head"></span><span
																									class="cont"></span></a>
																									<a href="#" data-theme="header-green"><span class="head"></span><span
																										class="cont"></span></a>
																										<a href="#" data-theme="header-red"><span class="head"></span><span
																											class="cont"></span></a>
																										</div>
																									</li>
																								</ul>
																							</div>
																						</div>
																					</div>
																					<!-- Start Setting Panel -->
																					<div class="tab-pane chat-sidebar-settings animated slideInUp" id="quick_sidebar_tab_2">
																						<div class="chat-sidebar-settings-list slimscroll-style">
																							<div class="chat-header">
																								<h5 class="list-heading">Layout Settings</h5>
																							</div>
																							<div class="chatpane inner-content ">
																								<div class="settings-list">
																									<div class="setting-item">
																										<div class="setting-text">Sidebar Position</div>
																										<div class="setting-set">
																											<select
																											class="sidebar-pos-option form-control input-inline input-sm input-small ">
																											<option value="left" selected="selected">Left</option>
																											<option value="right">Right</option>
																										</select>
																									</div>
																								</div>
																								<div class="setting-item">
																									<div class="setting-text">Header</div>
																									<div class="setting-set">
																										<select
																										class="page-header-option form-control input-inline input-sm input-small ">
																										<option value="fixed" selected="selected">Fixed</option>
																										<option value="default">Default</option>
																									</select>
																								</div>
																							</div>
																							<div class="setting-item">
																								<div class="setting-text">Sidebar Menu </div>
																								<div class="setting-set">
																									<select
																									class="sidebar-menu-option form-control input-inline input-sm input-small ">
																									<option value="accordion" selected="selected">Accordion</option>
																									<option value="hover">Hover</option>
																								</select>
																							</div>
																						</div>
																						<div class="setting-item">
																							<div class="setting-text">Footer</div>
																							<div class="setting-set">
																								<select
																								class="page-footer-option form-control input-inline input-sm input-small ">
																								<option value="fixed">Fixed</option>
																								<option value="default" selected="selected">Default</option>
																							</select>
																						</div>
																					</div>
																				</div>
																				<div class="chat-header">
																					<h5 class="list-heading">Account Settings</h5>
																				</div>
																				<div class="settings-list">
																					<div class="setting-item">
																						<div class="setting-text">Notifications</div>
																						<div class="setting-set">
																							<div class="switch">
																								<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
																								for="switch-1">
																								<input type="checkbox" id="switch-1" class="mdl-switch__input"
																								checked>
																							</label>
																						</div>
																					</div>
																				</div>
																				<div class="setting-item">
																					<div class="setting-text">Show Online</div>
																					<div class="setting-set">
																						<div class="switch">
																							<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
																							for="switch-7">
																							<input type="checkbox" id="switch-7" class="mdl-switch__input"
																							checked>
																						</label>
																					</div>
																				</div>
																			</div>
																			<div class="setting-item">
																				<div class="setting-text">Status</div>
																				<div class="setting-set">
																					<div class="switch">
																						<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
																						for="switch-2">
																						<input type="checkbox" id="switch-2" class="mdl-switch__input"
																						checked>
																					</label>
																				</div>
																			</div>
																		</div>
																		<div class="setting-item">
																			<div class="setting-text">2 Steps Verification</div>
																			<div class="setting-set">
																				<div class="switch">
																					<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
																					for="switch-3">
																					<input type="checkbox" id="switch-3" class="mdl-switch__input"
																					checked>
																				</label>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="chat-header">
																	<h5 class="list-heading">General Settings</h5>
																</div>
																<div class="settings-list">
																	<div class="setting-item">
																		<div class="setting-text">Location</div>
																		<div class="setting-set">
																			<div class="switch">
																				<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
																				for="switch-4">
																				<input type="checkbox" id="switch-4" class="mdl-switch__input"
																				checked>
																			</label>
																		</div>
																	</div>
																</div>
																<div class="setting-item">
																	<div class="setting-text">Save Histry</div>
																	<div class="setting-set">
																		<div class="switch">
																			<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
																			for="switch-5">
																			<input type="checkbox" id="switch-5" class="mdl-switch__input"
																			checked>
																		</label>
																	</div>
																</div>
															</div>
															<div class="setting-item">
																<div class="setting-text">Auto Updates</div>
																<div class="setting-set">
																	<div class="switch">
																		<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect"
																		for="switch-6">
																		<input type="checkbox" id="switch-6" class="mdl-switch__input"
																		checked>
																	</label>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- end chat sidebar -->
							<?php include_once 'footer.php' ?>