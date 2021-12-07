<?php 
session_start();
require_once "../koneksi.php";
if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$divisiid = $_GET['divisiid'];

$querybom = mysqli_query($conn, "SELECT * FROM bom WHERE bom_divisi_id = $divisiid");
$queryso = mysqli_query($conn, "SELECT * FROM so WHERE so_divisi_id = $divisiid");
$queryrealisasi = mysqli_query($conn, "SELECT * FROM realisasi WHERE so_divisi_id = $divisiid");

if(mysqli_num_rows($querybom) > 0 && mysqli_num_rows($queryso) > 0 mysqli_num_rows($queryrealisasi) > 0){
	mysqli_query($conn, "UPDATE bom SET bom_divisi_id = 'DIHAPUS' WHERE material_uom = '$uom[uom_nama]'");
	mysqli_query($conn, "UPDATE item SET item_uom = 'DIHAPUS' WHERE item_uom = '$uom[uom_nama]'");
} else {
	mysqli_query($conn, "DELETE FROM divisi WHERE divisi_id = $divisiid");
	if(mysqli_affected_rows($conn) > 0){
	 	header('Location: divisi.php?pesan=delete');
		exit();
	} else {
	 	echo mysqli_error($conn);
	 	exit();
	}
}
?>