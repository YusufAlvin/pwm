<?php 
session_start();
require_once "../koneksi.php";
if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$uomid = $_GET['uomid'];

$queryuom = mysqli_query($conn, "SELECT * FROM uom WHERE uom_id = $uomid");
if(mysqli_num_rows($queryuom) > 0){
	$uom = mysqli_fetch_assoc($queryuom);
	$querymaterial = mysqli_query($conn, "SELECT * FROM material WHERE material_uom = '$uom[uom_nama]'");
	$queryitem = mysqli_query($conn, "SELECT * FROM item WHERE item_uom = '$uom[uom_nama]'");
	if(mysqli_num_rows($querymaterial) > 0 && mysqli_num_rows($querymaterial) > 0){
		mysqli_query($conn, "DELETE FROM uom WHERE uom_id = $uomid");
		mysqli_query($conn, "UPDATE material SET material_uom = 'DIHAPUS' WHERE material_uom = '$uom[uom_nama]'");
		mysqli_query($conn, "UPDATE item SET item_uom = 'DIHAPUS' WHERE item_uom = '$uom[uom_nama]'");
		if(mysqli_affected_rows($conn) > 0){
		 	header('Location: uom.php?pesan=delete');
			exit();
		} else {
		 	echo mysqli_error($conn);
		 	exit();
		}
	} else {
		mysqli_query($conn, "DELETE FROM uom WHERE uom_id = $uomid");
		if(mysqli_affected_rows($conn) > 0){
		 	header('Location: uom.php?pesan=delete');
			exit();
		} else {
		 	echo mysqli_error($conn);
		 	exit();
		}
	}
}

?>