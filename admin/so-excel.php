<?php 
session_start();

require_once "../koneksi.php";
require_once "../vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$itemid = $_GET['itemid'];
$tanggal = $_GET['tanggal'];

$spreadsheet = new Spreadsheet();
$active_sheet = $spreadsheet->getActiveSheet();
$count = 2;

if($itemid != "" && $tanggal == ""){
  $queryitem = mysqli_query($conn, "SELECT * FROM realisasi JOIN item ON item.item_id = realisasi.so_item_id JOIN material ON material.material_id = realisasi.so_material_id JOIN divisi ON divisi.divisi_id = realisasi.so_divisi_id WHERE realisasi.so_item_id = '$itemid'");

  $active_sheet = $spreadsheet->getActiveSheet();

  $active_sheet->setCellValue('A1', 'Item Id');
  $active_sheet->setCellValue('B1', 'No SPK');
  $active_sheet->setCellValue('C1', 'Lot Number');
  $active_sheet->setCellValue('D1', 'Quantity Order');
  $active_sheet->setCellValue('E1', 'Item Nama');
  $active_sheet->setCellValue('F1', 'Material Code');
  $active_sheet->setCellValue('G1', 'Material Nama');
  $active_sheet->setCellValue('H1', 'Material Quantity');
  $active_sheet->setCellValue('I1', 'Divisi');
  $active_sheet->setCellValue('J1', 'Total Kebutuhan');
  $active_sheet->setCellValue('K1', 'Realisasi');

  while($item = mysqli_fetch_assoc($queryitem)){
    $active_sheet->setCellValue('A'.$count, $item['item_id']);
    $active_sheet->setCellValue('B'.$count, $item['so_no_spk']);
    $active_sheet->setCellValue('C'.$count, $item['so_lot_number']);
    $active_sheet->setCellValue('D'.$count, $item['so_qty_order']);
    $active_sheet->setCellValue('E'.$count, $item['item_nama']);
    $active_sheet->setCellValue('F'.$count, $item['material_id']);
    $active_sheet->setCellValue('G'.$count, $item['material_nama']);
    $active_sheet->setCellValue('H'.$count, $item['so_material_qty']);
    $active_sheet->setCellValue('I'.$count, $item['divisi_nama']);
    $active_sheet->setCellValue('J'.$count, $item['so_total_kebutuhan']);
    $active_sheet->setCellValue('K'.$count, $item['so_realisasi']);

    $count++;
  }

  $writer = new Xlsx($spreadsheet);  

  $writer->save('CV Premier Wood Manufactur.xlsx');

  header('Content-Type: application/x-www-form-urlencoded');
  header('Content-Transfer-Encoding: Binary');
  header("Content-disposition: attachment; filename=CV Premier Wood Manufactur.xlsx");

  readfile('CV Premier Wood Manufactur.xlsx');
  unlink('CV Premier Wood Manufactur.xlsx');
  exit();

}