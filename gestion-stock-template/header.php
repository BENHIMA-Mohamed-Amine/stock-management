<?php
session_start();
if (isset($_GET['id'])) {
    require_once("../php/Class/Admin.php");
    extract($_GET);
    Admin::supprimer($id, "admin");
    header("location: logout.php");
}
?>

<div class="header">

    <div class="header-left active">
        <a href="index.php" class="logo">
            <img src="assets/img/logo.png" alt="">
        </a>
        <a href="index.php" class="logo-small">
            <img src="assets/img/logo-small.png" alt="">
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
        </a>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <ul class="nav user-menu">
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img src="<?= $_SESSION['admin']['image'] ?>" alt="">
                    <span class="status online"></span>
                </span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        <span class="user-img">
                            <img src="<?= $_SESSION['admin']['image'] ?>" alt="">
                            <span class="status online"></span>
                        </span>
                        <div class="profilesets">
                            <h6>
                                <?= $_SESSION['admin']['nom'] . " " . $_SESSION['admin']['prenom'] ?>
                            </h6>
                            <h5>Admin</h5>
                        </div>
                    </div>
                    <hr class="m-0">
                    <a class="dropdown-item" href="profile.php"> <i class="me-2" data-feather="user"></i> My
                        Profile</a>
                    <hr class="m-0">
                    <a class="dropdown-item logout pb-0" href="header.php?id=<?= $_SESSION['admin']['id'] ?>">
                        <img style="width:20px;" src="assets/img/icons/delete.svg" -->
                        <class="me-2" alt="img">
                            Delete my account
                    </a>
                    <a class="dropdown-item logout pb-0" href="logout.php">
                        <img src="assets/img/icons/log-out.svg" -->
                        <class="me-2" alt="img">
                            Logout
                    </a>
                </div>
            </div>
        </li>
    </ul>


    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
            aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.html">My Profile</a>
            <a class="dropdown-item" href="signin.php">Logout</a>
        </div>
    </div>

</div>