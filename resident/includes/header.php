<?php

require './config/function.php';

if (!isset($_SESSION['loggedInUser']['user_id'])) {

  // Redirect if the user is not logged in

  redirect(BASE_URL . '/user/login', 'Please log in to continue...', 'info');

  exit();

} elseif ($_SESSION['loggedInUser']['role'] !== 'resident') {

  // Redirect if the user is not a resident (i.e., if admin or staff)

  header('Location:' . BASE_URL . '/admin/dashboard');

  exit();

}



$user_id = $_SESSION['loggedInUser']['user_id'];

$query = "SELECT * FROM users WHERE id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$row = [];

if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc(); 
} else {
    echo "No data found.";
}

$stmt->close();


?>



<!DOCTYPE html>
<html lang="en">
  <!--begin::Head-->

  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!--begin::Primary Meta Tags-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="icon" href="<?= BASE_URL;?>/assets/img/barangay-logo.png">

    <title><?= isset($GLOBALS['title']) ? $GLOBALS['title'] : ''; ?> | Barangay Bukay Pait</title>

    <!--end::Primary Meta Tags-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"/>

    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(FontAwesome Icons)-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->

    <link rel="stylesheet" href="<?= BASE_URL;?>/assets/css/adminlte.css" />

    <link rel="stylesheet" href="<?= BASE_URL;?>/assets/css/style.css" />

    <!--end::Required Plugin(AdminLTE)-->
    <!-- Google Fonts: Inter -->

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


    <style>
      body{

          font-family: 'Inter var', sans-serif;

      }
    </style>

  <!--end::Head-->
  <!--begin::Body-->
  
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

  <div class="app-wrapper">

  <?php statusMessage();?>

  <?php 
  
    include 'navbar.php';

    include 'sidebar.php';

  ?>


  <main class="app-main">
