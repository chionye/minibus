<?php include_once 'header.php' ?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">All Comments</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
						href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="#">Comments</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">All Comments</li>
				</ol>
			</div>
		</div>
		<!-- <ul class="nav nav-pills nav-pills-rose">
			<li class="nav-item tab-all"><a class="nav-link active show" href="#tab1" data-toggle="tab">List
			View</a></li>
		</ul> -->
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
											<th class="center"> Trip Id </th>
											<th class="center"> Date </th>
											<th class="center"> Location </th>
											<th class="center">Destination</th>
											<th class="center">Status</th>
											<th class="center"> Action </th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$s = $obj->generalSelectStatement(sel.rd.' where status = "completed" order by date desc');$res = $s->_general_result; 
										if (!empty($res)) {
											foreach ($res as $key => $value) {
												$user = json_decode($obj->getRideDetails('passDetails',$value->customer_id,'',mt));
												$fname = $user[0]->first_name.' '.$user[0]->lastname;
												?>
												<tr class="odd gradeX">
													<td class="user-circle-img sorting_1">
														<img src="<?php if(!empty($user[0]->picture)){echo $user[0]->picture;}else{echo '../images/profile.png';}?>" alt="" width="50px">
													</td>
													<td class="center"><?=$fname?></td>
													<td class="center"><?=$value->trip_id?></td>
													<td class="center"><?=$value->date?></td>
													<td class="center"><?=$value->location?></td>
													<td class="center"><?=$value->destination?></td>
													<td>
														<span
														class="label label-sm box-shadow-1 label-success"><?=$value->status?></span>
													</td>
													<td class="center">
														<a href="comment.php?id=<?=$value->id?>" class="btn btn-tbl-edit btn-xs">
															<i class="fa fa-pencil"></i>
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