<?php include_once 'header.php'; ?>
<!-- start page content -->
<?php if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "select * from ".adt.wh.$id;
	$sql = $obj->generalSelectStatement($query);
	$res = $sql->_general_result[0];
} ?>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Add Administrator</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
						href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="#">Administrator Management</a>&nbsp;<i
						class="fa fa-angle-right"></i>
					</li>
					<li class="active">Add Administrator</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card-box">
					<div class="card-head">
						<header>Add Administrator</header>
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
			<form id="editAdmin">
				<div class="card-body row">
					<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
						<div
						class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
						<input class="mdl-textfield__input" type="text" id="level" value="<?=$res->level?>"
						name="editLevel">
						<!-- <label for="level" class="pull-right margin-0">
							<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
						</label> -->
						<label for="level" class="mdl-textfield__label">Clearance level</label>
						<!-- <ul data-mdl-for="level" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
							<li class="mdl-menu__item" data-val="1">Level 0</li>
							<li class="mdl-menu__item" data-val="2">Level 1</li>
							<li class="mdl-menu__item" data-val="3">Level 2</li>
							<li class="mdl-menu__item" data-val="3">Level 3</li>
						</ul> -->
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
					<div
					class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
					<input class="mdl-textfield__input" type="text"
					id="editAdminName" name="editAdminName" value="<?=$res->name?>">
					<label class="mdl-textfield__label" for="editAdminName">Name</label>
					<span class="mdl-textfield__error">Name required!</span>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 p-t-20">
				<div
				class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
				<input class="mdl-textfield__input" type="text"
				id="editAdminPass" name="editAdminPass" value="<?=$res->password?>">
				<input type="hidden" value="<?=$id?>" name='id'>
				<label class="mdl-textfield__label" for="editAdminPass">Password
				</label>
				<span class="mdl-textfield__error">password required!</span>
			</div>
		</div>
		<div class="col-lg-12 p-t-20 text-center">
			<input type="submit"
			class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink" name="editAdminSubbtn">
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
							<?php include_once 'footer.php'; ?>