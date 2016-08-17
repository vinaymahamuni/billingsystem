  <?php 

              include '../core.inc.php';
              include '../connect.inc.php';
              $conn = mysqli_connect("localhost", "root", "", "sandip");



              if(!empty($_POST['cname']) && !empty($_POST['iname']) && !empty($_POST['partno']) && !empty($_POST['mrp']) && !empty($_POST['qty']) && !empty($_POST['discount'])) 
              {
                  $query="SELECT companyid from company where name='".$_POST['cname']."'";
                  $result=mysql_query($query);


                  echo 'Koo1';


                  if(!$result) {
                    //add new company
                    $query="INSERT INTO company values ('', '".$_POST['cname']."', '', '')";
                    mysql_query($query);
                    $query="SELECT companyid from company where name='".$_POST['cname']."'";
                    $result=mysqli_query($conn,$query);  
                     $row=mysqli_fetch_assoc($result);
                         $query="INSERT INTO item values('',".$row['companyid'].",'".$_POST['partno']."','".$_POST['iname']."','Pc')";
                     $result=mysql_query($query);  
                    
                   
                    $query="SELECT itemid from item where partno='".$_POST['partno']."'";
                    $result=mysqli_query($conn,$query); 
                    $row = mysqli_fetch_assoc($result);
                                 
                      $query="INSERT INTO pricedetail (itemid,mrp,qty,disc)values(".$row['itemid'].",".$_POST['mrp'].",".$_POST['qty'].",".$_POST['discount'].")";
                     $result=mysql_query($query);  
                   
                           
                   }else
                   {
                       //Update details
                            $row=mysql_fetch_assoc($result);
                           $query="SELECT itemid from item where partno='".$_POST['partno']."'";
                          $result=mysql_query($query);
                            $row1=mysql_fetch_assoc($result);
                           
                          echo 'koo2';
                          if($row1==0)
                          {
                            
                            $query="INSERT INTO item values('',".$row['companyid'].",'".$_POST['partno']."','".$_POST
                              ['iname']."','Pc')"; echo "Submitted";
                             $result=mysql_query($query);

                              $query="SELECT itemid from item where partno='".$_POST['partno']."'";
                               $result=mysqli_query($conn,$query); 
                                $row = mysqli_fetch_assoc($result);
                                 
                                $query="INSERT INTO pricedetail (itemid,mrp,qty,disc)values(".$row['itemid'].",".$_POST['mrp'].",".$_POST['qty'].",".$_POST['discount'].")";
                                 $result=mysql_query($query);  

                          }
                          else
                          {
                                  
                                      $row=mysql_fetch_assoc($result);
                                 $query="SELECT mrp from pricedetail where itemid=".$row['itemid']." and mrp=".$_POST['mrp']."";
                                  $result=mysql_query($query);
                                  if(!$result)
                                   {
                                       $query="INSERT INTO pricedetail (itemid,mrp,qty,disc)values(".$row['itemid'].",".$_POST['mrp'].",".$_POST['qty'].",".$_POST['discount'].")";
                                                   $result=mysql_query($query);  
                                   }
                                  else{
                                        $query="UPDATE pricedetail set qty=qty+".$_POST['qty']." where itemid=".$row['itemid']." and mrp=".$_POST['mrp']."";
                                          $result=mysql_query($query);  
                                   
                                  }                                  

                          }
 

                   }
                   
                     
                  } 
              
    
 ?>