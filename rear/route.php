<?php include_once 'header.php'; ?>
<!-- start page content -->
<?php
if (isset($_GET['tid'])) {
	$id = base64_decode($_GET['tid']);
	$json = json_decode($obj->getRideDetails('getRideDets', $id, '', rd));
	$response = $json[0];
}
?>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">Route Map</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="dashboard.php">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="#">Trip</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">Route Map</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-box">
					<div class="card-head">
						<header>Route</header>
						<div class="tools">
							<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a> <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a> <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
						</div>
					</div>
					<div class="card-body ">
						<div class="label label-danger visible-ie8">Not supported
						in Internet Explorer 8</div>
						<div id="map" class="gmaps"></div>
						<ol id="routes_instructions">
						</ol>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="card card-box">
					<div class="card-head">
						<header>Route Detail</header>
						<div class="tools">
							<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a> <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a> <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
						</div>
					</div>
					<div class="card-body">
						<div class="tab-content">
							<div class="row">
								<div class="col-md-3">Trip ID</div>
								<!--.col-md-3-->
								<div class="col-md-1">:</div>
								<!--.col-md-3-->
								<div class="col-md-8"><?= $response->trip_id ?></div>
								<!--.col-md-9-->
							</div>
							<!--.row-->
							<div class="row">
								<div class="col-md-3">Passenger</div>
								<!--.col-md-3-->
								<div class="col-md-1">:</div>
								<!--.col-md-3-->
								<?php
								$pass = json_decode($obj->getRideDetails('driverDetails', $response->customer_id, '', mt));
								$pass1 = $pass[0];
								?>
								<div class="col-md-8"><?= $pass1->first_name ?> <?= $pass1->lastname ?></div>
								<!--.col-md-9-->
							</div>
							<!--.row-->
							<div class="row">
								<div class="col-md-3">Ride Type</div>
								<!--.col-md-3-->
								<div class="col-md-1">:</div>
								<!--.col-md-3-->
								<div class="col-md-8"><?= $response->rtype ?></div>
								<!--.col-md-9-->
							</div>
							<!--.row-->
							<div class="row">
								<div class="col-md-3">Trip From</div>
								<!--.col-md-3-->
								<div class="col-md-1">:</div>
								<!--.col-md-3-->
								<div class="col-md-8"><?= $response->location ?></div>
								<!--.col-md-9-->
							</div>
							<!--.row-->
							<div class="row">
								<div class="col-md-3">Trip To</div>
								<!--.col-md-3-->
								<div class="col-md-1">:</div>
								<!--.col-md-3-->
								<div class="col-md-8"><?= $response->destination ?></div>
							</div>
							<!--.row-->
							<div class="row">
								<div class="col-md-3">Start Time</div>
								<!--.col-md-3-->
								<div class="col-md-1">:</div>
								<!--.col-md-3-->
								<div class="col-md-8"><?= $response->pickup_time ?></div>
								<!--.col-md-9-->

							</div>
							<!--.row-->
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card card-box">
					<div class="card-head">
						<header>Directions</header>
						<div class="tools">
							<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a> <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a> <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
						</div>
					</div>
					<div class="card-body">
						<div class="tab-content" style="height:300px;overflow:scroll">
							<div id="directionsPanel"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end page content -->
<div class="page-footer">
	<div class="page-footer-inner">
		<script type="text/javascript">
			document.write(new Date().getFullYear());
		</script> &copy; All rights reserved
		<a href="../" target="_top" class="makerCss">Minibus Express</a>
	</div>
	<div class="scroll-to-top">
		<i class="material-icons">eject</i>
	</div>
