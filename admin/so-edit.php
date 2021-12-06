<?php 
session_start();
require_once "../koneksi.php";

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$no_spk = $_GET['nospk'];
$itemid = $_GET['itemid'];

$queryso = mysqli_query($conn, "SELECT so_no_spk, so_item_id, so_lot_number, so_qty_order FROM so WHERE so_no_spk = '$no_spk' AND so_item_id = '$itemid'");
$queryitem = mysqli_query($conn, "SELECT DISTINCT bom_item_id FROM bom");
$data = mysqli_fetch_assoc($queryso);

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $no_spk = trim(htmlspecialchars($_POST['no_spk']));
  $lotnumber = trim(htmlspecialchars($_POST['lot-number']));
  $qty = trim(htmlspecialchars($_POST['qty']));

  if($_POST['item'] == $itemid){
    $item = $itemid;
  } elseif ($_POST['item'] != $itemid) {
    $item = $_POST['item'];
  }

  mysqli_query($conn, "DELETE FROM so WHERE so_no_spk = '$no_spk' AND so_item_id = '$itemid'");
  mysqli_query($conn, "DELETE FROM realisasi WHERE so_no_spk = '$no_spk' AND so_item_id = '$itemid'");

  $querybom2 = mysqli_query($conn, "SELECT * FROM bom WHERE bom_item_id = '$item'");  
  
  while($bom = mysqli_fetch_assoc($querybom2)){
    $total_kebutuhan = $bom['bom_quantity'] * $qty;
    mysqli_query($conn, "INSERT INTO so VALUES ('', '$no_spk', '$item', '$bom[bom_material_id]', $bom[bom_quantity], $bom[bom_divisi_id], $qty, '$lotnumber', $total_kebutuhan, '')");
    mysqli_query($conn, "INSERT INTO realisasi VALUES ('', '$no_spk', '$item', '$bom[bom_material_id]', $bom[bom_quantity], $bom[bom_divisi_id], $qty, '$lotnumber', $total_kebutuhan, '', '', '')"); 
  }
 
  if(mysqli_affected_rows($conn) > 0){
    header('Location: so.php?pesan=edit');
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
                        <label for="projects" class="form-label">No PO</label>
                        <input name="no_spk" type="text" class="form-control" id="no_spk" value="<?= $data['so_no_spk']; ?>" readonly>
                      </div>
                      <div class="mb-3">
                        <label for="item" class="form-label">Item</label>
                        <select name="item" class="form-select form-control">
                          <?php while($item = mysqli_fetch_assoc($queryitem)) : ?>
                            <?php if($data['so_item_id'] == $item['bom_item_id']) : ?>
                              <option value="<?= $item['bom_item_id'] ?>" selected><?= $item['bom_item_id'] ?></option>
                            <?php else : ?>
                              <option value="<?= $item['bom_item_id'] ?>"><?= $item['bom_item_id'] ?></option>
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
