

 <html>
 <head>
    <title>Add Stock</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Autocomplete - Default functionality</title>
  <link rel="stylesheet" href="jquery-ui.css">
  <link rel="stylesheet" href="style.css">
  <script src="jquery-1.js"></script>
  <script src="jquery-ui.js"></script>
    <script>
function search(val,table){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }else{
        xmlhttp = new ActiveXObject("XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
            var response=""+xmlhttp.responseText;
                var availableTags = response.split(",");           
    $( ".tags" ).autocomplete({
      source: availableTags
    });
        }
    }
    xmlhttp.open("GET", "search.php?s="+val+"&table="+table, true);
    xmlhttp.send(null);
}
</script>
   
 </head>
 <body>
    <div class="left_form">
        <table>
        	<form action="insert.php" method="post">
            <tr>
                <td>Company Name</td>
                <td><input type="text"  onkeyup="search(this.value,'company')" name="cname" class="tags"></td>
            </tr>
            <tr>
                <td>Item Name</td>
               <td><input type="text"  onkeyup="search(this.value,'item')" name="iname" class="tags"></td>
            
            </tr>
            <tr>
                <td>Part No</td>
            <td><input type="text" name="partno"></td>
</td>
            </tr>
            <tr>
                <td>MRP</td>
                <td><input type="text" name="mrp"></td>
            </tr>
            <tr>
                <td>QTY</td>
                <td><input type="text" name="qty"></td>
            </tr>
            <tr>
                <td>Discount (%)</td>
                <td><input type="text" name="discount"> </td>
            </tr>
            <tr>
                <td><input type="submit" value="Submit"></td>
                <td><input type="reset" value="Reset"></td>
            </tr>
          
        </table>
    	</form>
    </div>
    <div class="right_form">
      <form ></form>
    </div>
 </body>
 </html>