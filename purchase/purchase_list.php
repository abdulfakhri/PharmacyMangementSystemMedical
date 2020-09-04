<?php 
session_start(); 
if(!isset($_SESSION['valid'])) {
	header('Location: /spages/login.php');
}
include('../c/v/nav.php');
include('../c/db/connection.php');
?>

<?php


if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM  inventory  WHERE login_id=".$_SESSION['id']." AND quantity='0' ORDER BY product_name ASC");

?>

<!--Navbar(sit on top)-->
        

<body>
       

<center>
     
        
    
</div>

        
        
        
        
           <center> <h1>Products Purchase List</h1></center>
           
           <br>
         
           
            <form action="" method="POST">
            
                        <center>     
               
                         <div class="table-responsive text-nowrap">
                               <table class="table table-striped">
			

                                   <thead>
                                 <!--<tr><p><a href="/v/purchase_list_toSupplier.php">Download Purchase List PDF File </a> </p></tr>-->
                                    <tr>

                                  
                                   
                                   <th>Product</th>
                                   <th>Quantity</th>
                                   <th>Bill Date</th>
                                   <th>Dealer</th>
                                   <th>MRP</th>
                                   <th>Company</th>
                                   <th>Packing</th>
                                 
                                   <th>Batch No</th>
                                  
                                  
                                   <th>Changes</th>
                                   
                                  
                                 
                                 </tr>
                            
                              </thead>
                        
                        <tbody>
                            
                           <?php
		                  while($res = mysqli_fetch_array($result)) {
		                          
		                  echo "<tr>";
                               
		                  echo "<th>".$res['product_name']."</th>";
		                   echo "<td>".$res['quantity']."</td>";
                                  echo "<td>".$res['bill_date']."</td>";
                                  echo "<th>".$res['supplier']."</th>";
		                  echo "<td>".$res['price']." Rs</td>";
		                  echo "<td>".$res['company_name']."</td>";
		                  echo "<td>".$res['packing']."</td>";
		                  echo "<td>".$res['batch_no']."</td>";
		                  echo "<td><a href=\"/mpages/crud/edit_product.php?id=$res[id]\">Edit</a> | <a href=\"/mpages/crud/delete_product.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		                
		                  }
                          ?>
                        </tbody>
                       
                    </table>   
                        </div>
                    
                 </center>
                
                
               
 
            </form>
            </center>

<?php 
include('../c/v/footer.php');
?>