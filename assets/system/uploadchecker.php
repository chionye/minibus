<?php
class uploadchecker {

	function runPicCheck($target_file,$fileToUpload,$allowed = array())
	{	
		$check = 0;
		$arr = [];
		$stuff = new uploadchecker();
		$arr[] = $stuff->imageFileType($fileToUpload,$target_file,$allowed);
		$arr[] = $stuff->checkIfake($fileToUpload);
		$arr[] = $stuff->checkExistence($target_file);
		$arr[] = $stuff->limitFileSize($fileToUpload);
		$count = count($arr);
		for ($i=0; $i < $count; $i++) { 
			$check.=$arr[$i];
		}
		return $check;
	}

	function imageFileType($fileToUpload, $target_file, $allowed){
		if ($_FILES[$fileToUpload]['name'] == 'blob') {
			$ext = explode('/', $_FILES[$fileToUpload]['type']);
			$ext = $ext[1];
		}else{
			$filename = $_FILES[$fileToUpload]['name'];
		$ext = pathinfo($target_file, PATHINFO_EXTENSION);
		}
		if(!in_array($ext,$allowed)) {
			$uploadOk = 0;
		}else{
			$uploadOk = 1;
		}
		return $uploadOk;
	}

	function checkIfake($fileToUpload){
		$check = getimagesize($_FILES[$fileToUpload]["tmp_name"]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			$uploadOk = 0;
		}
		return $uploadOk;
	}

	function checkExistence($target_file){
		if (file_exists($target_file)) {
			$uploadOk = 0;
		} else {
			$uploadOk = 1;
		}
		return $uploadOk;
	}

	function limitFileSize($fileToUpload){
		if ($_FILES[$fileToUpload]["size"] > 5000000000) {
			$uploadOk = 0;
		}else {
			$uploadOk = 1;
		}
		return $uploadOk;
	}
}
?>