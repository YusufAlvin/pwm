<?php 
session_start();
require_once "../koneksi.php";
if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$query = mysqli_query($conn, "SELECT * FROM item");
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
            <h1 class="m-0">Item</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col-md-5">
            <form action="" method="post">
              <div class="card">
                <div class="card-body">
                  <div class="mb-3">
                    <label for="item-code" class="form-label">Item Code</label>
                    <input name="item-code" type="text" class="form-control" id="item-code" placeholder="1LOCCTIBS05620">
                  </div>
                  <div class="mb-3">
                    <label for="nama" class="form-label">Nama Item</label>
                    <input name="nama" type="text" class="form-control" id="nama" placeholder="CTI BASE">
                  </div>
                  <div>
                    <button name="add-item" type="submit" class="btn btn-primary">Add Item</button>
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
                          <th>Item Code</th>
                          <th>Nama</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php while($item = mysqli_fetch_assoc($query)) : ?>
                      <tr>
                          <td></td>
                          <td><?= $item['item_id']; ?></td>
                          <td><?= $item['item_nama']; ?></td>
                          <td>
                            <a href="item-edit.php?id=<?= $item['item_id']; ?>"><span class="badge rounded-pill bg-primary">Edit</span></a>
                            <a href="item-delete.php?id=<?= $item['item_id']; ?>"><span class="badge rounded-pill bg-danger">Delete</span></a>
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
  $itemcode = htmlspecialchars($_POST['item-code']);
  $nama = htmlspecialchars($_POST['nama']);

  mysqli_query($conn, "INSERT INTO item VALUES ('$itemcode', '$nama')");

  if(mysqli_affected_rows($conn) > 0){
    echo "<script>location.href = 'item.php'</script>";
  } else {
    echo mysqli_error($conn);
  }
}
?>
