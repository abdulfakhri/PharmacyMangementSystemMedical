<?php 
session_start(); 
if(!isset($_SESSION['valid'])) {
	header('Location: /spages/login.php');
}
include('../c/v/nav.php');
include('homeAPI.php');
?>
<style>
body {
  font-family: Arial;
  color: white;
}

.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

.left {
  left: 0;
  background-color: #ffe6e6;
}

.right {
  right: 0;
  background-color: #ffcccc;
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.centered img {
  width: 150px;
  border-radius: 50%;
}
</style>
   

<center>  
<div class="container">
<div class="split left">
  <div class="centered">
   
  
  </div>
</div>

<div class="split right">
  <div class="centered">
 
  </div>
</div>  
</div>         

</center>


<?php 
include('../c/v/footer.php');
?>
    
 