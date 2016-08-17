<?php 
	include 'core.inc.php';
	if(!empty($_POST['user_id']) && !empty($_POST['passw'])) {
		if($_POST['user_id']=='sandip' && $_POST['passw'] == '1234') {
			$_SESSION['user_id']=$_POST['user_id'];
			echo "".$_SESSION['user_id'];
			header('Location: mainpage/');
		} else {
			echo "Sorry, not wrong credentials!!";
		}
	}
 ?>

 <html>
 	<head>
 		<title>Index</title>
 	</head>
 	<body>
 		<div id="login">
 			<form action="index.php" method="post">
 				<table>
 					<tr>
 						<td>Username</td>
 						<td><input type="text" name="user_id"></td>
 					</tr>
 					<tr>
 						<td>Password</td>
 						<td><input type="password" name="passw"></td>
 					</tr>
 					<tr>
 						<td><input type="submit" value="Submit"></input></td>
 						<td><input type="button" value="Reset"></td>
 					</tr>
 					<tr>
 						<td><input type="button" value="Forgot Password"></td>
 						<td><input type="button" value="Change Password"></td>
 					</tr>
 				</table>
 			</form>			
 		</div>
 	</body>
 </html>