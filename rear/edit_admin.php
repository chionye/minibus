<?php include_once 'header.php' ?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">All Administrators</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
						href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="#">Driver</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">All Administrators</li>
				</ol>
			</div>
		</div>
		<ul class="nav nav-pills nav-pills-rose">
			
		</ul>
		<div class="tab-content tab-space">
			<div class="tab-pane active show" id="tab1">
				<div class="row">
					<div class="col-md-12">
						<div class="card-box">
							<div class="card-head">
								<button id="panel-button"
								class="mdl-button mdl-js-button mdl-button--icon pull-right"
								data-upgraded=",MaterialButton">
								<i class="material-icons">more_vert</i>
							</button>
							<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
							data-mdl-for="panel-button">
							<li class="mdl-menu__item"><i
								class="material-icons">assistant_photo</i>Action</li>
								<li class="mdl-menu__item"><i class="material-icons">print</i>Another
								action</li>
								<li class="mdl-menu__item"><i
									class="material-icons">favorite</i>Something else here</li>
								</ul>
							</div>
							<div class="card-body ">
								<div class="table-scrollable">
									<table class="table table-hover table-checkable order-column full-width"
									id="example4">
									<thead>
										<tr>
											<th></th>
											<th class="center"> Name </th>
											<th class="center"> Access Level </th>
											<th class="center"> Password </th>
											<th class="center"> Joined </th>
											<th class="center">Last Login</th>
										</tr>
									</thead>
									<tbody>
										<?php if (!empty($adminDetails)) {
											foreach ($adminDetails as $key => $value) {
												?>
												<tr class="odd gradeX">
													<td class="user-circle-img sorting_1">
														<img src="../assets/img/user/user1.jpg" alt="">
													</td>
													<td class="center"><?=$value->name?></td>
													<td class="center"><?=$value->level?></td>
													<td class="center"><?=$value->password?></td>
													<td class="center"><?=$value->joined?></td>
													<td class="center"><?=$value->last_login?></td>
													<td class="center">
														<a href="edit_admin_details.php?id=<?=$value->id?>" class="btn btn-tbl-edit btn-xs">
															<i class="fa fa-pencil"></i>
														</a>
														<a class="btn btn-tbl-delete btn-xs" onclick="deleteInfo('administrators','<?=$value->id?>','id')">
															<i class="fa fa-trash-o "></i>
														</a>
													</td>
												</tr>
											<?php }} ?>
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
<!-- end page content -->
<?php include_once 'footer.php' ?>