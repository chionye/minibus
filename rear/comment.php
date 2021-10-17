<?php include_once 'header.php';?> 
<?php if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
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
			$s = $obj->generalSelectStatement(sel.rd.wh.$id);$res = $s->_general_result[0]; 
			?>
			<div class="col-md-12">
				<div class="card card-box">
					<div class="card-head">
						<?php  $sql = $obj->generalSelectStatement(sel.mt.wh.$res->customer_id);$res1 = $s->_general_result[0]; $fname = $res1->first_name.' '.$res1->lastname;?>
						<header>Comment by <?=$fname?></header>
						<div class="tools">
							<a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
							<a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
							<a class="t-close btn-color fa fa-times" href="javascript:;"></a>
						</div>
					</div>
					<div class="tab-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-3">Trip ID</div>
								<!--.col-md-3-->
								<div class="col-md-1">:</div>
								<!--.col-md-3-->
								<div class="col-md-8"><?= $res->trip_id ?></div>
								<!--.col-md-9-->
							</div>
							<!--.row-->
							<div class="row">
								<div class="col-md-3">Passenger Star Rating</div>
								<!--.col-md-3-->
								<div class="col-md-1">:</div>
								<!--.col-md-3-->
								<div class="col-md-8"><?= $res->p_star_rating ?></div>
								<!--.col-md-9-->
							</div>
							<!--.row-->
							<div class="row">
								<div class="col-md-3">Passenger Comment</div>
								<!--.col-md-3-->
								<div class="col-md-1">:</div>
								<!--.col-md-3-->
								<div class="col-md-8"><?php if(!empty($res->comment)){echo $res->comment;}else{echo "no comment";} ?></div>
								<!--.col-md-9-->
							</div>
							<!--.row-->
							<!--.row-->
							<div class="row">
								<div class="col-md-3">driver Star Rating</div>
								<!--.col-md-3-->
								<div class="col-md-1">:</div>
								<!--.col-md-3-->
								<div class="col-md-8"><?php if(!empty($res->d_star_rating)){echo $res->d_star_rating;}else{echo "No";} ?> Stars</div>
								<!--.col-md-9-->
							</div>
							<!--.row-->
							<div class="row">
								<div class="col-md-3">driver Comment</div>
								<!--.col-md-3-->
								<div class="col-md-1">:</div>
								<!--.col-md-3-->
								<div class="col-md-8"><?php if(!empty($res->d_comment)){echo $res->d_comment;}else{echo "no comment";} ?></div>
								<!--.col-md-9-->
							</div>
							<!--.row-->
							<div class="row">
								<div class="col-md-3">Trip From</div>
								<!--.col-md-3-->
								<div class="col-md-1">:</div>
								<!--.col-md-3-->
								<div class="col-md-8"><?= $res->location ?></div>
								<!--.col-md-9-->
							</div>
							<!--.row-->
							<div class="row">
								<div class="col-md-3">Trip To</div>
								<!--.col-md-3-->
								<div class="col-md-1">:</div>
								<!--.col-md-3-->
								<div class="col-md-8"><?= $res->destination ?></div>
							</div>
							<!--.row-->
							<div class="row">
								<div class="col-md-3">Start Time</div>
								<!--.col-md-3-->
								<div class="col-md-1">:</div>
								<!--.col-md-3-->
								<div class="col-md-8"><?= $res->pickup_time ?></div>
								<!--.col-md-9-->

							</div>
							<!--.row-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end page content -->
<!-- start chat sidebar -->
<?php include_once 'footer.php' ?>