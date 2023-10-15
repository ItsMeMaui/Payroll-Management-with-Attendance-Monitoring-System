<?php

$pageTitle = "Employees";

include_once '../header.php';
include_once '../components/navbar.php';
include_once '../components/sidebar.php';


$get_employees = "SELECT * FROM pmswa.tbl_employees ORDER BY emp_id DESC ;";
$result_employees = mysqli_query($conn, $get_employees);

$get_roles = "SELECT * FROM pmswa.tbl_roles;";
$result_roles = mysqli_query($conn, $get_roles);

$get_employees = "SELECT *, DATE_FORMAT(tbl_employees.created_at, '%M %d, %Y') as created_date, tbl_employees.processed_by as emp_processed_by FROM tbl_employees 
                INNER JOIN tbl_roles ON tbl_employees.role_id = tbl_roles.role_id 
                INNER JOIN tbl_fingerprints ON tbl_fingerprints.fingerprint_id = tbl_employees.fingerprint_id ORDER BY tbl_employees.emp_id DESC;";
$result_employees = mysqli_query($conn, $get_employees);
$get_fingerprints = "SELECT *, DATE_FORMAT(tbl_fingerprints.created_at, '%M %d, %Y %H:%i:%s') as created_date FROM pmswa.tbl_fingerprints;";
$result_fingerprints = mysqli_query($conn, $get_fingerprints);


?>



<div class="block p-4 md:ml-64 overflow-y-auto dark:bg-gray-900 text-black dark:text-white h-screen">
  <div class="p-4 border-2 border-gray-200  mt-16 border-dashed rounded-lg dark:border-gray-700 ">

    <nav class="flex" aria-label="Breadcrumb">
      <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
          <a href="dashboard.php" class="text-3xl md:text-4xl inline-flex items-center  font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <svg class="w-6 h-6 md:w-8 md:h-8 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
            </svg>
            Home
          </a>
        </li>
        <li aria-current="page">
          <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ml-1 text-3xl md:text-4xl font-medium text-gray-500 md:ml-2 dark:text-gray-400">Employees</span>
          </div>
        </li>
      </ol>
    </nav>
    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

    <!-- Modal toggle -->
    <div class="flex justify-end mb-5">
      <button data-modal-target="staticModal" data-modal-toggle="staticModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Add Employee
      </button>

    </div>



    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-1">
        <table class="w-full text-sm text-gray-500 dark:text-black text-center" id="employees_table">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                Employee ID
              </th>
              <th scope="col" class="hidden">
                First Name
              </th>
              <th scope="col" class="hidden">
                Middle Name
              </th>
              <th scope="col" class="hidden">
                Last Name
              </th>
              <th scope="col" class="px-6 py-3">
                Employee
              </th>
              <th scope="col" class="px-6 py-3">
                Status
              </th>
              <th scope="col " class="hidden">
                Role ID
              </th>
              <th scope="col " class="px-6 py-3">
                Role
              </th>
              <th scope="col" class="hidden">
                Fingerprint
              </th>
              <th scope="col" class="px-6 py-3">
                Processed By
              </th>
              <th scope="col" class="px-6 py-3">
                Created At
              </th>
              <th scope="col" class="hidden">
                Image
              </th>
              <th scope="col" class="hidden">
                Gender
              </th>
              <th scope="col" class="hidden">
                Date of Birth
              </th>
              <th scope="col" class="px-6 py-3">
                Action
              </th>

            </tr>
          </thead>

          <tbody>
            <?php
            while ($row = mysqli_fetch_array($result_employees)) {
            ?>
              <tr>
                <td class="text-center"><?php echo $row['emp_id'] ?></td>
                <td class="hidden"><?php echo $row['emp_fname'] ?></td>
                <td class="hidden"><?php echo $row['emp_mname'] ?></td>
                <td class="hidden"><?php echo $row['emp_lname'] ?></td>
                <td class="text-center"><?php echo $row['emp_fname'] ?> <?php echo " " ?><?php echo $row['emp_mname'] ?><?php echo " " ?><?php echo " " ?><?php echo $row['emp_lname'] ?></td>
                <td class="text-center"><?php echo $row['emp_status'] ?></td>
                <td class="hidden"><?php echo $row['role_id'] ?></td>
                <td class="text-center"><?php echo $row['role_name'] ?></td>
                <td class="hidden"><?php echo $row['fingerprint_string'] ?></td>
                <td class="text-center"><?php echo $row['emp_processed_by'] ?></td>
                <td class="text-center"><?php echo $row['created_date'] ?></td>
                <td class="hidden"><?php echo $row['emp_image'] ?></td>
                <td class="hidden"><?php echo $row['emp_gender'] ?></td>
                <td class="hidden"><?php echo $row['emp_dateofbirth'] ?></td>
                <td class="text-center">
                  <div class="row flex items-center text-center justify-center">
                    <div class="flex gap-2">
                      <button data-modal-target="viewEmployeeModalID" data-modal-toggle="viewEmployeeModalID" class="block text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 viewempbtnclass" type="button">
                        View
                      </button>
                      <button data-modal-target="editEmployeeModalID" data-modal-toggle="editEmployeeModalID" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 editempbtnclass " type="button">
                        Edit
                      </button>
                    </div>
                  </div>
                </td>
              </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<?php
include '../components/modals/addemployee.php';
include '../components/modals/editemployee.php';
include '../components/modals/viewemployee.php';
include_once '../footer.php';
?>