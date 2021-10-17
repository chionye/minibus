<?php require_once 'header.php'; ?>															<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">New Mail</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
						href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="#">Email</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Compose</li>
				</ol>
			</div>
		</div>
		<div class="inbox">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-topline-gray">
						<div class="card-body no-padding height-9">
							<div class="row">
								<div class="col-md-3">
									<div class="inbox-sidebar">
										<a href="email_compose.php" data-title="Compose"
										class="btn red compose-btn btn-block m-0">
										<i class="fa fa-edit"></i> Compose </a>
										<ul class="inbox-nav inbox-divider">
											<li class="active"><a href="message_inbox.php"><i class="fa fa-inbox"></i> Inbox
												<span
												class="label mail-counter-style label-danger pull-right">2</span></a>
											</li>
											<li><a href="#"><i class="fa fa-envelope"></i> Sent Mail</a>
											</li>
											<li><a href="#"><i class="fa fa-briefcase"></i> Important</a>
											</li>
											<li><a href="#"><i class="fa fa-star"></i> Starred </a>
											</li>
											<li><a href="#"><i class=" fa fa-external-link"></i> Drafts
												<span
												class="label mail-counter-style label-info pull-right">30</span></a>
											</li>
											<li><a href="#"><i class=" fa fa-trash-o"></i> Trash</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-md-9">
									<div class="inbox-body">
										<div class="inbox-header">
											<div class="mail-option">
												<h4>Compose Mail</h4>
											</div>
										</div>
										<div class="inbox-body no-pad">
											<div class="mail-list">
												<div class="compose-mail">
													<form method="post">
														<div class="form-group">
															<label for="to" class="">To:</label>
															<input type="text" tabindex="1" id="to"
															class="form-control">
															<div class="compose-options">
																<a onclick="$(this).hide(); $('#cc').parent().removeClass('hidden'); $('#cc').focus();"
																href="javascript:;">Cc</a>
																<a onclick="$(this).hide(); $('#bcc').parent().removeClass('hidden'); $('#bcc').focus();"
																href="javascript:;">Bcc</a>
															</div>
														</div>
														<div class="form-group hidden">
															<label for="cc" class="">Cc:</label>
															<input type="text" tabindex="2" id="cc"
															class="form-control">
														</div>
														<div class="form-group hidden">
															<label for="bcc" class="">Bcc:</label>
															<input type="text" tabindex="2" id="bcc"
															class="form-control">
														</div>
														<div class="form-group">
															<label for="subject" class="">Subject:</label>
															<input type="text" tabindex="1" id="subject"
															class="form-control">
														</div>
														<div class="compose-editor">
															<div id="summernote"></div>
														</div>
														<div class="btn-group margin-top-20 ">
															<button
															class="btn btn-primary btn-sm margin-right-10"><i
															class="fa fa-check"></i> Send</button>
															<button
															class="btn btn-sm btn-default margin-right-10"><i
															class="fa fa-times"></i>
														Discard</button>
													</div>
												</form>
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
						</div>
						<?php require_once 'footer.php'; ?>