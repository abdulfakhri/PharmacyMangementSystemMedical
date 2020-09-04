<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: /spages/login.php');
}
?>

<?php
$Date=date("Y-m-d");
$loginId = $_SESSION['id'];
include('database.php');
$database = new Database();
$result = $database->runQuery("SELECT product_name,quantity,amount AND price FROM sales WHERE login_id='$loginId' AND date_reg LIKE '$Date%'");
$header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
FROM `INFORMATION_SCHEMA`.`COLUMNS` 
WHERE `TABLE_SCHEMA`='crud' 
AND `TABLE_NAME`='sales'
and `COLUMN_NAME` in ('product_name','quantity','amount','price')");
require('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',7);
foreach($header as $heading) {
	foreach($heading as $column_heading)
		$pdf->Cell(31,8,$column_heading,1);
}
foreach($result as $row) {
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(38,8,$column,1);
}
$pdf->Output();
?>