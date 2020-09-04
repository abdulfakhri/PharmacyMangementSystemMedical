<?php  
session_start(); 
if(!isset($_SESSION['valid'])) {
	header('Location: /u/login.php');
}

include('../c/v/nav.php');
include('../c/db/connection.php');
//clude('getData.php');
?>

<script src="/c/v/jquery.min.js"></script>
<script>
function searchFilter(page_num) {
    page_num = page_num?page_num:0;
    var keywords = $('#keywords').val();
    var sortBy = $('#sortBy').val();
    
    $.ajax({
        type: 'POST',
        url: 'getData.php',
        data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy,
        beforeSend: function () {
            $('.loading-overlay').show();
        },
        success: function (html) {
            $('#posts_content').html(html);
            $('.loading-overlay').fadeOut("slow");
        }
    });
}
</script>
 <link href='' rel='stylesheet' type='text/css'>
</head>
<body>
    <center>
<h3><?php echo $_SESSION['name'];?> Inventory</h3>
<div class="">
    <input type="text-half" id="keywords" placeholder="Search The Inventory..." onkeyup="searchFilter()"/>
    <select id="sortBy" class="sel" onchange="searchFilter()">
       
        <option value="asc">Ascending(A,B...Z)</option>
        <option value="desc">Descending(Z,Y,...A)</option>
    </select>
