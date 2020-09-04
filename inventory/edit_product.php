<?php 
session_start(); 
if(!isset($_SESSION['valid'])) {
	header('Location: /spages/login.php');
}
include('../c/v/nav.php');
include('../c/db/connection.php');

if(isset($_POST['update'])){	
    
	$id = $_POST['id'];
	
	$name = $_POST['product_name'];
	
	$qty = $_POST['quantity'];
	
	$price = $_POST['price'];
	
	$Packing=$_POST['packing'];
	
	$Company_Name=$_POST['company_name'];
	
	$Packing=$_POST['packing'];
	
	$Batch_No=$_POST['batch_no'];
	
	$Expiry_date=$_POST['expiry_date'];	
	
	$Expiry=$_POST['expiry'];	
	
	// checking empty fields
	if(empty($name) || empty($qty) || empty($price)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($qty)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE inventory SET product_name='$name', quantity='$qty', 
		price='$price',packing='$Packing',company_name='$Company_Name',batch_no='$Batch_No',expiry_date='$Expiry_date',expiry='$Expiry' WHERE id=$id  AND login_id=".$_SESSION['id']."");
		
		//redirectig to the display page. In our case, it is view.php
		//header('URL=/inventory/inventory.php'); 
		
		echo "Product Updated!!";
		
		
	}
}

?>


<?php

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM inventory WHERE id='$id' AND login_id=".$_SESSION['id']."");

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

     
       
    
<body>
    
    
     
       <!--Navbar(sit on top)-->
        
       <div class="menu">
           
         <?php include 'nav.php';?>
         
    </div>
       
	
	<br></br><br>
	
	<!-- Main Content -->
    <center><h2>Edit Products</h2></center>
    <div class="container">
    
    
         <form action=""  id="form1" name="form1" method="POST">
            
             <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
             
    
             <div class="row">
    
                <div class="col-25">
        
    
                           <label for="zip">Price:</label>
                           <input type="text" name="price" value="<?php echo $price;?>">
                           <label for="zip">Batch No:</label>
                           <input type="text" name="batch_no" value="<?php echo $Batch_No;?>">
                           
                           <label for="zip">Expiry Date:</label>
                           <input type="text" name="expiry_date" value="<?php echo $Expiry_date;?>">
                            <label for="zip">Expiry Alert Date:</label>
                           <input type="text" name="expiry" value="<?php echo $Expiry;?>">
                </div>
                <div class="col-25">
                    
                          <label for="state">Product Name:</label> 
                           <input type="text" name="product_name" value="<?php echo $name;?>">
                           <label for="zip"> Quantity:</label> 
                           <input type="text" name="quantity" value="<?php echo $qty;?>">
                           <label for="zip">Company:</label> 
                           <input type="text" name="company_name" value="<?php echo $Company_Name;?>">
                           <label for="zip">Packing:</label>
                           <input type="text" name="packing" value="<?php echo $Packing;?>">
                    
                    
                    
                          
    
               </div>

             </div>
            
    
             <div class="row">
               <div class="col-50">
                 <button type="submit" form="form1" name="update" class="btn btn-default" value="update">Update Product Details</button>
               
               
              </div>
            </div>


         </form>
    
 
<?php 
include('../c/v/footer.php');
?>