<?php
// header('Content-Type: application/json, charset=UTF-8');

// $request_payload = file_get_contents('php://input');

// var_dump($request_payload);
// $input = file_get_contents('php://input');
// var_dump($input);
session_start();
?>
<?php if (isset($_SESSION['admin'])): ?>
<?php

  require_once("../php/Class/Product.php");
  require_once("../php/Class/Marque.php");
  require_once("../php/Class/Categorie.php");
  require_once("../php/Class/Client.php");
  require_once("../php/Class/Sale.php");
  require_once("../php/Class/PrSale.php");
  $active = array(0, 0, 0, 0, 0, 0, 0, 0, "active", 0, 0, 0, 0, 0, 0, 0, 0);
  if (isset($_POST['add'])) {
    extract($_POST);
    // ila deja 3amro inser had purchase ..
    $qty = Product::qtePr($num_pr);
    // print_r($_POST);
    if ($qte_pr < $qty['qte_stock']) {

      if (!sale::isSale($num_com)) {
        $pruchase = new Sale($num_com, $date_com, $id_cli);
        $pruchase->add();
      }
      // echo ("<pre>");
      // print_r($_POST);
      $product_of_sale = new PrSale($num_pr, $num_com, $qte_pr, $prix_vente);
      try {
        $product_of_sale->add();
      } catch (\Throwable $th) {
      }
      Product::deleteQty($num_pr, $qte_pr);
      $prsSales = PrSale::displayPrsSale($num_com);
      $sale = Sale::displaySale($num_com);
    } else {
      $out_of_stock = true;
    }
  }

  // print_r($_POST);
  // print_r($_GET);
  // print_r($_SESSION);

  if (isset($_GET['num_pr'])) {
    extract($_GET);
    PrSale::deletePrSale($num_pr);
    $prsSales = PrSale::displayPrsSale($num_com);
    $sale = Sale::displaySale($num_com);
  }


  if (isset($_GET['num_com'])) {
    extract($_GET);
    $prsSales = PrSale::displayPrsSale($num_com);
    $sale = Sale::displaySale($num_com);
  }

  // $test = $_GET['fname'];
  // var_dump($test);
  // print_r($_COOKIE);
  // if ($_COOKIE['id_brand']) {
  //   # code...
  // }
  $clients = Client::afficher("client");
  $products = Product::afficher("produit");
  // print_r($Products);
  $categories = Categorie::afficher("categorie");
  $brands = Marque::afficher("marque");
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
  <title>New Sales</title>

  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png" />

  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

  <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />

  <link rel="stylesheet" href="assets/css/animate.css" />

  <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css" />

  <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css" />

  <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css" />
  <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

  <link rel="stylesheet" href="assets/css/style.css" />

  <?php if (isset($request_payload)): ?>
  <style>

  </style>
  <?php endif ?>
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
            <h4>New Sales</h4>
            <h6>Create New Sale</h6>
          </div>
        </div>
        <div class="card">
          <form class="card-body" method="post" action="createsalesreturns.php">
            <div class="row">
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Customer Name</label>
                  <div class="row">
                    <div class="col-lg-10 col-sm-10 col-10">
                      <select class="select" name="id_cli">
                        <option>Select Customer</option>
                        <?php foreach ($clients as $client): ?>
                        <option value="<?= $client['id']; ?>" <?php if (!empty($sale)) {
      if ($client['id'] === $sale['id_cli']) {
        echo ("selected");
      }
    } ?>><?= $client['nom'] . " " . $client['prenom']; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                      <div class="add-icon">
                        <a href="./addcustomer.php"><img src="assets/img/icons/plus1.svg" alt="img" /></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Brand Name</label>
                  <div class="row">
                    <div class="col-lg-10 col-sm-10 col-10">
                      <select class="select" name="id_marque" id="brand">
                        <option value="">Select Brand</option>
                        <?php foreach ($brands as $brand): ?>
                        <option value="<?= $brand['id_marque']; ?>"><?= $brand['nom_marque']; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                      <div class="add-icon">
                        <a href="./addbrand.php"><img src="assets/img/icons/plus1.svg" alt="img" /></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Category Name</label>
                  <div class="row">
                    <div class="col-lg-10 col-sm-10 col-10">
                      <select class="select" name="id_cat" id="cat">
                        <option value="">Select Category</option>
                        <?php foreach ($categories as $cat): ?>
                        <option value="<?= $cat['id_cat']; ?>"><?= $cat['lib_cat']; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                      <div class="add-icon">
                        <a href="./addcategory.php">
                          <img src="assets/img/icons/plus1.svg" alt="img" />
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Product Name</label>
                  <div class="row">
                    <div class="col-lg-10 col-sm-10 col-10">
                      <select class="select" name="num_pr">
                        <option>Select Product</option>
                        <?php foreach ($products as $pr): ?>
                        <option value="<?= $pr['num_pr']; ?>"><?= $pr['lib_pr']; ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="col-lg-2 col-sm-2 col-2 ps-0">
                      <div class="add-icon">
                        <a href="./addproduct.php"><img src="assets/img/icons/plus1.svg" alt="img" /></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Quantity</label>
                  <input type="text" name="qte_pr" />
                  <?php if (isset($out_of_stock)): ?>
                  <p style="color:red; text-align: center">Exceed stock</p>
                  <?php endif ?>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Sale Date</label>
                  <div class="input-groupicon">
                    <input type="text" placeholder="DD-MM-YYYY" class="datetimepicker" name="date_com" value="<?php if (!empty($sale)) {
    echo $sale['date_com'];
  } ?>" />
                    <div class="addonset">
                      <img src="assets/img/icons/calendars.svg" alt="img" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Reference No.</label>
                  <input type="text" name="num_com" value="<?php if (!empty($sale)) {
    echo $sale['num_com'];
  } ?>" />
                </div>
              </div>
              <div class="col-lg-3 col-sm-6 col-12">
                <div class="form-group">
                  <label>Price</label>
                  <input type="text" name="prix_vente" />
                </div>
              </div>
            </div>
            <div class="row">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Product Name</th>
                      <th>Price(DH)</th>
                      <th>QTY</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (isset($prsSales)): ?>
                    <?php foreach ($prsSales as $pr): ?>
                    <tr>
                      <td class="productimgname">
                        <a class="product-img">
                          <img src="<?= $pr['pr_image'] ?>" alt="product" />
                        </a>
                        <a href="javascript:void(0);"><?= $pr['lib_pr'] ?></a>
                      </td>
                      <td><?= $pr['prix_vente'] ?></td>
                      <td><?= $pr['qte_pr'] ?></td>
                      <td>
                        <a class=""
                          href="createsalesreturns.php?num_pr=<?= $pr['num_pr'] ?>&amp;num_com=<?= $sale['num_com'] ?>"><img
                            src="assets/img/icons/delete.svg" alt="svg" /></a>
                      </td>
                    </tr>
                    <?php endforeach ?>
                    <?php endif ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-lg-12">
              <button class="btn btn-submit me-2" type="submit" name="add">Add</button>
              <a href="salesreturnlists.php" class="btn btn-cancel">Cancel</a>
            </div>
          </form>
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

  <script src="assets/js/moment.min.js"></script>
  <script src="assets/js/bootstrap-datetimepicker.min.js"></script>

  <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
  <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

  <script src="assets/js/script.js"></script>

</body>

</html>
<?php else: ?>
<?php header("Location: signin.php"); ?>
<?php endif ?>