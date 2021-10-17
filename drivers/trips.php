<?php include_once 'header.php'; ?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">My Trips</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="#">My Trips</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">My Trips</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-box">
					<div class="card-head">
						<header>Active Trips</header>
						<div class="tools">
							<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
							<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
							<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
						</div>
					</div>
					<div class="card-body ">
						<div class="table-scrollable">
							<table id="tableExport" class="display">
								<thead>
									<tr>
										<th>#</th>
										<th>Trip Id</th>
										<th>Passenger Name</th>
										<th>Trip From</th>
										<th>Trip To</th>
										<th>Start Time</th>
										<th>Status</th>
										<th>View Route</th>
									</tr>
								</thead>
								<tbody>
									<?php $getDriverTrips = json_decode($obj->getRideDetails('driverTrips', driver, '', rd));
									$i = 1;
									if (!empty($getDriverTrips)) {
										foreach ($getDriverTrips as $key => $value) {
											?>
											<tr>
												<td><?= $i ?></td>
												<td><?= $value->trip_id ?></td>
												<td><?php $pass = json_decode($obj->getRideDetails('passDetails', $value->customer_id, '', mt));
												$passDets = $pass[0];
												echo $passDets->first_name . " " . $passDets->lastname ?></td>
												<td><?= $value->location ?></td>
												<td><?= $value->destination ?></td>
												<td><?= $value->pickup_time ?></td>
												<td><?= $value->status ?></td>
												<td>
													<a href="route.php?id=<?= base64_encode($value->id) ?>" class="btn btn-tbl-delete btn-xs">
														<i class="fa fa-map-marker"></i>
													</a>
												</td>
											</tr>
											<?php
											$i++; }}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end page content -->
	</div>
	<!-- end page container -->
	<?php include_once 'footer.php'; ?>