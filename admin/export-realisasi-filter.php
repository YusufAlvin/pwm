<?php 
session_start();
require_once "../koneksi.php";
if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}
$querytanggal = mysqli_query($conn, "SELECT DISTINCT so_tanggal FROM realisasi");
$queryitemcode = mysqli_query($conn, "SELECT DISTINCT so_item_id FROM realisasi");
$querynospk = mysqli_query($conn, "SELECT DISTINCT so_no_spk FROM realisasi");
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
            <h1 class="m-0">Export Filter</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="card table-responsive">
              <div class="card-body">
                <form action="export-realisasi.php" method="GET">
                  <select name="nospk" class="form-select form-control mb-3" aria-label="Default select example">
                    <option value="" selected>No SPK</option>
                    <?php while ($spk = mysqli_fetch_assoc($querynospk)) : ?>
                      <a href="export-realisasi.php?nospk="<?= $spk['so_no_spk']; ?>>
                          <option value="<?= $spk['so_no_spk']; ?>"><?= $spk['so_no_spk']; ?></option>
                      </a>
                    <?php endwhile; ?>
                  </select>
                  <select name="itemid" class="form-select form-control mb-3" aria-label="Default select example">
                    <option value="" selected>Item Code</option>
                    <?php while ($item = mysqli_fetch_assoc($queryitemcode)) : ?>
                      <a href="export-realisasi.php?itemid="<?= $item['so_item_id']; ?>>
                          <option value="<?= $item['so_item_id']; ?>"><?= $item['so_item_id']; ?></option>
                      </a>
                    <?php endwhile; ?>
                  </select>
                  <select name="tanggal" class="form-select form-control mb-3" aria-label="Default select example">
                    <option value="" selected>Tanggal</option>
                    <?php while ($tanggal = mysqli_fetch_assoc($querytanggal)) : ?>
                      <a href="export-realisasi.php?tanggal="<?= $tanggal['so_tanggal']; ?>>
                          <option value="<?= $tanggal['so_tanggal']; ?>"><?= $tanggal['so_tanggal']; ?></option>
                      </a>
                    <?php endwhile; ?>
                  </select>
                  <button name='export' type="submit" class="btn btn-primary">Export</button>
                </form>
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

