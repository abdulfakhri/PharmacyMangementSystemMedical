<?php session_start(); ?>
<?php

 if($_SERVER['REQUEST_METHOD']=='POST'){

 include 'connection.php';

 $conn = mysqli_connect($databaseHost,$databaseUsername,$databasePassword,$databaseName);
 
 $username = $_POST['username'];
 
 
 $result = "select * from customers where mobile_no='$username'";
 
// $row = mysqli_fetch_assoc($result);
 
 $row = mysqli_fetch_array(mysqli_query($conn,$result));
 
 
 if(isset($row)){
                        $validcustomer = $row['mobile_no'];
			$_SESSION['validC'] = $validcustomer;
			$_SESSION['name'] = $row['customer_name'];
			$_SESSION['cusAdd'] = $row['home_address'];
			$_SESSION['id'] = $row['id'];
 
           
 	        echo"<br></br><br></br><br></br>";
		    echo"<center>Welcome!</center>";
			header('Refresh:0.0; URL=/store/order_bill.php');
 }
 else{
 echo "<center>Invalid Username or Password Please Try Again</center>";
       header('Refresh:0.99; URL=/store/login.php');
 }
 
 }else{
 echo "Check Again";
 }
mysqli_close($conn);

?>