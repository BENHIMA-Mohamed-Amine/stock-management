<?php
session_start();
?>
<?php if (isset($_SESSION['admin'])): ?>
<?php
  require_once("../php/Class/Supplier.php");

  // echo ("<pre>");
  // print_r($_POST);
  if (isset($_POST['edit'])) {
    extract($_POST);
    // kanchof wach khona ma chnageach image ila oui kanakhod path l9dim dialha o kansefto f modifiermarque 
    // sinon kansupprimer l9dima mn ne3d ka n uploadi jdida o kanghewet 3la modifier marque 
    if ($_FILES["image"]["name"] === "") {
      Supplier::modifier($id, $nom, $prenom, $adr, $tele, $email, $old_image, "fournisseur");
    } else {
      $filename = $_FILES["image"]["name"];
      $tempname = $_FILES["image"]["tmp_name"];
      $image = "./image/supplier/" . $filename;

      // var_dump($image);
      // echo "<pre>";
      // var_dump($tempname);

      if (move_uploaded_file($tempname, $image)) {
        if (unlink($old_image)) {
          Supplier::modifier($id, $nom, $prenom, $adr, $tele, $email, $image, "fournisseur");
        } else {
          exit("<h3> Failed to delete image!</h3>");
        }
      } else {
        exit("<h3> Failed to upload image!</h3>");
      }
    }
    $supplier = Supplier::affciherPersonne($id, "fournisseur");
  }
  if (isset($_GET['id_sup'])) {
    $id = $_GET['id_sup'];
    $supplier = Supplier::affciherPersonne($id, "fournisseur");
  }

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
  <title>Supplier Management</title>

  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png" />

  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

  <link rel="stylesheet" href="assets/css/animate.css" />

  <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css" />

  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css" />

  <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css" />
  <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

  <link rel="stylesheet" href="assets/css/style.css" />
  <style>
    @media (min-width: 992px) {
      .col-lg-3 {
        flex: 0 0 auto;
        width: 33%;
      }

      .col-lg-9 {
        flex: 0 0 auto;
        width: 67%;
      }
    }
  </style>
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
            <h4>Supplier Management</h4>
            <h6>Edit/Update Supplier</h6>
          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <form class="row" method="post" action="editsupplier.php" enctype="multipart/form-data">
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Customer Last Name</label>
                  <input type="text" name="nom" value="<?= $supplier['nom']; ?>" />
                  <input type="hidden" name="id" value="<?= $supplier['id']; ?>" />
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Customer First Name</label>
                  <input type="text" name="prenom" value="<?= $supplier['prenom']; ?>" />
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" value="<?= $supplier['email']; ?>" />
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Phone</label>
                  <input type="text" name="tele" value="<?= $supplier['tele']; ?>" />
                </div>
              </div>
              <div class="col-lg-9 col-12">
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" name="adr" value="<?= $supplier['adr']; ?>" />
                </div>
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label> Avatar</label>
                  <div class="image-upload">
                    <input type="file" name="image" />
                    <input type="hidden" name="old_image" value="<?= $supplier['image']; ?>" />
                    <div class="image-uploads">
                      <img src="assets/img/icons/upload.svg" alt="img" />
                      <h4>Drag and drop a file to upload</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <button class="btn btn-submit me-2" type="submit" name="edit">Update</button>
                <a href="supplierlist.php" class="btn btn-cancel">Cancel</a>
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