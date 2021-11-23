<?php 
session_start();
require_once "../koneksi.php";

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$id = $_GET['nospk'];

mysqli_query($conn, "DELETE FROM realisasi WHERE so_no_spk = '$id'");
mysqli_query($conn, "DELETE FROM so WHERE so_no_spk = '$id'");

if(mysqli_affected_rows($conn) > 0){
  header('Location: so.php?pesan=delete');
  exit();
} else {
  echo mysqli_error($conn);
  exit();
}
