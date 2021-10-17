<?php
require 'uploadchecker.php';
$checkPic = new uploadchecker();
class processors extends processes
{
	public function addAdmin($values = array(), $mode, $table)
	{
		$msg = "";
		switch ($mode) {
			case 'addAdmin':
			$fields = array("level", "name", "password", "joined", "last_login");
			$date = parent::getDatetimeNow();
			$values['joined'] = $date;
			$values['last_login'] = '';
			$sql = parent::insert($table, $fields, $values);
			break;

			case 'coupon':
			$fields = array("coupon", "type", "amount", "expire", "coupon_num", "start_date");
			$date = parent::getDatetimeNow();
			$values['start'] = $date;
			$sql = parent::insert($table, $fields, $values);
			break;

			default:
				# code...
			break;
		}
		if (isset($sql->_sucMsg)) {
			$msg = "ok";
		} else {
			$msg = $sql->_errMsg;
		}
		return $msg;
	}

	public function editAdminPanel($vals = array(), $mode, $table, $id)
	{
		$msg = "";
		$cond = 'id';
		switch ($mode) {
			case 'admin':
			$fields = array("level", "name", "password");
			$sql = parent::update($table, $fields, $vals, $cond, $id);
			break;
			case 'fare':
			$fields = array("percentage", "fare");
			$sql = parent::update($table, $fields, $vals, $cond, $id);
			break;

			case 'terms':
			$fields = array("instructions", "terms");
			$sql = parent::update($table, $fields, $vals, $cond, $id);
			break;
		}
		if (isset($sql->_sucMsg)) {
			$msg = "ok";
		} else {
			$msg = $sql->_error;
		}
		return $msg;
	}

