<?php
include '../core.inc.php';
include '../connect.inc.php';


echo "came";

	$part = $_GET['part'];
	$company=$_GET['company'];
	$item=$_GET['item'];

    
	$sql = "SELECT distinct * FROM pricedetail, item, company WHERE company.companyid=item.companyid AND item.itemid=pricedetail.itemid AND item.partno  LIKE '%".$part."%' AND company.name  LIKE '%".$company."%' AND item.name  LIKE '%".$item."%' ORDER BY company.name";
	$result = mysql_query($sql);
    if($result!=false)
    {
        /*$c=0;
        echo '<table class="table1"><tr><td>Sr.no</td><td>part id</td><td>company name</td><td>Item name</td><td>MRP in Rs </td><td>discount (%)</td><td>Stock</td></tr>';
        while($row = mysql_fetch_array($result))
        {
            $c=$c+1;
            $item = $row['name'];
            $mrp = $row['mrp'];
            $partno = $row['partno'];
            $company = $row['name'];
            $qty = $row['qty'];
            $disc = $row['disc'];
            $unit = $row['unit'];
            
            echo "<tr><td>$c</td><td>$partno</td><td>$company</td><td>$item</td><td>$mrp </td><td>$disc</td><td>$qty $unit</td></tr>";
        }
        echo "</table>";
    */
         echo json_encode($result);
    }
    else
    {
        echo "No stock with given input found";
    }


?>
