<?php include '../assets/system/config.php'; 
if (!isset($_SESSION['admin'])) {
	header('location:login.php');
}
$level = $_SESSION['admin']->level;

$query = "select * from ".adt;
$sql = $obj->generalSelectStatement($query);
if ($sql->_general_count > 0) {
	$adminDetails = $sql->_general_result;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="SmartUniversity"/>
	<title>MinibusExpress-Admin Dashboard</title>
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
	<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet"
	type="text/css" />
	<link href="../cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet"
	type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="../assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="../assets/css/material_style.css">
	<!-- animation -->
	<link href="../assets/css/pages/animate_page.css" rel="stylesheet">
	<link rel="stylesheet" href="../assets/plugins/jquery-toast/dist/jquery.toast.min.css">
	<!-- Theme Styles -->
	<link href="../assets/css/plugins.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/pages/inbox.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/theme-color.css" rel="stylesheet" type="text/css" />
	<link href="../assets/plugins/dropzone/dropzone.css" rel="stylesheet" media="screen">
	<!-- Date Time item CSS -->
	<link rel="stylesheet" href="../assets/plugins/material-datetimepicker/bootstrap-material-datetimepicker.css" />
	<!-- favicon -->
	<link rel="shortcut icon" href="http://radixtouch.in/templates/templatemonster/ecab/source/assets/img/favicon.ico" />
	<!-- morris chart -->
	<link href="../assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
	<link href="../assets/plugins/summernote/summernote.css" rel="stylesheet">
	<link href="../assets/plugins/croppie/croppie.css" rel="stylesheet">
</head>
<!-- END HEAD -->

<body
class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-white">
<div class="page-wrapper">
	<!-- start header -->
	<div class="page-header navbar navbar-fixed-top">
		<div class="page-header-inner ">
			<!-- logo start -->
			<div class="page-logo">
				<a href="../">
					<!-- <img alt="" src="../images/profile.png"> -->
					<span class="logo-default">MiniBus</span> </a>
				</div>
				<!-- logo end -->
				<ul class="nav navbar-nav navbar-left in">
					<li><a href="#" class="menu-toggler sidebar-toggler font-size-23"><i class="fa fa-bars"></i></a>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-left in">
					<!-- start full screen button -->
					<li><a href="javascript:;" class="fullscreen-click font-size-20"><i
						class="fa fa-arrows-alt"></i></a></li>
						<!-- end full screen button -->
					</ul>
					<!-- start mobile menu -->
					<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span></span>
				</a>
				<!-- end mobile menu -->
				<!-- start header menu -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<!-- end notification dropdown -->
						<!-- start manage user dropdown -->
						<li class="dropdown dropdown-user">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
							data-close-others="true">
							<img alt="" class="img-circle " src="../images/profile.png" />
						</a>
						<ul class="dropdown-menu dropdown-menu-default animated jello">
							<li>
								<a href="lock.php">
									<i class="fa fa-lock"></i> Lock
								</a>
							</li>
							<li>
								<a href="logout.php">
									<i class="fa fa-sign-out"></i> Log Out </a>
								</li>
							</ul>
						</li>
						<!-- end manage user dropdown -->
						<li class="dropdown dropdown-quick-sidebar-toggler">
							<a id="headerSettingButton" class="mdl-button mdl-js-button mdl-button--icon pull-right"
							data-upgraded=",MaterialButton">
							<i class="material-icons">more_vert</i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end header -->
	<div class="page-container">
		<!-- start sidebar menu -->
		<div class="sidebar-container">
			<div class="sidemenu-container navbar-collapse collapse fixed-menu">
				<div id="remove-scroll">
					<ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true"
					data-slide-speed="200">
					<li class="sidebar-toggler-wrapper hide">
						<div class="sidebar-toggler">
							<span></span>
						</div>
					</li>
					<li class="sidebar-user-panel">
						<div class="user-panel">
							<div class="pull-left image">
								<img src="../images/profile.png" class="img-circle user-img-circle"
								alt="User Image" />
							</div>
							<div class="pull-left info">
								<p> Admin</p>
								<a title="Inbox" href="message_inbox.php"><i class="material-icons">email</i></a>
								<a title="Logout" href="logout.php"><i
									class="material-icons">power_settings_new</i></a>
								</div>
							</div>
						</li>
						<li class="menu-heading">
							<span>-- Main</span>
						</li>
						<li class="nav-item active">
							<a href="dashboard.php" class="nav-link nav-toggle">
								<i class="material-icons">dashboard</i>
								<span class="title">Dashboard</span>
								<span class="selected"></span>
							</a>
						</li>
						<li class="nav-item">
							<a href="trips.php" class="nav-link nav-toggle">
								<i class="material-icons">local_taxi</i>
								<span class="title">All Trips</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link nav-toggle">
								<i class="material-icons">airport_shuttle</i>
								<span class="title">Vehicle Management</span>
								<span class="arrow"></span>
							</a>
							<ul class="sub-menu">
								<li class="nav-item">
									<a href="add_vehicles.php" class="nav-link ">
										<span class="title">Add Vehicle Details</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="all_vehicles.php" class="nav-link ">
										<span class="title">View All Vehicle</span>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="instructions.php" class="nav-link nav-toggle">
								<i class="material-icons">style</i>
								<span class="title">Instructions</span>
							</a>
						</li>
						<?php if ($level == '0') {?>
							<li class="nav-item">
								<a href="#" class="nav-link nav-toggle">
									<i class="material-icons">local_atm</i>
									<span class="title">Account Details</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item">
										<a href="add_account.php" class="nav-link ">
											<span class="title">Add Account</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="account_list.php" class="nav-link ">
											<span class="title">Account List</span>
										</a>
									</li>
								</ul>
							</li>
						<?php } ?>
						<li class="nav-item">
							<a href="all_passenger.php" class="nav-link nav-toggle">
								<i class="material-icons">people</i>
								<span class="title">All Passengers</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link nav-toggle">
								<i class="material-icons">person</i>
								<span class="title">Driver Management</span>
								<span class="arrow"></span>
							</a>
							<ul class="sub-menu">
								<li class="nav-item">
									<a href="new_drivers.php" class="nav-link ">
										<span class="title">New Drivers</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="add_driver.php" class="nav-link ">
										<span class="title">Add New Driver</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="all_drivers.php" class="nav-link ">
										<span class="title">All Drivers</span>
									</a>
								</li>
							</ul>
						</li>
						<?php if ($level == '0') {?>
							<li class="nav-item">
								<a href="#" class="nav-link nav-toggle">
									<i class="material-icons">style</i>
									<span class="title">Coupons</span>
									<span class="selected"></span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu">
									<li class="nav-item active">
										<a href="coupon_generation.php" class="nav-link ">
											<span class="title">Coupon Generation</span>
											<span class="selected"></span>
										</a>
									</li>
									<li class="nav-item">
										<a href="coupon_list.php" class="nav-link ">
											<span class="title">Coupon List</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link nav-toggle">
									<i class="material-icons">local_atm</i>
									<span class="title">Fare Percentage Management</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu" style="display: none;">
									<li class="nav-item">
										<a href="fare_percentage.php" class="nav-link ">
											<span class="title">Edit Percentage</span>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link nav-toggle">
									<i class="material-icons">people</i>
									<span class="title">Administrators</span>
									<span class="arrow"></span>
								</a>
								<ul class="sub-menu" style="display: none;">
									<li class="nav-item">
										<a href="add_admin.php" class="nav-link ">
											<span class="title">Add Administrator</span>
										</a>
									</li>
									<li class="nav-item">
										<a href="edit_admin.php" class="nav-link ">
											<span class="title">Edit Administrator</span>
										</a>
									</li>
								</ul>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>

		<!-- end sidebar menu -->
