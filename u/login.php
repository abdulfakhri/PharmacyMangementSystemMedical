<?php
session_start();
error_reporting(0);
include('../c/u/header.php');
include('../c/db/connection.php');


if(isset($_POST['login'])){
$username=$_POST['username']; // Get username
$password=$_POST['password']; // get password
//query for match  the user inputs
$sql2="SELECT * FROM login WHERE username='$username' AND password='$password'";
$ret=mysqli_query($mysqli,$sql2);
$num=mysqli_fetch_array($ret);
// if user inputs match if condition will runn
if($num>0){
           //echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
            $validuser = $num['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $num['name'];
			$_SESSION['package']= $num['package'];
			$_SESSION['username'] = $num['username'];
            $_SESSION['id']=$num['id']; // hold the user id in session
           
 	             
			header('URL=/home/home.php'); 


$uip=$_SERVER['REMOTE_ADDR']; // get the user ip
$action="Login";
// query for inser user log in to data base
mysqli_query($mysqli,"insert into userlog(userId,username,action,userIp) values('".$_SESSION['id']."','".$_SESSION['valid']."','$action','$uip')");
// code redirect the page after login
$extra="home.php";
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host/home/$extra");
exit();
}
// If the userinput no matched with database else condition will run
else{
echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
$_SESSION['msg']="Invalid username or password";
$extra="login.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
 }
}

/*
if(isset($_POST['signup'])) {


        $name = $_POST['name'];
	$username = $_POST['username'];
	$pass = $_POST['password'];
	

	
          $sql="INSERT INTO login(name,username,password) VALUES('$name','$username','$pass')";
			
		
		
	if (mysqli_query($mysqli, $sql)) {
    // echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
                
		 echo "Registered, Thanks";
		 
        header('Refresh: 0.01; url=/v/home.php');
	
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    echo "Not Registered, Try Again Now";
    header('Refresh: 0.01; url=/spages/signup.php');
}

mysqli_close($mysqli);
	
}
*/
       
?>

<body>    
<div class="container">
     <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Sign In</a></li>
    <li><a data-toggle="tab" href="#menu1">Signup</a></li>
   
  </ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      
      <form name="login" method="post" >
  <header><h3>Login In </h3></header>
  <p style="color:red;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
  <label>Username <span>*</span></label>
  <input name="username" type="text" value="" placeholder="Username..." required /><br>
  <input name="password" type="text" value="" placeholder="Password..." required />
  <button type="submit" name="login">Login</button>
</form>
    </div>
    <div id="menu1" class="tab-pane fade">
       <form action=""  name="signup" method="post" >
      <header><h4>Sign Up </h4></header>
      <?PHP echo $reg; ?>
     <label>Store Name</label>
     <input type="text" placeholder="Your Store Name" name="name" required />
      <label>Username <span>*</span></label>
      <input name="username" type="text" value="" placeholder="Email/Mobile#..." required />
      
      <label>Password</label>
      <input type="password" placeholder="Password" name="password" required>
      
    <button type="submit" name="signup">Signup </button>
   </form>
    </div>
   
  </div>
</div>

    
    
    
    
    
  </body>
</html>