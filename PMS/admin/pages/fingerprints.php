<?php
$pageTitle = "Fingerprints";

include_once '../header.php';
include_once '../components/navbar.php';
include_once '../components/sidebar.php';
$dbServername = "Localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pmswa";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$get_fingerprints = "SELECT *,DATE_FORMAT(tbl_fingerprints.created_at, '%M %d, %Y')  as created_date
				FROM tbl_fingerprints
                ORDER BY tbl_fingerprints.fingerprint_id DESC;";
$result_fingerprints = mysqli_query($conn, $get_fingerprints);
?>


<div class="p-4 md:ml-64 overflow-y-auto dark:bg-gray-900 h-screen dark:text-white text-black">
    <div class="p-4 border-2 border-gray-200 mt-16 border-dashed rounded-lg dark:border-gray-700">
        <nav class="flex" aria-label="Breadcrumb">
          <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
              <a href="employees.php" class="text-2xl md:text-4xl inline-flex items-center  font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                <svg class="w-6 h-6 md:w-8 md:h-8 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                Employees
              </a>
            </li>
            <li aria-current="page">
              <div class="flex items-center">
                <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ml-1 text-2xl md:text-4xl font-medium text-gray-500 md:ml-2 dark:text-gray-400">Fingerprints</span>
              </div>
            </li>
          </ol>
        </nav>
        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-1">
                <table class="w-full text-sm text-gray-500 dark:text-black text-center fingerprints_table">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Fingerprint ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Fingerpint String
                            </th>
                            <th scope="col " class="px-6 py-3">
                                Created At
                            </th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result_fingerprints)) {
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $row['fingerprint_id'] ?></td>
                                <td class="text-center"><?php echo $row['fingerprint_string'] ?></td>
                                <td class="text-center"><?php echo $row['created_date'] ?></td>


                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
	window.setTimeout( function() {
  window.location.reload();
}, 5000);
</script>

<?php

include_once '../footer.php'
?>