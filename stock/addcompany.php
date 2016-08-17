<?php 

	include '../core.inc.php';
    include '../connect.inc.php';

	if(!empty($_POST['cname'])) {
	   $company=$_POST['cname']);
       	
	}
 ?>
<html>

    <head>
    
    </head>
    <body>
    	<form action="addcompany.php" method="post">
    	<table>
    		<tr>
    			<td>Enter company name</td>
    			<td><input type="text" name="cname"></td>
    		</tr>
    		<tr>
    			<td><input type="submit" value="Add"></td>
    			<td></td>
    		</tr>	
    	</table>	
    	</form>
    </body>
</html>
        