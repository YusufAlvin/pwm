<?php 
session_start();
require_once "../koneksi.php";

if($_SESSION['login'] != true){
  header('Location: ../');
  exit();
}

$id = $_GET['id'];

$querybom = mysqli_query($conn, "SELECT * FROM ((bom INNER JOIN item ON bom.bom_item_code = item.item_id) INNER JOIN divisi ON bom.bom_divisi_id = divisi.divisi_id) WHERE bom_id = $id");
$querydivisi = mysqli_query($conn, "SELECT * FROM divisi");
$queryitem = mysqli_query($conn, "SELECT * FROM item");
$bom = mysqli_fetch_assoc($querybom);
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
            <h1 class="m-0">Edit BoM</h1>
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
                        <label for="item" class="form-label">Item</label>
                        <select name="item" class="form-select form-control">
                          <?php while($item = mysqli_fetch_assoc($queryitem)) : ?>
                            <?php if($bom['bom_item_code'] == $item['item_id']) : ?>
                              <option value="<?= $item['item_id'] ?>" selected><?= $item['item_nama'] ?></option>
                            <?php else : ?>
                              <option value="<?= $item['item_id'] ?>"><?= $item['item_nama'] ?></option>
                            <?php endif; ?>
                          <?php endwhile; ?>
                        </select>                        
                      </div>
                      <div class="mb-3">
                        <label for="divisi" class="form-label">divisi</label>
                        <select name="divisi" class="form-select form-control">
                          <?php while($divisi = mysqli_fetch_assoc($querydivisi)) : ?>
                            <?php if($bom['bom_divisi_id'] == $divisi['divisi_id']) : ?>
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
  $bom_id = $id;
  $item = htmlspecialchars($_POST['item']);
  $divisi = htmlspecialchars($_POST['divisi']);

  mysqli_query($conn, "UPDATE bom SET bom_item_code = '$item', bom_divisi_id = $divisi WHERE bom_id = $bom_id");

  if(mysqli_affected_rows($conn) > 0){
    echo "<script>alert('Material has been added!');location.href='bom.php'</script>";
  } else {
    echo mysqli_error($conn);
  }
}

?>
