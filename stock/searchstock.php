<html>
    <head>
        <title>search Stock</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .table1 td, .table1 
            {
                border: solid black;
            }
        </style>
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
        
            function getStockDetails(id){
                var xmlhttp;
                var item= document.getElementById("iname").value;
                var company= document.getElementById("cname").value;
                var part= document.getElementById("partno").value;
                document.getElementById("abc").innerHTML="vinay"+item+" "+company+" "+part ;

                if(window.XMLHttpRequest){
                    xmlhttp = new XMLHttpRequest();
                }else{
                    xmlhttp = new ActiveXObject("XMLHTTP");
                }
                xmlhttp.onreadystatechange = function(){
                    if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                        document.getElementById("abc").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "getstockdetails.php?part="+part+"&company="+company+"&item="+item, true);
                xmlhttp.send(null);
            }
        </script>
   
        <script>

            $(document).ready(function() {

                $("#display").click(function() {   
                    var item= document.getElementById("iname").value;
                var company= document.getElementById("cname").value;
                var part= document.getElementById("partno").value;
                    //-----------------------------------------------------------------------
                    // 2) Send a http request with AJAX http://api.jquery.com/jQuery.ajax/
                    //-----------------------------------------------------------------------
                    $.ajax({                                      
                        url: 'getstockdetails.php',                  //the script to call to get data          
                        data: "part="+part+"&company="+company+"&item="+item,              //you can insert url argumnets here to pass to api.php
                                       //for example "id=5&parent=6"
                        dataType: 'json',                //data format      
                        success: function(data)          //on recieve of reply
                        {
                            var id = data[0];              //get id
                            var vname = data[1];           //get name
                            //--------------------------------------------------------------------
                            // 3) Update html content
                            //--------------------------------------------------------------------
                            $('#abc').html("<b>id: </b>"+id+"<b> name: </b>"+vname); //Set output element html
                            //recommend reading up on jquery selectors they are awesome 
                            // http://api.jquery.com/category/selectors/
                        } 
                    });
                }); 
            }); 

        </script>
    </head>
    <body>
        <div class="left_form">
            <table>
        	
                <tr>
                    <td>Company Name</td>
                    <td><input type="text"  onkeyup="search(this.value,'company')" id="cname"  name="cname" class="tags"></td>
            
                    <td>Item Name</td>
                    <td><input type="text"  onkeyup="search(this.value,'item')" id="iname"  name="iname" class="tags"></td>
            
                    
                    <td>Part No</td>
                    <td><input type="text"  onkeyup="search(this.value,'item')" id="partno" name="partno" class="tags"></td>
                    <td><button onclick="getStockDetails(this)" >search</button></td>
                    <input type="button" id="display" value="Display All Data" /> 
                </tr>
            
           
            </table>
            <p id="abc"></p>
        </div>
        <div class="right_form">
            <form ></form>
        </div>
    </body>
</html>