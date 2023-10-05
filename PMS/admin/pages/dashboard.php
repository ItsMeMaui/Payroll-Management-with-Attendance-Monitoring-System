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


$sql = "SELECT e.*, r.role_name, COUNT(e.emp_id) AS attendance_count
FROM tbl_employees e
JOIN tbl_attendances a ON e.emp_id = a.emp_id
JOIN tbl_roles r ON e.role_id = r.role_id
WHERE DATE(a.attendance_date) = CURDATE();
";
$get_timed_in = mysqli_query($conn, $sql);

$sql = "SELECT COUNT(*) AS total_employees_not_attended
FROM tbl_employees e
LEFT JOIN tbl_attendances a ON e.emp_id = a.emp_id AND DATE(a.attendance_date) = '2023-09-23'
WHERE a.emp_id IS NULL;
";
$get_not_timed_in = mysqli_query($conn, $sql);

$sql = "SELECT COUNT(emp_id) AS total_employees FROM tbl_employees;";
$get_total_employees = mysqli_query($conn, $sql);

$sql = "SELECT COUNT(role_id) AS total_positions FROM tbl_roles;";
$get_total_positions = mysqli_query($conn, $sql);
?>


<div class="p-4 md:ml-64 overflow-y-auto dark:bg-gray-900 h-screen dark:text-white text-black">
   <div class="p-4 border-2 border-gray-200 mt-16 border-dashed rounded-lg dark:border-gray-700">
      <h1 class="text-4xl">Dashboard</h1>
      <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
      <div class="flex flex-col gap-5">
         <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <p class="text-4xl text-center dark:text-white text-black" id="displayDateDashboard"></p>
            <p class="text-3xl text-center dark:text-white text-black font-bold" id="displayCurrentTimeDashboard"></p>
         </div>
         <div class="md:flex-row flex flex-col justify-between gap-5">
            <div class="w-full flex gap-5 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 items-center">
               <svg class="w-12 h-12 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                  <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
               </svg>
               <div class="flex flex-col justify-center">
                  <?php
                  while ($row = mysqli_fetch_array($get_timed_in)) {
                  ?>
                     <h1 class="text-lg font-bold"><?php echo $row[9] ?> employees</h1>
                  <?php } ?>
                  <h1 class="text-md uppercase">Timed In Today</h1>
               </div>
            </div>
            <div class="w-full flex gap-5 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 items-center">
               <svg class="w-12 h-12 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                  <path d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
               </svg>
               <div class="flex flex-col justify-center">
                  <?php
                  while ($row = mysqli_fetch_array($get_not_timed_in)) {
                  ?>
                     <h1 class="text-lg font-bold"><?php echo $row[0] ?> employees</h1>
                  <?php } ?>
                  <h1 class="text-md uppercase">Not Timed In Today</h1>
               </div>
            </div>
            <div class="w-full flex gap-5 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 items-center">
               <svg class="flex-shrink-0 w-12 h-12 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 640 512">>
                  <path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192h42.7c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0H21.3C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7h42.7C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3H405.3zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352H378.7C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7H154.7c-14.7 0-26.7-11.9-26.7-26.7z" />
               </svg>
               <div class="flex flex-col justify-center">
                  <?php
                  while ($row = mysqli_fetch_array($get_total_employees)) {
                  ?>
                     <h1 class="text-lg font-bold"><?php echo $row[0] ?> employees</h1>
                  <?php } ?>
                  <h1 class="text-md uppercase">Total Employees</h1>
               </div>
            </div>
            <div class="w-full flex gap-5 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 items-center">
               <svg class="flex-shrink-0 w-12 h-12 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512">
                  <path d="M176 56V96H336V56c0-4.4-3.6-8-8-8H184c-4.4 0-8 3.6-8 8zM128 96V56c0-30.9 25.1-56 56-56H328c30.9 0 56 25.1 56 56V96v32V480H128V128 96zM64 96H96V480H64c-35.3 0-64-28.7-64-64V160c0-35.3 28.7-64 64-64zM448 480H416V96h32c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64z" />
               </svg>
               <div class="flex flex-col justify-center">
                  <?php
                  while ($row = mysqli_fetch_array($get_total_positions)) {
                  ?>
                     <h1 class="text-lg font-bold"><?php echo $row[0] ?> positions</h1>
                  <?php } ?>
                  <h1 class="text-md uppercase">Total Position </h1>
               </div>
            </div>
         </div>
         <div class="flex flex-col md:flex-row gap-5">

            <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col gap-5">
               <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Calendar / Holidays</h5>
               <div class="flex justify-center items-center">
                  <div class="relative border border-gray-300 rounded-lg">
                     <iframe src="https://calendar.google.com/calendar/embed?src=en.philippines%23holiday%40group.v.calendar.google.com&ctz=Asia%2FManila" style="border: 0" width="300" height="300" frameborder="0" scrolling="no"></iframe>
                  </div>
               </div>
            </div>
            <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col gap-5">
               <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Events</h5>
               <div class="flex justify-center items-center">
                  <div class="relative border border-gray-300 rounded-lg">

                  </div>
               </div>
            </div>
            <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col gap-5">
               <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Employees</h5>

               <div>
                  <canvas id="donut-chartjs"></canvas>
               </div>
            </div>
         </div>



      </div>
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