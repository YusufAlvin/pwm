<?php 
session_start();
require_once "../koneksi.php";

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$no_spk = $_GET['id'];

$queryso = mysqli_query($conn, "SELECT * FROM so INNER JOIN bom ON so.so_bom_id = bom.bom_id WHERE so_no_spk = '$no_spk'");
$queryitem = mysqli_query($conn, "SELECT * FROM item");
$data = mysqli_fetch_assoc($queryso);
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $no_spk = htmlspecialchars($_POST['no_spk']);
  $bom_id = htmlspecialchars($_POST['item']);
  $lotnumber = htmlspecialchars($_POST['lot-number']);
  $qty = htmlspecialchars($_POST['qty']);

  // $querybom = mysqli_query($conn, "");

  while ($bom = mysqli_fetch_assoc($querybom)) {
    if($no_spk == $bom['so_no_spk']){
      $total_kebutuhan = $bom['bahan_quantity'] * $qty;
        mysqli_query($conn, "UPDATE so SET so_bom_id = '$bom_id', so_lot_number = '$lotnumber', so_qty_order = $qty, so_total_kebutuhan = $total_kebutuhan WHERE so_no_spk = '$no_spk'");
    } else {
        mysqli_query($conn, "DELETE FROM so WHERE so_no_spk = '$no_spk'");
        $total_kebutuhan = $bom['bahan_quantity'] * $qty;
        mysqli_query($conn, "INSERT INTO so VALUES ('', '$no_spk', $bom_id, '$lotnumber', $qty, $total_kebutuhan)"); 
    } 
  } 

  if(mysqli_affected_rows($conn) > 0){
    echo "<script>alert('Data has been edited!');location.href='so.php'</script>";
    exit();
  } else {
    echo mysqli_error($conn);
    exit();
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
            <h1 class="m-0">Edit Sales Order</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <form action="" method="post">
                  <div class="row">
                    <div class="col-md">
                      <div class="mb-3">
                        <label for="projects" class="form-label">No SPK</label>
                        <input name="no_spk" type="text" class="form-control" id="no_spk" value="<?= $data['so_no_spk']; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="item" class="form-label">Item</label>
                        <select name="item" class="form-select form-control">
                          <?php while($item = mysqli_fetch_assoc($queryitem)) : ?>
                            <?php if($data['bom_item_code'] == $item['item_id']) : ?>
                              <option value="<?= $data['bom_id'] ?>" selected><?= $item['item_nama'] ?></option>
                            <?php else : ?>
                              <option value="<?= $data['bom_id'] ?>"><?= $item['item_nama'] ?></option>
                            <?php endif; ?>
                          <?php endwhile; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="mb-3">
                        <label for="lot-number" class="form-label">Lot Number</label>
                        <input name="lot-number" type="text" class="form-control" id="lot-number" value="<?= $data['so_lot_number']; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="qty" class="form-label">Quantity</label>
                        <input name="qty" type="text" class="form-control" id="qty" value="<?= $data['so_qty_order']; ?>">
                      </div>
                      <!-- <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Produksi</label>
                        <input name="tanggal" type="date" class="form-control" id="tanggal" value="<?= $data['so_tgl_produksi']; ?>">
                      </div> -->
                    </div>                  
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <button class="btn btn-primary" type="submit" name="edit">Edit Data</button>                    
                    </div>
                  </div>
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
