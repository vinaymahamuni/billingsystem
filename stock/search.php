<?php
include '../core.inc.php';
include '../connect.inc.php';



if(isset($_GET['s']) && $_GET['s'] != ''){
	$s = $_GET['s'];
	$table=$_GET['table'];
	$sql = "SELECT * FROM $table WHERE name LIKE '%".$s."%'";
	$result = mysql_query($sql);
	if($result!=false) {
	  while($row = mysql_fetch_array($result)){
		$title = $row['name'];
		echo "$title,";
	   }
}
} 

?>
