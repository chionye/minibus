<?php include_once 'header.php'; ?>
<!-- start page content -->
<?php 
if (! function_exists('imap_open')) {
	$res = 'none';
} else {
	$res = json_decode($obj->getEmails());
}
$res = json_decode($obj->getEmails()); ?>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Inbox</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
						href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="#">Email</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Inbox</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-topline-gray">
					<div class="card-body no-padding height-9">
						<div class="inbox">
							<div class="row">
								<div class="col-md-3">
									<div class="inbox-sidebar">
										<a href="email_compose.php" data-title="Compose"
										class="btn red compose-btn btn-block">
										<i class="fa fa-edit"></i> Compose </a>
										<ul class="inbox-nav inbox-divider">
											<li class="active"><a href="email_inbox.html"><i
												class="fa fa-inbox"></i> Inbox <span
												class="label mail-counter-style label-danger pull-right"><?=count($res)?></span></a>
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
											<div class="mail-option no-pad-left">
												<div class="btn-group group-padding">
													<button
													class="mdl-button mdl-js-button mdl-button--icon margin-right-10 tooltips"
													data-placement="top" data-original-title="Refresh">
													<i class="material-icons">refresh</i>
												</button>
												<button
												class="mdl-button mdl-js-button mdl-button--icon margin-right-10 tooltips"
												data-placement="top" data-original-title="Archive">
												<i class="material-icons">archive</i>
											</button>
											<button
											class="mdl-button mdl-js-button mdl-button--icon margin-right-10 tooltips"
											data-placement="top" data-original-title="Delete">
											<i class="material-icons">delete</i>
										</button>
										<button
										class="mdl-button mdl-js-button mdl-button--icon margin-right-10 tooltips"
										data-placement="top" data-original-title="Folder">
										<i class="material-icons">folder</i>
									</button>
								</div>
								<div class="btn-group pull-right btn-prev-next">
									<button
									class="mdl-button mdl-js-button mdl-button--icon margin-right-10 tooltips"
									data-placement="top" data-original-title="Previous">
									<i class="material-icons">keyboard_arrow_left</i>
								</button>
								<button
								class="mdl-button mdl-js-button mdl-button--icon margin-right-10 tooltips"
								data-placement="top" data-original-title="Next">
								<i class="material-icons">keyboard_arrow_right</i>
							</button>
						</div>
						<div class="todo-check pull-left m-l-20">
							<input type="checkbox" value="None" id="todo-check30">
							<label for="todo-check30"></label>
						</div>
					</div>
				</div>
				<div class="inbox-body no-pad table-responsive">
					<table class="table table-inbox table-hover">
						<tbody>
							<?php
							if ($res == 'done') {
								echo '<tr class="unread"><td class="inbox-small-cells">You have no mails</td></tr>';
							}else{
								if (!empty($res)) {
									$count = count($res);
									for ($i=0; $i < $count  ; $i++) { 
										foreach ($res[$i][0] as $key => $value) {
											?>
											<tr class="unread">
												<td class="inbox-small-cells">
													<div class="todo-check pull-left">
														<input type="checkbox" value="None"
														id="todo-check1">
														<label for="todo-check1"></label>
													</div>
												</td>
												<td class="inbox-small-cells"><i
													class="fa fa-star inbox-started"></i>
												</td>
												<td>
													<a href="#" class="avatar">
														<img src="../../assets/img/user/user8.jpg"
														alt="">
													</a>
												</td>
												<td class="view-message  dont-show"><?=$value->from?></td>
												<td class="view-message "><a
													href="email_compose.php"><?=$value->subject?></a></td>
													<td class="view-message  inbox-small-cells"><i
														class="fa fa-paperclip"></i>
													</td>
													<td class="view-message  text-right"><small><b><?=$value->date?></b></small></td>
												</tr>
											<?php }}}}?>
										</tbody>
									</table>
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
						<?php include_once 'footer.php'; ?>