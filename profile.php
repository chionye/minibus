<?php include_once 'header.php'; ?>
<?php 
if (!isset($_SESSION['uid']) ){
	header("location:login.php");
}
$sql = json_decode($obj->getRideDetails('passDetails',user,'',mt));
$res = $sql[0];
?>
<div class="top-bar_sub_mini container-fluid">
	<div class="row">
		<div class="col-md-4 col-sm-5 col-6 text-left">
			<a class="index.php" href="index.php">
				<i class="material-icons f-left m-icon text-dark">arrow_back</i>
			</a>
		</div>
		<div class="col-md-4 col-sm-2 logo d-md-block d-sm-none d-none">
			<a class="" href="javascript:void(0);">
				<img src="images/minibus.png" style="width:50%;">
			</a>
		</div>
		<div class="col-md-4 col-sm-5 col-6 text-right">
			<div class="dropdown show">
				<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-user-circle fa-2x"></i>
				</a>
				<div class="dropdown-menu bg-light card-background-image shadow" aria-labelledby="dropdownMenuLink">
					<a class="dropdown-item text-dark" href="profile.php">Profile</a>
					<a class="dropdown-item text-dark" href="logout.php">Logout</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-4 col-sm-6 col-12 center-card">
		<form class="text-center" id="passengerBookingForm">
			<div class="card shadow card-background-image">
				<div class="m-3">
					<h4 class="h5 text-white text-right">User Profile</h4>
				</div>
				<div class="card-body p-3">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-10 offset-lg-3 offset-md-3 offset-sm-3 offset-1">
							<img src="<?php if(!empty($res->picture)){echo $res->picture;}else{echo 'images/profile.png';}?>" class="rounded-circle" width="100px">
						</div>
					</div>
					<p class="lead"><?php if(isset($res->first_name)){echo $res->first_name.' '.$res->lastname;}else{echo "John Doe";} ?></p>
					<div class="dropdown-divider"></div>
					<div class="text-left">
						<p class="lead">Email: <?=$res->email?></p>
						<!-- <p class="lead">Account Balance: <?=$res->balance?></p> -->
						<p class="lead">Mobile: <?=$res->phone?></p>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="col-lg-8">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class=" p-2">
						<ul class="nav nav-pills" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Trips</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Account Settings</a>
							</li>
<!-- <li class="nav-item">
<a class="nav-link" id="pills-fund-tab" data-toggle="pill" href="#pills-fund" role="tab" aria-controls="pills-fund" aria-selected="false">Fund Account</a>
</li> -->
</ul>
</div>
<div class="tab-content" id="pills-tabContent">
	<div class="tab-pane fade show active  shadow" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
		<?php 
		$user = json_decode($obj->getRideDetails('passTrips',user,'',rd));
		?>
		<div class="table-responsive mt-2 p-2">
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Driver Name</th>
						<th>Pick-Up Location</th>
						<th>Destination</th>
						<th>Status</th>
						<th>Fare</th>
						<th>Date</th>
						<th>View</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					if (!empty($user)) {
						foreach ($user as $key => $value) {
							$drvr = json_decode($obj->getRideDetails('driverDetails', $value->driver_id,'',drv));
							$driv = $drvr[0];
							?>
							<tr>
								<td><?=$driv->firstname?> <?=$driv->lastname?></td>
								<td><?=$value->location?></td>
								<td><?=$value->destination?></td>
								<td><?=$value->status?></td>
								<td><?=$value->fare?></td>
								<td><?=$value->pickup_time?></td>
								<td><a href="trip.php?tid=<?=$value->trip_id?>" class="nav-link"><i class="fas fa-street-view"></i></a></td>
							</tr>
						<?php }}else{
							echo "<tr><th colspan='7' class='text-center'>You have not made any trips yet</th></tr>";
						} ?>
					</tfoot>
				</table>
			</div>
		</div>
		<div class="tab-pane fade  shadow" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6 mb-2 mt-2">
								<button type="button" class="btn btn-info btn-block shadow" onclick="document.getElementById('d').click()">Browse</button>
							</div>
							<div class="col-md-6 mb-2 mt-2">
								<button type="button" class="btn btn-info btn-block shadow" id="submitPic">save image</button>
							</div>
						</div>
						<div id="resizer-demo"></div>
						<input type="file" id="d" hidden name="customFile" onchange="showPreview(this)">
					</div>
					<div class="col-md-6 mt-2">
						<form id="passDetails">
							<h4 class="card-title">My Profile</h4>
							<div class="form-group">
								<input type="text" placeholder="First Name" class="form-control p-4" name="passengerAccountFName" value="<?=$res->first_name?>">
							</div>
							<!-- Password -->
							<div class="form-group">
								<input type="text" class="form-control p-4" placeholder="Last Name" aria-describedby="defaultLoginFormPasswordHelpBlock" name="passengerAccountLName" value="<?=$res->lastname?>">
							</div>
							<div class="form-group">
								<input type="email" class="form-control p-4" placeholder="Email" aria-describedby="defaultLoginFormPasswordHelpBlock" name="passengerAccountEmail" value="<?=$res->email?>">
							</div>
							<div class="form-group">
								<input type="text" class="form-control p-4" placeholder="Phone" aria-describedby="defaultLoginFormPasswordHelpBlock" name="passengerAccountPhone" value="<?=$res->phone?>">
							</div>
							<div class="form-group">
								<input type="password" class="form-control p-4" placeholder="Password" aria-describedby="defaultLoginFormPasswordHelpBlock" name="passengerAccountPass1">
							</div>
							<div class="form-group">
								<input type="password" class="form-control p-4" placeholder="Repeat Password" aria-describedby="defaultLoginFormPasswordHelpBlock" name="passengerAccountPass2">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-info btn-block shadow">Update Details</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="pills-fund" role="tabpanel" aria-labelledby="pills-fund-tab">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 offset-md-3">
						<div class="card shadow card-background-image mt-2">
							<div class="card-body">
								<img src="images/pay.png" class="card-img-top" alt="...">
								<p class="h4 text-right">Fund your wallet</p>
								<div class="text-center">
									<form>
										<div class="form-group">
											<select class="form-control" id="exampleFormControlSelect1">
												<option>Choose payment platform</option>
												<option>Paypal</option>
												<option>Paystack</option>
											</select>
										</div>
										<form>
											<div class="form-group">
												<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
											</div>
											<div class="form-group">
												<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Amount">
											</div>
											<button type="submit" class="btn btn-info shadow">Pay</button>
										</form>
										<p class="lead">we accept</p>
										<img src="images/secured.png">
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
<!-- Default form register -->
<div class="entire-page mt-2">
	<div class="foots" style="height: 200px;"></div>
	<p class="text-muted text-right pos-txt"><a href="index.php"><img src="images/minibus.png" class="logobottom"></a></p>
