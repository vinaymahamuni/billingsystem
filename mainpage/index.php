<?php 
	require '../core.inc.php';

 ?>
 <html>
	<head>
	<style type="text/css">
		a {
			text-decoration: none;
		}
	</style>
	</head>
	<body>
		<div>
			<h1>Welcome <?php echo "".$_SESSION['user_id']; ?></h1>
		</div>
		<table style="text-decoration: none;">
			<tr>
				<td>
					<a href="../stock/" ><input type="button" value="Add Stock"></a>
				</td>	
				<td>
					<a href="../bill/"><input type="button" value="View Stock"></a>
				</td>
			</tr>	
			<tr>
				<td>
					<a href="#"><input type="button" value="Create Bill"></a>
				</td>
				<td>
					<a href="#"><input type="button" value="Edit Stock"></a>
				</td>
			</tr>	
		</table>
		
	</body>
 </html>