<?php

include_once '../header.php';
include_once '../components/navbar.php';
include_once '../components/sidebar.php';
$dbServername = "Localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pmswa";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$get_employees = "SELECT *,DATE_FORMAT(tbl_attendances.created_at, '%M %d, %Y')  as create_updated,DATE_FORMAT(tbl_attendances.attendance_date, '%M %d, %Y') as attendance_date
                FROM tbl_employees
                INNER JOIN tbl_attendances
                ON tbl_employees.emp_id = tbl_attendances.emp_id
                ORDER BY tbl_attendances.created_at DESC;";
$result_employees = mysqli_query($conn, $get_employees);
?>


<div class="p-4 md:ml-64 overflow-y-auto dark:bg-gray-900 h-screen dark:text-white text-black">
    <div class="p-4 border-2 border-gray-200 mt-16 border-dashed rounded-lg dark:border-gray-700">
        <h1 class="text-4xl">Attendance</h1>
        <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

        <div class="w-full p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-1">
                <table class="w-full text-sm text-gray-500 dark:text-black text-center attendance_table">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Employee ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Employee
                            </th>
                            <th scope="col " class="px-6 py-3">
                                Time In
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Time Out
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Attendance Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total Hour
                            </th>
                            <th scope="col" class="hidden">
                                Created At
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($result_employees)) {
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $row['emp_id'] ?></td>
                                <td class="text-center"><?php echo $row['emp_fname'] ?><?php echo ' ' ?><?php echo $row['emp_mname'] ?><?php echo ' ' ?> <?php echo $row['emp_lname'] ?></td>
                                <td class="text-center"><?php echo $row['attendance_timein'] ?></td>
                                <td class="text-center"><?php echo $row['attendance_timeout'] ?></td>
                                <td class="text-center"><?php echo $row['attendance_date'] ?></td>
                                <td class="text-center"><?php echo $row['attendance_hour'] ?></td>
                                <td class="hidden"><?php echo $row['create_updated'] ?></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php

include_once '../footer.php'
?>