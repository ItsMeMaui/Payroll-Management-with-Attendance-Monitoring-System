<?php
if (isset($_POST['register_employee'])) {
    if($_FILES['imageInput']['name'] == ''){
        $emp_image = 'defaultProfile.jpg';
    }else{
        $emp_image = $_FILES['imageInput']['name'];
    }
    
        $emp_fname = ucwords($_POST['fname']);
        $emp_mname = ucwords($_POST['mname']);
        $emp_lname = ucwords($_POST['lname']);
        $emp_gender = $_POST['gender'];
        $emp_dateofbirth = $_POST['date_of_birth'];
        $emp_fingerprint = $_POST['fingerprint'];
        $role_id = $_POST['role'];
        $status = $_POST['status'];
        $processed_by = $_POST['processed-by'];

        $create = "Added Employee : " . " " . $emp_fname . " " . $emp_lname ."";

    include "../classes/db.classes.php";
    include "../classes/signup.classes.php";
    include "../controllers/signup.controller.php";

    $signup = new SignupEmpController($emp_image ,$emp_fname, $emp_mname, $emp_lname,$emp_gender,$emp_dateofbirth, $emp_fingerprint, $status , $role_id,$processed_by, $create);


    $signup->signupemphandler();

    header("location: ../pages/employees.php?error=EmployeeCreatedSuccessfully");
}

if (isset($_POST['register_user'])) {
    $emp_id = $_POST['emp_id'];
    $emp_username = $_POST['emp_username'];
    $emp_password = $_POST['emp_password'];
    $emp_rpt_pwd = $_POST['emp_rpt_pwd'];
    $processed_by = $_POST['processed-by'];

    $create = "Added User : " . " " . $emp_username . " Employee ID:" . $emp_id ."";


    include "../classes/db.classes.php";
    include "../classes/signup.classes.php";
    include "../controllers/signup.controller.php";

    $signup = new SignupUserController($emp_id, $emp_username, $emp_password, $emp_rpt_pwd,$processed_by, $create);


    $signup->signupuserhandler();

    header("location: ../pages/users.php?error=UserCreatedSuccessfully");
}

if (isset($_POST['position'])) {

    $role_name = $_POST['position_name'];
    $role_rate = $_POST['position_rate'];
    $role_rate_per_hour = (int)$role_rate/8;
    $processed_by = $_POST['processed-by'];

    $create = "Added Role : " . " " . $role_name . " Role Rate: ₱" . $role_rate ."";


    include "../classes/db.classes.php";
    include "../classes/signup.classes.php";
    include "../controllers/signup.controller.php";

    $addpos = new AddPositionController($role_name, $role_rate,$role_rate_per_hour ,$processed_by,$create);


    $addpos->setPositionHandler();

    header("location: ../pages/positions.php?error=PositionCreatedSuccessfully");
}
