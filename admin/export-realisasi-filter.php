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
            <?php if(isset($_GET['pesan'])) : ?>
              <?php if($_GET['pesan'] == 'fieldkosong') : ?>
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                  <strong>Kolom No SPK, Item Code, Tanggal harus diisi</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>   
              <?php endif; ?>
              <?php if($_GET['pesan'] == 'datakosong') : ?>
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                  <strong>Tidak ada data</strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>   
              <?php endif; ?>   
            <?php endif; ?>
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
                  <div class="mb-3">
                    <input name="tanggal" type="date" class="form-control" id="tanggal" required>
                  </div> 
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

