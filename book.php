<?php include_once 'header.php'; 
$sql = json_decode($obj->getRideDetails('rideTypes','','','logos'));
$res = $sql;
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
					<?php 
					if (isset($_SESSION['uid'])) {
						?>
						<a class="dropdown-item text-dark" href="profile.php">Profile</a>
						<a class="dropdown-item text-dark" href="logout.php">Logout</a>
						<?php 
					}else{
						?>
						<h6 class="dropdown-header  text-dark">Hello, User</h6>
						<a class="dropdown-item text-dark" href="login.php">Login</a>
						<a class="dropdown-item text-dark" href="signup.php">SignUp</a>
						<?php
					}
					?>
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
					<h3 class="h2 text-white text-left">Take a Ride</h3>
				</div>
				<div class="card-body p-3">
					<div class="form-group">
						<input type="text" placeholder="where from..." class="form-control p-4 locator" name="passengerLocation" id="origin-input">
					</div>
					<!-- Password -->
					<div class="form-group">
						<input type="text" class="form-control p-4 locator" placeholder="Where to..." aria-describedby="defaultLoginFormPasswordHelpBlock" name="passengeDestination" id="destination-input">
					</div>
					<div class="form-group">
						<input type="text" id="date-format" class="form-control p-4" placeholder="When..." aria-describedby="defaultLoginFormPasswordHelpBlock" name="passengePickUpDate">
						<input type="text" hidden class="form-control" name="passengePrice" id="passengePrice">
					</div>
					<div class="owl-carousel" id="rideChoice">
						<?php 
							foreach ($res as $key => $value) {
						 ?>
						<div id="<?=$value->name?>Container">
							<div class="form-check">
								<input type="radio" class="form-check-input" id="customControlInline<?=$value->id?>" name="rideType" value="<?=$value->name?>">
								<label><?=$value->name?></label>
							</div>
							<a href="javascript:void(0);" id="<?=$value->name?>"><img src="<?=$value->logo?>"></a>
						</div>
					<?php } ?>
					</div>
					<div class="accordion" id="accordionExample">
						<div class="card">
							<div class="card-header" id="headingOne">
								<h2 class="mb-0">
									<button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Additional Options
									</button>
								</h2>
							</div>
							<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
								<div class="card-body">
									<div class="text-left">
										<div class="form-check">
											<label class="form-check-label" for="defaultCheck1">
												Special Requests
											</label>
											<div class="form-group">
												<input type="text" id="passengerReq" class="form-control p-4" placeholder="e.g french speaking driver..." name="passengerReq">
											</div>
										</div>
										<div class="form-check">
											<label class="form-check-label" for="defaultCheck1">
												Offer your price
											</label>
											<div class="form-group">
												<input type="text" id="passengerOffer" class="form-control p-4" placeholder="make an offer..." name="passengerOffer">
											</div>
										</div>
										<div class="form-check check1">
											<label class="form-check-label" for="defaultCheck1">
												I want to share my trip
											</label>
											<div class="form-check check1">
												<input class="form-check-input" type="radio" name="rideshare" value="1">
												<label>1&nbsp;<i class="fa fa-times"></i><i class="fas fa-male"></i></label>
											</div>
											<div class="form-check check1">
												<input class="form-check-input" type="radio" name="rideshare" value="2">
												<label>2&nbsp;<i class="fa fa-times"></i><i class="fas fa-male"></i></label>
											</div>
											<div class="form-check check1">
												<input class="form-check-input" type="radio" name="rideshare" value="3">
												<label>3&nbsp;<i class="fa fa-times"></i><i class="fas fa-male"></i></label>
											</div>
										</div>
										<div class="form-check check3">
											<label class="form-check-label" for="defaultCheck1">
												Promo code
											</label>
											<div class="form-group">
												<input type="text" id="passengerPromo" class="form-control p-4" placeholder="Enter promo code..." name="passengerPromo">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Login button -->
					<div class="row">
						<div class="col-lg-6 offset-lg-3">
							<input class="btn btn-info my-4 btn-block butts shadow" type="submit" value="Book Now" id="go">
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 shadow">

						</div>
					</div>
				</div>
				<div class="card-footer">
					<p class="text-right text-muted" id="estimate">Your estimated price will show up here</p>
				</div>
			</div>
		</form>
	</div>
	<div class="col-lg-8">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div id="map" class="rounded"></div>
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
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY ?>&libraries=places&callback=initMap" async defer></script>
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
</body>

</html>
