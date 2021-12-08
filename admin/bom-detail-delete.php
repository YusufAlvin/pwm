<?php 
session_start();
require_once "../koneksi.php";

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$id = $_GET['id'];
$materialcode = $_GET['materialcode'];

// mysqli_query($conn, "DELETE FROM realisasi WHERE so_material_id = '$materialcode'");
// mysqli_query($conn, "DELETE FROM so WHERE so_material_id = '$materialcode'");
mysqli_query($conn, "DELETE FROM bom WHERE bom_id = $id");

if(mysqli_affected_rows($conn) > 0){
  header('Location: bom-detail.php?' . $_SERVER['QUERY_STRING'] . '&pesan=delete');
  exit();
} else {
  echo mysqli_error($conn);
  exit();
}