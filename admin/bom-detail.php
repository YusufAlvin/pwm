<?php 
session_start();
require_once "../koneksi.php";
if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$so_id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM (bom INNER JOIN so ON bom.bom_so_id = so.so_id) INNER JOIN material ON bom.bom_material_id = material.material_id  WHERE bom.bom_so_id = $so_id");
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
            <h1 class="m-0">Material Detail</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col-md-5">
            <!-- <a href="bom-add.php">
              <button class="btn btn-primary">Add Data</button>
            </a> -->
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="card table-responsive">
              <div class="card-body">
                <table id="spk" class="table table-striped display" style="width:100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>SO</th>
                          <th>Material Code</th>
                          <th>Material</th>
                          <th>Quantity</th>
                          <th>UoM</th>
                          <th>Total Kebutuhan</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php while($bom = mysqli_fetch_assoc($query)) : ?>
                      <tr>
                          <td></td>
                          <td><?= $bom['so_projects']; ?></td>
                          <td><?= $bom['bom_material_id']; ?></td>
                          <td><?= $bom['material_nama']; ?></td>
                          <td><?= $bom['bom_quantity']; ?></td>
                          <td><?= $bom['bom_uom']; ?></td>
                          <td><?= $bom['bom_total_kebutuhan']; ?></td>
                          <td>
                            <a href="bom-detail-edit.php?id=<?= $bom['bom_id']; ?>"><span class="badge rounded-pill bg-primary">Edit</span></a>
                            <a href="bom-detail-delete.php?id=<?= $bom['bom_id']; ?>"><span class="badge rounded-pill bg-danger">Delete</span></a>
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
