<?php

session_start();
$dbServername = "Localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pmswa";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
date_default_timezone_set('Asia/Manila');
$current_date = date("Y-m-d");
$get_employees = "SELECT *, DATE_FORMAT(tbl_attendances.attendance_date, '%M %d, %Y') as attendance_date
                FROM tbl_employees
                INNER JOIN tbl_attendances
                ON tbl_employees.emp_id = tbl_attendances.emp_id
                WHERE tbl_attendances.attendance_date = '$current_date'
                ORDER BY tbl_attendances.created_at DESC;";
$result_employees = mysqli_query($conn, $get_employees);

$current_hour = date('G');
$current_minute = date('i');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />

    <!-- font awesome -->
    <script href="https://kit.fontawesome.com/7102b39166.js" crossorigin="anonymous"></script>

    <!-- datatables.net -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>

    <!-- fonts google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="./admin/style.css">
</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
</style>

<body>

    <div class=" h-screen w-full dark:bg-gray-800 flex  justify-evenly items-center">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border border-gray-900 ">
            <table class="w-full text-sm  text-gray-500 dark:text-gray-400 text-center">
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
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="md:w-[25%] w-[80%] lg:w-[25%] p-6 bg-white border-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 shadow-2xl">
            <form class="flex flex-col gap-5" action="./admin/includes/login.inc.php" method="POST">
                <p class="text-4xl text-center dark:text-white text-black" id="formattedDate"></p>
                <p class="text-3xl text-center dark:text-white text-black font-bold" id="currentTime"></p>
                <?php

                if ($current_hour >= 7 && ($current_hour < 12 || ($current_hour == 12 && $current_minute <= 30))) {
                    echo "<p class='text-4xl text-center dark:text-white text-black'>Good Morning! </p>
                    <p class='text-2xl text-center dark:text-white text-black'>Scan your registered fingerprint</p>";
                } elseif ($current_hour >= 13 && ($current_hour < 18 || ($current_hour == 18 && $current_minute <= 0))) {
                    echo "<p class='text-4xl text-center dark:text-white text-black'>Good Afternoon! </p>
                    <p class='text-2xl text-center dark:text-white text-black'>Scan your registered fingerprint</p>";
                } else {
                    echo "<p class='text-4xl text-center dark:text-white text-black'>Good Evening! </p>
                    <p class='text-2xl text-center dark:text-white text-black'>Sorry, login unavailable now. Open from 7:30am to 6:00pm. </p>";
                }
                ?>
                <!-- <p class="text-2xl text-center dark:text-white text-black">Scan your registered fingerprint</p> -->
                <select name="action" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="time-in" selected>Time In</option>
                    <option value="time-out">Time Out</option>
                </select>
                <input type="text" name="fingerprint" class="block w-full  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Scan Fingerprint">
                <?php
                if (isset($_SESSION['mess'])) {
                    echo $_SESSION['mess'];

                    $dd = date("H:i:s");

                    if ($dd == $_SESSION['expire']) {
                        session_unset();
                    }
                }

                ?>
                <div>
                    <button type="submit" id="submitButton" name="login" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-3 text-center dark:bg-blue-600 dark:focus:ring-blue-800 disabled:opacity-50 disabled:pointer-events-none">
                        Submit
                    </button>

                </div>
            </form>
        </div>
    </div>

</body>



<!-- for the running time, current day, and current date -->
<script type="text/javascript">
    const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    const months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    const currentDate = new Date();
    const dayOfWeek = daysOfWeek[currentDate.getDay()];
    const day = currentDate.getDate();
    const month = months[currentDate.getMonth()];
    const year = currentDate.getFullYear();

    const formattedDate = `${dayOfWeek}, ${month}. ${day < 10 ? '0' : ''}${day}, ${year}`;


    document.getElementById("formattedDate").textContent = formattedDate;

    function updateCurrentTime() {

        const currentDate = new Date();
        const hours = currentDate.getHours();
        const minutes = currentDate.getMinutes();
        const seconds = currentDate.getSeconds();
        const ampm = hours >= 12 ? 'PM' : 'AM';
        const hours12 = hours % 12 || 12;
        const formattedTime = `${hours12 < 10 ? '0' : ''}${hours12}:${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds} ${ampm}`;

        document.getElementById("currentTime").textContent = formattedTime;
    }

    updateCurrentTime();
    setInterval(updateCurrentTime, 1000);
</script>

<!-- disabling login form depends on the time and day -->
<script>
    document.addEventListener("DOMContentLoaded", function() {

        function isSunday() {
            const today = new Date();
            return today.getDay() === 0;
        }


        function isWithinTimeRange() {
            const today = new Date();
            const hours = today.getHours();
            const minutes = today.getMinutes();


            const currentTimeInMinutes = hours * 60 + minutes;
            const startTimeInMinutes = 7 * 60 + 30; // 7:30 AM
            const endTimeInMinutes = 16 * 60 + 30; // 4:30 PM

            return currentTimeInMinutes >= startTimeInMinutes && currentTimeInMinutes <= endTimeInMinutes;
        }

        // Get the submit button element
        const submitButton = document.getElementById("submitButton");

        // Check if it's Sunday or outside the time range
        if (isSunday() || !isWithinTimeRange()) {
            submitButton.disabled = true;
        }
    });
</script>

<!-- tables -->
<script>
    let table = new DataTable('.table');
</script>


<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- fontawesome -->
<script src="https://kit.fontawesome.com/7102b39166.js" crossorigin="anonymous"></script>

<!-- flowbite -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>



</html>