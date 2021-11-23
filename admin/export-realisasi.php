<?php 
session_start();
require_once "../koneksi.php";
if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}
$queryso = mysqli_query($conn, "SELECT DISTINCT so_no_spk FROM so");
$querydivisi = mysqli_query($conn, "SELECT * FROM divisi");
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
                <form action="export.php" method="GET">
                  <select name="projects" class="form-select form-control mb-3" aria-label="Default select example">
                    <option value="" selected>No SPK</option>
                    <?php while ($so = mysqli_fetch_assoc($queryso)) : ?>
                      <a href="export.php?projects=" <?= $so['so_no_spk']; ?>>
                          <option value="<?= $so['so_no_spk']; ?>"><?= $so['so_no_spk']; ?></option>
                      </a>
                    <?php endwhile; ?>
                  </select>
                  <select name="divisi" class="form-select form-control mb-3" aria-label="Default select example">
                    <option value="" selected>Divisi</option>
                    <?php while ($divisi = mysqli_fetch_assoc($querydivisi)) : ?>
                      <a href="export.php?divisi=" <?= $divisi['divisi_id']; ?>>
                          <option value="<?= $divisi['divisi_id']; ?>"><?= $divisi['divisi_nama']; ?></option>
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
