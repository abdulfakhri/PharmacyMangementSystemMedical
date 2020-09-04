<?php session_start(); ?>

<?PHP
if(isset($_POST['order'])) {
    

    
	$Product_Name = $_POST['product_name'];
	
	$Quantity= $_POST['quantity'];
	
	$Price= $_POST['price'];
	
	$TotalPur = $Quantity * $Price;
	
	$Company_Name=$_POST['company_name'];

	$Expiry_Date=$_POST['expiry_date'];
	
	$Customer_Name=$_POST['customer_name'];
	
	$Home_Address=$_POST['home_address'];
	
	
	$Order_Deadline=$_POST['order_deadline'];
	
	$Mobile_No=$_POST['mobile_no'];
	
	$loginId = $_POST['login_id'];
	
	       
		
include('connection.php');

   
$r="INSERT INTO book_buy(product_name,expiry_date,quantity,total_pur,company_name,customer_name,home_address,order_deadline,mobile_no,login_id) 
		VALUES('$Product_Name','$Expiry_date','$Quantity','$TotalPur','$Company_Name','$Customer_Name','$Home_Address','$Order_Deadline','$Mobile_No','$loginId');";
		
        
        $r.= "INSERT INTO customers(customer_name,home_address,mobile_no) 
		VALUES('$Customer_Name','$Home_Address','$Mobile_No')";

 
if (mysqli_multi_query($conn, $r)) {

                        
    echo "Order Is Registered!";
     header('Refresh: 0.001; url=/store/login.php');
    
		
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "Your Orders Is Not Registered For Some Technical Problems, Try Again Now";
}

mysqli_close($conn);
	
	
} 

?>

<?php
//including the database connection file
include_once("connection.php");


//getting id from url
$id = $_GET['id'];

$loginId = $_GET['login_id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM Minventory WHERE id='$id' AND login_id='$loginId'");

while($res = mysqli_fetch_array($result))
{
	$name = $res['product_name'];
	
	$qty = $res['quantity'];
	
	$price = $res['price'];
	
	$Packing= $res['packing'];
	
	$Company_Name=$res['company_name'];

	$Batch_No=$res['batch_no'];
	
	$Expiry_date=$res['expiry_date'];
	
	$Expiry=$res['expiry'];
}
?>

     
       
    
<body>
    
    
     
       <!--Navbar(sit on top)-->
        
       <div class="menu">
           
         <?php include 'nav.php';?>
         
    </div>
       
	
	
	<center>
    
    <div class="container">
    
       <?PHP  echo $message; ?>
         
         <form action=""  id="form1" name="form1" method="POST">
            
             <input type="hidden" name="login_id" value=<?php echo $_GET['login_id'];?>>
             
    
             <div class="row">
    
                <div class="col-25">
        
                           <label for="state">Product Name:</label> 
                           <input type="text" name="product_name" value="<?php echo $name;?>">
                           
                           
                          
                           
                           
                           <label for="zip">Price:</label>
                           <input type="text" name="price" value="<?php echo $price;?>">
                           
                           
                           <label for="zip">Expiry Date:</label>
                           <input type="text" name="expiry_date" value="<?php echo $Expiry_date;?>">
                          
                           
                           
                           
                            
                            <label for="zip">Company:</label> 
                           <input type="text" name="company_name" value="<?php echo $Company_Name;?>">
                           
                           <label for="zip">Packing:</label>
                           <input type="text" name="packing" value="<?php echo $Packing;?>">
                           
                          
                                
                </div>
                <div class="col-25">
                
                            <label for="">Purchase Time&Date:</label>
                           <input type="text" id="" name="order_deadline" value="<?php echo Date("Y-m-d");?>" required>
                            
                            <label for="zip"> Requested Quantity:</label> 
                           <input type="text" name="quantity" placeholder="Enter Requested Qty">
   
                           <label for="">Customer Name:</label>
                           <input type="text" id="" name="customer_name" placeholder="" required>

                           <label for="">Customer Add:</label>
                           <input type="text" id="" name="home_address" placeholder="" required>
                           
                           <label for="">Mobile No:</label>
                           <input type="text" id="" name="mobile_no" placeholder="" required>
                           
                            
                    
                    
                    
                          
    
               </div>

             </div>
            
    
             <div class="row">
               <div class="col-50">
                       <button type="submit"  class="btn btn-default" name='order' >Save Order</button>

                    

                        <button type="reset" class="btn btn-default">Clear </button>
               
               
              </div>
            </div>


         </form>
    
   </div>

</body>

</html>