</div>
<div class="post-wrapper">
   <!--<div class="loading-overlay"><div class="overlay-content">Loading.....</div></div>-->
    <div id="posts_content">
        
        <?php

    //Include pagination class file
    include('Pagination.php');
    
    //Include database configuration file
   // include('dbConfig.php');
    
    $start = !empty($_POST['page'])?$_POST['page']:0;
    $limit = 10;
    
    //$key=65;
    $keyV=$_SESSION['id'];
    //set conditions for search
    $whereSQL = $orderSQL = '';
    $keywords = $_POST['keywords'];
    $sortBy = $_POST['sortBy'];
    //login_id='$key'
    if(!empty($keywords)){
        $whereSQL = "WHERE  product_name LIKE '%".$keywords."%' OR company_name LIKE '%".$keywords."%' OR expiry_date LIKE '%".$keywords."%' OR bill_date LIKE '%".$keywords."%' OR quantity LIKE '%".$keywords."%' OR batch_no LIKE '%".$keywords."%' OR supplier LIKE '%".$keywords."%' OR expiry LIKE '%".$keywords."%'";
    }
    /*
    else{
        $whereSQL = "WHERE login_id=65";
    }
    */
    if(!empty($sortBy)){
        $orderSQL = " ORDER BY product_name  ".$sortBy;
    }else{
        $orderSQL = " ORDER BY product_name ASC ";
    }

    //get number of rows
    $queryNum = $db->query("SELECT COUNT(*) as postNum FROM inventory WHERE login_id='$keyV'".$orderSQL);
    $resultNum = $queryNum->fetch_assoc();
    $rowCount = $resultNum['postNum'];

    //initialize pagination class
    $pagConfig = array(
        'currentPage' => $start,
        'totalRows' => $rowCount,
        'perPage' => $limit,
        'link_func' => 'searchFilter'
    );
    $pagination =  new Pagination($pagConfig);
    
    //get rows
    $query = $db->query("SELECT * FROM inventory $whereSQL $orderSQL LIMIT $start,$limit");
    
    if($query->num_rows > 0){ ?>
     <div class="table-responsive text-nowrap">
               
          <table class="table table-striped">
			
                      <thead>
                            
                                    <tr>

                                  
                                   
                                   <th>Product</th>
                                   <th>Status</th>
                                   <th>Quantity</th>
                                   <th>Expiry</th>
                                   
                                   <th>Bill Date</th>
                                   <th>Bill Name</th>
                                  
                                   <th>Company</th>
                                   <th>MRP</th>
                                   <th>Packing</th>
                                  
                                   <th>Batch No</th>
                                  <th>Suppiler</th>
                                   <th>Changes</th>
                                   
                                  
                                 
                                 </tr>
                            
                              </thead>
        <div class="posts_list">
        <?php
            while($res = $query->fetch_assoc()){ 
                
                $postID = $res['id'];
                 
                 
                 //to mention quantity
		                      $QtyStock=$res['quantity'];
		                      
		                      if($QtyStock == 0 ){
		                      
		                      $QColor ="#ff0000";
		                      
		                      }else if($QtyStock < 0){
		                      
		                      $QColor ="#ff0000";
		                      
		                      }else{
		                      
		                      $QColor ="#0044cc";
		                      
		                      }
		                        //To Fix bill name for all
		                           $BillName =$res['bill_name'];
		                           $BillNo = $res['bill_no'];
		                           $BillDate= $res['bill_date'];
		                           $DateReg= $res['date_reg'];
		                           $Dealer = $res['supplier'];
		                           $Name= $_SESSION['name'];
		                           $BillSdate =date_create($DateReg);
                                   $BillPur = date_format($BillSdate,"Y-m-d");
		                           
		                           if($BillDate =='0000-00-00'){
		                           
		                              $BDate = $BillPur;
		                              
		                           }else if($BillDate == null){   
		                           
		                               $BDate = $BillPur;
		                           
		                           }else if($BillDate != '0000-00-00'){
		                            
		                              $BDate =  $res['bill_date'];
		                            
		                           } 
		                           if($BillName != null){
		                           
		                              $BillName = $res['bill_name']; 
		                           }
		                          else if($BillName == null){
		                        
		                              $BillName = $BillNo."_".$Dealer."_".$Name.".xls"; 
		                             
		                          }else if($BillName == null AND $Dealer == null) {
		                           
		                              $BillName = $res['bill_no'];
		                          
		                          }else{
		                              $BillName = $res['bill_name'];
		                          
		                          }
		                           
		                      
		                      
                                      
                                $Expiry =$res['expiry_date'];
		                      
		                        $BExpiry=$res['expiry'];
		                      
		                        $CDate=date("Y-m-d");
                                 
                                if($Expiry == null){

                                         $notes="Surgical Drug";
                                         $color="#ffb3b3";

                                }else if($Expiry=='0000-00-00'){
		                         
		                         $notes="Surgical Drug";
                                          $color="#ffb3b3";
		                         
		                     }else if($Expiry<=$CDate){
		                         
		                         $notes="!!!Expired";
                                           $color="#ff0000";

		                       }else if($Expiry==$CDate){
		                         
		                         $notes="!!Expiring Today";
		                          $color="#ff9999";
		                         
		                       }else if($BExpiry<=$CDate){
		                         
		                         $notes="!!Expiring Soon";
		                          $color="#ff4d94";
		                         
		                     }else if($CDate>=$BExpiry){
		                        
		                          $notes="!!Expiring Soon";
		                           $color="#ff4d94";
		                     }else if($CDate==$BExpiry){
		                        
		                          $notes="!!Expiring Soon";
		                           $color="#ff4d94";
		                        
		                     }else if($Expiry>$CDate){
		                         
		                         $notes="Not Expired";
		                          $color="#00ff00";
		                       
		                     } else{
		                         $notes ="";
                                         $color="#ffffff";
		                     }
		            $key = $res['login_id'];
                    $session=$_SESSION['id'];  
                  //$session=65; 
		         
		          if($session==$key)  {         
		                     
        ?>
            <div class="list_item">
                <!--------------------------------------------------------->
            
            
                         <tr>
                                   
                                   <td><?php echo $res["product_name"]; ?></td>
                                   <th style='color:<?php echo $color;?>'> <?php echo $notes;?></th>
                                   <td style='color:<?php echo $QColor;?>'><?php echo $res['quantity'];?></td>
                                   <td><?php echo $res['expiry_date']; ?></td>
                                   <td><?php echo $BDate;?></td>
                                   <td><?php echo $BillName;?></td>
                                   <td><?php echo $res["company_name"]; ?></td>
                                   
                                   <td><?php echo $res['price']; ?></td>
                                    <td><?php echo $res['packing']; ?></td>
                                   <td><?php echo $res['batch_no']; ?></td>
                                   <td><?php echo $res['supplier']; ?></td>
                                   
                                   <td><a href="/inventory/edit_product.php?id=<?php echo $res['id'];?>">Edit</a> | 
		                            <a href="/inventory/delete_product.php?id=<?php echo $res['id'];?>" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>
                
                
                              </tr>
               
              
             
        
         <!------------------------------------------------------>
                
                
                
            </div>
        <?php 
		          }
		  } 
        
        ?>
        </div>
        <?php echo $pagination->createLinks(); ?>
<?php } ?>
    
</div>
</body>
</html>
