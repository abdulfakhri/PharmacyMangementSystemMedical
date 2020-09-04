<?php  
session_start(); 
if(!isset($_SESSION['valid'])) {
	header('Location: /u/login.php');
}
include('../c/v/nav_top.php');
include('../c/db/connection.php');

?>

<?PHP 


if($con->connect_error){
    die("Connection failed:" . $con->connect_error);
}

if(isset($_POST['sold'])){


         $name = $_POST['search'];
         
         $unit=$_POST['unit'];

         list($product,$pid,$batch,$price,$qty,$qunit,$Dc,$count,$RQty)= explode("|",$name,9);
         $loginId=$_SESSION['id'];
         
         $product;
         $pid;
         $batch;
         $price;
         $qty;
         $qunit;
         $Dc;
         $count;
         $RQty;
         
        
         
         if($count != 0){
         
         $count;
         $qty2= $qty* $count;// qty in units
         $qty3 = $qty2+$qunit;
         $NewQty = ($qty3-$RQty);
         $NewQty;
         $count;
         $NewQty2 = intdiv($NewQty,$count);
         $tunit= ($NewQty%$count);
         $tqty = $NewQty/$count;
         $sprice = round(($RQty * $price)/($count));
         $SubTotal = $sprice;
         $Discount = ($SubTotal* $Dc)/100;
	 $Total = $SubTotal-$Discount;
	 
         }else{
         
         
         
         $RQty;
         $price;
         $NewQty2=$qty-$RQty; 
         $SubTotal= $price*$RQty;
         $tunit='0';
         $count='0';
	 $Discount = ($SubTotal* $Dc)/100;
	 $Total = $SubTotal-$Discount;
	 
         }
         $token= $_POST['token'];
	
         if($token==null){
	   echo  "<center><lable>First,Start a New Sale!!</lable><center>";
	 }else if($qty == 0){
          echo  "Not Recorded,This Product Is Finished In Our Stock";
  	}else if($RQty == null){
  	   echo  "Not Recorded,Please Enter The Requested Quantity";
  	}else if($RQty == 0 ){   
  	   echo  "Not Recorded,Product Qunatity Entered Zero";
  	//}else if($qty < $RQty){
  	// echo  "Not Recorded,Please Enter The Requested Qunatity of The Product,Not Bigger Than Stock";
  	// header('Refresh:0.0001; URL=/mpages/home.php');
  	}else{
  	
  	
	$r ="INSERT INTO sales(srate,pid,product_name,quantity,batch_no,discount,price,token,total,subtotal,tunit,tqty,login_id) 
	SELECT srate,'$pid','$product','$RQty','$batch','$Dc','$sprice',$token,'$Total','$SubTotal','$count','$NewQty2','$loginId' FROM inventory WHERE id='$pid' AND login_id='$loginId';";

         $r .="UPDATE inventory SET quantity='$NewQty2',qcount='$count',tunit='$tunit',tquantity='$qty3' WHERE id='$pid' AND login_id=".$_SESSION['id']."";

       mysqli_multi_query($con, $r); 
	
	  echo "Problem".$r."<br>".$con->error;
}
}
?>
 <?php
                           //including the database connection file
                               //include_once("connection.php");
                                if (mysqli_connect_errno())
                                    {
                                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                        }
                                        $Date= date("Y-m-d");
                                        $token=$_GET['token'];
                                         //fetching data in descending order (lastest entry first)
                                         $retu = mysqli_query($mysqli, " SELECT SUM(total) FROM sales WHERE login_id=".$_SESSION['id']." AND date_reg LIKE '".$Date."%'");
		                  while($rus = mysqli_fetch_array($retu)) {
		                  $tot=$rus['SUM(total)'];
		                  
		                  }
