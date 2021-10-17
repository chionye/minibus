<?php include_once 'header.php'; ?>
<?php 
$data = $obj->generalSelectStatement(sel.rd." order by date DESC limit 10")->_general_result;
?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Dashboard</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
						href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Dashboard</li>
				</ol>
			</div>
		</div>
		<!-- Taxi live location start -->
		<div class="row">
			<div class="col-md-12">
				<div class="card card-box">
					<div class="card-head">
						<header>Taxi Live Location</header>
						<div class="tools">
							<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
							<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
							<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
						</div>
					</div>
					<div class="card-body ">
						<div id="map-layer" class="height-350"></div>
					</div>
				</div>
			</div>
		</div>
		<!-- Taxi live location end -->
		<div class="row">
			<div class="col-xl-6 col-md-12">
				<div class="card">
					<div class="card-block">
						<div class="row text-center p-t-10">
							<div class="col-sm-4 col-6">
								<?php 
								$get = json_decode($obj->getRideDetails('adminDayPay', '', '', tr));
								$res = $get[0];
								?>
								<h4 class="margin-0"><?php if(!empty($res->total)){echo $res->total;}else{echo "0";}?></h4>
								<p class="text-muted"> Today's Income</p>
							</div>
							<div class="col-sm-4 col-6">
								<?php 
								$get = json_decode($obj->getRideDetails('adminWeekPay', '', '', tr));
								$res = $get[0];
								?>
								<h4 class="margin-0"><?php if(!empty($res->total)){echo $res->total;}else{echo "0";}?></h4>
								<p class="text-muted">This Week's Income</p>
							</div>
							<div class="col-sm-4 col-6">
								<?php 
								$get = json_decode($obj->getRideDetails('adminMonthPay', '', '', tr));
								$res = $get[0];
								?>
								<h4 class="margin-0"><?php if(!empty($res->total)){echo $res->total;}else{echo "0";}?></h4>
								<p class="text-muted">This Month's Income</p>
							</div>
						</div>
						<div id="area_line_chart" style="height: 200px; margin:30px"></div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12 col-sm-12 col-12">
				<div class="row state-overview">
					<div class="col-lg-6 col-md-6 col-sm-6 col-12">
						<div class="info-box bg-b-purple">
							<span class="info-box-icon push-bottom"><i
								class="material-icons">directions_car</i></span>
								<div class="info-box-content">
									<span class="info-box-text">Completed Trips</span>
									<?php 
									$get = json_decode($obj->getRideDetails('Trips', 'completed_trips', '', drv));
									$res = $get[0];
									?>
									<span class="info-box-number"><?=$res->trips?></span>
									<div class="progress">
										<div class="progress-bar width-100"></div>
									</div>
									<!-- <span class="progress-description">
										60% Increase in 28 Days
									</span> -->
								</div>
								<!-- /.info-box-content -->
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-12">
							<div class="info-box bg-b-green">
								<span class="info-box-icon push-bottom"><i
									class="material-icons">cancel</i></span>
									<div class="info-box-content">
										<span class="info-box-text">Cancelled Trip</span>
										<?php 
										$get = json_decode($obj->getRideDetails('Trips', 'canceled_trips', '', drv));
										$res = $get[0];
										?>
										<span class="info-box-number"><?=$res->trips?></span>
										<div class="progress">
											<div class="progress-bar width-100"></div>
										</div>
									</div>
									<!-- /.info-box-content -->
								</div>
							</div>
						</div>
						<div class="row state-overview">
							<div class="col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="info-box bg-b-black">
									<span class="info-box-icon push-bottom"><i
										class="material-icons">person</i></span>
										<div class="info-box-content">
											<span class="info-box-text">Users</span>
											<?php 
											$get = json_decode($obj->getRideDetails('UsersTotal', '', '', ''));
											$res = $get[0];
											?>
											<span class="info-box-number"><?=$res->total?></span>
											<div class="progress">
												<div class="progress-bar width-100"></div>
											</div>
										</div>
										<!-- /.info-box-content -->
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 col-12">
									<div class="info-box bg-b-danger">
										<span class="info-box-icon push-bottom"><i
											class="material-icons">monetization_on</i></span>
											<div class="info-box-content">
												<span class="info-box-text">Total Earnings</span>
												<?php 
												$get = json_decode($obj->getRideDetails('Trips', 'trans_tax', '', tr));
												$res = $get[0];
												?>
												<span class="info-box-number"><?=$res->trips?></span><span>$</span>
												<div class="progress">
													<div class="progress-bar width-100"></div>
												</div>
											</div>
											<!-- /.info-box-content -->
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- chart start -->
						<!-- <div class="row">
							<div class="col-md-12">
								<div class="card card-box">
									<div class="card-head">
										<header>Chart Survey</header>
										<div class="tools">
											<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
											<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
											<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
										</div>
									</div>
									<div class="card-body no-padding height-9">
										<div class="row text-center">
											<div class="col-sm-3 col-6">
												<h4 class="margin-0">$ 209 </h4>
												<p class="text-muted"> Today's Income</p>
											</div>
											<div class="col-sm-3 col-6">
												<h4 class="margin-0">$ 837 </h4>
												<p class="text-muted">This Week's Income</p>
											</div>
											<div class="col-sm-3 col-6">
												<h4 class="margin-0">$ 3410 </h4>
												<p class="text-muted">This Month's Income</p>
											</div>
											<div class="col-sm-3 col-6">
												<h4 class="margin-0">$ 78,000 </h4>
												<p class="text-muted">This Year's Income</p>
											</div>
										</div>
										<div class="row">
											<div id="line_chart" class="full-width"></div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
						<div class="row">
							<div class="col-lg-8 col-md-12 col-sm-12 col-12">
								<div class="card-box ">
									<div class="card-head">
										<header>Guest Review</header>
										<div class="tools">
											<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
											<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
											<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
										</div>
									</div>
									<div class="card-body ">
										<div class="row">
											<ul class="docListWindow small-slimscroll-style">
												<?php if(!empty($data)){
													foreach ($data as $key => $value) {
														$user = json_decode($obj->getRideDetails('passDetails',$value->customer_id,'',mt));
														$fname = $user[0]->first_name;
														$lname = $user[0]->lastname;
														?>
														<li>
															<div class="row">
																<div class="col-md-8 col-sm-8">
																	<div class="prog-avatar">
																		<img src="<?php if(!empty($user->picture)){echo $user->picture;}else{echo '../images/profile.png';} ?>" alt="" width="40"
																		height="40">
																	</div>
																	<div class="details">
																		<div class="title">
																			<a href="comment.php?id=<?=$value->id?>"><?=$fname?> <?=$fname?></a>
																			<p class="rating-text"><?=$value->comment?></p>
																		</div>
																	</div>
																</div>
																<div class="col-md-4 col-sm-4 rating-style">
																	<?php if(!empty($value->p_star_rating)){echo $value->p_star_rating." stars";}else{echo "no star rating or comments";}?>
																</div>
															</div>
														</li>
													<?php }}else{
														echo "The most recent comments will show up here";
													} ?>
												</ul>
												<div class="full-width text-center p-t-10">
													<a href="all_comments.php" class="btn purple btn-outline btn-circle margin-0">View All</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-12 col-sm-12 col-12">
									<div class="card card-box">
										<div class="card-head">
											<header>Drivers Online</header>
										</div>
										<div class="card-body">
											<div class="row">
												<ul class="empListWindow small-slimscroll-style" id="onlineDrivers">
													<li>No drivers online</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- end page content -->
					<?php include 'footer.php'; ?>