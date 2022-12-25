<?php
// error_reporting(0);

session_start();
// header('Content-Type: application/json, charset=UTF-8');

$request_payload = file_get_contents('php://input');

echo ($request_payload);


// $_SESSION['choix'] = $request_payload;


// header('location : createsalesreturns.php');

// echo ("<pre>");
// print_r($_POST);
// $test = $_GET['fname'];
// var_dump($test)
// $msg = "";

// // If upload button is clicked ...
// if (isset($_POST['upload'])) {

//     $filename = $_FILES["uploadfile"]["name"];
//     $tempname = $_FILES["uploadfile"]["tmp_name"];
//     $folder = "./image/" . $filename;

//     echo ("<pre>");
//     print_r($_FILES);

//     echo ($folder);
//     echo ("<br>" . $tempname);
//     echo ("<br>" . $filename);

//     $db = mysqli_connect("localhost", "root", "", "test");

//     // Get all the submitted data from the form
//     $sql = "INSERT INTO image (filename) VALUES ('$filename')";

//     // Execute query
//     mysqli_query($db, $sql);

//     // Now let's move the uploaded image into the folder: image
//     if (move_uploaded_file($tempname, $folder)) {
//         echo "<h3> Image uploaded successfully!</h3>";
//     } else {
//         echo "<h3> Failed to upload image!</h3>";
//     }
// }
