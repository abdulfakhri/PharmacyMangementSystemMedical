<?php  
session_start(); 
if(!isset($_SESSION['valid'])) {
	header('Location: /u/login.php');
}

include('../c/v/nav.php');
include('../c/db/connection.php');
//clude('getData.php');
?>
<?php
if(isset($_POST['addproduct'])){
    

		
  
  $Product_Name = $_POST['product_name'];
	
	$Quantity= $_POST['quantity'];
	
	$Price = $_POST['price'];
	
	$Packing=$_POST['packing'];
	
	$Company_Name=$_POST['company_name'];
	
	$Batch_No=$_POST['batch_no'];
	
	$Sup=$_POST['supplier'];

	$Expiry_date=$_POST['expiry_date'];
	
	$Expiry=$_POST['expiry'];
	
	$Barcode =$_POST['barcode'];
	
	$BillName =$_POST['bill_name'];
	
	$BDate =$_POST['bill_date'];
	
	$loginId = $_SESSION['id'];
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM  inventory  WHERE login_id=".$_SESSION['id']."");

 while($res = mysqli_fetch_array($result)) {

  $batchNo=$res['batch_no'];


}

 
	
		
//Create connection
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
// Check connection
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
		
		
		
if($batchNo==$Batch_No){

     echo "<center>This Product Is Already Registered,Register A New Product!</center>";
     header('Refresh: 0.1; url=/mpages/products.php');
?>

<?php
}else{

    
//insert data to database	
$sql="INSERT INTO inventory(bill_name,supplier,bill_date,barcode,product_name,quantity,price,packing,company_name,batch_no,expiry_date,expiry,login_id) VALUES('$BillName','$Sup','$BDate','$Barcode','$Product_Name','$Quantity','$Price','$Packing','$Company_Name','$Batch_No','$Expiry_date','$Expiry','$loginId')";	
if (mysqli_query($conn, $sql)) {
    //echo "<center>Product Is Registered!</center>";
     h//eader('Refresh: 0.1; url=/register/products.php');
     ?>
     <script>
    
     location.replace("/register/products.php");
    
    </script>

     
     <?php
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "Product Is Not Registered, Try Again Later";
}
mysqli_close($conn);

}		
}
?>