</div>
<script src="main/js/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	});

</script>
<script src="main/js/SmoothScroll.min.js"></script>
<script src="main/js/move-top.js"></script>
<script src="main/js/easing.js"></script>
<script src="main/js/responsiveslides.min.js"></script>
<script src="main/js/owl.carousel.js"></script>
<script src="main/js/jquery-migrate-3.0.1.min.js"></script>
<script src="main/js/popper.min.js"></script>
<script src="main/js/jquery.waypoints.min.js"></script>
<script src="main/js/jquery.stellar.min.js"></script>
<script src="main/js/main.js"></script>
<script src="main/js/main1.js"></script>
<script type="text/javascript" src="main/js/bootstrap.js"></script>
<script src="assets/plugins/jquery-toast/dist/jquery.toast.min.js"></script>
<script src="main/js/sweetalert.min.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/formHandler.js"></script>
<script src="assets/js/easy-ajax.js"></script>
<script src="assets/plugins/material-datetimepicker/moment-with-locales.min.js"></script>
<script src="assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.js"></script>
<script src="assets/plugins/material-datetimepicker/datetimepicker.js"></script>
<!-- carousel -->
<script src="main/js/owl.carousel.js"></script>
<script>
	$(document).ready(function() {
		$('.owl-carousel').owlCarousel({
			loop: true,
			touchDrag: true,
			responsiveClass: true,
			items: 1,
			nav: true,
			navText: [
			"<i class='material-icons'>arrow_back</i>",
			"<i class='material-icons'>arrow_forward</i>"
			]
		})
	})

</script>
<!-- //carousel -->
<!--slider-->
<script>
	$(function() {
        // Slideshow 1
        $("#slider1").responsiveSlides({
        	auto: true,
        	pager: true,
        	nav: true,
        	speed: 500,
        	namespace: "centered-btns"
        });
    });

</script>
<!--//slider-->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event) {
			event.preventDefault();
			$('html,body').animate({
				scrollTop: $(this.hash).offset().top
			}, 1000);
		});
	});

</script>
<script type="text/javascript">
	$(document).ready(function() {
		$().UItoTop({
			easingType: 'easeOutQuart'
		});

	});

</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#nav-icon2').click(function() {
			$(this).toggleClass('open');
		});
	});

</script>
<script src="assets/plugins/croppie/croppie.js"></script>
<script>
	var el = document.getElementById('resizer-demo');
	var resize = new Croppie(el, {
		viewport: {
			width: 150,
			height: 150,
			type: 'circle'
		},
		boundary: {
			width: 250,
			height: 250
		},
		showZoomer: false,
		enableResize: true,
		enableOrientation: true,
		mouseWheelZoom: 'ctrl'
	});
	resize.bind({
		url: '<?php if (!empty($res->picture)) {echo $res->picture;} else {echo "images/profile.png";} ?>',
	});
	jQuery(document).on('click', '#submitPic', function(event) {
		resize.result({
			type: 'canvas',
			size: {
				width: 250,
				height: 250
			},
			format: 'png',
			quality: 1,
			circle: true
		}).then(function(blob) {
			$.ajax({
				url: 'assets/system/controller.php',
				method: "post",
				cache: false,
				dataType: "text",
				data: {
					pictureUpdate: blob
				},
				success: function(response) {
					$.toast({
						heading: "Notification",
						position: 'top-right',
						text: 'image changed successfully',
						hideAfter: false,
						icon: 'info'
					});
					setTimeout(function() {
						window.location.reload();
					}, 2000);
				}
			});
		});
	});

	function showPreview(objFileInput) {
		if (objFileInput.files[0]) {
			var fileReader = new FileReader();
			fileReader.onload = function(e) {
				resize.bind({
					url: e.target.result,
				});
			}
			fileReader.readAsDataURL(objFileInput.files[0]);
		}
	}

</script>
</body>

</html>
