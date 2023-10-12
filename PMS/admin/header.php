<?php

session_start();
if (($_SESSION['role_name']) == 'Admin') {
} else {
  header("location: ../index.php?error=loginrequired");
}


$dbServername = "Localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pmswa";
$session_user_id = $_SESSION['emp_id'];
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


?>

<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>

    <!-- Bootstrap 5 CSS and JavaScript CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>

    <!-- DataTables CSS and JavaScript CDN -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- Flowbite CSS and JavaScript CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <!-- Flowbite CSS and JavaScript CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>

    <!-- Flowbite Datepicker CSS and JavaScript CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

  <!-- own stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
        }

    @media (prefers-color-scheme: dark) {

      div.dataTables_wrapper,
      div.dataTables_info,
      .dataTables_length label,
      .dataTables_filter,
      .dataTables_filter label,
      .paginate_button a,
      .paging_simple_numbers span {
        color: white !important;
      }

      div.dataTables_paginate.paging_simple_numbers span a.paginate_button {
        color: white !important;
      }

      div.dataTables_paginate.paging_simple_numbers span a.paginate_button.current {
        color: black !important;

      }

      #DataTables_Table_0_filter {
        margin-bottom: 10px;
      }

      #employees_table_filter {
        margin-bottom: 10px;
      }

      #DataTables_Table_0_previous {
        color: white !important;
      }

      #DataTables_Table_0_next {
        color: white !important;

      }

      #employees_table_previous {
        color: white !important;

      }

      #employees_table_next {
        color: white !important;
      }

      #employees_table_paginate span a.paginate_button.current {
        color: black !important;
      }

      #employees_table_paginate span a.paginate_button {
        color: white !important;
      }

      #employees_table td,
      #employees_table thead tr th {
        color: white !import;
      }

      #employees_table_previous {
        color: white !important;

      }

      #employees_table_next {
        color: white !important;
      }

      #employees_table_paginate span a.paginate_button.current {
        color: black !important;
      }

      #employees_table_paginate span a.paginate_button {
        color: white !important;
      }

      #employees_table td,
      #employees_table thead tr th {
        color: white !import;
      }

      .dataTables_length select {
        width: 60px;

      }

      .dataTables_length select option {
        width: 60px;
        color: black !important;
      }

      .dataTable thead tr th{ 
        justify-content: center;
        text-align: center;
        color: white !important;

      }
      .dark-mode .text-dark-mode-light {
        color: white;
      }

    }

    @media (prefers-color-scheme: light) {

      div.dataTables_wrapper,
      div.dataTables_info,
      .dataTables_filter {
        color: black !important;
      }

      .dataTables_length,
      .dataTables_length label,
      .dataTables_filter label,
      .dataTables_paginate a,
      .dataTables_length select {
        color: black !important;
      }

      .dataTables_filter {
        padding: 10px;
      }

      .dataTables_length {
        padding: 10px;
      }

      .dataTables_length select {
        width: 60px;

      }
      .dataTable thead tr th{ 
        justify-content: center;
        text-align: center;

      }
    }
  </style>


</head>

<body>

<?php
  include_once 'components/modals/errors.php';
  
?>
