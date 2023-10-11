<?php

$pageTitle = "Employees";

include_once '../header.php';
include_once '../components/navbar.php';
include_once '../components/sidebar.php';

$get_employees = "SELECT * FROM pmswa.tbl_employees ORDER BY emp_id DESC ;";
$result_employees = mysqli_query($conn, $get_employees);

$get_roles = "SELECT * FROM pmswa.tbl_roles;";
$result_roles = mysqli_query($conn, $get_roles);

$get_employees = "SELECT *, DATE_FORMAT(tbl_employees.created_at, '%M %d, %Y') as created_date
                FROM tbl_employees
                INNER JOIN tbl_roles
                ON tbl_employees.role_id = tbl_roles.role_id
                ORDER BY tbl_employees.emp_id DESC;";
$result_employees = mysqli_query($conn, $get_employees);

?>



<div class="block p-4 md:ml-64 overflow-y-auto dark:bg-gray-900 text-black dark:text-white h-screen">
  <div class="p-4 border-2 border-gray-200  mt-16 border-dashed rounded-lg dark:border-gray-700 ">

    <nav class="flex" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <a href="dashboard.php" class="text-4xl inline-flex items-center  font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <svg class="w-8 h-8 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
            </svg>
            Home
          </a>
        </li>
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="ml-1 text-4xl font-medium text-gray-500 md:ml-2 dark:text-gray-400">Deductions</span>
          </div>
        </li>
      </ol>
    </nav>
    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
  </div>
</div>

<?php

include_once '../footer.php';
?>