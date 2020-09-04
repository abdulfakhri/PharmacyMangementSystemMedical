<?php session_start(); ?>

<?php
if(!isset($_SESSION['validC'])) {
	header('Location: /store/store.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");


if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $CustN =$_SESSION['name'];
  $Mn =$_SESSION['validC'];

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM  orders WHERE customer_name='$CustN' AND mobile_no='$Mn'");

?>
   
<!--Navbar(sit on top)-->
<div class="menu">
            
    <?php include 'nav.php';?>
         
</div>


  <center>  
  
 
		  
		  
		  <div class="table-responsive text-nowrap">
          
		   <table class="table table-striped">
		   

		  <div class="table-responsive text-nowrap">
		  
		 <table class="table table-striped">
                             <thead>
                            <h3><b>Purchased Items Ticket <?PHP echo  $Date=date("Y-m-d"); ?></b></h3>
                                 <div class="col-25">
                        
                                 <table class="table table-list-search">

                                   <thead>
                            
                                    <tr>

                                   <th>Order No:</th>
                                   <th>Products</th>
                                   <th>Quantity</th>
                                   <th>Total Price</th>
                                   <th>Customer</th>
                                   
                                   <th>Delivery</th>
                                
                                   <th>Changes</th>
                                 
                                 </tr>
                            
                              </thead>
                        
                        <tbody>
                            
                         <?php
		                  while($res = mysqli_fetch_array($result)) {
		                  echo "<tr>";
		                  echo "<td>".$res['id']."</td>";
		                  echo "<td>".$res['product_name']."</td>";
		                  echo "<td>".$res['quantity']."</td>";
		                  echo "<td>".$res['total_pur']."</td>";
		                  echo "<td>".$res['customer_name']."</td>";
		                  
		                  echo "<td>".$res['order_deadline']."</td>";
		                  
		                  echo "<td><a href=\"/mpages/crud/edit_order.php?id=$res[id]\">Edit</a> | <a href=\"/mpages/crud/delete_order.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		                  }
                         ?>
		
                        </tbody>

                    </table>   
                    </div>
           

</center>
            
 
</div>