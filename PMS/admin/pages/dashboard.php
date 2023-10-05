<?php
include_once '../header.php';
include_once '../components/navbar.php';
include_once '../components/sidebar.php';



$sql = "SELECT r.role_name, COUNT(e.emp_id) AS total_employees 
FROM tbl_employees e
INNER JOIN tbl_roles r ON r.role_id = e.role_id 
GROUP BY r.role_id";
$donut_values = $conn->query($sql);
$donut_values_json = json_encode($donut_values);
// Initialize an empty array for the data
$donut_array = array();

// Loop through the query results and populate the data array
while ($row = $donut_values->fetch_assoc()) {
   $role_name = $row['role_name'];
   $total_employees = $row['total_employees'];
   $donut_array[$role_name] = $total_employees;
}

?>





<div class="p-4 md:ml-64 overflow-y-auto dark:bg-gray-900 h-screen dark:text-white text-black">
   <div class="p-4 border-2 border-gray-200 mt-16 border-dashed rounded-lg dark:border-gray-700">
      <h1 class="text-4xl">Analytics Dashboard</h1>
      <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

      <div class="grid grid-cols-3 gap-5">

            <canvas id="donut-chartjs"></canvas>

         
            <div id="datetimepicker-dashboard"></div>
  

      </div>
      <!-- <div class="row-span-3 w-[75%] p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <div id="datetimepicker-dashboard"></div>
      </div>
      <div class="grid grid-rows-3 grid-flow-col gap-4">
         <div class="row-span-3 w-[75%] p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <canvas id="donut-chartjs"></canvas>
         </div>
         <div class="col-span-2 ...">
            <div id="datetimepicker-dashboard"></div>
         </div>
         <div class="row-span-2 col-span-2 ...">03</div>
      </div> -->
   </div>
</div>




<?php

include_once '../footer.php'
?>