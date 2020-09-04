<?php
$loginId=$_GET['login_id'];
//including the database connection file
include_once("connection.php");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM  Minventory WHERE login_id='$loginId' ORDER BY product_name ASC LIMIT 20");

?>
<?php
if(isset($_POST['submit'])){

//including the database connection file
include_once("connection.php");

$Key=$_POST['search_key'];
//fetching data in descending order (lastest entry first)
$resul = mysqli_query($mysqli, "SELECT * FROM Minventory WHERE login_id='$loginId' OR product_name LIKE '%".$Key."%' OR company_name LIKE '%".$Key."%' OR expiry_date LIKE '%".$Key."%' OR bill_date LIKE '%".$Key."%' OR quantity LIKE '%".$Key."%' OR batch_no LIKE '%".$Key."%' OR supplier LIKE '%".$Key."%' OR expiry LIKE '%".$Key."%' ORDER BY product_name ASC LIMIT 15");
}
?>
   
<!--Navbar(sit on top)-->
        
<div class="menu">
            
    <?php include 'nav.php';?>
         
</div>
<body>
       

<center>
     
        
         <form action="" method="post" id="searchform">
     
       <h2> Search & Buy or Order Verified Medicines From This Medical Store </h2>
       
          <input  type="text"  name="search_key"  placeholder="Search By Any Details Of A Product..." />
      <input type="submit" name="submit"  class="btn btn-default" value="Search"/>
       
      
     <div class="table-responsive text-nowrap">
               
          <table class="table table-striped">
			
                           <thead>
                                <tr>
                                   <th>Store</th>
                                   <th>Product</th>
                                   <th>Status</th>
                                   <th>Quantity</th>
                                   <th>Expiry</th>
                                   <th>Company</th>
                                  <th>MRP</th>
                                   <th>Packing</th>
                                 
                                   <th>Book Buy | Order </th>
                                 </tr>
                            </thead>
							  
                               <tr>
                               <?php
		                       while($re = mysqli_fetch_array($resul)) {
		                             //to mention quantity
		                          $QtyStock=$re['quantity'];
		                      
		                          if($QtyStock == 0){
		                      
		                          $QColor ="#ff0000";
		                      
		                           }else{
		                      
		                           $QColor ="#0044cc";
		                      
		                           }
		                            $Expiry =$re['expiry_date'];
		                            $BExpiry=$re['expiry'];
		                            $CDate=date("Y-m-d");
		                            if($Expiry<=$CDate){
		                            $notes="Expired";
		                            }else if($Expiry==$CDate){
		                            $notes="Expiring Today";
		                            }else if($BExpiry<=$CDate){
		                            $notes="Expiring Soon";
		                            }else if($CDate>=$BExpiry){
		                            $notes="Expiring Soon";
		                            }else if($CDate==$BExpiry){
		                            $notes="Expiring Soon";
		                            }else if($Expiry>$CDate){
		                            $notes="Not Expired";
		                            } else{
		                            $notes ="";
		                            }
                                   
		                            echo "<tr>";
		                            echo "<th>".$re['login_id']."</th>";
                                            echo "<th>".$re['product_name']."</th>";
                                            echo "<td>" .$notes. "</td>";
                                          
                                            echo "<td style='color:$QColor'>".$re['quantity']."</td>";
                                            echo "<td>".$re['expiry_date']."</td>";
                                            echo "<td>".$re['company_name']."</td>";
                                            echo "<td>".$re['price']."</td>";
                                            echo "<td>".$re['packing']."</td>";
                                          
		                             echo "<td><a href=\"/store/book.php?login_id=$res[login_id]&id=$res[id]\">Book Buy</a>|     
		                             <a href=\"/store/book.php?login_id=$res[login_id]&id=$res[id]\">Order Online</a>
		                             </td>";
		                            echo "</tr>";	
	                            	}
	                            	?> 
                           </tr>
             
	
            </table>   
      </div>
	 
    </form>
</div>

        
        
        <center> <h3>See The Medical Stores Based On Discount</h3></center>
           <center>
           <br>
         
           <div class="table-responsive text-nowrap">
            <form action="/action.php" method="POST">
                        <center>     
               
                        <table class="table table-striped">
                                

                                   <thead>
                            
                                    <tr>

                                  
                                   
                                   <th>Product Name</th>
                                  
                                   <th>MRP</th>
                                    
                                   <th>Book To Buy| Order Online</th>
                                   
                                  
                                 
                                 </tr>
                            
                              </thead>
                        
                        <tbody>
                            
                           <?php
		                  while($res = mysqli_fetch_array($result)) {
		                      
		                     
		                     
		                  echo "<tr>";
                               
		                  echo "<th>".$res['product_name']."</th>";
                                 echo "<th>".$res['price']."</th>";
		                  echo "<td><a href=\"/store/book.php?login_id=$res[login_id]&id=$res[id]\">Book Buy</a>|     
		                  <a href=\"/store/book.php?login_id=$res[login_id]&id=$res[id]\">Order Online</a>
		                  </td>";
		                 
		                  }
                          ?>
                        </tbody>
                       
                    </table>   
                   
                    
                 </center>
                
                
               
 
            </form>
            </center>
        
            
   
         
</div>