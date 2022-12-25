<?php
session_start();
?>
<?php if (isset($_SESSION['admin'])): ?>
<?php
    require_once("../php/Class/Admin.php");
    $admins = Admin::afficher("admin");

    if (isset($_POST['submit_data'])) {
        extract($_POST);
        Admin::modifierAdmin($id, $nom, $prenom, $adr, $tele, $email, $mdp, "admin");
        // changer le valeurs de la session par les nouvelles valeurs
        $_SESSION['admin'] = Admin::estAdmin($email, $mdp);
        // echo ("<pre>");
        // print_r($_POST);
    }

    if (isset($_POST['submit_image'])) {
        // echo ("<pre>");
        // print_r($_POST);

        extract($_POST);
        // kan cheki wach besa7 dar bedel image 3ad ndir mofification sinn kankheliha kifma howa
        if (!($_FILES["image"]["name"] === "")) {
            $filename = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $new_image = "./image/admin/" . $filename;
            // recuper l' ancienne image
            $old_image = $_SESSION['admin']['image'];

            if (move_uploaded_file($tempname, $new_image)) {
                Admin::modifierImageAdmin($id, $new_image);
            } else {
                exit("<h3> Failed to update image!</h3>");
            }
            // supprimer l' ancienne image
            if (!unlink($old_image)) {
                exit("<h3> Failed to delete image!</h3>");
            }

            // changer le valeurs de la session par les nouvelles valeurs
            $_SESSION['admin'] = Admin::estAdmin($_SESSION['admin']['email'], $_SESSION['admin']['mdp']);
        }
    }

?>
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
    <title>My Profile</title>

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
                        <h4>My Profile</h4>
                        <h6>Admin Profile</h6>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form class="profile-set" method="post" action="profile.php" enctype="multipart/form-data">
                            <div class="profile-head">
                            </div>
                            <div class="profile-top">
                                <div class="profile-content">
                                    <div class="profile-contentimg">
                                        <img src="<?= $_SESSION['admin']['image'] ?>" alt="img" id="blah">
                                        <div class="profileupload">
                                            <input type="hidden" value="<?= $_SESSION['admin']['id'] ?>" name="id">
                                            <input type="file" id="imgInp" name="image"
                                                value="<?= $_SESSION['admin']['image'] ?>">
                                            <a href="javascript:void(0);">
                                                <img src="assets/img/icons/edit-set.svg" alt="img">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="profile-contentname">
                                        <h2>
                                            <?= $_SESSION['admin']['prenom'] . " " . $_SESSION['admin']['nom'] ?>
                                        </h2>
                                        <h4>Updates Your Photo and Personal Details.</h4>
                                    </div>
                                </div>
                                <div class="ms-auto">
                                    <button class="btn btn-submit me-2" type="submit"
                                        name="submit_image">Update</button>
                                    <button class="btn btn-cancel" type="reset" onclick="cancelPhoto()">Cancel</button>
                                    <script>
                                        function cancelPhoto() {
                                            window.location.reload();
                                        }
                                    </script>
                                </div>
                            </div>
                        </form>
                        <form class="row" method="post" action="profile.php">
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="hidden" value="<?= $_SESSION['admin']['id'] ?>" name="id">
                                    <input type="text" placeholder="William" value="<?= $_SESSION['admin']['prenom'] ?>"
                                        name="prenom">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" placeholder="Castilo" value="<?= $_SESSION['admin']['nom'] ?>"
                                        name="nom">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" placeholder="william@example.com"
                                        value="<?= $_SESSION['admin']['email'] ?>" name="email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="pass-group">
                                        <input type="password" class=" pass-input"
                                            value="<?= $_SESSION['admin']['mdp'] ?>" name="mdp">
                                        <span class="fas toggle-password fa-eye-slash"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" placeholder="+212 766032618"
                                        value="<?= $_SESSION['admin']['tele'] ?>" name="tele">
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="form-group">
                                    <label>
                                        Adress
                                    </label>
                                    <input type="text" placeholder=" Robert Robertson, 1234 NW Bobcat Lane"
                                        value="<?= $_SESSION['admin']['adr'] ?> " name="adr">
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-submit me-2" type="submit" name="submit_data">Update</button>
                                <button class="btn btn-cancel" type="reset">Cancel</button>
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