?>

 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  
  <script type="text/javascript" src=""></script>

    <center><h2><b>Total Sales of Today:</b><?PHP echo (round($tot, 0))." Rs";?></h2> </center>     
 
       <?PHP
       $token=mt_rand();
       echo "<a href=\"/sales/sales.php?token=$token\"><center><h3>Start New Sale</h3></center></a>";	

       ?>
       
      
       <center>
     <form  action=""  method="POST">    
      
       <input type="hidden" name="token" value=<?php echo $_GET['token'];?>>
     
      
        
       <h4> Product|Batch|Id|Price|Stock Qty|Stock Unit|Discount|No Tablet|*Enter Requested Qty</h4>
       
        <input type="text" name="search" id="search" placeholder="Type 2 letters of Product Name" oninput="initialize()"   required>
        
        
        
        
         
     <button type="submit" id="submit_btn" class="btn" name="sold">Sold</button>
      	
       
        
      	<div id="display"></div> <br>
      	<div id="txtHint"></div> 
      </div>
         
  </form>
  
   <?PHP
       $token=mt_rand();
       echo "<a href=\"/sales/sales.php?token=$token\"><center><h3>Close This Sale</h3></center></a>";	

       ?>
       
     </center>
   
      </div>
   
    <center>
    
    <div class="table-responsive text-nowrap">
		  
		 <table class="table table-striped">
                             <thead>
                           
                          
                            
                            
                             <?php
                           //including the database connection file
                               
                                if (mysqli_connect_errno())
                                    {
                                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                        }
                                        $Date=date("Y-m-d");
                                        $token=$_GET['token'];
                                        
                                        if($token != null){
                                        
                                         //fetching data in descending order (lastest entry first)
                                         $ret = mysqli_query($mysqli, " SELECT SUM(total) FROM sales WHERE login_id=".$_SESSION['id']." AND token='$token' ORDER BY date_reg ASC");
                                  }    
                                  echo 
                                   " <h2> Total of This Sale:<h2>"; 
		                  while($rs = mysqli_fetch_array($ret)) {
		                  
		                  $tot=$rs['SUM(total)'];
		                  echo (round($tot, 0))." Rs";      
		                  }
                          ?>
                           </p>
                                      <tr>
                                    
                                   <th>Product</th>
                               
                                   <th>MRP</th>
                               
                                   <th>Quantity</th>
                                  
                                   <th>Subtotal</th>
                                      </tr>
                              </thead>
                        
                           <tbody>
                               
                           <?php
                           //including the database connection file
                               include_once("connection.php");
                                if (mysqli_connect_errno())
                                    {
                                      echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                        }
                                        $Date=date("Y-m-d");
                                        $token=$_GET['token'];
                                      if($token != null){
                                      
                                      //fetching data in descending order (lastest entry first)
                                         $re = mysqli_query($mysqli, "SELECT * FROM  sales  WHERE login_id=".$_SESSION['id']." AND token='$token' ORDER BY date_reg ASC");
                                      
                                      }
                                      
		                  while($rsu = mysqli_fetch_array($re)) {
		                    
		                  echo "<tr>";
		                  echo "<td>".$rsu['product_name']."</td>";
		                  echo "<td>".$rsu['price']."</td>";
		                  echo "<td>".$rsu['quantity']."</td>";
		                  echo "<td>".$rsu['total']." Rs</td>";
					echo "</tr>";
		                 
		                  }
                          ?>
                        </tbody>
                        
	
            </table>   
        
          </div>
          
<!-- Add JQuery -->
<script>
    //Getting value from "ajax.php".
    function fill(Value) {
       //Assigning value to "search" div in "search.php" file.
       
       $('#search').val(Value);
       
       //Hiding "display" div in "search.php" file.
       
       $('#display').hide();
    }
    $(document).ready(function() {
    
       //On pressing a key on "Search box" in "search.php" file. This function will be called.
       
       $("#search").keyup(function() {
       
           //Assigning search box value to javascript variable named as "name".
           
           var name = $('#search').val();
           
           //Validating, if "name" is empty.
           
           if (name == "") {
           
               //Assigning empty value to "display" div in "search.php" file.
               $("#display").html("");
               
           }
           
           //If name is not empty.
           else {
               //AJAX is called.
               $.ajax({
                   //AJAX type is "Post".
                   type: "POST",
                   //Data will be sent to "ajax.php".
                   url: "salesAPI.php",
                   //Data, that will be sent to "ajax.php".
                   data: {
                       //Assigning value of "name" into "search" variable.
                       search: name
                   },
                   //If result found, this funtion will be called.
                   success: function(html) {
                       //Assigning result to "display" div in "search.php" file.
                       $("#display").html(html).show();
                   }
               });
           }
       });
    });
</script>
<script>
function initialize(str){
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","cart.php?q="+str,true);
  xmlhttp.send();
}
</script>

<?php include 'footer.php';?>