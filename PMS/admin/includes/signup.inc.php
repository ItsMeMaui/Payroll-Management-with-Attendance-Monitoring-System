<?php
if (isset($_POST['register_employee'])) {

    $emp_fname = ucwords($_POST['fname']);
    $emp_mname = ucwords($_POST['mname']);
    $emp_lname = ucwords($_POST['lname']);
    $emp_fingerprint = $_POST['fingerprint'];
    $role_id = $_POST['role'];
    $processed_by = $_POST['processed-by'];


    include "../classes/db.classes.php";
    include "../classes/signup.classes.php";
    include "../controllers/signup.controller.php";

    $signup = new SignupEmpController($emp_fname, $emp_mname, $emp_lname, $emp_fingerprint, $role_id, $processed_by);


    $signup->signupemphandler();

    header("location: ../pages/employees.php");
}

if (isset($_POST['register_user'])) {
    $emp_id = $_POST['emp_id'];
    $emp_username = $_POST['emp_username'];
    $emp_password = $_POST['emp_password'];
    $processed_by = $_POST['processed-by'];

    include "../classes/db.classes.php";
    include "../classes/signup.classes.php";
    include "../controllers/signup.controller.php";

    $signup = new SignupUserController($emp_id, $emp_username, $emp_password, $processed_by);


    $signup->signupuserhandler();

    header("location: ../pages/users.php");
}



if (isset($_POST['position'])) {

    $role_name = $_POST['position_name'];
    $role_rate = $_POST['position_rate'];
    $role_rate_per_hour = $role_rate/8;

    $processed_by = $_POST['processed-by'];


    include "../classes/db.classes.php";
    include "../classes/signup.classes.php";
    include "../controllers/signup.controller.php";

    $addpos = new AddPositionController($role_name, $role_rate,$role_rate_per_hour ,$processed_by);


    $addpos->setPositionHandler();

    header("location: ../pages/positions.php");
}
