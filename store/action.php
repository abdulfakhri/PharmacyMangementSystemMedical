<?php session_start(); ?>



  
  <?php

$databaseHost = 'localhost';
$databaseName = 'abfa_rgu';
$databaseUsername = 'abfa_rgu';
$databasePassword = '123qweasdzxc';
		
//Create connection
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);


?>
<?php

if(isset($_POST['signup'])) {
	$name = $_POST['name'];
	
	$username = $_POST['username'];
	$pass = $_POST['password'];

	if($username == "" || $pass == "" || $name == "") {
		echo "<center>All fields should be filled. Either one or many fields are empty.</center>";
		echo "<br/>";
		header('Refresh: 0.01; url=/spages/signup.php');
	} else {
		mysqli_query($mysqli, "INSERT INTO login(name,username, password) VALUES('$name','$username', md5('$pass'))")
			or die("Could not execute the insert query.");
		
		echo "<br></br><br></br>";	
		echo "<center>Registration successfully</center>";
		echo "<br/>";
		header('Refresh: 0.01; url=/mpages/home.php');
		
	}
}

if(isset($_POST['login'])) {
    
	$user = mysqli_real_escape_string($mysqli, $_POST['username']);
	
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($user == "" || $pass == "") {
	    
		echo "<br></br><br></br><br></br>";
		
		echo "<center>Either username or password field is empty.</center>";
	
	
		
	} else {
	    
		$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
		    
			$validuser = $row['username'];
			
			$_SESSION['valid'] = $validuser;
			
			$_SESSION['name'] = $row['name'];
			
			$_SESSION['id'] = $row['id'];
			
			echo"<br></br><br></br><br></br>";
		    echo"<center>Welcome!</center>";
			header('Refresh:0.0; URL=/mpages/home.php');
			
		} else {
		    
		    echo "<br></br><br></br><br></br>";
		    
			echo "<center>Invalid Username or Password.</center>";
		
			header('Refresh: 0.1; URL=/spages/login.php');
		} 
	
	}
	
}
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

if(isset($_POST['addproduct'])){
    
$databaseHost = 'localhost';
$databaseName = 'abfa_rgu';
$databaseUsername = 'abfa_rgu';
$databasePassword = '123qweasdzxc';
		

 
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
		
//Create connection
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
// Check connection
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
		
		//insert data to database	
		$sql="INSERT INTO Minventory(bill_name,supplier,bill_date,barcode,product_name,quantity,price,packing,company_name,batch_no,expiry_date,expiry,login_id) VALUES('$BillName','$Sup','$BDate','$Barcode','$Product_Name','$Quantity','$Price','$Packing','$Company_Name','$Batch_No','$Expiry_date','$Expiry','$loginId')";
		
		
		
if (mysqli_query($conn, $sql)) {
    
    echo "<center>Product Is Registered!</center>";
     header('Refresh: 0.1; url=/mpages/products.php');
		
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "Product Is Not Registered, Try Again Later";
}

mysqli_close($conn);
	
}

if(isset($_POST['lend'])) {
    
	$Product_Name = $_POST['product_name'];
	
	$Company_name = $_POST['company_name'];
	
	$Quantity= $_POST['quantity'];
	
	$Price = $_POST['price'];
	
	$Customer_Name=$_POST['customer_name'];
	
	$Home_Address=$_POST['home_address'];
	
	$Lend_Date=$_POST['lend_date'];
	
	$Mobile_No=$_POST['mobile_no'];
	
	$loginId = $_SESSION['id'];
		
//Create connection
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
// Check connectio
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
		
		//insert data to database	
		$sql="INSERT INTO lending(product_name,quantity,price,company_name,customer_name,home_address,lend_date,mobile_no,login_id) 
		VALUES('$Product_Name','$Quantity','$Price','$Company_name','$','$Customer_Name','$Home_Address','$Lend_Date','$Mobile_No','$loginId')";
		
		
		
if (mysqli_query($conn, $sql)) {
    
    echo "Lend Is Registered!";
     header('Refresh: 0.001; url=/testing/lending.php');
		
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    echo "Message Is Not Sent For Some Technical Problems, Try Later";
}

mysqli_close($conn);
	
}


?>