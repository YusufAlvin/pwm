<?php 
session_start();
require_once "../koneksi.php";
if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}
$material_id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM material WHERE material_id = '$material_id'");
$material = mysqli_fetch_assoc($query);
?>
<?php require_once "template/header.php"; ?>

<?php require_once "template/navbar.php"; ?>

<?php require_once "template/sidebar.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Material</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col-md-5">
            <form action="" method="post">
              <div class="card">
                <div class="card-body">
                  <div class="mb-3">
                    <label for="material-code" class="form-label">Material Code</label>
                    <input name="material-code" type="text" class="form-control" id="material-code" value="<?= $material['material_id']; ?>" disabled>
                  </div>
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama Material</label>
                    <input name="nama" type="text" class="form-control" id="nama" value="<?= $material['material_nama']; ?>">
                  </div>
                  <div>
                    <button name="add-material" type="submit" class="btn btn-primary">Edit Material</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php require_once "template/footer.php"; ?>

<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $materialcode = $material_id;
  $nama = htmlspecialchars($_POST['nama']);

  mysqli_query($conn, "UPDATE material SET material_nama = '$nama' WHERE material_id = '$materialcode'");

  if(mysqli_affected_rows($conn) > 0){
    echo "<script>alert('Data has been edited');location.href = 'material.php'</script>";
  } else {
    echo mysqli_error($conn);
  }
}
?>
