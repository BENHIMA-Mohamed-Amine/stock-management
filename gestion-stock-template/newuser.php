<?php
session_start();
// print_r($_SESSION);
?>
<?php if (isset($_SESSION['admin'])): ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords"
        content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Dreams Pos admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/animate.css">

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <div id="global-loader">
        <div class="whirly-loader"> </div>
    </div>

    <div class="main-wrapper">

        <?php require_once("header.php"); ?>
        <?php require_once("sidebar.php"); ?>


        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="page-title">
                        <h4>Admin</h4>
                        <h6>Ajouter un admin</h6>
                    </div>
                </div>

                <form class="card" method="post" action="./newuser.php">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" name="nom">
                                </div>
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <input type="text" name="adr">
                                </div>
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <div class="form-addons">
                                        <input type="text" name="email" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Prénom</label>
                                    <input type="text" name="prenom">
                                </div>
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input type="text" name="tele">
                                </div>
                                <div class="form-group">
                                    <label>Mot de passe</label>
                                    <div class="pass-group">
                                        <input type="password" class=" pass-inputs" name="tele" value="">
                                        <span class="fas toggle-passworda fa-eye-slash"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label> Profile Picture</label>
                                    <div class="image-upload image-upload-new">
                                        <input type="file">
                                        <div class="image-uploads">
                                            <img src="assets/img/icons/upload.svg" alt="img">
                                            <h4>Drag and drop a file to upload</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <a href="javascript:void(0);" class="btn btn-submit me-2" type="submit"
                                    name="ajouter">Ajouter</a>
                                <a href="javascript:void(0);" class="btn btn-cancel" type="reset">Annuler</a>
                            </div>
                        </div>
                    </div>
                </form>
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