	public function addDriver($ArrVals = array(), $files, $mode, $table, $id)
	{
		global $checkPic;
		$res = '';
		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
			$link = "https";
		else
			$link = "http";
		$link .= "://";
		$link .= $_SERVER['HTTP_HOST'] == 'localhost'?$_SERVER['HTTP_HOST']."/minibus":$_SERVER['HTTP_HOST'];

		if (isset($ArrVals['driverId'])) {
			$array_id = $ArrVals['driverId'];
			array_shift($ArrVals);
		}
		switch ($mode) {
			case 'addDriver':
			$fields = array("firstname", "lastname", "company", "address1", "address2", "city", "country", "zipcode", "email", "phone", "password", "gender", "photo", "status", "joined", "vehicles", "earning_for_the_day", "total_earnings", "online_stat", "completed_trips", "canceled_trips", "total_trips", "todays_trips");
			if ($files['uploadBtn']['name'] == 'blob') {
				$ext = explode('/', $files['uploadBtn']['type']);
				$ext = $ext[1];
			}else{
				$filename = $files['uploadBtn']['name'];
				$ext = pathinfo($files['uploadBtn']['name'], PATHINFO_EXTENSION);
			}
			$pathDb = $link.'/assets/img/driver/' . $ArrVals['driverMobile'] . "." . $ext;
			$path = $_SERVER['DOCUMENT_ROOT'].'/minibus/assets/img/driver/' . $ArrVals['driverMobile'] . "." . $ext;
			$date = parent::getDatetimeNow();$ArrVals['photo'] = $pathDb;$ArrVals['status'] = 'pending';$ArrVals['joined'] = $date;$ArrVals['vehicles'] = '';$ArrVals['earning_for_the_day'] = '';$ArrVals['total_earnings'] = '';$ArrVals['online_stat'] = '';$ArrVals['completed_trips'] = 0;$ArrVals['canceled_trips'] = 0;$ArrVals['total_trips'] = 0;$ArrVals['todays_trips'] = 0;
			array_shift($ArrVals);
			$sql = parent::insert($table, $fields, $ArrVals);
			$r = array('gif', 'png', 'jpg', 'jpeg');
			$check = $checkPic->runPicCheck($path, 'uploadBtn', $r);
			$upload = $check == 1111 &&  $files['uploadBtn']['tmp_name'] != ''? move_uploaded_file($files['uploadBtn']['tmp_name'], $path) : '';
			break;

			case 'DriverSignUp':
			$email = $ArrVals['DriverSignUpEmail'];
			$check = parent::generalSelectStatement("select * from $table where email ='$email'")->_general_count > 0 ? true : false;
			if ($check) {
				$res = 'user already exists';
			} else {
				$fields = array("firstname", "lastname", "email", "phone", "password", "company", "address1", "address2", "city", "country", "zipcode", "gender", "photo", "status", "joined", "vehicles", "earning_for_the_day", "total_earnings", "online_stat", "completed_trips", "canceled_trips", "total_trips", "todays_trips");
				$arr = array("", "", "", "", "", 0, "", "", "pending", "", "", "", "", "", 0, 0, 0, 0);
				$newarr = $ArrVals + $arr;
				$sql = parent::insert($table, $fields, $newarr);
			}
			break;

			case 'updateDriver':
			if ($files['uploadBtn']['name'] == 'blob') {
				$ext = explode('/', $files['uploadBtn']['type']);
				$ext = $ext[1];
			}else{
				$filename = $files['uploadBtn']['name'];
				$ext = pathinfo($files['uploadBtn']['name'], PATHINFO_EXTENSION);
			}
			$pathDb = $link.'/assets/img/driver/' . $ArrVals['driverMobile'] . "." . $ext;
			$path = $_SERVER['DOCUMENT_ROOT'].'/minibus/assets/img/driver/' . $ArrVals['driverMobile'] . "." . $ext;
			$r = array('gif', 'png', 'jpg', 'jpeg');
			$check = $checkPic->runPicCheck($path, 'uploadBtn', $r);
			$upload = $check == 1111 &&  $files['uploadBtn']['tmp_name'] != ''? move_uploaded_file($files['uploadBtn']['tmp_name'], $path) : '';
			$fields = array("firstname", "lastname", "company", "address1", "address2", "city", "country", "zipcode", "email", "phone", "gender", "status", "photo");
			$ArrVals['status'] = 'active';
			$ArrVals['photo'] = $pathDb;
			$cond = 'id';
			if ($upload) {
				$sql = parent::update($table, $fields, $ArrVals, $cond, $array_id);
			} else {
				$res = 'something went wrong';
			}
			break;

			case 'editdriverDetails':
			$fields = array("firstname", "lastname", "company", "address1", "address2", "city", "country", "zipcode", "email", "phone", "gender", "status");
			$cond = 'id';

			$sql = parent::update($table, $fields, $ArrVals, $cond, $array_id);
			break;

			case 'AddDriverVehicle':
			$ext = pathinfo($files['uploadBtn']['name'], PATHINFO_EXTENSION);
			$email = $ArrVals['driverEmail'];
			$sql = parent::generalSelectStatement("select * from driver where email ='$email'");
			$phone = $sql->_general_result[0]->phone;
			$id = $sql->_general_result[0]->id;
			$path = $link.'/assets/img/vehicle/' . $phone . "." . $ext;
			$vehiclePath = array();
			$vehiclePath[] = $path;
			$r = array('gif', 'png', 'jpg', 'jpeg');
			$check = $checkPic->runPicCheck($path, 'uploadBtn', $r);
			$upload = $check == 1111 ? move_uploaded_file($files['uploadBtn']['tmp_name'], $path) : '';
			if ($upload) {
				$ext = pathinfo($files['uploadDoc']['name'], PATHINFO_EXTENSION);
				$path = $link.'/assets/img/vehicle-docs/' . $phone . "_vehicle-document." . $ext;
				$r = array('doc', 'pdf', 'docx');
				$vehiclePath[] = $path;
				$upload = move_uploaded_file($files['uploadDoc']['tmp_name'], $path);
				if ($upload) {
					$fields = array("vehicle_name", "type", "capacity", "license_plates", "vehicle_class", "fuel", "driver_email", "picture", "vehicle_doc", "driver_id");
					$ArrVals['picture'] = $vehiclePath[0];
					$ArrVals['doc'] = $vehiclePath[1];
					$ArrVals['id'] = $id;
					$sql = parent::insert($table, $fields, $ArrVals);
				} else {
					$res = 'something went wrong';
				}
			} else {
				$res = 'something went wrong';
			}
			break;

			case 'EditDriverVehicle':
			$ext = pathinfo($files['uploadBtn']['name'], PATHINFO_EXTENSION);
			$email = $ArrVals['driverEmail'];
			$sql = parent::generalSelectStatement("select * from driver where email ='$email'");
			$phone = $sql->_general_result[0]->phone;
			$id = $sql->_general_result[0]->id;
			$path = $link.'/assets/img/vehicle/' . $phone . "." . $ext;
			$vehiclePath = array();
			$vehiclePath[] = $path;
			$r = array('gif', 'png', 'jpg', 'jpeg');
			$check = $checkPic->runPicCheck($path, 'uploadBtn', $r);
			$upload = $check == 1111 ? move_uploaded_file($files['uploadBtn']['tmp_name'], $path) : '';
			if ($upload) {
				$ext = pathinfo($files['uploadDoc']['name'], PATHINFO_EXTENSION);
				$path = $link.'/assets/img/vehicle-docs/' . $phone . "_vehicle-document." . $ext;
				$r = array('doc', 'pdf', 'docx');
				$vehiclePath[] = $path;
				$upload = move_uploaded_file($files['uploadDoc']['tmp_name'], $path);
				if ($upload) {
					$fields = array("vehicle_name", "type", "capacity", "license_plates", "vehicle_class", "fuel", "driver_email", "picture", "vehicle_doc", "driver_id");
					$ArrVals['picture'] = $vehiclePath[0];
					$ArrVals['doc'] = $vehiclePath[1];
					$ArrVals['id'] = $id;
					$sql = parent::insert($table, $fields, $ArrVals);
				} else {
					$res = 'something went wrong';
				}
			} else {
				$res = 'something went wrong';
			}
			break;

			case 'updateDriverPosition':
			extract($ArrVals);
			if (isset($lat, $lng, $driver_id)) {
				$fields = array('driver_location');
				$loc = array($lat . "/" . $lng);
				$sql = parent::update($table, $fields, $loc, 'id', $driver_id);
			}
			
			break;

			case 'addDriverAccount':
			$email = $ArrVals['driverEmail'];
			$sql = parent::generalSelectStatement("select * from driver where email ='$email'");
			$id = $sql->_general_result[0]->id;
			$fields = array('driver_id','bank_name','acctype','bank_account_no','rave_acc_id');
			array_shift($ArrVals);
			$new_arr = array('id'=>$id) + $ArrVals;
			$sql = parent::insert($table, $fields, $new_arr);
			break;

			case 'editDriverAccount':
			$fields = array('bank_name','acctype','bank_account_no','rave_acc_id');
			$sql = parent::update($table, $fields, $ArrVals,'id',$array_id);
			break;

			default:

			break;
		}
		if (isset($sql->_sucMsg)) {
			$msg = "ok";
		} else {
			$msg = isset($sql->_error) ? $sql->_error : $res;
		}
		return $msg;
	}

