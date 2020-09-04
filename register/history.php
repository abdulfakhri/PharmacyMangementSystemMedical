<?php 
session_start(); 
if(!isset($_SESSION['valid'])) {
	header('Location: /u/login.php');
}
include('../c/v/nav.php');
?>

<?php
//including the database connection file
include_once('../c/db/connection.php');
$Date_reg =$_POST['date_reg'];
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM inventory WHERE login_id=".$_SESSION['id']." AND date_reg='".$Date_reg."' ORDER BY expiry_date ASC");
?>
   
<body>

	 
	 <center> 
	


      <form action="" method="post" id="searchform">
       <center>
       <h3> Find Your Products Based By Date and Time Which You Registered</h3>
      <select name="date_reg">  
     <option>Select Date and Time of Your Last Data Entry From This List </option> 
      <?PHP
      include_once("connection.php");
    $res = mysqli_query($mysqli, "SELECT * FROM inventory WHERE login_id=".$_SESSION['id']." ORDER BY date_reg DESC ");
    while($row =mysqli_fetch_array($res)) {
     ?>
     
     <option><?PHP   echo $row["date_reg"];  ?></option>
     <?PHP
         }
      ?>
       </select>
      <input type="submit" name="submit" value="Search"/>
       </center> 
      </form>
    
       <div class="table-responsive text-nowrap">
                   
           <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Dealer</th>
                                   <th>Product</th>
                                   <th>MRP</th>
                                   <th>Company</th>
                                   <th>Packing</th>
                                   <th>Quantity</th>
                                   <th>Batch No</th>
                                   <th>Expiry</th>
                                   <th>Status</th>
                                   <th>Changes</th>
                                 </tr>
                            </thead>
                            <tbody>
                               <?php
		                       while($res = mysqli_fetch_array($result)) {
		                            $Expiry =$res['expiry_date'];
		                            $BExpiry=$res['expiry'];
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
                                             echo "<td>".$res['supplier']."</td>";
		                            echo "<td>".$res['product_name']."</td>";
		                            echo "<td>".$res['price']."</td>";
		                            echo "<td>".$res['company_name']."</td>";
		                            echo "<td>".$res['packing']."</td>";
		                            echo "<td>".$res['quantity']."</td>";
		                            echo "<td>".$res['batch_no']."</td>";
		                            echo "<td>".$res['expiry_date']."</td>";
		                            echo "<td>" .$notes. "</td>";
		                            echo "<td><a href=\"/mpages/crud/edit_product.php?id=$res[id]\">Edit</a> | 
		                            <a href=\"/mpages/crud/delete_product.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";	
	                            	}
	                            	?> 
                               </tbody>
             
	
            </table>   
       </div>
	    
	   
    <center>
    
       <?php 
include('../c/v/footer.php');
?>