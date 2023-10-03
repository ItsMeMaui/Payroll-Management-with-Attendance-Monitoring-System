<?php
include_once '../header.php';
include_once '../components/navbar.php';
include_once '../components/sidebar.php';

$dbServername = "Localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pmswa";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$get_roles = "SELECT *, DATE_FORMAT(tbl_roles.created_at, '%M %d, %Y') as created_date
                FROM tbl_roles
                ORDER BY tbl_roles.created_at DESC;";
$result_roles = mysqli_query($conn, $get_roles);

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

      <h1 class="text-4xl">Positions</h1>
      <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

    <!-- Modal toggle -->
    <div class="flex justify-end mb-5">
      <button data-modal-target="addposition" data-modal-toggle="addposition" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Add Position
      </button>
    </div>

      <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
         <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-1">
            <table class="w-full text-sm text-gray-500 dark:text-black text-center roles_table ">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    Role ID
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Role
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Role Rate
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
                while ($row = mysqli_fetch_array($result_roles)) {
                ?>
                  <tr>
                     <td class="text-center"><?php echo $row['role_id'] ?></td>
                     <td class="text-center"><?php echo ucwords($row['role_name']) ?></td>
                     <td class="text-center"><?php echo $row['role_rate'] ?></td>
                     <td class="text-center"><?php echo $row['created_date'] ?></td>
                     <td class="text-center">
                        <div class="row flex items-center text-center justify-center">
                          <div class="col-6 ">
                            <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 editrolebtnclass" type="button">
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
include_once '../components/modals/addposition.php';
include_once '../footer.php';
?>