	public function getSomeInfo($info, $mode, $table, $id)
	{
		$enc = '';
		switch ($info) {
			case 'onlineDriver':
			$ql = parent::generalSelectStatement("select * from driver where online_stat = 'online'");
			break;

			case 'takeRideRequest':
			extract($mode);
			$table = "rides";
			$fields = array("driver_id", "vehicle_id", "status");
			$ql = parent::generalSelectStatement("select * from driver where id =" . $drv)->_general_result[0]->vehicles;
			$value = array($drv, $ql, "booked");
			$sql = parent::update($table, $fields, $value, "id", $rid);
			break;

			case 'rejectRideRequest':
			extract($mode);
			$table = "rides";
			$fields = array("driver_id", "vehicle_id", "status");
			$ql = parent::generalSelectStatement("select * from driver where id =" . $drv);
			$a = $ql->_general_result[0]->canceled_trips;
			$b = $ql->_general_result[0]->total_trips;
			$newXTrips = (int)$a + 1;
			$newYTrips = (int)$b + 1;
			$sql = parent::update("driver", array('canceled_trips', 'total_trips'), array($newXTrips,$newYTrips), "id", $drv);
			$value = array('', '', "pending");
			$sql = parent::update($table, $fields, $value, "id", $rid);
			break;

			case 'passengerInfo':
			extract($mode);
			$ql = parent::generalSelectStatement("select * from main_table where id = '$passengerInfo'");
			break;

			case 'delete':
			extract($mode);
			$ql = parent::delete($deletetable, $delCond, $delId);
			break;

			case 'getNewRideRequests':
			$ql = parent::generalSelectStatement("select * from rides where status = 'pending'");
			break;

			case 'drvId':
			$fields = array('customer_name','amount', 'customer_id','email','trip_id','driver_id','trans_id','trans_tax');
			$ql = parent::insert($table,$fields,$mode);
			break;

			case 'setOnlineDriver':
			$ql = parent::update($table, array("online_stat"), $mode, "id", $id);
			break;

			case 'editcoupon':
			$cid = $mode['editid'];
			array_shift($mode);
			$ql = parent::update($table, array("coupon","type","amount","expire","coupon_num","status"), $mode, "id", $cid);
			break;

			case 'areWeThereYet':
			$ql = parent::generalSelectStatement("select * from ".$table." where trip_id = '".$mode['areWeThereYet']."'");
			break;

			case 'drvStarRating':
			$arr = array($_POST['drvStarRating'],$_POST['comment']);
			$ql = parent::update($table, array("d_star_rating","d_comment"), $arr, "trip_id", $_POST['tid']);
			break;

			case 'passStarRating':
			$arr = array($_POST['passStarRating'],$_POST['comment']);
			$ql = parent::update($table, array("p_star_rating","comment"), $arr, "trip_id", $_POST['tid']);
			break;

			case 'startRide':
			extract($mode);
			$arr = array('in transit');
			$ql = parent::update($table, array("status"), $arr, "trip_id", $startRide);
			break;

			case 'endRide':
			extract($mode);
			$arr = array('completed',$endRide);
			$ql = parent::update($table, array("status","total_time"), $arr, "trip_id", $rid);
			$ql = parent::generalSelectStatement("select * from driver where id = '$id'");
			$sw = $ql->_general_result[0];
			$ct = $sw->completed_trips + 1;
			$ttrips = $sw->total_trips + 1;
			$todtrips = $sw->todays_trips + 1;
			$arr = array($ct,$ttrips,$todtrips);
			$ql = parent::update('driver', array("completed_trips","total_trips","todays_trips"), $arr, "id", $id);
			break;

			case 'checkIfRequestAnswered':
			extract($mode);
			// echo $checkIfRequestAnswered;die();
			$ql = parent::generalSelectStatement(sel . $table . " where trip_id = '$checkIfRequestAnswered'");
			break;

			case 'getDriverInformation':
			extract($mode);
			$ql = parent::generalSelectStatement(sel . $table . " where id = '$getDriverInformation'");
			break;

			case 'changeDriverPass':
			extract($mode);
			$arr = array($newPass);
			$ql = parent::update($table, array("password"), $arr, "password", $oldPass);
			break;

			case 'changePic':
			extract($mode);
			$pic = parent::unpackPicture($picture,$id,'driver');
			$path = "../assets/img/driver/".$pic;
			$arr = array($path);
			$ql = parent::update($table, array("photo"), $arr, "id", $id);
			break;

			case 'pictureUpdate':
			extract($mode);
			$pic = parent::unpackPicture($pictureUpdate,$id,'user');
			$path = "assets/img/passenger/".$pic;
			$arr = array($path);
			$ql = parent::update($table, array("picture"), $arr, "id", $id);
			break;

			default:
				# code...
			break;
		}

		if (isset($ql->_general_count) && $ql->_general_count > 0) {
			$get = $info != 'getNewRideRequests' ? $ql->_general_result : $ql->_general_result;
			$enc = json_encode($get);
		}

		if (isset($ql->_sucMsg) || isset($sql->_sucMsg)) {
			$enc = "ok";
		}
		return $enc;
	}

