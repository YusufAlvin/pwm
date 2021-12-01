<?php 
session_start();
require_once "../koneksi.php";
if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$query = mysqli_query($conn, "SELECT DISTINCT so.so_no_spk, item.item_id, item.item_nama, so.so_lot_number, so.so_qty_order FROM so INNER JOIN bom ON bom.bom_item_id = so.so_item_id INNER JOIN item ON item.item_id = bom.bom_item_id;");
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
            <h1 class="m-0">Realisasi</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row mb-3">
          <div class="col-md-5">
            <a href="export-realisasi-filter.php">
              <button class="btn btn-primary">Export</button>
            </a>
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
                          <th>Item Code</th>
                          <th>No PO</th>
                          <th>Item</th>
                          <th>Qty Order</th>
                          <th>Lot Number</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php while($so = mysqli_fetch_assoc($query)) : ?>
                      <tr>
                          <td></td>
                          <td><?= $so['item_id']; ?></td>
                          <td><?= $so['so_no_spk']; ?></td>
                          <td><?= $so['item_nama']; ?></td>
                          <td><?= $so['so_qty_order']; ?></td>
                          <td><?= $so['so_lot_number']; ?></td>
                          <td>
                            <a href="realisasi-detail.php?nospk=<?= $so['so_no_spk']; ?>"><span class="badge rounded-pill bg-success">Detail</span></a>
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
