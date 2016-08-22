<html>
	<head>
		<title>Create Bill</title>
		<script>
			var sr=0;
			function addItem() {
				sr++;
				item_name=document.getElementById('item-name').value;
				mrp=document.getElementById('mrp').value;
				disc=document.getElementById('disc').value;
				qty=document.getElementById('qty').value;

				old_htm=document.getElementById('dyn-tab').innerHTML;
				var str='<tr><td>'+sr+'</td><td>'+item_name+'</td><td>'+mrp+'</td><td>'+disc+'</td><td>'+qty+'</td><tr>';
				document.getElementById('dyn-tab').innerHTML=old_htm+str;
			}
		</script>
	</head>
	<body>

		<div class='add-item'>
			<form action="#" method="post">
				<table>
					<tr>
						<td>Item Name :</td>
						<td><input type="text" name="item-name" id='item-name'></td>
					</tr>
					<tr>
						<td>Mrp :</td>
						<td><input type="text" name="mrp" id='mrp'></td>
					</tr>
					<tr>
						<td>Discount :</td>
						<td><input type="text" name="discount" id='disc'></td>
					</tr>
					<tr>
						<td>Quantity :</td>
						<td><input type="text" name="qty" id='qty'></td>
					</tr>
					<tr>
						<td><button name="submit" onClick="submitBill()">Submit Bill</button></td>
					</tr>
				</table>
			</form>
			<td><button name="add" onclick="addItem()">Add Item</button></td>
		</div>
		<div class="disp-item" style="float: left;">
			<table border='1' id='dyn-tab'>
				<tr>
					<th>Item Name</th>
					<th>Mrp</th>
					<th>Discount</th>
					<th>Quantity</th>
					<th>Delete</th>
				</tr>
			</table>
		</div>
	</body>
</html>
				