	public function addPassenger($vals = array(), $files, $mode, $table, $id)
	{
		switch ($mode) {
			case 'addPassenger':
			$check = parent::checkEmptyForm($vals);
			if (isset($check->count) && $check->count == 0) {
				$sql = parent::generalSelectStatement(sel . mt . " where email like '%" . $vals['passengerEmail'] . "%' OR phone like '%" . $vals['passengerPhone'] . "%'");
				if ($sql->_general_count > 0) {
					$check->response = "User Already Exists";
				} else {
					$fields = array("first_name", "lastname", "email", "phone", "password", "balance", "picture", "status", "joined", "last_login", "trips");
					$date = parent::getDatetimeNow();
					$vals['balance'] = 0;
					$vals['picture'] = '';
					$vals['status'] = 'pending';
					$vals['joined'] = $date;
					$vals['last_login'] = '';
					$vals['trips'] = 0;
					$sql = parent::insert($table, $fields, $vals);
				}
			}
			break;

			case 'updatePassenger':
			$id = $vals['PassengerId'];
			array_shift($vals);
			$check = parent::checkEmptyForm($vals);
			if (isset($check->count) && $check->count == 0) {
				$fields = array("first_name", "lastname", "email", "phone", "balance", "status");
				$sql = parent::update($table, $fields, $vals, 'id', $id);
			}

			case 'passengerAccountLName':
			
			if ($vals['passengerAccountPass1'] != '' && $vals['passengerAccountPass2'] != '') {
				if ($vals['passengerAccountPass1'] == $vals['passengerAccountPass2']) {
					$fields = array("first_name", "lastname", "email", "phone", "password");
					array_pop($vals);
				}
			}else{
				array_pop($vals);
				array_pop($vals);
				$fields = array("first_name", "lastname", "email", "phone");
			}
			$sql = parent::update($table, $fields, $vals, 'id', $id);
			break;

			default:
				# code...
			break;
		}
		if (isset($sql->_sucMsg)) {
			$msg = "ok";
		} else {
			$msg = isset($sql->_error) ? $sql->_errMsg : $check->response;
		}
		return $msg;
	}

