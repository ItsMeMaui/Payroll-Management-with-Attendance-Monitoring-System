<?php
if (isset($_POST['register'])) {

    $emp_fname = ucwords($_POST['fname']);
    $emp_mname = ucwords($_POST['mname']);
    $emp_lname = ucwords($_POST['lname']);
    $emp_fingerprint = $_POST['fingerprint'];
    $role_id = $_POST['role'];
    $processed_by = $_POST['processed-by'];

    date_default_timezone_set("Asia/Manila");
    $year = date("Y");
    $month = date("m");
    $day = date("d");
    $hour = date("h");
    $minute = date("i");
    $seconds =  date("s");

    $transactionID = $year . $month . $day . $hour . $minute . $seconds;

    $create = "added Employee : " . " " . $emp_fname . " " . $emp_mname . " " . $emp_lname;

    // $transactionID = $year.$month.$day.$hour.$minute.$seconds;

    include "../classes/db.classes.php";
    include "../classes/signup.classes.php";
    include "../controllers/signup.controller.php";

    $signup = new SignupEmpController($emp_fname, $emp_mname, $emp_lname, $emp_fingerprint, $role_id, $processed_by);


    $signup->signup();

    header("location: ../pages/employees.php");
}
if (isset($_POST['position'])) {

    $role_name = $_POST['fname'];
    $role_rate = $_POST['mname'];
    $processed_by = $_POST['processed-by'];


    include "../classes/db.classes.php";
    include "../classes/signup.classes.php";
    include "../controllers/signup.controller.php";

    $addpos = new AddPositionController($role_name, $role_rate, $processed_by);


    $addpos->setPositionHandler();

    header("location: ../pages/positions.php");
}

