<?php

require './config/function.php';


if (!isset($_SESSION['loggedInUser']['user_id'])) {

  // Redirect if the user is not logged in
  redirect(BASE_URL . '/user/login', 'Please log in to continue...', 'info');
  exit();

} elseif ($_SESSION['loggedInUser']['role'] !== 'admin' && $_SESSION['loggedInUser']['role'] !== 'staff') {

  // Redirect if the user is not an admin or staff
  header('Location:' . BASE_URL . '/user/dashboard');
  exit();

}

$adminRole = '';

if (isset($_SESSION['loggedInUser']) && isset($_SESSION['loggedInUser']['role'])) {

    if ($_SESSION['loggedInUser']['role'] === 'admin') {

        $adminRole = 'Administrator';

    } elseif ($_SESSION['loggedInUser']['role'] === 'staff') {

        $adminRole = 'Barangay Staff';

    }

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

    <title><?= isset($GLOBALS['title']) ? $GLOBALS['title'] : ''; ?> | Barangay System</title>

    <!--end::Primary Meta Tags-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"/>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

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

      /* Add gap between 'Search' label and input */
      .dataTables_wrapper .dataTables_filter label {
        display: flex;
        align-items: center;
        gap: 10px;  /* Adjust the gap as needed */
      }

      /* Reduce the size of the sorting arrows */
      table.dataTable thead .sorting:before,
      table.dataTable thead .sorting:after,
      table.dataTable thead .sorting_asc:before,
      table.dataTable thead .sorting_asc:after,
      table.dataTable thead .sorting_desc:before,
      table.dataTable thead .sorting_desc:after {
          /* Adjust this value to make arrows smaller or larger */
          top: 10px; /* Adjust vertical positioning */
      }


      
      .dataTables_wrapper .dataTables_length, 
      .dataTables_wrapper .dataTables_filter {
        margin-bottom: 25px;  /* Adjust this value as needed */
      }


      .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background-color: #007bff !important;
        color: white !important;
        font-size: 12px;
      }

      /* Add margin-top to "Showing entries" and pagination */
      .dataTables_wrapper .dataTables_info,
      .dataTables_wrapper .dataTables_paginate {
        margin-top: 25px;  /* Adjust the value as needed */
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
