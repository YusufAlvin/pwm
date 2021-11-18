<?php 
session_start();
require_once "../koneksi.php";

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM bom WHERE bom_so_id = $id");
mysqli_query($conn, "DELETE FROM so WHERE so_id = $id");

if(mysqli_affected_rows($conn) > 0){
  header('Location: so.php');
} else {
  echo mysqli_error($conn);
}