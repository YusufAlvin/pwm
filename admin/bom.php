<?php 
session_start();
require_once "../koneksi.php";
if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$querybom = mysqli_query($conn, "SELECT DISTINCT item.item_id, item.item_nama FROM bom INNER JOIN item ON item.item_id = bom.bom_item_id");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $item = $_POST['item'];
  mysqli_query($conn, "INSERT INTO bom VALUES ('', '$item')");
  if(mysqli_affected_rows($conn) > 0){
    echo "<script>location.href = 'bom.php'</script>";
  } else {
    echo mysqli_error($conn);
  }
}
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
            <h1 class="m-0">BoM</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col-md-5">
            <a href="bom-add.php">
              <button class="btn btn-primary">Add Data</button>
            </a>
          </div>
          <!-- <div class="col-md-5">
            <a href="export-filter.php">
              <button class="btn btn-primary">Export</button>
            </a>
          </div> -->
        </div>
        <div class="row">
          <div class="col">
            <div class="card table-responsive">
              <div class="card-body">
                <table id="bom" class="table table-striped display" style="width:100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Item Code</th>
                          <th>Item</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php while($bom = mysqli_fetch_assoc($querybom)) : ?>
                      <tr>
                          <td></td>
                          <td><?= $bom['item_id']; ?></td>
                          <td><?= $bom['item_nama']; ?></td>                          
                          <td>
                            <a href="bom-detail.php?id=<?= $bom['item_id']; ?>"><span class="badge rounded-pill bg-success">Detail</span></a>
                            <!-- <a href="bom-edit.php?id=<?= $bom['item_id']; ?>"><span class="badge rounded-pill bg-primary">Edit</span></a> -->
                            <a href="bom-delete.php?id=<?= $bom['item_id']; ?>"><span class="badge rounded-pill bg-danger">Delete</span></a>
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
