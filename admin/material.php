<?php 
session_start();
require_once "../koneksi.php";
if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$query = mysqli_query($conn, "SELECT * FROM material");
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
            <h1 class="m-0">Master Bahan</h1>
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
                        <label for="material-code" class="form-label">Material Code</label>
                        <input name="material-code" type="text" class="form-control" id="material-code" placeholder="3LVL014M5SE002">
                      </div>
                      <div class="mb-3">
                        <label for="nama" class="form-label">Nama Material</label>
                        <input name="nama" type="text" class="form-control" id="nama" placeholder="LVL SENGON 14.5MM (UK. 1250MM X 1250MM)">
                      </div>    
                    </div>
                    <div class="col-md">
                      <div class="mb-3">
                        <label for="uom" class="form-label">UoM</label>
                        <select name="uom" class="form-select form-control">
                          <option value="SHEET">SHEET</option>
                          <option value="KG">KG</option>
                          <option value="BTL">BTL</option>
                          <option value="GR">GR</option>
                          <option value="PCS">PCS</option>
                          <option value="M3">M3</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input name="harga" type="text" class="form-control" id="harga" placeholder="20000">
                      </div>
                    </div>
                  </div>
                  <div>
                    <button name="add-material" type="submit" class="btn btn-primary">Add Material</button>
                  </div>
                  
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card table-responsive">
              <div class="card-body">
                <table id="production-order" class="table table-striped display" style="width:100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Material Code</th>
                          <th>Nama</th>
                          <th>UoM</th>
                          <th>Harga</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php while($material = mysqli_fetch_assoc($query)) : ?>
                      <tr>
                          <td></td>
                          <td><?= $material['material_id']; ?></td>
                          <td><?= $material['material_nama']; ?></td>
                          <td><?= $material['material_uom']; ?></td>
                          <td><?= $material['material_harga']; ?></td>
                          <td>
                            <a href="material-edit.php?id=<?= $material['material_id']; ?>"><span class="badge rounded-pill bg-primary">Edit</span></a>
                            <a href="material-delete.php?id=<?= $material['material_id']; ?>"><span class="badge rounded-pill bg-danger">Delete</span></a>
                          </td>
                      </tr> 
                    <?php endwhile; ?>                     
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php require_once "template/footer.php"; ?>

<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $materialcode = htmlspecialchars($_POST['material-code']);
  $nama = htmlspecialchars($_POST['nama']);
  $uom = $_POST['uom'];
  $harga = htmlspecialchars($_POST['harga']);

  mysqli_query($conn, "INSERT INTO material VALUES ('$materialcode', '$nama', '$uom', $harga)");

  if(mysqli_affected_rows($conn) > 0){
    echo "<script>location.href = 'material.php'</script>";
  } else {
    echo mysqli_error($conn);
  }
}
?>
