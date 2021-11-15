<?php 
session_start();
require_once "../koneksi.php";

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$queryitem = mysqli_query($conn, "SELECT * FROM item");
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
            <h1 class="m-0">Add BoM</h1>
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
                        <label for="item-code" class="form-label">Item Code</label>
                        <input name="item-code" type="text" class="form-control" id="item-code" placeholder="2LVL013M8SE001" required>
                      </div>
                      <div class="mb-3">
                        <label for="divisi" class="form-label">Divisi</label>
                        <input name="divisi" type="text" class="form-control" id="divisi" placeholder="4800" required>
                      </div>                 
                    </div>
                    <div class="col-md">
                      
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
  $itemno = htmlspecialchars($_POST['item-no']);
  $item = htmlspecialchars($_POST['item']);
  $baseqty = htmlspecialchars($_POST['base-qty']);
  $plannedqty = htmlspecialchars($_POST['planned-qty']);
  $issued = htmlspecialchars($_POST['issued']);
  $available = htmlspecialchars($_POST['available']);
  $uom = htmlspecialchars($_POST['uom']);
  $warehouse = htmlspecialchars($_POST['warehouse']);

  
  mysqli_query($conn, "INSERT INTO spk VALUES ('', '$itemno', '$item', '$baseqty', '$plannedqty', '$issued', '$available', '$uom', '$warehouse')");

  if(mysqli_affected_rows($conn) > 0){
    echo "<script>alert('Data has been saved!');location.href='spk.php'</script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>
