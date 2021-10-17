<?php include_once 'header.php'; ?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">User Profile</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="#">Extra</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">User Profile</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<!-- BEGIN PROFILE SIDEBAR -->
				<div class="profile-sidebar">
					<div class="card card-topline-aqua">
						<div class="card-body no-padding height-9">
							<div class="row">
								<div class="profile-userpic">
									<div id="resizer-demo"></div>
									<input type="file" id="d" hidden name="customFile" onchange="showPreview(this)">
								</div>
							</div>
							<div class="profile-usertitle">
								<div class="profile-usertitle-name"><?=$res->firstname?></div>
								<div class="profile-usertitle-job"> Driver </div>
							</div>
							<ul class="list-group list-group-unbordered">
								<li class="list-group-item">
									<b>Total Completed Trips</b> <a class="pull-right"><?=$res->total_trips?></a>
								</li>
								<li class="list-group-item">
									<b>Total Amount Gained</b> <a class="pull-right">$<?=$res->total_trips?></a>
								</li>
								<li class="list-group-item">
									<b>Member Since</b> <a class="pull-right"><?=$res->joined?></a>
								</li>
							</ul>
							<!-- END SIDEBAR USER TITLE -->
							<!-- SIDEBAR BUTTONS -->
							<div class="profile-userbuttons">
								<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-primary" onclick="document.getElementById('d').click()">Browse</button>
								<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-circle btn-pink" id="submitPic">Submit</button>
							</div>
							<!-- END SIDEBAR BUTTONS -->
						</div>
					</div>
					<div class="card">
						<div class="card-head card-topline-aqua">
							<header>Driving Region</header>
						</div>
						<div class="card-body no-padding height-9">
							<div class="profile-desc">
								<div id="vmap_usa" class="vmaps "></div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-head card-topline-aqua">
							<header>Address</header>
						</div>
						<div class="card-body no-padding height-9">
							<div class="row text-center m-t-10">
								<div class="col-md-12">
									<p><?=$res->address1?>, <?=$res->city?>
									<br> <?=$res->country?>.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-head card-topline-aqua">
							<header>Star Rating</header>
						</div>
						<div class="card-body no-padding height-9">
							<div class="work-monitor work-progress">
								<div class="states">
									<div class="info">
										<div class="desc pull-left">Stars</div>
										<div class="percent pull-right">50%</div>
									</div>
									<div class="progress progress-xs">
										<div class="progress-bar progress-bar-danger progress-bar-striped active width-75" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
											<span class="sr-only">50% </span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END BEGIN PROFILE SIDEBAR -->
				<!-- BEGIN PROFILE CONTENT -->
				<div class="profile-content">
					<div class="row">
						<div class="profile-tab-box">
							<div class="p-l-20">
								<ul class="nav ">
									<li class="nav-item tab-all"><a class="nav-link active show" href="#tab1" data-toggle="tab">About Me</a></li>
									<li class="nav-item tab-all p-l-20"><a class="nav-link" href="#tab3" data-toggle="tab">Settings</a></li>
								</ul>
							</div>
						</div>
						<div class="white-box">
							<!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane active fontawesome-demo" id="tab1">
									<div id="biography">
										<div class="row">
											<div class="col-md-3 col-6 b-r"> <strong>Full Name</strong>
												<br>
												<p class="text-muted"><?=$res->firstname?> <?=$res->lastname?></p>
											</div>
											<div class="col-md-3 col-6 b-r"> <strong>Mobile</strong>
												<br>
												<p class="text-muted"><?=$res->phone?></p>
											</div>
											<div class="col-md-3 col-6 b-r"> <strong>Email</strong>
												<br>
												<p class="text-muted"><?=$res->email?></p>
											</div>
											<div class="col-md-3 col-6"> <strong>Location</strong>
												<br>
												<p class="text-muted"><?=$res->country?></p>
											</div>
										</div>
										<hr>
										<?=$res->about?>
										<br>
									</div>
								</div>
								<div class="tab-pane" id="tab3">
									<div class="row">
										<div class="col-md-12 col-sm-12">
											<div class="card-head">
												<header>Password Change</header>
												<button id="panel-button2" class="mdl-button mdl-js-button mdl-button--icon pull-right" data-upgraded=",MaterialButton">
													<i class="material-icons">more_vert</i>
												</button>
												<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="panel-button2">
													<li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
													</li>
													<li class="mdl-menu__item"><i class="material-icons">print</i>Another action
													</li>
													<li class="mdl-menu__item"><i class="material-icons">favorite</i>Something
													else here</li>
												</ul>
											</div>
											<div class="card-body " id="bar-parent1">
												<form id="changePass">
													<div class="form-group">
														<label for="simpleFormPassword">Current
														Password</label>
														<input type="password" class="form-control" id="simpleFormPassword" placeholder="Current Password" name="oldPass">
													</div>
													<div class="form-group">
														<label for="simpleFormPassword">New Password</label>
														<input type="password" class="form-control" id="newpassword" placeholder="New Password" name="newPass">
													</div>
													<button type="submit" class="btn btn-primary">Submit</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END PROFILE CONTENT -->
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
				<div class="tab-pane chat-sidebar-settings in show active animated shake" role="tabpanel" id="quick_sidebar_tab_1">
					<div class="slimscroll-style">
						<div class="theme-light-dark">
							<h6>Sidebar Theme</h6>
							<button type="button" data-theme="white" class="btn lightColor btn-outline btn-circle m-b-10 theme-button">Light
							Sidebar</button>
							<button type="button" data-theme="dark" class="btn dark btn-outline btn-circle m-b-10 theme-button">Dark
							Sidebar</button>
						</div>
						<div class="theme-light-dark">
							<h6>Sidebar Color</h6>
							<ul class="list-unstyled">
								<li class="complete">
									<div class="theme-color sidebar-theme">
										<a href="#" data-theme="white"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="dark"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="blue"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="indigo"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="cyan"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="green"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="red"><span class="head"></span><span class="cont"></span></a>
									</div>
								</li>
							</ul>
							<h6>Header Brand color</h6>
							<ul class="list-unstyled">
								<li class="theme-option">
									<div class="theme-color logo-theme">
										<a href="#" data-theme="logo-white"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="logo-dark"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="logo-blue"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="logo-indigo"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="logo-cyan"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="logo-green"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="logo-red"><span class="head"></span><span class="cont"></span></a>
									</div>
								</li>
							</ul>
							<h6>Header color</h6>
							<ul class="list-unstyled">
								<li class="theme-option">
									<div class="theme-color header-theme">
										<a href="#" data-theme="header-white"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="header-dark"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="header-blue"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="header-indigo"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="header-cyan"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="header-green"><span class="head"></span><span class="cont"></span></a>
										<a href="#" data-theme="header-red"><span class="head"></span><span class="cont"></span></a>
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
										<select class="sidebar-pos-option form-control input-inline input-sm input-small ">
											<option value="left" selected="selected">Left</option>
											<option value="right">Right</option>
										</select>
									</div>
								</div>
								<div class="setting-item">
									<div class="setting-text">Header</div>
									<div class="setting-set">
										<select class="page-header-option form-control input-inline input-sm input-small ">
											<option value="fixed" selected="selected">Fixed</option>
											<option value="default">Default</option>
										</select>
									</div>
								</div>
								<div class="setting-item">
									<div class="setting-text">Sidebar Menu </div>
									<div class="setting-set">
										<select class="sidebar-menu-option form-control input-inline input-sm input-small ">
											<option value="accordion" selected="selected">Accordion</option>
											<option value="hover">Hover</option>
										</select>
									</div>
								</div>
								<div class="setting-item">
									<div class="setting-text">Footer</div>
									<div class="setting-set">
										<select class="page-footer-option form-control input-inline input-sm input-small ">
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
											<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-1">
												<input type="checkbox" id="switch-1" class="mdl-switch__input" checked>
											</label>
										</div>
									</div>
								</div>
								<div class="setting-item">
									<div class="setting-text">Show Online</div>
									<div class="setting-set">
										<div class="switch">
											<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-7">
												<input type="checkbox" id="switch-7" class="mdl-switch__input" checked>
											</label>
										</div>
									</div>
								</div>
								<div class="setting-item">
									<div class="setting-text">Status</div>
									<div class="setting-set">
										<div class="switch">
											<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-2">
												<input type="checkbox" id="switch-2" class="mdl-switch__input" checked>
											</label>
										</div>
									</div>
								</div>
								<div class="setting-item">
									<div class="setting-text">2 Steps Verification</div>
									<div class="setting-set">
										<div class="switch">
											<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-3">
												<input type="checkbox" id="switch-3" class="mdl-switch__input" checked>
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
											<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-4">
												<input type="checkbox" id="switch-4" class="mdl-switch__input" checked>
											</label>
										</div>
									</div>
								</div>
								<div class="setting-item">
									<div class="setting-text">Save Histry</div>
									<div class="setting-set">
										<div class="switch">
											<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-5">
												<input type="checkbox" id="switch-5" class="mdl-switch__input" checked>
											</label>
										</div>
									</div>
								</div>
								<div class="setting-item">
									<div class="setting-text">Auto Updates</div>
									<div class="setting-set">
										<div class="switch">
											<label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-6">
												<input type="checkbox" id="switch-6" class="mdl-switch__input" checked>
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
</div>
<!-- end page container -->
<?php include_once 'footer.php'; ?>