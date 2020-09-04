<?php  
session_start(); 
if(!isset($_SESSION['valid'])) {
	header('Location: /u/login.php');
}
//include('../c/v/top_nav.php');
include('../c/db/connection.php');
//include('../m/inventory/getData.php');
?>

<?php
    
    //Getting value of "search" variable from "script.js".
    //include_once("connection.php");
    if (isset($_POST['search'])) {
    //Search box value assigning to $Name variable.
       $Name = $_POST['search'];
       $loginId=$_SESSION['id'];
    //Search query.
       $Query = "SELECT concat(product_name,'|',id,'|',batch_no,'|',price,'|',quantity,'|',tunit,'|','0','|','0','|') name FROM inventory WHERE product_name LIKE '%$Name%' AND login_id='$loginId'  LIMIT 10";
    //Query execution
       $ExecQuery = MySQLi_query($con, $Query);
       
   
        //echo "Error: " . $Query . "<br>" . $con->error;
     
    //Creating unordered list to display result.
       echo '
    <ul>
       ';
       //Fetching result from database.
       while ($Result = MySQLi_fetch_array($ExecQuery)) {
           ?>
       <!-- Creating unordered list items.
            Calling javascript function named as "fill" found in "script.js" file.
            By passing fetched result as parameter. -->
         
           
       <li onclick='fill("<?php echo $Result['name']; ?>")'>
       
       <a>
       <!-- Assigning searched result in "Search box" in "search.php" file. -->
           
           <?php echo $Result['name'];?>
           
          </li>
       </a>
       
       <!-- Below php code is just for closing parenthesis. Don't be confused. -->
       <?php
    }
    }
    ?>
    </ul>