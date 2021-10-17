<?php include '../assets/system/config.php';
if (!isset($_SESSION['driver'])) {
	header('location:../driverLogin.php');
}
$sql = json_decode($obj->getRideDetails('driverDetails',driver,'',drv));
$res = $sql[0];
$drvrId = $_SESSION['driver'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="MiniBus" />
	<title>Minibus Express Driver Dashboard</title>
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="fonts/material-design-icons/material-icon.css" rel="stylesheet" type="text/css" />
	<link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="../assets/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
	<link href="../cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="../assets/plugins/material/material.min.css">
	<link rel="stylesheet" href="../assets/css/material_style.css">
	<link rel="stylesheet" href="../assets/css/croppie.css">
	<link rel="stylesheet" href="../assets/plugins/jquery-toast/dist/jquery.toast.min.css">
	<!-- animation -->
	<link href="../assets/css/pages/animate_page.css" rel="stylesheet">
	<!-- vector map -->
	<link href="../assets/plugins/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
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
	<link href="../assets/plugins/sweet-alert/sweetalert.min.css" rel="stylesheet" type="text/css" />
	<script>
		sessionStorage.setItem("onlineStat", '<?=$res->online_stat?>');
	</script>
	<!-- <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
	<script>
	 
	</script> -->
</head>
<!-- END HEAD -->

<body class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-white">
	<div class="page-wrapper">
		<!-- start header -->
		<div class="page-header navbar navbar-fixed-top">
			<div class="page-header-inner ">
				<!-- logo start -->
				<div class="page-logo">
					<a href="../">
						<img alt="" src="../assets/img/logo.png">
						<span class="logo-default">MiniBus</span> </a>
					</div>
					<!-- logo end -->
					<ul class="nav navbar-nav navbar-left in">
						<li><a href="#" class="menu-toggler sidebar-toggler font-size-23"><i class="fa fa-bars"></i></a>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-left in">
						<!-- start full screen button -->
						<li><a href="javascript:;" class="fullscreen-click font-size-20"><i class="fa fa-arrows-alt"></i></a></li>
						<!-- end full screen button -->
					</ul>
					<!-- start mobile menu -->
					<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
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
									<a href="../logout.php">
										<i class="fa fa-sign-out"></i> Log Out </a>
									</li>
								</ul>
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
							<ul class="sidemenu page-header-fixed p-t-20" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
								<li class="sidebar-toggler-wrapper hide">
									<div class="sidebar-toggler">
										<span></span>
									</div>
								</li>
								<li class="sidebar-user-panel">
									<div class="user-panel">
										<div class="pull-left image">
											<img src="<?php if (!empty($res->photo)) {echo $res->photo;}else{echo "../images/profile.png";}?>" class="img-circle user-img-circle" alt="User Image" />
										</div>
										<div class="pull-left info">
											<p><?=$res->firstname?></p>
											<a title="Profile" href="user_profile.php"><i class="material-icons">person</i></a>
											<a title="Logout" href="javascript:void(0);" id="power" onclick="getStat();"><i class="material-icons">power_settings_new</i></a>
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
										<span class="title">My Trips</span>
									</a>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link nav-toggle">
										<i class="material-icons">airport_shuttle</i>
										<span class="title">My Vehicles</span>
										<span class="arrow"></span>
									</a>
									<ul class="sub-menu">
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
								<li class="nav-item">
									<a href="#" class="nav-link nav-toggle">
										<i class="material-icons">local_atm</i>
										<span class="title">Account Details</span>
										<span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										<li class="nav-item">
											<a href="account_list.php" class="nav-link ">
												<span class="title">Account List</span>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			<!-- end sidebar menu -->