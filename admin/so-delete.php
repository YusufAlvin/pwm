<?php 
session_start();
require_once "../koneksi.php";

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$id = $_GET['nospk'];
$itemid = $_GET['itemid'];

mysqli_query($conn, "DELETE FROM realisasi WHERE so_no_spk = '$id' AND so_item_id = '$itemid'");
mysqli_query($conn, "DELETE FROM so WHERE so_no_spk = '$id' AND so_item_id = '$itemid'");

if(mysqli_affected_rows($conn) > 0){
  header('Location: so.php?pesan=delete');
  exit();
} else {
  echo mysqli_error($conn);
  exit();
}
