<?php


include_once './components/modals/errors.php';

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
  <div class=" h-screen w-full dark:bg-gray-800 flex flex-col justify-center items-center">

    <div class="md:w-[25%] w-[80%] lg:w-[25%] p-6 bg-white border-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 shadow-2xl">

      <img class="my-5 h-auto max-w-full p-6" src="./images/MRFLOGO.png">

      <form class="flex flex-col gap-5" method="POST" action="./includes/login.inc.php">
        <div>
          <div class="mb-6">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your username</label>
            <input type="text" id="email" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
          </div>
          <div class="mb-6">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
          </div>
        </div>

        <div>
          <button type="submit" name="login_admin" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full  px-5 py-3 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>

      </form>
    </div>
  </div>

</body>

</html>