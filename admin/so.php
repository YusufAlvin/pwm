<?php 
session_start();
require_once "../koneksi.php";
if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$query = mysqli_query($conn, "SELECT * FROM so INNER JOIN item ON so.so_item_code = item.item_id");
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
            <h1 class="m-0">Sales Order</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col-md-5">
            <a href="so-add.php">
              <button class="btn btn-primary">Add Data</button>
            </a>
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
                          <th>Projets</th>
                          <th>Item</th>
                          <th>Lot Number</th>
                          <th>T</th>
                          <th>L</th>
                          <th>P</th>
                          <th>QTY</th>
                          <th>UoM</th>
                          <th>Kubikasi Finish (M3)</th>
                          <th>Tanggal</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php while($so = mysqli_fetch_assoc($query)) : ?>
                      <tr>
                          <td></td>
                          <td><?= $so['item_id']; ?></td>
                          <td><?= $so['so_projects']; ?></td>
                          <td><?= $so['item_nama']; ?></td>
                          <td><?= $so['so_lot_number']; ?></td>
                          <td><?= $so['item_tebal']; ?></td>
                          <td><?= $so['item_lebar']; ?></td>
                          <td><?= $so['item_panjang']; ?></td>
                          <td><?= $so['so_quantity']; ?></td>
                          <td><?= $so['item_uom']; ?></td>
                          <td><?= $so['item_kubikasi']; ?></td>
                          <td><?= $so['so_tgl_produksi']; ?></td>
                          <td>
                            <a href="so-edit.php?id=<?= $so['so_id']; ?>"><span class="badge rounded-pill bg-primary">Edit</span></a>
                            <a href="so-delete.php?id=<?= $so['so_id']; ?>"><span class="badge rounded-pill bg-danger">Delete</span></a>
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
