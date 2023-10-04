<?php
include_once '../header.php';
include_once '../components/navbar.php';
include_once '../components/sidebar.php';


$get_employees = "SELECT *, DATE_FORMAT(tbl_employees.created_at, '%M %d, %Y') as created_date
                FROM tbl_employees
                INNER JOIN tbl_roles
                ON tbl_employees.role_id = tbl_roles.role_id
                ORDER BY tbl_employees.created_at DESC;";
$result_employees = mysqli_query($conn, $get_employees);
?>





<div class="p-4 md:ml-64 overflow-y-auto dark:bg-gray-900 h-screen dark:text-white text-black">
  <div class="p-4 border-2 border-gray-200 mt-16 border-dashed rounded-lg dark:border-gray-700">
    <h1 class="text-4xl">Payroll</h1>
    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">




    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

      <div class="flex flex-col justify-end gap-5">

        <div date-rangepicker class="flex justify-end items-center">
          <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
              </svg>
            </div>
            <input name="start" type="text" id="start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
          </div>
          <span class="mx-4 text-gray-500">to</span>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
              </svg>
            </div>
            <input name="end" type="text" id="end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
          </div>
        </div>
        <div class="flex justify-end gap-5">
          <button id="filter" class="p-3 bg-cyan-800 rounded-lg">Filter</button>
          <button id="reset" class="p-3 bg-red-500 rounded-lg">Reset</button>

        </div>

      </div>


      <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-1">
        <table class="w-full text-sm text-gray-500 dark:text-black text-center" id="records_table">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">
              <th scope="col" class="hidden ">
                Attendance ID
              </th>
              <th scope="col " class="hidden">
                Employee ID
              </th>
              <th scope="col " class="px-6 py-3">
                Employee Name
              </th>
              <th scope="col" class="px-6 py-3">
                Attendance Date
              </th>
              <th scope="col" class="px-6 py-3">
                Time In
              </th>
              <th scope="col " class="px-6 py-3">
                Time Out
              </th>
              <th scope="col" class="px-6 py-3">
                Total Hours
              </th>

            </tr>
          </thead>
        </table>
      </div>
    </div>

  </div>
</div>


<?php

include_once '../footer.php'
?>