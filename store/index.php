<?php
//including the database connection file
include_once('connection.php');

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$store=65;
//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM  login WHERE id='$store'");


?>
<?php
if(isset($_POST['submit'])){

//including the database connection file
include_once("connection.php");

$Key=$_POST['search_key'];
$_SESSION['location'] =$_POST['location'];
//fetching data in descending order (lastest entry first)
$resul = mysqli_query($mysqli, "SELECT * FROM login WHERE name LIKE '%".$Key."%' OR location LIKE '%".$Key."%' OR discount LIKE '%".$Key."%' OR rating LIKE '%".$Key."%' OR timing LIKE '%".$Key."%' OR store_status LIKE '%".$Key."%' OR delivery LIKE '%".$Key."%' ORDER BY name ASC");
}
?>
   
<!--Navbar(sit on top)-->
        
<div class="menu">
            
    <?php include 'nav.php';?>
         
</div>
 <style> 
        .vertical { 
            border-left: 6px solid black; 
            height: 100%; 
            position:absolute; 
            left: 50%; 
        } 
    </style>
<body>
       

<center>
         <div class="title">
           <h2>  <?php
		                  while($res = mysqli_fetch_array($result)) {
		                      
                               
		                  echo $res['name'];
		                 
		                 
		                  }
                          ?>
            </h2>
         
         </div>
         <h4> Buy/Order Best Discount and Gov Verified Medical Products Near You </h4>
         
               <h1>Send The Prescription </h1>    
        
        <h1>Order Online</h1>

        
        
      