<?php
session_start();
require_once("../php/Class/Admin.php");
if (isset($_POST['conectee'])) {
    extract($_POST);
    // recuperer le resultat d'admin authentifier 
    $resultat = Admin::estAdmin($email, $mdp);
    // var_dump($resultat);
    if (isset($resultat['email'])) {
        session_start();
        $_SESSION['admin'] = $resultat;
        echo ("<pre>");
        print_r($_SESSION);
        header("Location: index.php");
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
    <title>AMITAM Store - Login</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <form class="login-userset" method="post" action="./signin.php">
                        <div class="login-logo">
                            <img src="assets/img/logo.png" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>Sign in</h3>
                            <h4>Please login to your account</h4>
                        </div>
                        <div class="form-login">
                            <label>Email</label>
                            <div class="form-addons">
                                <input type="text" placeholder="Enter your email address" name="email">
                                <img src="assets/img/icons/mail.svg" alt="img">
                                <?php if (isset($resultat)): ?>
                                <?php if ($resultat === FAUX_EMAIL): ?>
                                <p style="color:red; text-align: center">Invalid email</p>
                                <?php endif ?>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="form-login">
                            <label>Password</label>
                            <div class="pass-group">
                                <input type="password" class="pass-input" placeholder="Enter your password" name="mdp">
                                <span class="fas toggle-password fa-eye-slash"></span>
                            </div>
                            <div>
                                <?php if (isset($resultat)): ?>
                                <?php if ($resultat === FAUX_MDP): ?>
                                <p style="color:red; text-align: center">Incorrect password</p>
                                <?php endif ?>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="form-login">
                            <button class="btn btn-login" type="submit" name="conectee" value="conectee">Sign
                                in</button>
                        </div>
                    </form>
                </div>
                <div class="login-img">
                    <img src="assets/img/login.jpg" alt="img">
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>