</div>
<!-- end footer -->
</div>
<!-- start js include path -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/plugins/jquery-toast/dist/jquery.toast.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY ?>&libraries=places&callback=<?php if (pathinfo(__FILE__, PATHINFO_FILENAME) == 'route') {
	echo 'init';
	} else {
		echo 'initMap';
	} ?>" async defer></script>
	<script src="../assets/js/formHandler.js"></script>
	<script src="../assets/js/easy-ajax.js"></script>
	<script type="text/javascript">
		$(document).ready(function($) {
			$(document).on('submit', '#stuff', function(event) {
				event.preventDefault();
				$(this).easyAjax();
			});
		});

		function init() {
			var directionsService = new google.maps.DirectionsService();
			var directionsRenderer = new google.maps.DirectionsRenderer();
			var chicago = new google.maps.LatLng(41.850033, -87.6500523);
			var mapOptions = {
				zoom: 7,
				center: chicago
			}
			var map = new google.maps.Map(document.getElementById('map'), mapOptions);
			directionsRenderer.setMap(map);
			directionsRenderer.setPanel(document.getElementById('directionsPanel'));
			setTimeout(calcRoute(directionsService, directionsRenderer), 2000);
		}

		function calcRoute(directionsService, directionsRenderer) {
			var start = '<?= $response->location ?>';
			var end = '<?= $response->destination ?>';
			var request = {
				origin: start,
				destination: end,
				travelMode: 'DRIVING'
			};
			directionsService.route(request, function(response, status) {
				if (status == 'OK') {
					directionsRenderer.setDirections(response);
				}
			});
		}
	</script>
	<script src="../assets/plugins/popper/popper.min.js"></script>
	<script src="../assets/plugins/croppie/croppie.js"></script>
	<script src="../assets/plugins/jquery-blockui/jquery.blockui.min.js"></script>
	<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- bootstrap -->
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- counterup -->
	<script src="../assets/plugins/counterup/jquery.waypoints.min.js"></script>
	<script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>
	<!-- Common js-->
	<script src="../assets/js/app.js"></script>
	<script src="../assets/js/layout.js"></script>
	<script src="../assets/js/theme-color.js"></script>
	<!-- vector map -->
	<script src="../assets/plugins/jqvmap/jquery.vmap.js"></script>
	<script src="../assets/plugins/jqvmap/maps/jquery.vmap.russia.js"></script>
	<script src="../assets/plugins/jqvmap/maps/jquery.vmap.world.js"></script>
	<script src="../assets/plugins/jqvmap/maps/jquery.vmap.europe.js"></script>
	<script src="../assets/plugins/jqvmap/maps/jquery.vmap.germany.js"></script>
	<script src="../assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
	<script src="../assets/plugins/jqvmap/data/jquery.vmap.sampledata.js"></script>
	<script src="../assets/js/pages/map/vector-data.js"></script>
	<!-- data tables -->
	<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js"></script>
	<script src="../cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<script src="../cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script src="../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script src="../cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
	<script src="../assets/js/pages/table/table_data.js"></script>
	<!-- material -->
	<script src="../assets/plugins/material/material.min.js"></script>
	<!-- animation -->
	<script src="../assets/js/pages/ui/animations.js"></script>
	<script src="../assets/plugins/jQuery-Knob/dist/jquery.knob.min.js"></script>
	<script src="../assets/js/pages/chart/knob/knob_chart_data.js"></script>
	<!-- sparkline -->
	<script src="../assets/plugins/sparkline/jquery.sparkline.min.js"></script>
	<script src="../assets/js/pages/sparkline/sparkline-data.js"></script>
	<!-- echart -->
	<script src="../assets/plugins/echarts/echarts.js"></script>
	<script src="../assets/js/pages/chart/chartjs/home-data2.js"></script>
	<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!-- dropzone -->
	<script src="../assets/plugins/dropzone/dropzone.js"></script>
	<script src="../assets/plugins/dropzone/dropzone-call.js"></script>
	<!-- morris chart -->
	<script src="../assets/plugins/morris/morris.min.js"></script>
	<script src="../assets/plugins/morris/raphael-min.js"></script>
	<script src="../assets/js/pages/chart/morris/morris_home_data.js"></script>
	<script src="../assets/plugins/sweet-alert/sweetalert.min.js"></script>
	<script src="../assets/js/misc.js"></script>
	<script src="../assets/plugins/star/jRate.min.js"></script>
	<script>

	</script>
</body>

</html>