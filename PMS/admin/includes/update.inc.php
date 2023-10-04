<?php
if (isset($_POST['editemp'])) {

    $update_emp_fname = ucwords($_POST['fname']);
    $update_emp_mname = ucwords($_POST['mname']);
    $update_emp_lname = ucwords($_POST['lname']);
    $update_emp_fingerprint = $_POST['fingerprint'];
    $update_role_id = $_POST['role'];
    $update_processed_by = $_POST['processed-by'];
    $updateUser = $_POST['empID'];




    include "../classes/db.classes.php";
    include "../classes/update.classes.php";
    include "../controllers/update.controller.php";

    $signup = new updateEmpController($update_emp_fname, $update_emp_mname, $update_emp_lname, $update_emp_fingerprint, $update_role_id, $update_processed_by, $updateUser);


    $signup->empupdate();

    header("location: ../pages/employees.php");
}

if (isset($_POST['editemp'])) {

    $update_emp_fname = ucwords($_POST['fname']);
    $update_emp_mname = ucwords($_POST['mname']);
    $update_emp_lname = ucwords($_POST['lname']);
    $update_emp_fingerprint = $_POST['fingerprint'];
    $update_role_id = $_POST['role'];
    $update_processed_by = $_POST['processed-by'];
    $updateUser = $_POST['empID'];




    include "../classes/db.classes.php";
    include "../classes/update.classes.php";
    include "../controllers/update.controller.php";

    $signup = new updateEmpController($update_emp_fname, $update_emp_mname, $update_emp_lname, $update_emp_fingerprint, $update_role_id, $update_processed_by, $updateUser);


    $signup->empupdate();

    header("location: ../pages/employees.php");
}

