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

if (isset($_POST['update_user'])) {

    $current_username = $_POST['update_current_username'];
    $update_user_id = $_POST['update_user_id'];
    $update_username = $_POST['update_user_username'];
    $update_current_password = $_POST['userpwd'];
    $update_new_password = $_POST['update_user_password'];
    $update_repeat_password = $_POST['update_user_rpt_password'];
    $update_processed_by = $_POST['processed-by'];

    include "../classes/db.classes.php";
    include "../classes/update.classes.php";
    include "../controllers/update.controller.php";

    $update_user = new updateUserController($current_username,$update_username, $update_current_password, $update_new_password, $update_repeat_password, $update_processed_by, $update_user_id);

    $update_user->userupdatehandler();

    header("location: ../pages/users.php");
}

if (isset($_POST['update_role'])) {
    
    $update_role_id = $_POST['update_role_id'];
    $update_role_name = $_POST['update_role_name'];
    $update_role_rate = $_POST['update_role_rate'];
    $role_rate_per_hour = (int)$update_role_rate/8;
    $update_processed_by = $_POST['processed-by'];

    include "../classes/db.classes.php";
    include "../classes/update.classes.php";
    include "../controllers/update.controller.php";

    $update_user = new updateRoleController($update_role_name,$update_role_rate, $role_rate_per_hour,$update_processed_by, $update_role_id);

    $update_user->roleupdatehandler();

    header("location: ../pages/positions.php");
}
