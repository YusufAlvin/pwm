<?php 
session_start();
require_once "../koneksi.php";

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

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
            <h1 class="m-0">Add Sales Order</h1>
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
                        <input name="projects" type="text" class="form-control" id="projects" placeholder="CTI/43275" required>
                      </div>
                      <div class="mb-3">
                        <label for="item" class="form-label">Item</label>
                        <select name="item" class="form-select form-control" aria-label="Default select example">
                          <?php while($item = mysqli_fetch_assoc($queryitem)) : ?>
                            <option value="<?= $item['item_id'] ?>"><?= $item['item_nama'] ?></option>
                          <?php endwhile; ?>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="lot-number" class="form-label">Lot Number</label>
                        <input name="lot-number" type="text" class="form-control" id="lot-number" placeholder="SFT21110028" required>
                      </div>                  
                    </div>
                    <div class="col-md">
                      <div class="mb-3">
                        <label for="divisi" class="form-label">Divisi</label>
                        <select name="divisi" class="form-select form-control">
                        <?php while($divisi = mysqli_fetch_assoc($querydivisi)) : ?>
                          <option value="<?= $divisi['divisi_id'] ?>"><?= $divisi['divisi_nama'] ?></option>
                        <?php endwhile; ?>
                        </select>
                      </div> 
                      <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Produksi</label>
                        <input name="tanggal" type="date" class="form-control" id="tanggal" required>
                      </div>
                    </div>                  
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <button class="btn btn-primary" type="submit" name="add">Add Data</button>                    
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
  $projects = htmlspecialchars($_POST['projects']);
  $item = htmlspecialchars($_POST['item']);
  $lotnumber = htmlspecialchars($_POST['lot-number']);
  $material = htmlspecialchars($_POST['material']);
  $tinggi = htmlspecialchars($_POST['tinggi']);
  $panjang = htmlspecialchars($_POST['panjang']);
  $lebar = htmlspecialchars($_POST['lebar']);
  $qty = htmlspecialchars($_POST['qty']);
  $tanggal = $_POST['tanggal'];
  $divisi = $_POST['divisi'];
  $uom = $_POST['uom'];

  
  $kubikasi = (floatval($tinggi) * floatval($panjang) * floatval($lebar)) / 1000000;

  mysqli_query($conn, "INSERT INTO so (so_item_code, so_projects, so_divisi_id, so_lot_number, so_material, so_quantity, so_uom, so_tinggi, so_lebar, so_panjang, so_kubikasi, so_tgl_produksi) VALUES ('$item', '$projects', $divisi, '$lotnumber', '$material', $qty, '$uom', $tinggi, $lebar, $panjang, $kubikasi, '$tanggal')");
 
  if(mysqli_affected_rows($conn) > 0){
    echo "<script>alert('Data has been saved!');location.href='so.php'</script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>
