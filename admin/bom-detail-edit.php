<?php 
session_start();
require_once "../koneksi.php";

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$id = $_GET['id'];

if($id == ""){
  header('Location: bom.php');
  exit();
}

$querybahan = mysqli_query($conn, "SELECT * FROM bahan WHERE bahan_id = $id");
$querymaterial = mysqli_query($conn, "SELECT * FROM material");
$querydivisi = mysqli_query($conn, "SELECT * FROM divisi");

$bahan = mysqli_fetch_assoc($querybahan);

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $bahan_id = $id;
  $material = htmlspecialchars($_POST['material']);
  $divisi = $_POST['divisi'];
  $quantity = htmlspecialchars($_POST['quantity']);

  // $queryso = mysqli_query($conn, "SELECT so_quantity FROM so WHERE so_id = $so_id");
  // $quantity_order = mysqli_fetch_assoc($queryso);

  // $totalkebutuhan = floatval($quantity_order['so_quantity']) * floatval($quantity);

  mysqli_query($conn, "UPDATE bahan SET bahan_material_id = '$material', bahan_divisi_id = $divisi, bahan_quantity = $quantity WHERE bahan_id = $bahan_id");  

  if(mysqli_affected_rows($conn) > 0){
    echo "<script>alert('Data has been edited!');location.href='bom.php'</script>";
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
                        <label for="material" class="form-label">Material</label>
                        <select name="material" class="form-select form-control">
                          <?php while($material = mysqli_fetch_assoc($querymaterial)) : ?>
                            <?php if($bahan['bahan_material_id'] == $material['material_id']) : ?>
                              <option value="<?= $material['material_id'] ?>" selected><?= $material['material_nama'] ?></option>
                            <?php else : ?>
                              <option value="<?= $material['material_id'] ?>"><?= $material['material_nama'] ?></option>
                            <?php endif; ?>
                          <?php endwhile; ?>
                        </select>                        
                      </div>
                      <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input name="quantity" type="text" class="form-control" id="quantity" value="<?= $bahan['bahan_quantity']; ?>">
                      </div>  
                      <div class="mb-3">
                        <label for="divisi" class="form-label">Divisi</label>
                        <select name="divisi" class="form-select form-control">
                          <?php while($divisi = mysqli_fetch_assoc($querydivisi)) : ?>
                            <?php if($bahan['bahan_divisi_id'] == $divisi['divisi_id']) : ?>
                              <option value="<?= $divisi['divisi_id'] ?>" selected><?= $divisi['divisi_nama'] ?></option>
                            <?php else : ?>
                              <option value="<?= $divisi['divisi_id'] ?>"><?= $divisi['divisi_nama'] ?></option>
                            <?php endif; ?>
                          <?php endwhile; ?>
                        </select>
                      </div>                   
                    </div>                  
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <button class="btn btn-primary" type="submit" name="add">Edit Material</button>                    
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