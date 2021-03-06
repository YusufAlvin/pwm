<?php
session_start();
require('mysql_table.php');
if($_SESSION['login'] != true){
	header('Location: ../');
	exit();
}

$soprojects = $_GET['projects'];
$divisi = $_GET['divisi'];

if($divisi == "" || $soprojects == ""){
	echo "<script>alert('Harap pilih Projects dan Divisi');location.href='export-filter.php'</script>";
	exit();
}


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
	// function Footer()
	// {
	// 	$this->SetFont('Arial','B',12);
	// 	$this->Cell(0,10,'APPROVAL SHEET',0,0,'C');
	// 	$this->Ln(30);
	// 	$this->Cell(55,10,'(......................................)',0,0,'C');
	// 	$this->Cell(55,10,'(......................................)',0,0,'C');
	// 	$this->Cell(55,10,'(......................................)',0,0,'C');
	// 	$this->Cell(55,10,'(......................................)',0,0,'C');
	// 	$this->Cell(55,10,'(......................................)',0,0,'C');
	// 	$this->Ln();
	// 	$this->Cell(55,10,'PREPARED',0,0,'C');
	// 	$this->Cell(55,10,'KABAG PRODUKSI',0,0,'C');
	// 	$this->Cell(55,10,'PIC.PRODUKSI',0,0,'C');
	// 	$this->Cell(55,10,'MWH',0,0,'C');
	// 	$this->Cell(55,10,'PPIC',0,0,'C');
	// }
}

// Connect to database
$link = mysqli_connect('localhost','root','','database');

$pdf = new PDF('L','mm','A4');
// $pdf->AddPage();
// First table: output all columns
// $pdf->Table($link,'SELECT * FROM ((bom INNER JOIN so ON bom.bom_so_id = so.so_id) INNER JOIN material ON bom.bom_material_id = material.material_id)');
$querybom = mysqli_query($link, "SELECT * FROM ((((bom INNER JOIN so ON bom.bom_so_id = so.so_id) INNER JOIN material ON bom.bom_material_id = material.material_id) INNER JOIN item ON so.so_item_code = item.item_id) INNER JOIN divisi ON bom.bom_divisi_id = divisi.divisi_id) WHERE so.so_projects = '$soprojects' && bom.bom_divisi_id = $divisi");
$bom = mysqli_fetch_assoc($querybom);
if(mysqli_num_rows($querybom) < 1) {
	echo "<script>alert('Tidak ada data!');location.href='export-filter.php'</script>";
	exit();
}
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
$pdf->Ln();
$pdf->Cell(37,10,'Divisi');
$pdf->Cell(10,10,':');
$pdf->Cell(40,10,$bom['divisi_nama']);
$pdf->Ln(15);
// Second table: specify 3 columns
$pdf->AddCol('material_id',65,'Item Code','C');
$pdf->AddCol('material_nama',100,'Item','C');
$pdf->AddCol('bom_quantity',30,'Quantity','C');
$pdf->AddCol('material_uom',30,'UoM','C');
$pdf->AddCol('bom_total_kebutuhan',50,'Total Kebutuhan','C');
// $prop = array('HeaderColor'=>array(255,150,100),
// 			'color1'=>array(210,245,255),
// 			'color2'=>array(255,255,210),
// 			'padding'=>10);
$pdf->Table($link,"SELECT * FROM ((((bom INNER JOIN so ON bom.bom_so_id = so.so_id) INNER JOIN material ON bom.bom_material_id = material.material_id) INNER JOIN item ON so.so_item_code = item.item_id) INNER JOIN divisi ON bom.bom_divisi_id = divisi.divisi_id) WHERE so.so_projects = '$soprojects' && bom.bom_divisi_id = $divisi");
$pdf->Ln(20);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'APPROVAL SHEET',0,0,'C');
$pdf->Ln(30);
$pdf->Cell(55,10,'(......................................)',0,0,'C');
$pdf->Cell(55,10,'(......................................)',0,0,'C');
$pdf->Cell(55,10,'(......................................)',0,0,'C');
$pdf->Cell(55,10,'(......................................)',0,0,'C');
$pdf->Cell(55,10,'(......................................)',0,0,'C');
$pdf->Ln();
$pdf->Cell(55,10,'PREPARED',0,0,'C');
$pdf->Cell(55,10,'KABAG PRODUKSI',0,0,'C');
$pdf->Cell(55,10,'PIC.PRODUKSI',0,0,'C');
$pdf->Cell(55,10,'MWH',0,0,'C');
$pdf->Cell(55,10,'PPIC',0,0,'C');
$pdf->Output();

?>
