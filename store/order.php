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
	
	$Delivery=$_POST['delivery_time'];
	$Payment=$_POST['payment'];
	$Order_Deadline=$_POST['order_deadline'];
	$Mobile_No=$_POST['mobile_no'];
	$loginId = $_POST['login_id'];	
//Create connection
$databaseHost = 'localhost';
$databaseName = 'abfa_rgu';
$databaseUsername = 'abfa_rgu';
$databasePassword = '123qweasdzxc';
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
// Check connectio
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
$r="INSERT INTO orders(product_name,expiry_date,quantity,total_pur,company_name,customer_name,home_address,delivery_time,payment,order_deadline,mobile_no,login_id) 	VALUES('$Product_Name','$Expiry_date','$Quantity','$TotalPur','$Company_Name','$Customer_Name','$Home_Address',$Delivery,$Payment,'$Order_Deadline','$Mobile_No','$loginId');";
		
        
        $r.= "INSERT INTO customers(customer_name,home_address,mobile_no) 
		VALUES('$Customer_Name','$Home_Address','$Mobile_No')";

 
if (mysqli_multi_query($conn, $r)) {

                        
 
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
<?php
//including the database connection file
include_once("connection.php");


//getting id from url
$id = $_GET['id'];

$loginId = $_GET['login_id'];

//selecting data associated with this particular id
$resu = mysqli_query($mysqli, "SELECT * FROM login WHERE id='$loginId'");

while($roo = mysqli_fetch_array($resu))
{
	$name = $roo['name'];
	
	$pay = $roo['paymentNo'];
	
	
	
	
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
       <h3>  <?PHP  echo $name; ?> </h3>
         
         <form action="/store/action.php"  id="form1" name="form1" method="POST">
            
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
                           
                            <label for="">Delivery Time&Date:</label>
                           <input type="text" id="" name="delivery_time" value="<?php echo Date("Y-m-d");?>" required>
                           
                          
                                
                </div>
                <div class="col-25">
                
                           <label for="">Delivery Deadline:</label>
                           <input type="text" id="" name="order_deadline" value="<?php echo Date("Y-m-d");?>" required>
                            
                            <label for="zip"> Requested Quantity:</label> 
                           <input type="text" name="quantity" placeholder="Enter Requested Qty">
   
                           <label for="">Customer Name:</label>
                           <input type="text" id="" name="customer_name" placeholder="*As per Adhaar Card" required>

                           <label for="">Customer Add:</label>
                           <input type="text" id="" name="home_address" placeholder="*Exact, Complete Home Add" required>
                           
                           <label for="">Mobile No:</label>
                           <input type="text" id="" name="mobile_no" placeholder="*Accurate Mobile No" required>
                           
                           <label for="">Payment Method:</label>
                           <input type="radio" id="" name="payment" placeholder=""> Cash |  <input type="radio" id="" name="payment" placeholder="" checked> Paytem(<?PHP  echo $pay;?>)</a>
                           
                            
                    
                    
                    
                          
    
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