<?php
session_start();
// print_r($_SESSION);
?>
<?php if (isset($_SESSION['admin'])):
    require_once("../php/Class/Client.php");
    require_once("../php/Class/Supplier.php");
    require_once("../php/Class/Purchase.php");
    require_once("../php/Class/Sale.php");
    require_once("../php/Class/Product.php");
    $active = array("active", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
    $clients = Client::nbrDesTuples("client");
    $suppliers = Supplier::nbrDesTuples("fournisseur");
    $purchases = Purchase::TotalLigne("approvisionnement");
    $sales = Sale::TotalLigne("commande");
    $products = Product::afficher("produit");
    $almost_expired_products = Product::afficherExepiredPr();
    $all_sales = Sale::topSales();
    $all_purchases = Purchase::displayAllPur();
    $total_all_sales = 0;
    foreach ($all_sales as $item) {
        $total_all_sales += $item['total'];
    }
    $total_all_pur = 0;
    foreach ($all_purchases as $value) {
        $total_all_pur += $value['total'];
    }
    $total_all_pr = 0;
    foreach ($products as $value) {
        $total_all_pr += $value['qte_stock'];
    }
    // print_r($clients); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern,  html5, responsive">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>AMITAM Store</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <div id=" global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <?php require_once("header.php"); ?>
        <?php require_once("sidebar.php"); ?>

        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget">
                            <div class="dash-widgetimg">
                                <span><img src="assets/img/icons/dash1.svg" alt="img"></span>
                            </div>
                            <?php ?>
                            <?php ?>
                            <div class="dash-widgetcontent">
                                <h5><span class="counters" data-count="<?= $total_all_pur ?>"><?= $total_all_pur ?>DH</span></h5>
                                <h6>Total Purchases (DH)</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget dash1">
                            <div class="dash-widgetimg">
                                <span><img src="assets/img/icons/dash2.svg" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5><span class="counters" data-count="<?= $total_all_sales ?>"><?= $total_all_sales ?>DH</span></h5>
                                <h6>Total Sales (DH)</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget dash2">
                            <div class="dash-widgetimg">
                                <span><img src="assets/img/icons/dash3.svg" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5><span class="counters" data-count="<?= $total_all_sales - $total_all_pur ?>"><?= $total_all_sales - $total_all_pur ?>DH</span></h5>
                                <h6>Total Profit (DH)</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="dash-widget dash3">
                            <div class="dash-widgetimg">
                                <span><img src="assets/img/icons/dash4.svg" alt="img"></span>
                            </div>
                            <div class="dash-widgetcontent">
                                <h5><span class="counters" data-count="<?= $total_all_pr ?>"><?= $total_all_pr ?>
                                        DH</span>
                                </h5>
                                <h6>Total Products</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count">
                            <div class="dash-counts">
                                <h4><?= $clients ?></h4>
                                <h5>Customers</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das1">
                            <div class="dash-counts">
                                <h4><?= $suppliers ?></h4>
                                <h5>Suppliers</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="user-check"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das2">
                            <div class="dash-counts">
                                <h4><?= $purchases ?></h4>
                                <h5>Purchase Invoice</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="file-text"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="dash-count das3">
                            <div class="dash-counts">
                                <h4><?= $sales ?></h4>
                                <h5>Sales Invoice</h5>
                            </div>
                            <div class="dash-imgs">
                                <i data-feather="file"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-7 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <h4 class="card-title mb-0" style="padding:15px;">Top 4 Sales</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sale reference</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Grand Total (DH)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i <= 3; $i++): ?>
                                    <tr>
                                        <td><?= $all_sales[$i]['num_com'] ?></td>
                                        <td class="productimgname">
                                            <a href="javascript:void(0);" class="product-img">
                                                <img src="<?= $all_sales[$i]['image'] ?>" alt="product" />
                                            </a>
                                            <a href="javascript:void(0);"><?= $all_sales[$i]['nom'] . " " . $all_sales[$i]['prenom'] ?></a>
                                        </td>
                                        <td><?= $all_sales[$i]['date_com'] ?></td>
                                        <td><?= $all_sales[$i]['total'] ?></td>
                                    </tr>
                                    <?php endfor ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Recently Added Products</h4>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"
                                        class="dropset">
                                        <i class="fa fa-ellipsis-v"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a href="productlist.php" class="dropdown-item">Product List</a>
                                        </li>
                                        <li>
                                            <a href="addproduct.php" class="dropdown-item">Add Product</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive dataview">
                                    <table class="table datatable ">
                                        <thead>
                                            <tr>
                                                <th>Sno</th>
                                                <th>Products</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
    $j = 0;
    for ($i = sizeof($products) - 1; $i >= sizeof($products) - 4; $i--):
        $j++;
                                            ?>
                                            <tr>
                                                <td><?= $j; ?></td>
                                                <td class="productimgname">
                                                    <a href="productlist.php" class="product-img">
                                                        <img src="<?= $products[$i]['pr_image'] ?>" alt="product">
                                                    </a>
                                                    <a href="productlist.php"><?= $products[$i]['lib_pr'] ?></a>
                                                </td>
                                                <td><?= $products[$i]['prix_uni'] ?>DH</td>
                                            </tr>
                                            <?php endfor ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-0">
                    <div class="card-body">
                        <h4 class="card-title">Least Quantity in Stock</h4>
                        <div class="table-responsive dataview">
                            <table class="table datatable ">
                                <thead>
                                    <tr>
                                        <th>SNo</th>
                                        <th>Product Name</th>
                                        <th>Brand Name</th>
                                        <th>Category Name</th>
                                        <th>Purchase price</th>
                                        <th>Remaining quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < 4; $i++): ?>
                                    <tr>
                                        <td><?= $i + 1; ?></td>
                                        <td class="productimgname">
                                            <a class="product-img" href="productlist.php">
                                                <img src="<?= $almost_expired_products[$i]['pr_image'] ?>"
                                                    alt="product">
                                            </a>
                                            <a href="productlist.php"><?= $almost_expired_products[$i]['lib_pr'] ?></a>
                                        </td>
                                        <td><?= $almost_expired_products[$i]['nom_marque'] ?></td>
                                        <td><?= $almost_expired_products[$i]['lib_cat'] ?></td>
                                        <td><?= $almost_expired_products[$i]['prix_achat'] ?></td>
                                        <td><?= $almost_expired_products[$i]['qte_stock'] ?></td>
                                    </tr>
                                    <?php endfor ?>
                                </tbody>
                            </table>
                        </div>
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

    <script src="assets/plugins/apexchart/apexcharts.min.js"></script>
    <script src="assets/plugins/apexchart/chart-data.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>
<?php else: ?>
<?php header("Location: signin.php"); ?>
<?php endif ?>