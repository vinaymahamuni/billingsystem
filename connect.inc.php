<?php 

$mysql_error = 'Could not connect to the database.';
$mysql_host="localhost";
$mysql_user="root";
$mysql_password="";

$mysql_db="sandip";

if(!mysql_connect($mysql_host,$mysql_user,$mysql_password)||!mysql_select_db($mysql_db)) {
	die(mysql_error());
}


 ?>