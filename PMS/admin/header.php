<?php

session_start();
if (($_SESSION['role_name']) == 'Admin') {
} else {
  header("location: ../index.php?error=loginrequired");
}

include_once '../components/modals/errors.php';

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



  <!-- font awesome -->
  <script href="https://kit.fontawesome.com/7102b39166.js" crossorigin="anonymous"></script>

  <!-- flowbite -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>


  <!-- Include Flowbite Modal CSS and JavaScript via CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flowbite@1.1.0/dist/flowbite.css">
  <script src="https://cdn.jsdelivr.net/npm/flowbite@1.1.0/dist/flowbite.js"></script>


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  <!-- fonts google -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <!-- own stylesheet -->
  <link rel="stylesheet" href="./style.css">

  <!-- datatables.net -->
  <link href="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>


  <title>Document</title>

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
        width: 50px;

      }

      .dataTables_length select option {
        width: 50px;
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
        width: 50px;
      }
      .dataTable thead tr th{ 
        justify-content: center;
        text-align: center;

      }
    }
  </style>
</head>

<body>

  <div id="modalmoulomo" class="fixed inset-x-0 top-0 flex items-center justify-center z-50 hidden">
    <div class="modal-container w-full md:max-w-md mx-auto mt-10 p-6 rounded ">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600 ">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white modal-header">

          </h3>
          <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modalmoulomo">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-6 space-y-6 modal-body">
        </div>
      </div>
    </div>
  </div>