<?php 

  require './config/function.php';

  if (isset($_SESSION['loggedInUser']['user_id'])) {
      header('Location:' . BASE_URL . '/user/dashboard');
  } 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?= BASE_URL;?>/assets/img/barangay-logo.png">

    <title><?= isset($GLOBALS['title']) ? $GLOBALS['title'] : ''; ?> | Barangay Bukay Pait</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <link rel="stylesheet" href="<?= BASE_URL;?>/assets/css/style.css">


  </head>

  <style>

    body{
      font-family: 'Inter var', sans-serif;
    }

    .same-height {
        height: calc(2.25rem + 20px);
    }

  </style>

  <body>

  
   