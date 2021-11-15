<?php 
session_start();
require_once "../koneksi.php";
if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$item_id = $_GET['id'];

$querybahan = mysqli_query($conn, "SELECT * FROM ((bahan INNER JOIN item ON item.item_id = bahan.bahan_item_id) INNER JOIN material ON material.material_id = bahan.bahan_material_id) WHERE item.item_id = $item_id");
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
            <h1 class="m-0">Detail Bahan Item Code <?= $item_id ?></h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- <div class="row mb-3">
          <div class="col-md-5">
            <a href="export-filter.php">
              <button class="btn btn-primary">Export</button>
            </a>
          </div>
        </div> -->
        <div class="row">
          <div class="col">
            <div class="card table-responsive">
              <div class="card-body">
                <table id="spk" class="table table-striped display" style="width:100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Material Code</th>
                          <th>Material</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php while($bahan = mysqli_fetch_assoc($querybahan)) : ?>
                      <tr>
                          <td></td>
                          <td><?= $bahan['material_id']; ?></td>
                          <td><?= $bahan['material_nama']; ?></td>
                          <td>
                            <a href="item-material-detail-delete.php?id=<?= $bahan['bahan_id']; ?>"><span class="badge rounded-pill bg-danger">Delete</span></a>
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
