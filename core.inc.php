<?php 
ob_start();
session_start();
$current_file=$_SERVER['SCRIPT_NAME'];
//$http_referer=$_SERVER['HTTP_REFERER'];		

function loggedin() {
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
		return true;
	}
	else {
		return false;
	}
}

function getuserfield($field) {
	//echo 'Hello '.$field.'<br>';
	$id= $_SESSION['user_id'];
	//echo $id;
	$query="SELECT `$field` FROM `userlogin` WHERE `userlogin`.`id`='$id'";
	if($query_run=mysql_query($query)) {
		if($query_result=mysql_result($query_run, 0, $field)) {
			return $query_result;
		} else {
			echo 'In Error';
		}
	} else {
		echo 'Out Error';
	}
}
 ?>