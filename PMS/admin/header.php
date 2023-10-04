<?php
$dbServername = "Localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pmswa";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./style.css">


    <!-- font awesome -->
    <script href="https://kit.fontawesome.com/7102b39166.js" crossorigin="anonymous"></script>

    <!-- flowbite -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>

    <!-- datatables.net -->
    <link href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <title>Document</title>


<style>
  @media (prefers-color-scheme: dark) {
    div.dataTables_wrapper {
      color: white !important;
    }

    div.dataTables_info {
      color: white !important;
    }

    .dataTables_length {
      padding: 10px;
      ;
    }

    .dataTables_length label {
      color: white !important;
    }

    .dataTables_filter {
      padding: 10px;
      color: white !important;
    }

    .dataTables_filter label {
      color: white !important;
    }

    .dataTables_paginate a {
      color: white !important;
    }

    /* Default text color for light mode */
    .text-dark-mode-light {
      color: black;
    }

    /* Text color for dark mode */
    .dark-mode .text-dark-mode-light {
      color: white;
    }
  }

  @media (prefers-color-scheme: light) {
    div.dataTables_wrapper {
      color: black !important;
    }

    div.dataTables_info {
      color: black !important;
    }

    .dataTables_filter {
      padding: 10px;

    }

    .dataTables_length {
      padding: 10px;
      ;
    }

    .dataTables_length label {
      color: black !important;
    }

    .dataTables_filter label {
      color: black !important;
    }

    .dataTables_paginate a {
      color: black !important;
    }

    /* Default text color for light mode */
    .text-dark-mode-light {
      color: black;
    }

    /* Text color for dark mode */
    .dark-mode .text-dark-mode-light {
      color: black;
    }
  }
</style>
</head>

<body>