	public function loginHandler($values = array(), $mode, $table)
	{
		extract($values, EXTR_OVERWRITE);
		switch ($mode) {
			case 'DriverLogin':
			$ql = parent::generalSelectStatement("select * from $table where email = '$DriverLoginEmail' and password = '$DriverLoginPassword'");
			break;

			case 'adminLogin':
			$ql = parent::generalSelectStatement("select * from $table where name = '$AdminUsername' and password = '$AdminPassword'");
			break;

			case 'loginPassenger':
			$check = parent::checkEmptyForm($values);
			if (isset($check->count) && $check->count == 0) {
				extract($values, EXTR_OVERWRITE);
				$ql = parent::generalSelectStatement("select * from $table where email ='$passengerLoginEmail' and password = '$passengeLoginPassword'");
			}

			break;

			default:
				# code...
			break;
		}
		if ($mode == 'DriverLogin' && $ql->_general_count > 0) {
			$id = $ql->_general_result[0]->id;
			$_SESSION['driver'] = $id;
			$msg = "ok";
		} elseif ($mode == 'loginPassenger' && $ql->_general_count > 0) {
			$id = $ql->_general_result[0]->id;
			$_SESSION['uid'] = $id;
			$msg = "ok";
		} elseif ($mode == 'adminLogin' && $ql->_general_count > 0) {
			$id = $ql->_general_result[0]->id;
			$date = parent::getDatetimeNow();
			$sql = parent::update($table, array('last_login'), array($date), 'id', $id);
			$level = $ql->_general_result[0]->level;
			$arr = (object) ["id" => $id, "level" => $level];
			$_SESSION['admin'] = $arr;
			$msg = "ok";
		} else {
			$msg = "incorrect username or password";
		}
		return $msg;
	}

	public function takeARide($value)
	{
		$msg = '';
		extract($value);
			if ($passengerLocation == '' || $passengeDestination == '' || $passengePickUpDate == '' || $rideType == '') {
				$msg = 'required fields cannot be empty';
			} else {
				$table = 'rides';
				$rideId = parent::randGenerator();
				$share = $rideshare == ''?1:$rideshare;
				$passoffer = $passengerOffer == ''?'':$passengerOffer;
				$passReq = $passengerReq == ''?'no special requests':$passengerReq;
				$arr = array($passengerLocation, $passengeDestination, $passengePickUpDate, $rideType, 'pending', '', $share, $rideId, $passengerOffer, $_SESSION['uid'], $passengePrice, '', '', '',$passReq,'','','');
				$fields = array('location', 'destination', 'pickup_time', 'rtype', 'status', 'comment', 'passenger_capacity', 'trip_id', 'passenger_bid', 'customer_id', 'fare', 'driver_id', 'p_star_rating', 'vehicle_id','pass_request','d_star_rating','d_comment','total_time');
				$sql = parent::insert($table, $fields, $arr);
				if (isset($sql->_sucMsg)) {
					$msg = (object) ["msg" => "ok", "rid" => $rideId, "swalmsg" => "please wait while we get your ride..."];
				} else {
					$msg = (object) ["msg" => $sql->_errMsg];
				}
			}
		return $msg;
	}

	public function encrypt($pass)
	{
		$hash = hash('sha256', $pass);
		return $hash;	
	}
}
