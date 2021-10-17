<?php

class processes
{
	private static $_instance = null;
	private static $connect;

	public function __construct()
	{ //construct method
		global $connect;
		try {
			//$connect = new PDO('mysql:host=localhost;dbname=bkr','root','Cashroll@2017');
			if ($_SERVER['SERVER_NAME'] == 'localhost') {
				$connect = new PDO('mysql:host=localhost;dbname=minibus', 'root', '');
			} else {
				$connect = new PDO('mysql:host=localhost;dbname=u308129001_db', 'u308129001_user', 'min@2020?');
			}
			$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public static function getInstance()
	{ //class instance
		if (isset(self::$_instance)) {
			return self::$_instance;
		}
		self::$_instance = new processes();
		return self::$_instance;
	}

	public function getAvailableBal($id)
	{
		global $connect;
		$query = "SELECT * FROM account_details WHERE main_id = '$id'";
		$this->generalSelectStatement($query);
		if ($this->_general_count > 0) {
			foreach ($this->_general_result as $k => $result) {
				$this->bal = $result->amount_in;
			}
			return $this;
		}
	}

	public function gettheDetails($id)
	{
		global $connect;
		$query = "SELECT * FROM main_table WHERE main_id = '$id'";
		$this->generalSelectStatement($query);
		if ($this->_general_count > 0) {
			foreach ($this->_general_result as $k => $result) {
				$this->email = $result->email;
				$this->full_name = $result->first_name . " " . $result->lastname;
			}
			return $this;
		}
	}
	public function randGenerator()
	{
		$randnum = rand('000000000001', '9999999999999');
		$randpicker = rand(1, 143);
		$pickerbox = array('RCA', 'RCB', 'RCC', 'RCD', 'RCE', 'RCF', 'RCG', 'RCH', 'RCI', 'RCJ', 'RCK', 'RCL', 'RCM', 'RCN', 'RCO', 'RCP', 'RCQ', 'RCR', 'RCS', 'RCT', 'RCU', 'RCV', 'RCW', 'RCX', 'RCY', 'RCZ', 'RTA', 'RTB', 'RT', 'RTC', 'RTD', 'RTE', 'RTF', 'RTG', 'RTH', 'RTI', 'RTJ', 'RTK', 'RTL', 'RTM', 'RTN', 'RTO', 'RTP', 'RTQ', 'RTR', 'RTS', 'RTT', 'RTU', 'RTV', 'RTW', 'RTX', 'RTY', 'RTZ', 'RPA', 'RPB', 'RPC', 'RPD', 'RPD', 'RPE', 'RPF', 'RPG', 'RPH', 'RPI', 'RPJ', 'RPK', 'RPL', 'RPM', 'RPN', 'RPO', 'RPP', 'RPQ', 'RPR', 'RPS', 'RPT', 'RPU', 'RPV', 'RPW', 'RPX', 'RPY', 'RPZ', 'RRR', 'REA', 'REB', 'REC', 'RED', 'REE', 'REF', 'REG', 'REH', 'REI', 'REJ', 'REK', 'REL', 'REM', 'REN', 'REO', 'REP', 'REQ', 'RER', 'RES', 'RET', 'REU', 'REV', 'REW', 'REX', 'REY', 'REZ', 'RDA', 'RDB', 'RDC', 'RDD', 'RDE', "RAA", "RBH", "RHJ", "RKK", "RWH", "RBB", "RFC", "RGC", "RHC", "RJC", "RKC", "TLC", "TZC", "TXC", "TCC", "TVC", "TBC", "TNC", "TDO", "TDT", "TTT", "TAG", "TAH", "TAS", "TAR", "TAC", "TAT", "TAZ", "TSY", "TSB", "TZX", "TQO", "TAP");
		$shuff = $pickerbox[$randpicker];
		$main = $shuff . $randnum;
		return $main;
	}


	public function theConnector()
	{
		define("databasename", 'minibus');
		define("username", 'root');
		define("password", '');
		define("host", 'localhost');
		$link = mysqli_connect(host, username, password, databasename) or die("Could not connect to database");
		return $link;
	}


	public function generalSelectStatement($query)
	{
		global $connect;
		$call = processes::getInstance();
		$connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		if ($statement = $connect->prepare($query)) {
			if ($statement->execute()) {
				$this->_general_result = $statement->fetchAll(PDO::FETCH_OBJ);
				$this->_general_count = $statement->rowCount();
				if ($this->_general_count == 0) {
					$this->_error = true;
					$this->_errMsg = "Incorrect login details";
				} else {
					$this->_general_result = $this->_general_result;
				}
			} else {
				$this->_error = true;
				$this->_errMsg = "An error occured";
			}
		} else {
			$this->_error = true;
			$errInfo = $connect->errorInfo();
			$this->_errMsg = $errInfo[2];
		}
		return $this;
		//echo json_encode($this->_results);
		//echo "myFunc(".json_encode($this->order_results).")";
	}

	public function getMyCurr($choosen_cur)
	{
		global $connect;
		$curr_symbol = array("€", "£", "A$", "NZ$", "c$", "¥", "Fr", "$", "¥");
		$curr_symbol_1 = array("EUR", "GBP", "AUD", "NZD", "CAD", "JPY", "Fr", "$", "Yuan");
		if ($choosen_cur == 14) {
			$this->cur_symbol = "$";
			$this->rate = 1;
		} else {
			$this->generalSelectStatement("SELECT * FROM rates WHERE id = '$choosen_cur'");
			if ($this->_general_count > 0) {
				foreach ($this->_general_result as $k => $value) {
					$this->rate = $value->exchange_rate;
					if ($choosen_cur == 1) {
						$this->cur_symbol = $curr_symbol_1[0];
					} elseif ($choosen_cur == 2) {
						$this->cur_symbol = $curr_symbol_1[1];
					} elseif ($choosen_cur == 3) {
						$this->cur_symbol = $curr_symbol_1[2];
					} elseif ($choosen_cur == 4) {
						$this->cur_symbol = $curr_symbol_1[3];
					} elseif ($choosen_cur == 5) {
						$this->cur_symbol = $curr_symbol_1[4];
					} elseif ($choosen_cur == 12) {
						$this->cur_symbol = $curr_symbol_1[5];
					} elseif ($choosen_cur == 11) {
						$this->cur_symbol = $curr_symbol_1[6];
					} elseif ($choosen_cur == 14) {
						$this->cur_symbol = $curr_symbol_1[7];
					} elseif ($choosen_cur == 15) {
						$this->cur_symbol = $curr_symbol_1[8];
					}
				}
				return $this;
			}
		}
	}

	public function insert($table, $fields = array(), $values = array())
	{
		global $connect;
		if (is_array($fields) && is_array($values)) {
			if (count($fields) && count($values)) {
				$this->_error = false;
				$db = processes::getInstance();

				$queryFields =  implode(",", $fields);
				$s = self::generateQuestionMark($fields);
				$connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				$query = "INSERT INTO " . $table . " (" . $queryFields . ") VALUES (" . $s . ");";
				if ($statement = $connect->prepare($query)) {
					$x = 1;
					foreach ($values as $val) {
						$statement->bindValue($x, $val);
						$x++;
					}
					if ($statement->execute()) {
						$this->_sucMsg = "Insertion was successful";
					} else {
						$this->_error = true;
						$this->_errMsg = "An error occured,please try again";
					}
				} else {
					$this->_error = true;
					$errInfo = $connect->errorInfo();
					$this->_errMsg = $errInfo[2];
				}
			} else {
				die("invalid parameters.Empty arrays");
			}
		} else {
			die("invalid parameters.Parameters must be arrays");
		}
		return $this;
	}

	public function selectUser($query)
	{ // selects company email from company_info table for email validation
		global $connect;
		$call = processes::getInstance();
		$state = $query;
		if ($statement = $connect->query($state)) {
			while ($fetch = $statement->fetch()) {
				$this->user =  $fetch["Username"];
				$this->user_id =  $fetch["ID"];
				$this->admin_count = $statement->rowCount();
			}
		} else {
			$failure = $statement->errorInfo();
			print_r($failure);
		}
		return $this;
	}

	public function update($table, $fields = array(), $values = array(), $condition, $clause)
	{
		global $connect;
		if (is_array($fields) && is_array($values)) {
			if (count($fields) && count($values)) {
				$this->_error = false;
				$db = processes::getInstance();
				$queryFields =  implode(",", $fields);
				$query = self::generateUpdateQuery($table, $fields, $condition, $clause);
				$connect->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				if ($statement  = $connect->prepare($query)) {
					$x = 1;
					foreach ($values as $val) {
						$statement->bindValue($x, $val);
						$x++;
					}
					if ($statement->execute()) {
						$this->_sucMsg = "Update was successful";
					} else {
						$this->_error = true;
						$this->_error = "An error occured,please try again";
					}
				} else {
					$this->_error = true;
					echo $connect->errorInfo();
					//$this->_errMsg = $errInfo[2];
				}
			} else {
				die("invalid parameters.Empty arrays");
			}
		} else {
			die("invalid parameters.Parameters must be arrays");
		}
		return $this;
	}


	private static function generateQuestionMark($arr)
	{ //generates question mark for insert
		$count = count($arr);
		$x = 0;
		$s = "";
		foreach ($arr as $value) {
			if ($x === ($count - 1)) {
				$s = $s . "?";
			} else {
				$s = $s . "?,";
			}
			$x++;
		}
		return $s;
	}

	// function getSessions(){//for user sessions

	// 	if(isset($_SESSION['logged_in'])){

	// 		$this->user_id = $_SESSION['user_id'];
	// 		$this->logged = $_SESSION['logged_in'];
	// 		$this->user_name = $_SESSION['user_name'];

	// 	}
	// 	return $this;
	// }

	// function getAdminSessions(){//for admin sessions

	// 	if(isset($_SESSION['admin_logged'])){

	// 		$this->admin_id = $_SESSION['admin_id'] ;
	// 		$this->admin_logged = $_SESSION['admin_logged'];
	// 		$this->admin_user_name = $_SESSION['admin_user_name'];

	// 	}
	// 	return $this;
	// }


	private static function generateUpdateQuery($table, $arr, $condition, $clause)
	{ //generate update query
		$count = count($arr);
		$x = 0;
		$s = "UPDATE {$table} SET ";
		foreach ($arr as $value) {
			if ($x === ($count - 1)) {
				$s = $s . "{$value} = ?";
			} else {
				$s = $s . "{$value} = ?,";
			}
			$x++;
		}
		return $s . " WHERE {$condition} = '$clause'";
	}

	public function delete($table, $cond, $cond_ans)
	{ //deletes row from any table
		global $connect;
		$call = processes::getInstance();

		try {
			$delete = "DELETE FROM " . $table . " WHERE " . $cond . " = '$cond_ans'";
			$statement = $connect->prepare($delete);
			if ($statement->execute()) {
				$this->sucMsg = "Row Succesfully Deleted";
			} else {
				$failure = $statement->errorInfo();
				print_r($failure);
			}
		} catch (PDOException $e) {
			echo $delete . "<br>" . $e->getMessage();
		}
		return $this;
	}

	public function sumArraysByKeys($main_counter)
	{ //sums arrays by similar keys

		$this->sumArray = array();

		foreach ($main_counter as $k => $subArray) {
			foreach ($subArray as $id => $value) {
				@$this->sumArray[$id] += $value;
			}
		}

		return $this->sumArray;
	}

	public function valid_email($str)
	{
		return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? false : true;
	}

	public function alpha_numeric($str)
	{
		return (!preg_match("/^([-a-z0-9])+$/i", $str)) ? false : true;
	}



	//lets generate alphanumeric key, we will use in session validation
	public function random_string($length)
	{
		$this->key = '';
		$this->keys = array_merge(range(0, 3));

		for ($i = 0; $i < $length; $i++) {
			$this->key .= $this->keys[array_rand($this->keys)];
		}

		return $this->key;
	}

	public function random_string2($type = 'alnum', $len = 8)
	{
		switch ($type) {
			case 'alnum':
			case 'numeric':
			case 'nozero':

			switch ($type) {
				case 'alnum':
				$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				break;
				case 'numeric':
				$pool = '0123456789';
				break;
				case 'nozero':
				$pool = '123456789';
				break;
			}

			$str = '';
			for ($i = 0; $i < $len; $i++) {
				$str .= substr($pool, mt_rand(0, strlen($pool) - 1), 1);
			}
			return $str;
			break;
			case 'unique':
			return md5(uniqid(mt_rand()));
			break;
		}
	}

	public function p_amtCheck()
	{
		if ($this->_count == 0) {
			$this->p_id_s = 0;
		} else {
			$this->p_id_s = $this->p_id;
		}
	}


	public function generatePamt()
	{ //generates the p_amt no

		$selectP_amt = array("AV", "CD", "MV", "PH", "GH", "HW", "RV", "SV", "FT", "PT", "DS", "FG", "HU", "PO", "MT", "SP", "HG", "JU", "NO", "LM");

		$this->p_id_s++;

		$Amt_Pre = "P_";
		$randAmt = rand(0, 19);
		$pickAmt = $selectP_amt[$randAmt];

		$paddAmt = sprintf("%02d", $this->p_id_s);

		$this->P_amt = $Amt_Pre . $paddAmt . $pickAmt;
	}

	public function getP_amt()
	{
		echo $this->P_amt;
	}

	public function generateRandomNo($prefix)
	{
		$surfix = array("AVS", "CDD", "GMV", "PUH", "GHY", "HUW", "REV", "SDV", "WFT", "PUT", "DIS", "FGO", "HUP", "POU", "MXT", "BSP", "HJG", "JUC", "NVO", "LLM");
		$random = rand(0, 19);
		$surfix = $surfix[$random];
		$surfix = str_shuffle($surfix);

		$No = rand(10, 99);
		$mid_No = sprintf("%04d", $No);


		$random_no = $prefix . $mid_No . $surfix;

		return $random_no;
	}


	public function getDatetimeNow()
	{
		$tz_object = new DateTimeZone('UTC');
		//date_default_timezone_set('Brazil/East');

		$this->datetime = new DateTime();
		$this->datetime->setTimezone($tz_object);
		return $this->datetime->format('Y\-m\-d\ G:i:s');
	}

	public function getTimeNow()
	{
		$tz_object = new DateTimeZone('UTC');
		//date_default_timezone_set('Brazil/East');

		$this->datetime = new DateTime();
		$this->datetime->setTimezone($tz_object);
		//return $datetime->format('Y\-m\-d\ G:i:s');
		return $this->datetime->format('G:i:s');
	}

	public function getDateNow()
	{
		$tz_object = new DateTimeZone('UTC');
		//date_default_timezone_set('Brazil/East');

		$this->datetime = new DateTime();
		$this->datetime->setTimezone($tz_object);
		return $this->datetime->format('Y-m-d');
		//return $this->datetime->format('G:i:s');
	}

	public function dateAdder()
	{
		date_default_timezone_set('UTC');

		$dated = date('Y-m-d H:i');
		$dates = date('Y\-m\-d\ G:i:s', strtotime($dated . " +24 hours"));
		//$dates=date('Y-m-d H:i', strtotime($dated . " +2 minutes"));

		return $dates;
	}

	public function timeOnlyAdder()
	{
		date_default_timezone_set('UTC');

		$dated = date('Y-m-d H:i');
		$dates = date('G:i:s', strtotime($dated . " +5 minutes"));
		//$dates=date('Y-m-d H:i', strtotime($dated . " +2 minutes"));

		return $dates;
	}

	public function generateInvoiceNumber()
	{ //generates the invoice no
		$inv = "INV_";
		$select = array("AV", "CD", "MV", "PH", "GH", "HW", "RV", "SV", "FT", "PT", "DS", "FG", "HU", "PO", "MT", "SP", "HG", "JU", "NO", "LM");
		$rand = rand(0, 19);
		$pick = $select[$rand];

		$this->invoice_id_s++;



		$a_paded = sprintf("%04d", $this->invoice_id_s);

		$this->main_inv = $inv . $a_paded . $pick;



		$selectOrder = array("AV", "CD", "MV", "PH", "GH", "HW", "RV", "SV", "FT", "PT", "DS", "FG", "HU", "PO", "MT", "SP", "HG", "JU", "NO", "LM");

		$orderPre = "ORD";
		$randOrder = rand(0, 19);
		$pickOrder = $selectOrder[$randOrder];

		$paddOrder = sprintf("%03d", $this->invoice_id_s);

		$this->OrderNo = $orderPre . $paddOrder . $pickOrder;
	}

	public function noFormatter($no)
	{
		$this->_no = number_format($no, 2, '.', ',');
		return $this;
	}

	public function sendMail($to, $subject, $txt, $headers)
	{
		ini_set("SMTP", "aspmx.l.google.com");
		ini_set("sendmail_from", "santamichello@gmail.com");

		mail($to, $subject, $txt, $headers);

		echo "Check your email now....<BR/>";
	}

	public function checkIfSessionIsSet($main_session)
	{
		if (isset($main_session)) { // for session time
			return true;
		} else {
			return false;
		}
	}

	public function checkEmptyForm($value = array())
	{
		if (is_array($value)) { // check if array was supplied

			$check = 0; //start count at 0.
			foreach ($value as $key) {
				if ($key == '') {
					$check++;
				}
			}
			$this->count = $check;
			if ($check != 0) {
				$this->response = 'fields cannot be empty';
			}
		} else {
			$this->response = 'supplied value is not an array';
		}
		return $this;
	}

	public function getEmails()
	{
		$arr = [];
		/* Connecting Gmail server with IMAP */
		$connection = imap_open('{imap.gmail.com:993/imap/ssl}INBOX', 'osoh.nkiru@gmail.com', 'blessing07') or die('Cannot connect to Gmail: ' . imap_last_error());

		/* Search Emails having the specified keyword in the email subject */
		$emailData = imap_search($connection, 'TO "osoh.nkiru@gmail.com"');

		if (!empty($emailData)) {
			foreach ($emailData as $emailIdent) {
				$overview = imap_fetch_overview($connection, $emailIdent, 0);
				$message = imap_fetchbody($connection, $emailIdent, '1.1');
				$messageExcerpt = substr($message, 0, 150);
				$partialMessage = trim(quoted_printable_decode($messageExcerpt));
				$date = date("d F, Y", strtotime($overview[0]->date));
				$arn = [$overview];
				$arr[] = $arn;
			}
			$ex = $arr;
			$res = json_encode($ex);
		}
		return $res;
	}

	public function getRideDetails($mode=null, $id=null, $drv=null, $table)
	{
		$res = "";
		$json = "";
		switch ($mode) {
			case 'route':
			$id = base64_decode(urldecode($id));
			$ql = self::generalSelectStatement(sel . rd . " where id =" . $id);
			break;

			case 'driverDetails':
			$ql = self::generalSelectStatement(sel . $table . " where id = " . $id);
			break;

			case 'passDetails':
			$ql = self::generalSelectStatement(sel . $table . " where id =" . $id);
			break;

			case 'percetage':
			$ql = self::generalSelectStatement(sel . $table);
			break;

			case 'driverVh':
			$ql = self::generalSelectStatement(sel . $table . " where driver_id =" . $id);
			break;

			case 'getRideDets':
			$ql = self::generalSelectStatement(sel . $table . " where trip_id = '$id'");
			break;

			case 'driverTrips':
			$ql = self::generalSelectStatement(sel . $table . " where driver_id = '$id'");
			break;

			case 'Trips':
			$ql = self::generalSelectStatement("select SUM({$id}) as trips from {$table}");
			break;

			case 'UsersTotal':
			$ql = self::generalSelectStatement("select count(*) as total from main_table");
			break;

			case 'driverMonthTrips':
			$ql = self::generalSelectStatement("select count(*) as total from ". $table . " where driver_id = '$id' AND YEAR(date) = YEAR(NOW()) AND MONTH(date) = MONTH(NOW())");
			break;

			case 'driverWeekTrips':
			$ql = self::generalSelectStatement("select count(*) as total from " . $table . " where driver_id = '$id' AND WEEKOFYEAR(date) = WEEKOFYEAR(NOW())");
			break;

			case 'driverDayTrips':
			$ql = self::generalSelectStatement("select count(*) as total from " . $table . " where driver_id = '$id' AND YEAR(date) = YEAR(NOW()) AND MONTH(date) = MONTH(NOW()) AND DAY(date) = DAY(NOW())");
			break;

			case 'driverMonthPay':
			$ql = self::generalSelectStatement("select sum(amount) as total from ". $table . " where driver_id = '$id' AND YEAR(date) = YEAR(NOW()) AND MONTH(date) = MONTH(NOW())");
			break;

			case 'adminMonthPay':
			$ql = self::generalSelectStatement("select sum(trans_tax) as total from ". $table . " where YEAR(date) = YEAR(NOW()) AND MONTH(date) = MONTH(NOW())");
			break;

			case 'driverWeekPay':
			$ql = self::generalSelectStatement("select sum(amount) as total from " . $table . " where driver_id = '$id' AND WEEKOFYEAR(date) = WEEKOFYEAR(NOW())");
			break;

			case 'adminWeekPay':
			$ql = self::generalSelectStatement("select sum(trans_tax) as total from " . $table . " where WEEKOFYEAR(date) = WEEKOFYEAR(NOW())");
			break;

			case 'driverDayPay':
			$ql = self::generalSelectStatement("select sum(amount) as total from " . $table . " where driver_id = '$id' AND YEAR(date) = YEAR(NOW()) AND MONTH(date) = MONTH(NOW()) AND DAY(date) = DAY(NOW())");
			break;

			case 'adminDayPay':
			$ql = self::generalSelectStatement("select sum(trans_tax) as total from " . $table . " where YEAR(date) = YEAR(NOW()) AND MONTH(date) = MONTH(NOW()) AND DAY(date) = DAY(NOW())");
			break;

			case 'passTrips':
			$ql = self::generalSelectStatement(sel . $table . " where customer_id = '$id' ORDER BY date DESC");
			break;

			case 'drvAcc':
			$ql = self::generalSelectStatement(sel . $table . " where driver_id = '$id'");
			break;

			case 'rideTypes':
			$ql = self::generalSelectStatement(sel . $table);
			break;

			default:
			$ql = self::generalSelectStatement(sel . $table . " where id =" . $id);
			break;
		}
		if ($ql->_general_count > 0) {
			$res = $ql->_general_result;
			$json = json_encode($res);
		}
		return $json;
	}

	public function unpackPicture($pic,$id,$hwere){
		$data = $pic;
		list($type, $data) = explode(';',$data);
		list(, $data) = explode(',',$data);

		$data = base64_decode($data);
		$imageName = $id."-".time().".png";
		if ($hwere == 'driver') {
			file_put_contents('../../assets/img/driver/'.$imageName,$data);
		}
		if ($hwere == 'user') {
			file_put_contents('../../assets/img/passenger/'.$imageName,$data);
		}
		return $imageName;
	}

	public function checkPaymentStat($gateway,$id)
	{
		$transaction = $gateway->transaction()->find($id);
		$transactionSuccessStatuses = [
			Braintree\Transaction::AUTHORIZED,
			Braintree\Transaction::AUTHORIZING,
			Braintree\Transaction::SETTLED,
			Braintree\Transaction::SETTLING,
			Braintree\Transaction::SETTLEMENT_CONFIRMED,
			Braintree\Transaction::SETTLEMENT_PENDING,
			Braintree\Transaction::SUBMITTED_FOR_SETTLEMENT
		];

		if (in_array($transaction->status, $transactionSuccessStatuses)) {
			$header = "Sweet Success!";
			$icon = "success";
			$message = "Your test transaction has been successfully processed.";
		} else {
			$header = "Transaction Failed";
			$icon = "fail";
			$message = "Your test transaction has a status of " . $transaction->status . ". Please contact Admin.";
		}
		$return = ["header"=>$header,"icon"=>$icon,"message"=>$message];
		$json = json_encode($return);
		return $json;
	}
}//class ends