<?php
require_once 'config.php';
require_once 'processors.php';

$processors = new processors();

switch ($_POST) {
	case isset($_POST['lat']):
	$sql = $processors->addDriver($_POST, '', 'updateDriverPosition', drv, '');
	$output = 'ok';
	break;

	case isset($_POST['getNewRideRequests']):
	$sql = $processors->getSomeInfo('getNewRideRequests', '', rd, '');
	$output = json_decode($sql);
	break;

	case isset($_POST['delete']):
	$sql = $processors->getSomeInfo('delete', $_POST, '', '');
	$output = json_decode($sql);
	break;

	case isset($_POST['editcouponText']):
	$sql = $processors->getSomeInfo('editcoupon', $_POST, cpn, '');
	$output = $output = $sql == "ok"?array("output"=>"success", "msg"=>"Coupon successfully edited","redirect"=>"../rear/coupon_list.php","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier");
	break;

	case isset($_POST['drvStarRating']):
	$sql = $processors->getSomeInfo('drvStarRating', $_POST, rd, '');
	$output = $sql;
	break;

	case isset($_POST['drvId']):
	$sql = $processors->getSomeInfo('drvId', $_POST, tr, '');
	$output = json_decode($sql);
	break;

	case isset($_POST['passengerInfo']):
	$sql = $processors->getSomeInfo('passengerInfo', $_POST, '', '');
	$output = json_decode($sql);
	break;

	case isset($_POST['takeRideRequest']):
	$sql = $processors->getSomeInfo('takeRideRequest', $_POST, '', '');
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"You have accepted to take this ride","redirect"=>"","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier");
	break;

	case isset($_POST['rejectRideRequest']):
	$sql = $processors->getSomeInfo('rejectRideRequest', $_POST, '', '');
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"You have canceled this ride","redirect"=>"","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier");
	break;

	case isset($_POST['passStarRating']):
	$sql = $processors->getSomeInfo('passStarRating', $_POST, rd, '');
	$output = json_decode($sql);
	break;

	case isset($_POST['areWeThereYet']):
	$sql = $processors->getSomeInfo('areWeThereYet', $_POST, rd, '');
	$output = json_decode($sql);
	break;

	case isset($_POST['startRide']):
	$sql = $processors->getSomeInfo('startRide', $_POST, rd, driver);
	$output = json_decode($sql);
	break;

	case isset($_POST['endRide']):
	$sql = $processors->getSomeInfo('endRide', $_POST, rd, driver);
	$output = json_decode($sql);
	break;

	case isset($_POST['picture']):
	$sql = $processors->getSomeInfo('changePic', $_POST, drv, driver);
	$output = is_object(json_decode($sql))?json_decode($sql):$sql;
	break;

	case isset($_POST['pictureUpdate']):
	$sql = $processors->getSomeInfo('pictureUpdate', $_POST, mt, user);
	$output = is_object(json_decode($sql))?json_decode($sql):$sql;
	break;

	case isset($_POST['passengerAccountLName']):
	$sql = $processors->addPassenger($_POST,'','passengerAccountLName', mt, user);
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"Details Updated Successfully","redirect"=>"","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier");
	break;

	case isset($_POST['adminName']):
	$sql = $processors->addAdmin($_POST, 'addAdmin', adt);
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"Admin added Successfully","redirect"=>"../rear/edit_admin.php","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier");
	break;

	case isset($_POST['editAdminName']):
	$sql = $processors->editAdminPanel($_POST, 'admin', adt, $_POST['id']);
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"Admin Details Updated Successfully","redirect"=>"../rear/edit_admin.php","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier");
	break;

	case isset($_POST['txtWaitFare']):
	$sql = $processors->editAdminPanel($_POST, 'fare', per, 1);
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"Fare Updated Successfully","redirect"=>"","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier");
	break;

	case isset($_POST['couponText']):
	$sql = $processors->addAdmin($_POST, 'coupon', cpn);
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"Fare Updated Successfully","redirect"=>"../rear/coupon_list.php","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier");
	break;

	case isset($_POST['driverFirstName']):
	$whatToDo = $_POST['driverId'] == ''?'addDriver':'updateDriver';
	$sql = $processors->addDriver($_POST, $_FILES, $whatToDo, drv, '');
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"Driver Details Successfully Updated","redirect"=>"../rear/new_drivers.php","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier");
	break;

	case isset($_POST['addDriverAccount']):
	$sql = $processors->addAdmin($_POST, 'coupon', cpn);
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"Fare Updated Successfully","redirect"=>"../rear/coupon_list.php","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier");
	break;

	case isset($_POST['getOnlineDrivers']):
	$sql = $processors->getSomeInfo($_POST['info'], '', '', '');
	$output = $sql != ""?array("output"=>"", "msg"=>json_decode($sql),"redirect"=>"","platform"=>"swal"):array("output"=>"error", "msg"=>$sql,"platform"=>"swal");
	break;

	case isset($_POST['getRideRequests']):
	$sql = $processors->getSomeInfo('getRideRequests', '', '', '');
	$output = json_decode($sql);
	break;

	case isset($_POST['getDriverPos']):
	$sql = $processors->getSomeInfo('getDriverPos', '', '', '');
	$output = json_decode($sql);
	break;

	case isset($_POST['setOnlineDriver']):
	$sql = $processors->getSomeInfo('setOnlineDriver', $_POST, drv, driver);
	$output = is_object(json_decode($sql))?json_decode($sql):$sql;
	break;

	case isset($_POST['passengerFirstname']):
	$sql = $processors->addPassenger($_POST, '', 'addPassenger', mt, '');
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"SignUp Successful, you will receive an email shortly","redirect"=>"","platform"=>"swal"):array("output"=>"error", "msg"=>$sql,"platform"=>"swal","redirect"=>"");
	break;

	case isset($_POST['PassengerEditFirstName']):
	$sql = $processors->addPassenger($_POST, '', 'updatePassenger', mt, '');
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"Details Updated Successfully","redirect"=>"../rear/all_passenger.php","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier","redirect"=>"");
	break;

	case isset($_POST['passengerLoginEmail']):
	$sql = $processors->loginHandler($_POST, 'loginPassenger', mt);
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"welcome","redirect"=>"book.php","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier","redirect"=>"");
	break;

	case isset($_POST['DriverLoginEmail']):
	$sql = $processors->loginHandler($_POST, 'DriverLogin', drv);
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"Welcome...","redirect"=>"drivers/dashboard.php","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier","redirect"=>"");
	break;

	case isset($_POST['bankName']):
	$sql = $processors->addDriver($_POST,'', 'addDriverAccount', drva,'');
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"Account Added Successfully","redirect"=>"../rear/account_list.php","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier","redirect"=>"");
	break;

	case isset($_POST['editbankName']):
	$sql = $processors->addDriver($_POST,'', 'editDriverAccount', drva,'');
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"Account updated Successfully","redirect"=>"../rear/account_list.php","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier","redirect"=>"");
	break;

	case isset($_POST['AdminUsername']):
	$sql = $processors->loginHandler($_POST, 'adminLogin', adt);
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"Welcome...","redirect"=>"dashboard.php","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier","redirect"=>"");
	break;

	case isset($_POST['DriverSignUpFirstname']):
	$sql = $processors->addDriver($_POST, '', 'DriverSignUp', drv, '');
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"Thank you for applying, you will receive a mail shortly","redirect"=>"","platform"=>"swal"):array("output"=>"error", "msg"=>$sql,"platform"=>"swal","redirect"=>"");
	break;

	case isset($_POST['txtvmodel']):
	$sql = $processors->addDriver($_POST, $_FILES, 'EditDriverVehicle', vh, '');
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"Vehicle Details Changed Successfully","redirect"=>"../rear/all_vehicles.php","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier","redirect"=>"");
	break;

	case isset($_POST['editdriverFirstName']):
	$sql = $processors->addDriver($_POST, '','editdriverDetails', drv, '');
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"Driver Details Updated Successfully","redirect"=>"../rear/all_drivers.php","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier","redirect"=>"");
	break;

	case isset($_POST['formsummernote']):
	$sql = $processors->editAdminPanel($_POST, 'terms', ins, '1');
	$output = $sql == "ok"?array("output"=>"success", "msg"=>"Terms and Instructions updated Successfully","redirect"=>"","platform"=>"jqueryNotifier"):array("output"=>"error", "msg"=>$sql,"platform"=>"jqueryNotifier","redirect"=>"");
	break;

	case isset($_POST['passengerLocation']):
	$sql = isset($_SESSION['uid'])?$processors->takeARide($_POST):(object)array("msg" => "please login to continue");
	$output = $sql->msg == "ok"?array("output"=>"", "msg"=>$sql,"redirect"=>""):array("output"=>"error", "msg"=>$sql->msg,"platform"=>"swal","redirect"=>"");
	break;

	case isset($_POST['checkIfRequestAnswered']):
	$sql = $processors->getSomeInfo('checkIfRequestAnswered', $_POST, rd, '');
	$output = is_object(json_decode($sql))?array(json_decode($sql)):$sql;
	break;

	case isset($_POST['getDriverInformation']):
	$sql = $processors->getSomeInfo('getDriverInformation', $_POST, drv, '');
	$output = is_object(json_decode($sql))?array(json_decode($sql)):$sql;
	break;

	case isset($_POST['oldPass']):
	$sql = $processors->getSomeInfo('changeDriverPass', $_POST, drv, '');
	$output = is_object(json_decode($sql))?array(json_decode($sql)):$sql;
	break;

	case isset($_POST['param1']):
	$sql = $processors->encrypt($_POST['param1']);
	$output = $sql;
	break;
	
	default:
	$output = array("output"=>"error", "msg"=>"resource not found","redirect"=>"","platform"=>"jqueryNotifier");
	break;
}
$res = json_encode($output);
print $res;
