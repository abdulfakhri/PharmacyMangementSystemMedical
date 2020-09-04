
<?php
if(!isset($_SESSION['valid'])) {
	header('Location: /u/login.php');
}
?>


<?php
$databaseHost = 'localhost';
$databaseName = 'ironxpxj_health';
$databaseUsername = 'ironxpxj_admin';
$databasePassword = '!@#123qweasdzxc';


$connect = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

////////////////////////////////////////////////////////////////////////////////////////////
$output = '';
if(isset($_POST["import"])){

 $extension = end(explode(".", $_FILES["excel"]["name"])); // For getting Extension of selected file
 $allowed_extension = array("xls", "xlsx", "csv"); //allowed extension
 if(in_array($extension, $allowed_extension)) {
 //check selected file extension is present in allowed extension array

  $file = $_FILES["excel"]["tmp_name"]; // getting temporary source of excel file
  $file2=  $_FILES["name"];
  include("PHPExcel/IOFactory.php"); // Add PHPExcel Library in this code
  $objPHPExcel = PHPExcel_IOFactory::load($file); // create object of PHPExcel library by using load() method and in load method define path of selected file

  $output .= "<label class='text-success'><center><h2>Products Are Registered Successfully  in Inventory</h2></center></label><br /><table class='table table-bordered'>";

  foreach ($objPHPExcel->getWorksheetIterator() as $worksheet){
   $highestRow = $worksheet->getHighestRow();
   for($row=2; $row<=$highestRow; $row++){
    $output .= "<tr>";
    $sup = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0,$row)->getValue());
    $bill_no = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1,$row)->getValue());
    
    $Company_Name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3,$row)->getValue());
    $code = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4,$row)->getValue());
    $barcode = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5,$row)->getValue());
    $Product_Name = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
    $Packing = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
    $Batch_No = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
    $Expiry_date = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
    $Quantity = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
    $f_qty = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(11,$row)->getValue());
    $halfp = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(12,$row)->getValue());
    $frate = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(13,$row)->getValue());
    $srate = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(14,$row)->getValue());
    $Price = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(15, $row)->getValue());
    $dis = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(16,$row)->getValue());
    $excise = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(17,$row)->getValue());
    $vat = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(18,$row)->getValue());
    $adnlvat = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(19,$row)->getValue());
    $amount = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(20,$row)->getValue());
    $localcent = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(21,$row)->getValue());
    $scm1 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(22,$row)->getValue());
    $scm2 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(23,$row)->getValue());
    $scmper = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(24,$row)->getValue());
    $hsncode = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(25,$row)->getValue());
    $cgst = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(26,$row)->getValue());
    $sgst = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(27,$row)->getValue());
    $igst = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(28,$row)->getValue());
    $supplier = $_POST['dealer'];
    
    $loginId = $_SESSION['id'];

    $Expiry_date;
    
    $Bd = $_POST['billD'];
   
   
    
     
     
     
 

    if($Expiry_date != null){
    $EA = $_POST['ExpiryDateAlertMonth'];
     list($ExMonth, $ExpiryY) = explode ("/", $Expiry_date, 2);
     $ExMonth;
     $ExpiryY;
     $Day= '01';
     $ExpiryCYear = $ExpiryY+2000;
     $ExpiryCYear;
     $Expiry_Sorted_Date = $ExpiryCYear."-".$ExMonth."-".$Day;
     $Expiry_Sorted_Date;
     $EA;
     $Sdate=date_create($Expiry_Sorted_Date);
     date_sub($Sdate,date_interval_create_from_date_string($EA));
     $Expiry = date_format($Sdate,"Y-m-d");
     $Expiry;


   }

    $Expiry_Sorted_Date;
    $Expiry;
    
    $CDate=date("Y-m-d");

   if($Expiry_Sorted_Date=='0000-00-00'){
	$notes="Surgical Drug";
     }else if( $Expiry_Sorted_Date<=$CDate){
	$notes="!!!Expired";
     }else if( $Expiry_Sorted_Date==$CDate){
	$notes="!!Expiring Today";
     }else if( $Expiry_Sorted_Date<=$CDate){
	$notes="!!Expiring Soon";
      }else if($CDate>=  $Expiry_Sorted_Date){
	$notes="!!Expiring Soon";
     }else if($CDate==   $Expiry_Sorted_Date ){
	$notes="!!Expiring Soon";
     }else if(  $Expiry_Sorted_Date >$CDate){
	$notes="* Not Expired";
    } else{
	 $notes ="";
    }                                  



     $query = "INSERT INTO inventory(
     bill_name,supplier,bill_no,bill_date,company_name,code,barcode,product_name,packing,batch_no,expiry_date,
     quantity,f_qty,halfp,frate,srate,price,dis,excise,vat,adnlvat,amount,localcent,scm1,scm2,scmper,hsncode,cgst,sgst,igst,expiry,login_id) 
    VALUES('".$file2."','".$supplier."','".$bill_no."','".$Bd."','".$Company_Name."','".$code."','".$barcode."','".$Product_Name."','".$Packing."','".$Batch_No."',
    '".$Expiry_Sorted_Date."','".$Quantity."','".$f_qty."','".$halfp."','".$frate."','".$srate."','".$Price."','".$dis."','".$excise."','".$vat."','".$adnlvat."','".$amount."','".$localcent."' ,'".$scm1."','".$scm2."',
    '".$scmper."','".$hsncode."','".$cgst."','".$sgst."','".$igst."', '".$Expiry."','$loginId')"; 
    
    mysqli_query($connect, $query); 
    if (!mysqli_query($connect, $query)){
    echo "Error: " . $query . "<br>" . $connect->error;
    }
     $output .= '<td>'.$sup.'</td>';
    
    $output .= '<td>'.$file2.'</td>';
    $output .= '<td>'.$Product_Name.'</td>';
    $output .= '<td>'.$Bd.'</td>';
    $output .= '<td>'.$Quantity.'</td>';
    $output .= '<td>'.$Price.'</td>';
    $output .= '<td>'.$Packing.'</td>';
    $output .= '<td>'.$Company_Name.'</td>';
    $output .= '<td>'.$Batch_No.'</td>';
    $output .= '<td>'.$Expiry_Sorted_Date.'</td>';
    $output .= '<td>'.$Expiry.'</td>';
     $output .= '<td>'.$notes.'</td>';
  
  
    
    $output .= '</tr>';
   }
  } 
  $output .= '</table>';

 }
 else
 {
  $output = '<label class="text-danger">Not Registered, There Is Problem in Purchase Bill</label>'; //if non excel file then
 }
}
?>