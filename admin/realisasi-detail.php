<?php 
session_start();
require_once "../koneksi.php";
if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$no_spk = $_GET['id'];

$query = mysqli_query($conn, "SELECT material.material_id, material.material_nama, realisasi.so_total_kebutuhan, realisasi.so_no_spk, realisasi.so_qty, realisasi.so_realisasi, realisasi.so_tanggal, realisasi.so_id FROM realisasi JOIN material ON material.material_id = realisasi.so_material_id WHERE realisasi.so_no_spk = '$no_spk'");
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
            <h1 class="m-0">Detail No SPK <?= $no_spk ?></h1>
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
                <table id="so" class="table table-striped display" style="width:100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Material Code</th>
                          <th>Material</th>
                          <th>Total Kebutuhan</th>
                          <th>Quantity</th>
                          <th>Realisasi</th>
                          <th>Tanggal Input</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php while($so = mysqli_fetch_assoc($query)) : ?>
                      <tr>
                          <td></td>
                          <td><?= $so['material_id']; ?></td>
                          <td><?= $so['material_nama']; ?></td>
                          <td><?= $so['so_total_kebutuhan']; ?></td>
                          <td><?= $so['so_qty']; ?></td>
                          <td><?= $so['so_realisasi']; ?></td>
                          <td><?= $so['so_tanggal']; ?></td>
                          <td>
                            <a href="realisasi-detail-edit.php?id=<?= $so['so_id']; ?>&nospk=<?=$no_spk?>"><span class="badge rounded-pill bg-primary">Edit</span></a>
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
