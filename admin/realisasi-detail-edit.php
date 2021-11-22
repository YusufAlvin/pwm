<?php 
session_start();
require_once "../koneksi.php";

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$id = $_GET['id'];
$no_spk = $_GET['nospk'];

if($id == "" || $no_spk = ""){
  header('Location: realisasi.php');
  exit();
}

$queryrealisasi = mysqli_query($conn, "SELECT realisasi.so_qty, realisasi.so_realisasi, realisasi.so_tanggal FROM realisasi WHERE realisasi.so_id = $id");

$realisasi = mysqli_fetch_assoc($queryrealisasi);

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $nospk = $no_spk;
  $soid= $id;
  $quantity = htmlspecialchars($_POST['quantity']);
  $realisasi = htmlspecialchars($_POST['realisasi']);
  $tanggal = htmlspecialchars($_POST['tanggal']);

  $querytotalkebutuhan = mysqli_query($conn, "SELECT realisasi.so_total_kebutuhan FROM realisasi WHERE realisasi.so_id = $soid");
  $totalkebutuhan = mysqli_fetch_assoc($querytotalkebutuhan);

  if(floatval($realisasi) > $totalkebutuhan['so_total_kebutuhan']){
    echo "<script>alert('Realisasi tidak boleh lebih besar dari total kebutuhan!');location.href = 'realisasi.php'</script>";
  } else {
    mysqli_query($conn, "UPDATE realisasi SET so_qty = $quantity, so_realisasi = $realisasi, so_tanggal = '$tanggal' WHERE so_id = $soid");  

    if(mysqli_affected_rows($conn) > 0){
      echo "<script>alert('Data berhasil disimpan!');location.href = 'realisasi.php'</script>";
    } else {
      echo mysqli_error($conn);
      exit();
    }
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
            <h1 class="m-0">Edit</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <div class="card">
              <div class="card-body">
                <form action="" method="post">
                  <div class="row">
                    <div class="col-md">
                      <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input name="quantity" type="text" class="form-control" id="quantity" value="<?= $realisasi['so_qty'] ?>">                                               
                      </div>
                      <div class="mb-3">
                        <label for="realisasi" class="form-label">Realisasi</label>
                        <input name="realisasi" type="text" class="form-control" id="realisasi" value="<?= $realisasi['so_realisasi'] ?>">
                      </div>  
                      <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Input</label>
                        <input name="tanggal" type="date" class="form-control" id="tanggal" value="<?= $realisasi['so_tanggal'] ?>">
                      </div>                   
                    </div>                  
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <button class="btn btn-primary" type="submit" name="add" id="add">Edit Material</button>                    
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