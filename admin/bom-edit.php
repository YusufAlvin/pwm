<?php 
session_start();
require_once "../koneksi.php";

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$id = $_GET['id'];

$query1 = mysqli_query($conn, "SELECT * FROM divisi");
$query2 = mysqli_query($conn, "SELECT * FROM material")

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
          <div class="col-md-5">
            <div class="card">
              <div class="card-body">
                <form action="" method="post">
                  <div class="row">
                    <div class="col-md">
                      <div class="mb-3">
                        <label for="material" class="form-label">Material</label>
                        <select name="material" class="form-select form-control">
                          <?php while($material = mysqli_fetch_assoc($query2)) : ?>
                            <option value="<?= $material['material_id'] ?>"><?= $material['material_nama'] ?></option>
                          <?php endwhile; ?>
                        </select>                        
                      </div>
                      <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input name="quantity" type="text" class="form-control" id="quantity" placeholder="0.5000" required>
                      </div>                     
                    </div>                 
                  </div>
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

<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $so_id = $id;
  $material = htmlspecialchars($_POST['material']);
  $quantity = htmlspecialchars($_POST['quantity']);

  $query3 = mysqli_query($conn, "SELECT so_quantity FROM so WHERE so_id = $so_id");
  $quantity_order = mysqli_fetch_assoc($query3);

  $totalkebutuhan = floatval($quantity_order['so_quantity']) * floatval($quantity);

  mysqli_query($conn, "INSERT INTO bom VALUES ('', $so_id, '$material', $quantity, $totalkebutuhan)");

  if(mysqli_affected_rows($conn) > 0){
    echo "<script>alert('Material has been added!');location.href='bom.php'</script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>
