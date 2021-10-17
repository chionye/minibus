<?php include_once 'header.php' ?>
<!-- start page content -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="page-bar">
			<div class="page-title-breadcrumb">
				<div class=" pull-left">
					<div class="page-title">All Vehicles</div>
				</div>
				<ol class="breadcrumb page-breadcrumb pull-right">
					<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
						href="index-2.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li><a class="parent-item" href="#">Vehicle</a>&nbsp;<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">All Vehicles</li>
				</ol>
			</div>
		</div>
		<div class="row">
			<?php 
			$s = $obj->generalSelectStatement(sel.vh);$res = $s->_general_result; 
			if (!empty($res)) {
				foreach ($res as $key => $value) {
					?>
					<div class="col-lg-4 col-md-6 col-12 col-sm-6">
						<div class="blogThumb">
							<div class="thumb-center"><img class="img-responsive" alt="user"
								src="<?=$value->picture?>"></div>
								<div class="vehicle-name cyan-bgcolor">
									<div class="user-name"><?=$value->vehicle_name?></div>
								</div>
								<div class="vehicle-box">
									<p>
										<a href="edit_vehicle.php?id=<?=$value->id?>" class="btn btn-tbl-edit btn-xs">
											<i class="fa fa-pencil"></i>
										</a>
										<a class="btn btn-tbl-delete btn-xs" onclick="deleteInfo('vehicles','<?=$value->id?>','id')">
											<i class="fa fa-trash-o "></i>
										</a>
										<a class="btn btn-tbl-delete btn-xs" href="<?=$value->vehicle_doc?>" target="_blank">
											<i class="fa fa-file"></i>
										</a>
									</p>
									<p><strong>Fuel :</strong> <?=$value->fuel?></p>
									<p><strong>License Plates:</strong> <?=$value->license_plates?></p>
									<p><strong>Seating Capacity:</strong><?=$value->capacity?></p>
									<p><strong>Type:</strong> <?=$value->type?></p>
									<p><strong>Driver Email:</strong> <?=$value->driver_email?></p>
								</div>
							</div>
						</div>
					<?php }} ?>
				</div>
			</div>
		</div>
		<!-- end page content -->
		<?php include_once 'footer.php' ?>