<?php session_start(); ?>

      <div class="menu">
           
         <?php include 'header.php';?>
         
       </div>
       
<body>

	 

<br></br>
<br></br>
<br></br>
<br></br>
<br></br>

<!-- Header -->
<header class="w3-display-container w3-content" style="max-width:1500px;">
<!--  <img class="w3-image" src="/w3images/hotel.jpg" alt="The Hotel" style="min-width:1000px" width="800" height="200">-->
  <div class="w3-display-left w3-padding w3-col l6 m8">
    <div class="w3-container w3-black">
      <h2>Sign In</h2>
    </div>
    <div class="w3-container w3-white w3-padding-16">
     
    
        
      <form action="loginWebAPI.php" name="form1"   method="POST" >
        <div class="w3-row-padding" style="margin:0 -16px;">
          <div class="w3-half w3-margin-bottom">
            <label>Mobile Number </label>
            <input class="w3-input w3-border" type="text" placeholder="Mobile Number" name="username" required  />
          </div>
         
        </div>
          <div class="w3-half">
          </div>
        
        <button class="w3-button w3-black" type="submit" name="login">Sign In</button> <br>
        <p>
		 If Your Not A Permanent Member Yet? Register Yourself<br><a href="signup.php">Sign up</a>
	    </p>
      </form>
    </div>
  </div>
</header>
<br></br><br></br><br></br>