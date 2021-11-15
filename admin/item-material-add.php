<?php 
session_start();
require_once "../koneksi.php";
if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$item_id = $_GET['id'];

$querymaterial = mysqli_query($conn, "SELECT * FROM material");
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
            <h1 class="m-0">Bahan Untuk Item Code <?= $item_id ?></h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col-md-6">
            <form action="" method="post">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md">
                      <div class="mb-3">
                        <label class="form-label">Material</label>
                        <?php while($material = mysqli_fetch_assoc($querymaterial)) : ?>
                        <div class="form-check">
                          <input name="material[]" class="form-check-input" type="checkbox" value="<?= $material['material_id'] ?>" id="material">
                          <label class="form-check-label" for="material">
                            <?= $material['material_nama'] ?>
                          </label>
                        </div>
                        <?php endwhile; ?>
                      </div>
                    </div>
                  </div>
                  
                  <div>
                    <button name="add-item" type="submit" class="btn btn-primary">Add</button>
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
  $itemcode = $item_id;
  $material_id = $_POST['material'];

  for($i = 0; $i < count($material_id); $i++){
    mysqli_query($conn, "INSERT INTO bahan VALUES ('', '$itemcode', '$material_id[$i]')");
  }

  if(mysqli_affected_rows($conn) > 0){
    echo "<script>location.href = 'item.php'</script>";
  } else {
    echo mysqli_error($conn);
  }
}
?>
