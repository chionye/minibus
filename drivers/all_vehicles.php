<?php include_once 'header.php' ?>
<?php
$json = json_decode($obj->getRideDetails('', driver, '', drv));
$res = $json[0];
?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">All Vehicles</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="#">Vehicle</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">All Vehicles</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<?php 
				$carJson = json_decode($obj->getRideDetails('driverVh', $res->id, '', vh));
				if(!empty($carJson)){
				foreach($carJson as $key=>$value){
			?>
			<div class="col-lg-4 col-md-6 col-12 col-sm-6">
				<div class="blogThumb">
					<div class="thumb-center"><img class="img-responsive" alt="user" src="<?=$value->picture?>"></div>
					<div class="vehicle-name cyan-bgcolor">
						<div class="user-name"><?=$value->vehicle_name?></div>
					</div>
					<div class="vehicle-box">
						<p><strong>Fuel :</strong><?=$value->fuel?></p>
						<p><strong>Purchase:</strong> 23 June 2017</p>
						<p><strong>Seating Capacity:</strong><?=$value->capacity?> Persons</p>
						<p><strong>Type:</strong> <?=$value->type?></p>
						<p><strong>License Plates:</strong><?=$value->license_plates?></p>
						<p><strong>Class:</strong><?=$value->vehicle_class?></p>
					</div>
				</div>
			</div>
			<?php
				}
				}else{
					echo "<p>You do not have a vehicle registered yet</p>";
				}
			?>
		</div>
	</div>
</div>
<!-- end page content -->
<?php include_once 'footer.php' ?>