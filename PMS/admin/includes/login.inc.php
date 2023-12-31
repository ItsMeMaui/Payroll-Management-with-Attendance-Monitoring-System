<?php

session_start();
$dbServername = "Localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pmswa";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
date_default_timezone_set('Asia/Manila');
$time = date("h:i:s");
$today = date("D - F d, Y");
$date = date("Y-m-d");
$in = date("H:i:s");
$out = "00:00:00";


if (isset($_POST['login'])) {
  $_SESSION['expire'] =  date("H:i:s", time() + 1);
  $code = $_POST['action'];

  if ($code == "time-in") {
    $fingerprint = $_POST['fingerprint'];
    if (!empty($fingerprint)) {
      $query = "SELECT *
                FROM tbl_fingerprints 
                INNER JOIN tbl_employees
                WHERE tbl_fingerprints.fingerprint_string = '$fingerprint' and tbl_employees.fingerprint_id = tbl_fingerprints.fingerprint_id";
      $result = mysqli_query($conn, $query);
      if ($row1 = mysqli_fetch_assoc($result)) {
        $emp_id = $row1['emp_id'];
        $sql = "SELECT MAX(a.attendance_timeout) AS last_timeout, a.attendance_id, a.emp_id, a.attendance_timein,a.attendance_date
                FROM tbl_attendances a
                WHERE a.emp_id = $emp_id";
        $check_timeout = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_assoc($check_timeout)) {
          $last_attendance_date = $row['attendance_date'];
          $last_timeout = $row['last_timeout'];
          if ($last_timeout == "00:00:00" && $last_attendance_date != date("Y-m-d")) {
            $last_timeout = '15:00:00';
            $last_timein = $row['attendance_timein'];
            $last_emp_id = $row['emp_id'];
            $last_attendance_id = $row['attendance_id'];

            // Calculate the time duration
            $first = new DateTime($last_timein);
            $second = new DateTime($last_timeout);
            $interval = $first->diff($second);

            // Calculate the hours and minutes difference
            $hrs = $interval->format('%h');
            $mins = $interval->format('%i');
            $mins = $mins / 60;
            $total_hours = $hrs + $mins;
            $update_timeout_sql = "UPDATE tbl_attendances SET attendance_timeout ='$last_timeout', attendance_hour = $total_hours where attendance_id=$last_attendance_id";
            mysqli_query($conn, $update_timeout_sql);
            $insert_deduction = "INSERT INTO tbl_deductions (emp_id) VALUES ($last_emp_id)";
            mysqli_query($conn, $insert_deduction);
            $fname = $row1['emp_fname'];
            $mname = $row1['emp_mname'];
            $lname = $row1['emp_lname'];
            $full = $lname . ', ' . $fname;
            $fullname = $fname . ' ' . $mname . ' ' . $lname;

            $first = new DateTime($in);
            $second = new DateTime($out);
            $interval = $first->diff($second);
            $hrs = $interval->format('%h');
            $mins = $interval->format('%i');
            $mins = $mins / 60;
            $int = 0;
            $sql4 = "INSERT INTO tbl_attendances (emp_id, attendance_date, attendance_timein, attendance_timeout, attendance_hour)
                              VALUES ('$emp_id', '$date', '$in', '$out', '$int')";
            $result3 = mysqli_query($conn, $sql4);
            $_SESSION['mess'] = '<div class="relative z-0">
                  <input disabled type="text" id="standard_error" aria-describedby="standard_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-green-600 appearance-none dark:text-white dark:border-green-500 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " />
                  <label for="standard_error" class="absolute text-sm text-green-600 dark:text-green-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Standard success</label>
              </div>
              <p id="standard_error_help" class="mt-2 text-xs text-green-600 dark:text-green-400"><span class="font-medium"></span> Well done! Time in: ' . $fullname . ' </p>';
            header("Location: ../../index.php");
            exit();
          } else {
            $sql3 = "SELECT * FROM tbl_attendances WHERE emp_id = '$emp_id' AND attendance_date = '$date'";
            $result3 = mysqli_query($conn, $sql3);
            if (!$row2 = $result3->fetch_assoc()) {
              $fname = $row1['emp_fname'];
              $lname = $row1['emp_lname'];
              $full = $lname . ', ' . $fname;
              $fullname = $fname . ' ' . $mname . ' ' . $lname;

              $first = new DateTime($in);
              $second = new DateTime($out);
              $interval = $first->diff($second);
              $hrs = $interval->format('%h');
              $mins = $interval->format('%i');
              $mins = $mins / 60;
              $int = 0;
              $sql4 = "INSERT INTO tbl_attendances (emp_id, attendance_date, attendance_timein, attendance_timeout, attendance_hour)
                              VALUES ('$emp_id', '$date', '$in', '$out', '$int')";
              $result3 = mysqli_query($conn, $sql4);
              $_SESSION['mess'] = '<div class="relative z-0">
                  <input disabled type="text" id="standard_error" aria-describedby="standard_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-green-600 appearance-none dark:text-white dark:border-green-500 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " />
                  <label for="standard_error" class="absolute text-sm text-green-600 dark:text-green-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Standard success</label>
              </div>
              <p id="standard_error_help" class="mt-2 text-xs text-green-600 dark:text-green-400"><span class="font-medium"></span> Well done! Time in: ' . $fullname . ' </p>';
              header("Location: ../../index.php");
              exit();
            } else {
              $_SESSION['mess'] = '<div class="relative z-0">
                <input disabled type="text" id="standard_error" aria-describedby="standard_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-yellow-600 appearance-none dark:text-white dark:border-yellow-500 dark:focus:border-yellow-500 focus:outline-none focus:ring-0 focus:border-yellow-600 peer" placeholder=" " />
                <label for="standard_error" class="absolute text-sm text-yellow-600 dark:text-yellow-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Standard error</label>
                </div>
                <p id="standard_error_help" class="mt-2 text-xs text-yellow-600 dark:text-yellow-400"><span class="font-medium">Opss!</span> You are already timed in!</p>';
              header("Location: ../../index.php");
            }
          }
        }
      } else {
        $_SESSION['mess'] = '<div class="relative z-0">
            <input disabled type="text" id="standard_error" aria-describedby="standard_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-red-600 appearance-none dark:text-white dark:border-red-500 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " />
            <label for="standard_error" class="absolute text-sm text-red-600 dark:text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Standard error</label>
        </div>
        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">Opss!</span> Fingerprint is not registered!</p>';
        header("Location: ../../index.php");
      }
    } else {
      $_SESSION['mess'] = '<div class="relative z-0">
            <input disabled type="text" id="standard_error" aria-describedby="standard_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-red-600 appearance-none dark:text-white dark:border-red-500 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " />
            <label for="standard_error" class="absolute text-sm text-red-600 dark:text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Standard error</label>
        </div>
        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">Opss!</span> Fingerprint is required</p>';
      header("Location: ../../index.php");
    }
  }

  if ($code == "time-out") {

    $fingerprint = $_POST['fingerprint'];
    if (!$fingerprint == "") {
      $sql = "SELECT *
      FROM tbl_fingerprints 
      INNER JOIN tbl_employees
      WHERE tbl_fingerprints.fingerprint_string = '$fingerprint' and tbl_employees.fingerprint_id = tbl_fingerprints.fingerprint_id";;
      $result = mysqli_query($conn, $sql);
      if (!$row = $result->fetch_assoc()) {
        $_SESSION['mess'] = '<div class="relative z-0">
            <input disabled type="text" id="standard_error" aria-describedby="standard_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-red-600 appearance-none dark:text-white dark:border-red-500 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " />
            <label for="standard_error" class="absolute text-sm text-red-600 dark:text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Standard error</label>
        </div>
        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">Opss!</span> Fingerprint is not registered!</p>';
        header("Location: ../../index.php");
      } else {
        $id = $row['emp_id'];
        $sql = "SELECT * FROM tbl_attendances WHERE emp_id = '$id' AND attendance_date = '$date'";
        $result = mysqli_query($conn, $sql);

        if (!$row = $result->fetch_assoc()) {
          $_SESSION['mess'] = '<div class="relative z-0">
            <input disabled type="text" id="standard_error" aria-describedby="standard_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-red-600 appearance-none dark:text-white dark:border-red-500 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " />
            <label for="standard_error" class="absolute text-sm text-red-600 dark:text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Standard error</label>
              </div>
              <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">Oh, snapp!</span> You did not timed in.</p>';
          header("Location: ../../index.php");
        } else {
          $check_timeout = $row['attendance_timeout'];
          if ($check_timeout == '00:00:00') {
            $timein = $row['attendance_timein'];
            $first = new DateTime($timein);
            $second = new DateTime($in);
            $interval = $first->diff($second);
            $hrs = $interval->format('%h');
            $mins = $interval->format('%i');
            $mins = $mins / 60;
            $int = $hrs + $mins;

            if ($int > 4) {
              $int = $int - 1;
            }

            $sql2 = "UPDATE tbl_attendances SET attendance_timeout = '$in', attendance_hour = '$int', created_at = NOW() WHERE emp_id = '$id' AND attendance_date = '$date'";
            $result2 = mysqli_query($conn, $sql2);

            $_SESSION['mess'] =  '<div class="relative z-0">
              <input disabled type="text" id="standard_error" aria-describedby="standard_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-green-600 appearance-none dark:text-white dark:border-green-500 dark:focus:border-green-500 focus:outline-none focus:ring-0 focus:border-green-600 peer" placeholder=" " />
              <label for="standard_error" class="absolute text-sm text-green-600 dark:text-green-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Standard error</label>
              </div>
              <p id="standard_error_help" class="mt-2 text-xs text-green-600 dark:text-green-400"><span class="font-medium">Well done!</span> You are now timed out!</p>';
            header("Location: ../../index.php");
          } else {
            $_SESSION['mess'] =  '<div class="relative z-0">
                <input disabled type="text" id="standard_error" aria-describedby="standard_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-yellow-600 appearance-none dark:text-white dark:border-yellow-500 dark:focus:border-yellow-500 focus:outline-none focus:ring-0 focus:border-yellow-600 peer" placeholder=" " />
                <label for="standard_error" class="absolute text-sm text-yellow-600 dark:text-yellow-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Standard error</label>
                </div>
                <p id="standard_error_help" class="mt-2 text-xs text-yellow-600 dark:text-yellow-400"><span class="font-medium">Opss!</span> You are already timed out!</p>';
            header("Location: ../../index.php");
          }
        }
      }
    } else {
      $_SESSION['mess'] = '<div class="relative z-0">
            <input disabled type="text" id="standard_error" aria-describedby="standard_error_help" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-red-600 appearance-none dark:text-white dark:border-red-500 dark:focus:border-red-500 focus:outline-none focus:ring-0 focus:border-red-600 peer" placeholder=" " />
            <label for="standard_error" class="absolute text-sm text-red-600 dark:text-red-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Standard error</label>
        </div>
        <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">Opss!</span> Fingerprint is required</p>';
      header("Location: ../../index.php");
    }
  }
}


if (isset($_POST['login_admin'])) {
  $user_username = $_POST['username'];
  $user_password = $_POST['password'];


  include "../classes/db.classes.php";
  include "../classes/login.classes.php";
  include "../controllers/login.controller.php";

  $login = new loginController($user_username, $user_password);
  $login->loginUserHandler();


  if (($_SESSION['role_name']) == 'Admin') {
    header("location: ../pages/dashboard.php?error=loginsuccessfully");
  } else {
    header("location: ../index.php?error=asdlkjfasdl;kjf");
  }
}
