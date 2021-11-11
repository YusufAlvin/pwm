<?php 
session_start();
require_once "../koneksi.php";

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM bom WHERE bom_id = '$id'");

if(mysqli_affected_rows($conn) > 0){
  header('Location: bom.php');
} else {
  echo mysqli_error($conn);
}