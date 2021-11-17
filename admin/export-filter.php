<?php 
session_start();
require_once "../koneksi.php";
if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}
$querybom = mysqli_query($conn, "SELECT DISTINCT so_projects FROM bom INNER JOIN so ON bom.bom_so_id = so.so_id;");
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
                    <option value="" selected>Projects</option>
                    <?php while ($bom = mysqli_fetch_assoc($querybom)) : ?>
                      <a href="export.php?projects=" <?= $bom['so_projects']; ?>>
                          <option value="<?= $bom['so_projects']; ?>"><?= $bom['so_projects']; ?></option>
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

