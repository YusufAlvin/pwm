<?php 
session_start();
require_once "../koneksi.php";

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM material WHERE material_id = '$id'");

if(mysqli_affected_rows($conn) > 0){
  header('Location: material.php');
} else {
  echo mysqli_error($conn);
}