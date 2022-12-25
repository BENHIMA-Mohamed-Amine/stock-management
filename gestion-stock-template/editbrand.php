<?php
session_start();
?>
<?php if (isset($_SESSION['admin'])): ?>
<?php
  require_once("../php/Class/Marque.php");
  if (isset($_POST['update'])) {
    // print_r($_POST);
    extract($_POST);
    // kanchof wach khona ma chnageach image ila oui kanakhod path l9dim dialha o kansefto f modifiermarque 
    // sinon kansupprimer l9dima mn ne3d ka n uploadi jdida o kanghewet 3la modifier marque 
    if ($_FILES["image"]["name"] === "") {
      Marque::modifierMarque($nom_marque, $description_marque, $old_image, $id_marque);
      $brand = Marque::afficherMarque($id_marque);
    } else {
      $filename = $_FILES["image"]["name"];
      $tempname = $_FILES["image"]["tmp_name"];
      $image = "./image/brand/" . $filename;

      // var_dump($image);
      // echo "<pre>";
      // var_dump($tempname);

      Marque::unlinkFile($old_image);
      if (Marque::uploadFile($tempname, $image)) {
        Marque::modifierMarque($nom_marque, $description_marque, $image, $id_marque);
        $brand = Marque::afficherMarque($id_marque);
      } else {
        exit("<h3> Failed to upload image!</h3>");
      }
    }
  }
  if (isset($_GET['id_marque'])) {
    extract($_GET);
    $brand = Marque::afficherMarque($id_marque);
  }
  // echo ("<pre>");
  // print_r($brand);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
  <meta name="description" content="POS - Bootstrap Admin Template" />
  <meta name="keywords"
    content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects" />
  <meta name="author" content="Dreamguys - Bootstrap Admin Template" />
  <meta name="robots" content="noindex, nofollow" />
  <title>Edit Brand</title>

  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png" />

  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

  <link rel="stylesheet" href="assets/css/animate.css" />

  <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css" />

  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css" />

  <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css" />
  <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

  <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
  <div id="global-loader">
    <div class="whirly-loader"></div>
  </div>

  <div class="main-wrapper">
    <?php require_once("header.php"); ?>
    <?php require_once("sidebar.php"); ?>
    <div class="page-wrapper">
      <div class="content">
        <div class="page-header">
          <div class="page-title">
            <h4>Edit Brand</h4>
            <h6>Update Your Brand</h6>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <form class="row" method="post" action="editbrand.php" enctype="multipart/form-data">
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Brand Name</label>
                  <input type="hidden" name="id_marque" value="<?= $brand['id_marque'] ?>">
                  <input type="text" name="nom_marque" value="<?= $brand['nom_marque'] ?>" />
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" class="form-control" name="description_marque"
                    value="<?= $brand['description_marque'] ?>">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label> Brand Image</label>
                  <div class="image-upload">
                    <input type="file" name="image" accept="image/png, image/jpeg" value="<?= $brand['br_image'] ?>" />
                    <input type="hidden" name="old_image" value="<?= $brand['br_image'] ?>" />
                    <div class="image-uploads">
                      <img src="assets/img/icons/upload.svg" alt="img" />
                      <h4>Drag and drop a file to upload</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <button class="btn btn-submit me-2" type="submit" name="update">Update</button>
                <a href="./brandlist.php" class="btn btn-cancel">Cancel</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/jquery-3.6.0.min.js"></script>

  <script src="assets/js/feather.min.js"></script>

  <script src="assets/js/jquery.slimscroll.min.js"></script>

  <script src="assets/js/jquery.dataTables.min.js"></script>
  <script src="assets/js/dataTables.bootstrap4.min.js"></script>

  <script src="assets/js/bootstrap.bundle.min.js"></script>

  <script src="assets/plugins/select2/js/select2.min.js"></script>

  <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
  <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

  <script src="assets/js/script.js"></script>
</body>

</html>
<?php else: ?>
<?php header("Location: signin.php"); ?>
<?php endif ?>