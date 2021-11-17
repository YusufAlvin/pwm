<?php 
session_start();
require_once "../koneksi.php";

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$id = $_GET['id'];

$query1 = mysqli_query($conn, "SELECT * FROM divisi");
$query2 = mysqli_query($conn, "SELECT * FROM material");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $so_id = $id;
  $material = $_POST['material'];
  $divisi = $_POST['divisi'];
  $quantity = $_POST['quantity'];
  $new_quantity = [];
  $new_divisi = [];

  for($i = 0; $i < count($quantity); $i++){
    if($quantity[$i] == ""){
      continue;
    }
    array_push($new_quantity, $quantity[$i]);
  }

  for($j = 0; $j < count($divisi); $j++){
    if($divisi[$j] == ""){
      continue;
    }
    array_push($new_divisi, $divisi[$j]);
  }

  // var_dump($material);
  // var_dump($new_divisi);
  // var_dump($new_quantity);
  // exit();

  $query3 = mysqli_query($conn, "SELECT so_quantity FROM so WHERE so_id = $so_id");
  $quantity_order = mysqli_fetch_assoc($query3);

  for($k = 0; $k < count($material); $k++){
    $totalkebutuhan = floatval($quantity_order['so_quantity']) * floatval($new_quantity[$k]);
    mysqli_query($conn, "INSERT INTO bom VALUES ('', $so_id, '$material[$k]', $new_divisi[$k], $new_quantity[$k], $totalkebutuhan)");
  }

  if(mysqli_affected_rows($conn) > 0){
    echo "<script>alert('Material has been added!');location.href='bom.php'</script>";
  } else {
    echo mysqli_error($conn);
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
            <h1 class="m-0">Add Material</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <form action="" method="post">
                  <?php while($material = mysqli_fetch_assoc($query2)) : ?>
                  <div class="row mb-3">
                    <div class="col-md">
                      <div class="form-check">
                        <input name="material[]" class="form-check-input" type="checkbox" value="<?= $material['material_id'] ?>" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          <?= $material['material_nama'] ?>
                        </label>
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="mb-3">
                        <input name="quantity[]" type="text" class="form-control" id="quantity" placeholder="Quantity">
                      </div>
                    </div>
                    <div class="col-md">
                      <div class="mb-3">
                        <select name="divisi[]" class="form-select form-control">
                          <option value="" selected>Divisi</option>
                          <option value="1">WW</option>
                          <option value="2">GESSO</option>
                          <option value="3">PACKING</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <?php endwhile; ?>
                  <div class="row">
                    <div class="col-md-4">
                      <button class="btn btn-primary" type="submit" name="add">Add Material</button>
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
