<?php include_once 'header.php'; ?>
<!-- start page container -->
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Dashboard</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Dashboard</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button id="onlineBtn" onclick="getStat();" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Go offline</button>
			</div>
		</div>
		<!-- start widget -->
		<div class="row clearfix">
			<div class="col-lg-3 col-md-6 col-sm-12 text-center">
				<div class="card circle">
					<div class="panel-body">
						<div class="m-t-20">
							<?php 
							$sql = json_decode($obj->getRideDetails('driverDayTrips',driver,'',rd));
							$todayTrips = $sql[0]->total;
							?>
							<input type="text" class="knob" value="<?=$todayTrips?>" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#fbbc4d" readonly>
						</div>
						<h4>Trips Today</h4>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12 text-center">
				<div class="card circle">
					<div class="panel-body">
						<div class="m-t-20">
							<input type="text" class="knob" value="<?=$res->total_trips?>" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#18d1ef" readonly>
						</div>
						<h4>Total Trips</h4>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12 text-center">
				<div class="card circle">
					<div class="panel-body">
						<div class="m-t-20">
							<input type="text" class="knob" value="<?=$res->canceled_trips?>" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#F44336" readonly>
						</div>
						<h4>Cancelled</h4>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-12 text-center">
				<div class="card circle">
					<div class="panel-body">
						<div class="m-t-20">
							<input type="text" class="knob" value="<?=$res->completed_trips?>" data-width="90" data-height="90" data-thickness="0.1" data-fgColor="#7836f4" readonly>
						</div>
						<h4>Total Completed Trips</h4>
					</div>
				</div>
			</div>
		</div>
		<!-- end widget -->
		
		<!-- <div class="row">
			<div class="col-lg-8 col-md-12 col-sm-12 col-12">
				<div class="card card-box">
					<div class="card-head">
						<header>Vehicle Details</header>
						<div class="tools">
							<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
							<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
							<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
						</div>
					</div>
					<div class="card-body ">
						<div class="table-wrap">
							<div class="table-responsive tblHeightSet small-slimscroll-style">
								<table class="table display product-overview mb-30" id="support_table">
									<thead>
										<tr>
											<th>#</th>
											<th>Car Model</th>
											<th>Car Type</th>
											<th>Capacity</th>
											<th>License Plates</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>SUV</td>
											<td>$3</td>
											<td>$1</td>
											<td>$10</td>
											<td>
												<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
													<i class="fa fa-pencil"></i>
												</a>
												<button class="btn btn-tbl-delete btn-xs">
													<i class="fa fa-trash-o "></i>
												</button>
											</td>
										</tr>
										<tr>
											<td>2</td>
											<td>SEDAN</td>
											<td>$4</td>
											<td>$2</td>
											<td>$15</td>
											<td>
												<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
													<i class="fa fa-pencil"></i>
												</a>
												<button class="btn btn-tbl-delete btn-xs">
													<i class="fa fa-trash-o "></i>
												</button>
											</td>
										</tr>
										<tr>
											<td>3</td>
											<td>Crossover</td>
											<td>$3.5</td>
											<td>$1</td>
											<td>$12</td>
											<td>
												<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
													<i class="fa fa-pencil"></i>
												</a>
												<button class="btn btn-tbl-delete btn-xs">
													<i class="fa fa-trash-o "></i>
												</button>
											</td>
										</tr>
										<tr>
											<td>4</td>
											<td>Coupe</td>
											<td>$3</td>
											<td>$1</td>
											<td>$10</td>
											<td>
												<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
													<i class="fa fa-pencil"></i>
												</a>
												<button class="btn btn-tbl-delete btn-xs">
													<i class="fa fa-trash-o "></i>
												</button>
											</td>
										</tr>
										<tr>
											<td>5</td>
											<td>Van</td>
											<td>$2</td>
											<td>$1.5</td>
											<td>$10</td>
											<td>
												<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
													<i class="fa fa-pencil"></i>
												</a>
												<button class="btn btn-tbl-delete btn-xs">
													<i class="fa fa-trash-o "></i>
												</button>
											</td>
										</tr>
										<tr>
											<td>6</td>
											<td>Wagon</td>
											<td>$2</td>
											<td>$1</td>
											<td>$20</td>
											<td>
												<a href="edit_booking.html" class="btn btn-tbl-edit btn-xs">
													<i class="fa fa-pencil"></i>
												</a>
												<button class="btn btn-tbl-delete btn-xs">
													<i class="fa fa-trash-o "></i>
												</button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-12 col-sm-12 col-12">
				<div class="card card-box">
					<div class="card-head">
						<header>Drivers List</header>
					</div>
					<div class="card-body ">
						<div class="row">
							<ul class="empListWindow small-slimscroll-style">
								<li>
									<div class="prog-avatar">
										<img src="../assets/img/user/user1.jpg" alt="" width="40" height="40">
									</div>
									<div class="details">
										<div class="title">
											<a href="#">Rajesh Pandya</a>
										</div>
										<div>
											<span class="mobileTxt">3435564456</span>
										</div>
									</div>
								</li>
								<li>
									<div class="prog-avatar">
										<img src="../assets/img/user/user2.jpg" alt="" width="40" height="40">
									</div>
									<div class="details">
										<div class="title">
											<a href="#">Sarah Smith</a>
										</div>
										<div>
											<span class="mobileTxt">464564353456</span>
										</div>
									</div>
								</li>
								<li>
									<div class="prog-avatar">
										<img src="../assets/img/user/user3.jpg" alt="" width="40" height="40">
									</div>
									<div class="details">
										<div class="title">
											<a href="#">John Deo</a>
										</div>
										<div>
											<span class="mobileTxt">45345246464</span>
										</div>
									</div>
								</li>
								<li>
									<div class="prog-avatar">
										<img src="../assets/img/user/user4.jpg" alt="" width="40" height="40">
									</div>
									<div class="details">
										<div class="title">
											<a href="#">Jay Soni</a>
										</div>
										<div>
											<span class="mobileTxt">9787667675</span>
										</div>
									</div>
								</li>
								<li>
									<div class="prog-avatar">
										<img src="../assets/img/user/user5.jpg" alt="" width="40" height="40">
									</div>
									<div class="details">
										<div class="title">
											<a href="#">Jacob Ryan</a>
										</div>
										<div>
											<span class="mobileTxt">79795767563</span>
										</div>
									</div>
								</li>
								<li>
									<div class="prog-avatar">
										<img src="../assets/img/user/user6.jpg" alt="" width="40" height="40">
									</div>
									<div class="details">
										<div class="title">
											<a href="#">Megha Trivedi</a>
										</div>
										<div>
											<span class="mobileTxt">57454365346</span>
										</div>
									</div>
								</li>
								<li>
									<div class="prog-avatar">
										<img src="../assets/img/user/user2.jpg" alt="" width="40" height="40">
									</div>
									<div class="details">
										<div class="title">
											<a href="#">Sarah Smith</a>
										</div>
										<div>
											<span class="mobileTxt">989678768546</span>
										</div>
									</div>
								</li>
								<li>
									<div class="prog-avatar">
										<img src="../assets/img/user/user3.jpg" alt="" width="40" height="40">
									</div>
									<div class="details">
										<div class="title">
											<a href="#">John Deo</a>
										</div>
										<div>
											<span class="mobileTxt">53453464533</span>
										</div>
									</div>
								</li>
								<li>
									<div class="prog-avatar">
										<img src="../assets/img/user/user4.jpg" alt="" width="40" height="40">
									</div>
									<div class="details">
										<div class="title">
											<a href="#">Jay Soni</a>
										</div>
										<div>
											<span class="mobileTxt">45646345734</span>
										</div>
									</div>
								</li>
							</ul>
							<div class="full-width text-center p-t-10">
								<a href="#" class="btn purple btn-outline btn-circle margin-0">View All</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->

		<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12 col-12">
				<div class="card card-box">
					<div class="card-head">
						<header>Trips</header>
					</div>
					<div class="card-body ">
						<div class="row">
							<div class="col-sm-4 col-4 m-b-10">
								<?php 
								$sql = json_decode($obj->getRideDetails('driverWeekTrips',driver,'',rd));
								$week = !empty($sql[0]->total)?$sql[0]->total:0;
								?>
								<span class="text-muted">This Week</span>
								<h5 class="m-b-0"><?=$week?></h5>
							</div>
							<div class="col-sm-4 col-4 m-b-10">
								<?php 
								$sql = json_decode($obj->getRideDetails('driverMonthTrips',driver,'',rd));
								$month = !empty($sql[0]->total)?$sql[0]->total:0;
								?>
								<span class="text-muted">This Month</span>
								<h5 class="m-b-0"><?=$month?></h5>
							</div>
							<div class="col-sm-4 col-4 m-b-10">
								<?php 
								$sql = json_decode($obj->getRideDetails('driverDayTrips',driver,'',rd));
								$today = !empty($sql[0]->total)?$sql[0]->total:0;
								?>
								<span class="text-muted">Today</span>
								<h5 class="m-b-0"><?=$today?></h5>
							</div>
						</div>
						<div id="sparkline28"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12 col-sm-12 col-12">
				<div class="card card-box">
					<div class="card-head">
						<header>Earning</header>
					</div>
					<div class="card-body ">
						<div class="row">
							<div class="col-sm-4 col-4 m-b-10">
								<?php 
								$sql = json_decode($obj->getRideDetails('driverWeekPay',driver,'',tr));
								$WeekPay = !empty($sql[0]->total)?$sql[0]->total:0;;
								?>
								<span class="text-muted">This Week</span>
								<h5 class="m-b-0"><?=$WeekPay?></h5>
								<!-- <span><i class="material-icons text-success">trending_up</i>
								+21%</span> -->
							</div>
							<div class="col-sm-4 col-4 m-b-10">
								<?php 
								$sql = json_decode($obj->getRideDetails('driverMonthPay',driver,'',tr));
								$MonthPay = !empty($sql[0]->total)?$sql[0]->total:0;;
								?>
								<span class="text-muted">This Month</span>
								<h5 class="m-b-0"><?=$MonthPay?></h5>
								<!-- <span><i class="material-icons text-danger">trending_down</i>
								-6.3%</span> -->
							</div>
							<div class="col-sm-4 col-4 m-b-10">
								<?php 
								$sql = json_decode($obj->getRideDetails('driverDayPay',driver,'',tr));
								$DayPay = !empty($sql[0]->total)?$sql[0]->total:0;;
								?>
								<span class="text-muted">Today</span>
								<h5 class="m-b-0"><?=$DayPay?></h5>
								<!-- <span><i class="material-icons text-success">trending_up</i>
								+6%</span> -->
							</div>
						</div>
						<div id="sparkline29"></div>
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