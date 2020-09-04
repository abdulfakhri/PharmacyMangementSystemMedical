<?php session_start(); ?>
<?php 
include('../c/u/header.php');
include('../c/db/connection.php');
?>
    

<?php

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
       
?>


<body>    
  
    
    <form action=""  name="signup" method="post" >
      <header><h3>Sign Up </h3></header>
      <?PHP echo $reg; ?>
     <label>Store Name</label>
     <input type="text" placeholder="Your Store Name" name="name" required />
      <label>Username <span>*</span></label>
      <input name="username" type="text" value="" placeholder="Email/Mobile#..." required />
      
      <label>Password</label>
      <input type="password" placeholder="Password" name="password" required>
      
    <button type="submit" name="signup">Signup </button>
   </form>
    
    

  </body>
</html>