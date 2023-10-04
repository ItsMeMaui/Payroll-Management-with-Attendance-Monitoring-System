<?php
include_once '../header.php';
include_once '../components/navbar.php';
include_once '../components/sidebar.php';



$get_users = "SELECT *, 
		        DATE_FORMAT(tbl_users.created_at, '%M %d, %Y') as created_date,
		        tbl_roles.role_name as employee_role
				FROM tbl_employees
				INNER JOIN tbl_users ON tbl_employees.emp_id = tbl_users.emp_id
				INNER JOIN tbl_roles ON tbl_employees.role_id = tbl_roles.role_id
				WHERE tbl_employees.role_id = 1 OR tbl_roles.role_name = 'admin|Admin'
				ORDER BY tbl_employees.created_at DESC;";
$result_users = mysqli_query($conn, $get_users);


$get_employees = "SELECT *, DATE_FORMAT(tbl_employees.created_at, '%M %d, %Y') as created_date
              FROM tbl_employees
              INNER JOIN tbl_roles ON tbl_employees.role_id = tbl_roles.role_id
              LEFT JOIN tbl_users ON tbl_employees.emp_id = tbl_users.emp_id
              WHERE tbl_employees.role_id = 1 AND role_name = 'admin' AND tbl_users.emp_id IS NULL
              ORDER BY tbl_employees.created_at DESC;
";
$result_employees = mysqli_query($conn, $get_employees);
?>

<style>
  @media (prefers-color-scheme: dark) {
    div.dataTables_wrapper {
      color: white !important;
    }

    div.dataTables_info {
      color: white !important;
    }

    .dataTables_length label {
      color: white !important;
    }
    .dataTables_filter  {
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
    .dataTables_filter  {
      padding: 10px;

    }
    .dataTables_length{
      padding: padding: 10px;;
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

<div class="p-4 md:ml-64 overflow-y-auto dark:bg-gray-900 text-black dark:text-white h-screen">
  <div class="p-4 border-2 border-gray-200  mt-16 border-dashed rounded-lg dark:border-gray-700 ">

    <h1 class="text-4xl">Users</h1>
    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

    <!-- Modal toggle -->
    <div class="flex justify-end mb-5">
      <button data-modal-target="adduserModalID" data-modal-toggle="adduserModalID" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Add User
      </button>
    </div>



    <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-1">
        <table class="w-full text-sm text-gray-500 dark:text-black text-center users_table">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                Employee ID
              </th>
              <th scope="col" class="px-6 py-3">
                Employee
              </th>
              <th scope="col" class="px-6 py-3">
                Username
              </th>
              <th scope="col" class="hidden">
                Username
              </th>
              <th scope="col" class="px-6 py-3">
                Processed By
              </th>
              <th scope="col" class="px-6 py-3">
                Created At
              </th>
              <th scope="col" class="px-6 py-3">
                Action
              </th>
            </tr>
          </thead>

          <tbody>
            <?php
            while ($row = mysqli_fetch_array($result_users)) {
            ?>
              <tr>
                <td class="text-center"><?php echo $row['emp_id'] ?></td>
                <td class="text-center"><?php echo $row['emp_fname'] ?> <?php echo " " ?><?php echo $row['emp_mname'] ?><?php echo " " ?><?php echo " " ?><?php echo $row['emp_lname'] ?></td>
                <td class="text-center"><?php echo $row['emp_username'] ?></td>
                <td class="hidden"><?php echo $row['emp_password'] ?></td>
                <td class="text-center"><?php echo $row['processed_by'] ?></td>
                <td class="text-center"><?php echo $row['created_date'] ?></td>
                <td class="text-center">
                  <div class="row flex items-center text-center justify-center">
                    <div class="col-6 ">
                      <button data-modal-target="editUserModal" data-modal-toggle="editUserModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 edituserbtnclass" type="button">
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
include_once '../components/modals/adduser.php';
include_once '../components/modals/edituser.php';

include_once '../footer.php';
?>