<?php 
session_start();
require_once "../koneksi.php";

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$id = $_GET['id'];

$queryso = mysqli_query($conn, "SELECT * FROM so WHERE so_id = $id");
$queryitem = mysqli_query($conn, "SELECT * FROM item");
$data = mysqli_fetch_assoc($queryso);
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
                        <label for="projects" class="form-label">Project</label>
                        <input name="id" type="hidden" class="form-control" id="id" value="<?= $data['so_id']; ?>">
                        <input name="projects" type="text" class="form-control" id="projects" value="<?= $data['so_projects']; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="item" class="form-label">Item</label>
                        <select name="item" class="form-select form-control">
                          <?php while($item = mysqli_fetch_assoc($queryitem)) : ?>
                            <?php if($data['so_item_code'] == $item['item_id']) : ?>
                              <option value="<?= $item['item_id'] ?>" selected><?= $item['item_nama'] ?></option>
                            <?php else : ?>
                              <option value="<?= $item['item_id'] ?>"><?= $item['item_nama'] ?></option>
                            <?php endif; ?>
                          <?php endwhile; ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="lot-number" class="form-label">Lot Number</label>
                        <input name="lot-number" type="text" class="form-control" id="lot-number" value="<?= $data['so_lot_number']; ?>">
                      </div>               
                    </div>
                    <div class="col-md">
                      <div class="mb-3">
                        <label for="qty" class="form-label">Quantity</label>
                        <input name="qty" type="text" class="form-control" id="qty" value="<?= $data['so_quantity']; ?>">
                      </div>
                      <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Produksi</label>
                        <input name="tanggal" type="date" class="form-control" id="tanggal" value="<?= $data['so_tgl_produksi']; ?>">
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

<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $id = htmlspecialchars($_POST['id']);
  $projects = htmlspecialchars($_POST['projects']);
  $item = htmlspecialchars($_POST['item']);
  $lotnumber = htmlspecialchars($_POST['lot-number']);
  $qty = htmlspecialchars($_POST['qty']);
  $tanggal = $_POST['tanggal'];

  $kubikasi = (floatval($tinggi) * floatval($panjang) * floatval($lebar)) / 1000000;

  mysqli_query($conn, "UPDATE so SET so_item_code = '$item', so_projects = '$projects', so_lot_number = '$lotnumber', so_quantity = $qty, so_tgl_produksi = '$tanggal' WHERE so_id = $id");

  if(mysqli_affected_rows($conn) > 0){
    echo "<script>alert('Data has been edited!');location.href='so.php'</script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>
