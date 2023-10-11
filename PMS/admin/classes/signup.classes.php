<?php

class SignupEmp extends Db
{

    protected function setEmp($emp_image ,$emp_fname, $emp_mname, $emp_lname,$emp_gender,$emp_dateofbirth, $emp_fingerprint, $status , $role_id,$processed_by, $create)
    {

        $stmt = $this->connect()->prepare('INSERT INTO tbl_employees(emp_image, emp_fname, emp_mname, emp_lname,emp_gender,emp_dateofbirth ,emp_fingerprint, emp_status,role_id,processed_by) VALUES  (?,?,?,?,?,?,?,?,?,?);');


        if (!$stmt->execute(array($emp_image,$emp_fname, $emp_mname, $emp_lname,$emp_gender,$emp_dateofbirth, $emp_fingerprint, $status,$role_id, $processed_by))) {
            $stmt = null;
            header("location: ../pages/employees.php?error=StatementFailed");
            exit();
        }
        $stmt = $this->connect()->prepare('INSERT INTO tbl_logs (action, processed_by) VALUES (?,?);');

        if (!$stmt->execute(array($create, $processed_by))) {
            $stmt = null;
            header("location: ../pages/employees.php?error=StatementFailed");
            exit();
        }
        move_uploaded_file($_FILES["imageInput"]["tmp_name"], "../images/uploads/" . $_FILES["imageInput"]["name"]);
        $stmt = null;
    }
}

class SignupUser extends Db
{
    protected function setUser($emp_id, $emp_username, $emp_password, $processed_by, $create)
    {

        $stmt = $this->connect()->prepare('INSERT INTO tbl_users( emp_id, user_username, user_password, processed_by) VALUES  (?,?,?,?);');

        $pwdHashed = password_hash($emp_password, PASSWORD_DEFAULT);
        if (!$stmt->execute(array($emp_id, $emp_username, $pwdHashed, $processed_by))) {
            $stmt = null;
            header("location: ../pages/users.php?error=StatementFailed");
            exit();
        }

        $stmt = $this->connect()->prepare('INSERT INTO tbl_logs (action, processed_by) VALUES (?,?);');

        if (!$stmt->execute(array($create, $processed_by))) {
            $stmt = null;
            header("location: ../pages/users.php?error=StatementFailed");
            exit();
        }
        $stmt = null;
    }
    protected function checkUser($emp_username)
    {
        $stmt = $this->connect()->prepare('SELECT user_id FROM tbl_users WHERE  user_username=?');

        if (!$stmt->execute(array($emp_username))) {
            $stmt = null;
            header("location: ../admin/index.php?error=StatementFailed");
            exit();
        }
        $resultCheck = "";
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}

class AddPosition extends Db
{

    protected function setPosition($role_name, $role_rate, $role_rate_per_hour, $processed_by,$create)
    {

        $stmt = $this->connect()->prepare('INSERT INTO tbl_roles( role_name, role_rate, role_rate_per_hour,processed_by) VALUES  (?,?,?,?);');
        if (!$stmt->execute(array($role_name, $role_rate, $role_rate_per_hour, $processed_by))) {
            $stmt = null;
            header("location: ../pages/positions.php?error=StatementFailed");
            exit();
        }

        $stmt = $this->connect()->prepare('INSERT INTO tbl_logs (action, processed_by) VALUES (?,?);');

        if (!$stmt->execute(array($create, $processed_by))) {
            $stmt = null;
            header("location: ../pages/positions.php?error=StatementFailed");
            exit();
        }
        $stmt = null;
    }
    protected function checkRoleName($role_name)
    {
        $stmt = $this->connect()->prepare('SELECT role_id FROM tbl_roles WHERE role_name = ?');

        if (!$stmt->execute(array($role_name))) {
            $stmt = null;
            header("location: ../pages/positions.php?error=StatementFailed");
            exit();
        }
        $resultCheck = '';
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}
