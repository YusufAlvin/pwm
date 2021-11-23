<?php 
session_start();
require_once "../koneksi.php";

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$id = $_GET['itemid'];

mysqli_query($conn, "DELETE FROM realisasi WHERE so_item_id = '$id'");
mysqli_query($conn, "DELETE FROM so WHERE so_item_id = '$id'");
mysqli_query($conn, "DELETE FROM bom WHERE bom_item_id = '$id'");

if(mysqli_affected_rows($conn) > 0){
  header('Location: bom.php?pesan=delete');
  exit();
} else {
  echo mysqli_error($conn);
  exit();
}