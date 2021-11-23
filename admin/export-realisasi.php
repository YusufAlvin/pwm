<?php
session_start();
require_once "../koneksi.php";
require_once "mysql_table.php";

if($_SESSION['login'] != true){
	header('Location: ../');
	exit();
}

$nospk = $_GET['nospk'];
$itemid = $_GET['itemid'];
$tanggal = $_GET['tanggal'];

var_dump($nospk);
var_dump($itemid);
var_dump($tanggal);
exit();


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
		$this->Cell(0,6,'Bon Material',0,1,'C');
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

$pdf = new PDF('L','mm','A4');


// $pdf->AddPage();
// First table: output all columns
// $pdf->Table($link,'SELECT * FROM ((bom INNER JOIN so ON bom.bom_so_id = so.so_id) INNER JOIN material ON bom.bom_material_id = material.material_id)');
$queryso = mysqli_query($conn, "SELECT * FROM realisasi INNER JOIN item ON item.item_id = realisasi.so_item_id INNER JOIN material ON material.material_id = realisasi.so_material_id INNER JOIN divisi ON divisi.divisi_id = realisasi.so_divisi_id WHERE so_no_spk = '$nospk' AND so_item_id = '$itemid' AND so_tanggal = 'tanggal'");
$so = mysqli_fetch_assoc($queryso);
if(mysqli_num_rows($queryso) < 1) {
	echo "<script>alert('Tidak ada data!');location.href='export-filter.php'</script>";
	exit();
}
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->Cell(37,10,'Item Code');
$pdf->Cell(10,10,':');
$pdf->Cell(40,10,$so['item_id']);
$pdf->Ln(4.5);
$pdf->Cell(37,10,'Item Name');
$pdf->Cell(10,10,':');
$pdf->Cell(40,10,$so['item_nama']);
$pdf->Ln(4.5);
$pdf->Cell(37,10,'LotNbr / SO');
$pdf->Cell(10,10,':');
$pdf->Cell(40,10,$so['so_lot_number'] . ' / ' . $so['so_no_spk']);
$pdf->Ln(4.5);
$pdf->Cell(37,10,'Qty Order');
$pdf->Cell(10,10,':');
$pdf->Cell(40,10,$so['so_qty_order'] . ' PCS');
$pdf->Ln(4.5);
$pdf->Cell(37,10,'Divisi');
$pdf->Cell(10,10,':');
$pdf->Cell(40,10,$so['divisi_nama']);
$pdf->Ln(15);
// Second table: specify 3 columns
$pdf->AddCol('material_id',50,'Code','L');
$pdf->AddCol('material_nama',100,'Item','L');
$pdf->AddCol('so_material_qty',30,'Quantity','C');
$pdf->AddCol('material_uom',20,'UoM','C');
$pdf->AddCol('so_total_kebutuhan',35,'Total Kebutuhan','C');
$pdf->AddCol('so_realisasi',20,'Realisasi','C');
$pdf->AddCol('so_realisasi',20,'Realisasi','C');
// $prop = array('HeaderColor'=>array(255,150,100),
// 			'color1'=>array(210,245,255),
// 			'color2'=>array(255,255,210),
// 			'padding'=>10);
$pdf->Table($conn,"SELECT * FROM so INNER JOIN item ON item.item_id = so.so_item_id INNER JOIN material ON material.material_id = so.so_material_id INNER JOIN divisi ON divisi.divisi_id = so.so_divisi_id WHERE so_no_spk = '$soprojects' AND so_divisi_id = $divisi");
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