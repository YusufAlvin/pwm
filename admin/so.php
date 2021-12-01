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
            <h1 class="m-0">Sales Order</h1>
            <?php if(isset($_GET['pesan'])) : ?>
                <?php if($_GET['pesan'] == 'sukses') : ?>
                  <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    Data berhasil ditambahkan
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php elseif($_GET['pesan'] == 'delete') : ?>
                  <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    Data berhasil dihapus
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php elseif($_GET['pesan'] == 'kosong') : ?>
                  <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    Data BoM Kosong. Tambahkan BoM terlebih dahulu
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                <?php elseif($_GET['pesan'] == 'edit') : ?>
                  <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    Data berhasil di edit
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
        <div class="row mb-3">
          <div class="col-md-5">
            <a href="so-add.php">
              <button class="btn btn-primary">Add Data</button>
            </a>
            <a href="export-filter.php">
              <button class="btn btn-primary">Export PDF</button>
            </a>
            <a href="export-so-excel.php">
              <button class="btn btn-primary">Export Excel</button>
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
                          <th>No SPK</th>
                          <th>Item Code</th>
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
                          <td><?= $so['so_no_spk']; ?></td>
                          <td><?= $so['item_id']; ?></td>
                          <td><?= $so['item_nama']; ?></td>
                          <td><?= $so['so_qty_order']; ?></td>
                          <td><?= $so['so_lot_number']; ?></td>
                          <td>
                            <a href="so-detail.php?nospk=<?= $so['so_no_spk']; ?>"><span class="badge rounded-pill bg-success">Detail</span></a>
                            <a href="so-edit.php?nospk=<?= $so['so_no_spk']; ?>"><span class="badge rounded-pill bg-primary">Edit</span></a>
                            <a href="so-delete.php?nospk=<?= $so['so_no_spk']; ?>"><span class="badge rounded-pill bg-danger">Delete</span></a>
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
