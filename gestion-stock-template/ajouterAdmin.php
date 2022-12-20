<?php
if (isset($_POST['ajouter'])) {

    require_once("../php/Class/Admin.php");

    // echo ("<pre>");
    // print_r($_POST);

    extract($_POST);
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "./image/admin/" . $filename;

    if (move_uploaded_file($tempname, $folder)) {
        $nv_admin = new Admin($nom, $prenom, $adr, $tele, $email, $folder, $mdp);
        $nv_admin->AjouterAdmin("Admin");
    } else {
        exit("<h3> Failed to upload image!</h3>");
    }
    header("Location: newuser.php");
}