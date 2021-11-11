<?php
session_start();
require('mysql_table.php');
if($_SESSION['login'] != true){
	header('Location: ../');
	exit();
}

$soprojects = $_GET['projects'];

class PDF extends PDF_MySQL_Table
{
function Header()
{
	// Title
	$this->SetFont('Arial','B',16);
	$this->Cell(0,6,'CV SINAR BAJA ELECTRIC CO.LTD',0,1,'C');
	$this->SetFont('Arial','',12);
	$this->Cell(0,6,'Jl. Raya Pilang KM.8, Wonoayu, Sidoarjo 61261, Indonesia',0,1,'C');
	$this->Ln();
	$this->SetFont('Arial','',16);
	$this->Cell(0,6,'Bill of Material',0,1,'C');
	$this->Ln();
	// Ensure table header is printed
	parent::Header();
}
}

// Connect to database
$link = mysqli_connect('localhost','root','','database');

$pdf = new PDF('L','mm','A4');
// $pdf->AddPage();
// First table: output all columns
// $pdf->Table($link,'SELECT * FROM ((bom INNER JOIN so ON bom.bom_so_id = so.so_id) INNER JOIN material ON bom.bom_material_id = material.material_id)');
$bom = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM (((bom INNER JOIN so ON bom.bom_so_id = so.so_id) INNER JOIN material ON bom.bom_material_id = material.material_id) INNER JOIN item ON so.so_item_code = item.item_id) WHERE so.so_projects = '$soprojects'"));
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->Cell(37,10,'Item Code');
$pdf->Cell(10,10,':');
$pdf->Cell(40,10,$bom['item_id']);
$pdf->Ln();
$pdf->Cell(37,10,'Item Name');
$pdf->Cell(10,10,':');
$pdf->Cell(40,10,$bom['item_nama']);
$pdf->Ln();
$pdf->Cell(37,10,'LotNbr / SO');
$pdf->Cell(10,10,':');
$pdf->Cell(40,10,$bom['so_lot_number'] . ' / ' .$bom['so_projects']);
$pdf->Ln();
$pdf->Cell(37,10,'Qty Order');
$pdf->Cell(10,10,':');
$pdf->Cell(40,10,$bom['so_quantity'] . ' PCS');
$pdf->Ln(15);
// Second table: specify 3 columns
$pdf->AddCol('material_id',65,'Item Code','C');
$pdf->AddCol('material_nama',100,'Item','C');
$pdf->AddCol('bom_quantity',30,'Quantity','C');
$pdf->AddCol('bom_uom',30,'UoM','C');
$pdf->AddCol('bom_total_kebutuhan',50,'Total Kebutuhan','C');
// $prop = array('HeaderColor'=>array(255,150,100),
// 			'color1'=>array(210,245,255),
// 			'color2'=>array(255,255,210),
// 			'padding'=>10);
$pdf->Table($link,"SELECT * FROM (((bom INNER JOIN so ON bom.bom_so_id = so.so_id) INNER JOIN material ON bom.bom_material_id = material.material_id) INNER JOIN item ON so.so_item_code = item.item_id) WHERE so.so_projects = '$soprojects'");
$pdf->Output();
?>
