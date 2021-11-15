<?php 
session_start();
require_once "../koneksi.php";
if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $item_code = $_POST['item-code'];
  $divisi = $_POST['divisi'];

  mysqli_query($conn, "INSERT INTO bom VALUES ('', '$item_code', $divisi)");

  if(mysqli_affected_rows($conn) > 0){
    // echo "<script>alert('Data has been saved!');location.href='spk.php'</script>";
    header('Location: bom.php');
  } else {
    echo mysqli_error($conn);
  }
}

$querybom = mysqli_query($conn, "SELECT * FROM ((bom INNER JOIN item ON bom.bom_item_code = item.item_id) INNER JOIN divisi ON bom.bom_divisi_id = divisi.divisi_id)");
$queryitem = mysqli_query($conn, "SELECT * FROM item");
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
            <form action="" method="POST">
              <div class="card">
                <div class="card-body">
                  <div class="mb-3">
                    <label for="item-code" class="form-label">Item Code</label>
                    <select name="item-code" class="form-select form-control">
                      <?php while($item = mysqli_fetch_assoc($queryitem)) :?>
                      <option value="<?= $item['item_id'] ?>"><?= $item['item_nama'] ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="item-code" class="form-label">Divisi</label>
                    <select name="divisi" class="form-select form-control">
                      <?php while($divisi = mysqli_fetch_assoc($querydivisi)) :?>
                      <option value="<?= $divisi['divisi_id'] ?>"><?= $divisi['divisi_nama'] ?></option>
                      <?php endwhile; ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Add BoM</button>
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
                <table id="spk" class="table table-striped display" style="width:100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Item Code</th>
                          <th>Item</th>
                          <th>Divisi</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php while($bom = mysqli_fetch_assoc($querybom)) : ?>
                      <tr>
                          <td></td>
                          <td><?= $bom['item_id']; ?></td>
                          <td><?= $bom['item_nama']; ?></td>
                          <td><?= $bom['divisi_nama']; ?></td>                          
                          <td>
                            <a href="item-material-detail.php?id=<?= $bom['item_id']; ?>"><span class="badge rounded-pill bg-warning">Material</span></a>
                            <a href="bom-edit.php?id=<?= $bom['bom_id']; ?>"><span class="badge rounded-pill bg-primary">Edit</span></a>
                            <a href="bom-delete.php?id=<?= $bom['bom_id']; ?>"><span class="badge rounded-pill bg-danger">Delete</span></a>
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
