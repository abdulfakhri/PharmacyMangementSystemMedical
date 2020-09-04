<?php 
session_start(); 
if(!isset($_SESSION['valid'])) {
	header('Location: /u/login.php');
}
include('../c/v/nav.php');
include_once('../c/db/connection.php');
$connect=$mysqli;
include_once('autoentryAPI.php');
?>



  <center>
  <div class="container">
   <h3 align="center">Automatically Register All the Products in 1 Second</h3><br />
   <form method="post" enctype="multipart/form-data">
    <label>Select Purchase Bill Excel Format</label>
    <input type="file" name="excel" required/>
    
   <br>
   <label>Select Date For Products Expiry Alert</label>
   <input type="text"  name="ExpiryDateAlertMonth" placeholder="like 1 day, 1 month, 3 months, 1 year etc..." required/>
    <br />
 <label>Dealer Name</label>
   <input type="text"  name="dealer" placeholder="Dealer Name..." required />
   <label>Bill Date</label>
   <input type="text"  name="billD"   placeholder="Please input Bill Date Manually" required />
    <br />
    <input type="submit" name="import" class="btn btn-info" value="Register" required />
   </form>
   <br />
   <br />
   <?php
   echo $output;
   ?>
  </div>
  </center>
<?php 
include('../c/v/footer.php');
?>