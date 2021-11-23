<?php 
session_start();
require_once "../koneksi.php";
if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$query = mysqli_query($conn, "SELECT * FROM realisasi INNER JOIN item ON item.item_id = realisasi.so_item_id INNER JOIN material ON material.material_id = realisasi.so_material_id INNER JOIN divisi ON divisi.divisi_id = realisasi.so_divisi_id");
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
        <div class="row">
          <div class="col">
            <div class="card table-responsive">
              <div class="card-body">
                <table id="so-excel" class="table table-striped display" style="width:100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>No SPK</th>
                          <th>Lot Number</th>
                          <th>Item Code</th>
                          <th>Item Name</th>
                          <th>Material Code</th>
                          <th>Material Name</th>
                          <th>Divisi</th>
                          <th>Qty Material</th>
                          <th>Qty Order</th>
                          <th>Total Kebuthan</th>
                          <th>Realisasi</th>
                          <th>Tanggal</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php while($so = mysqli_fetch_assoc($query)) : ?>
                      <tr>
                          <td></td>
                          <td><?= $so['so_no_spk']; ?></td>
                          <td><?= $so['so_lot_number']; ?></td>
                          <td><?= $so['item_id']; ?></td>
                          <td><?= $so['item_nama']; ?></td>
                          <td><?= $so['material_id']; ?></td>
                          <td><?= $so['material_nama']; ?></td>
                          <td><?= $so['divisi_nama']; ?></td>
                          <td><?= $so['so_material_qty']; ?></td>
                          <td><?= $so['so_qty_order']; ?></td>
                          <td><?= $so['so_total_kebutuhan']; ?></td>
                          <td><?= $so['so_realisasi']; ?></td>
                          <td><?= $so['so_tanggal']; ?></td>
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
