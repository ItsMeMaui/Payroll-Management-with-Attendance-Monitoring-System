<?php

class SignupEmp extends Db
{

    protected function setEmp($emp_fname, $emp_mname, $emp_lname, $emp_fingerprint, $role_id, $processed_by)
    {

        $stmt = $this->connect()->prepare('INSERT INTO tbl_employees( emp_fname, emp_mname, emp_lname, emp_fingerprint, role_id,processed_by) VALUES  (?,?,?,?,?,?);');


        if (!$stmt->execute(array($emp_fname, $emp_mname, $emp_lname, $emp_fingerprint, $role_id, $processed_by))) {
            $stmt = null;
            header("location: ../index.php?error=StatementFailed");
            exit();
        }

        $stmt = null;
    }
}

class SignupUser extends Db
{

    protected function setUser($emp_id, $emp_username, $emp_password, $processed_by)
    {

        $stmt = $this->connect()->prepare('INSERT INTO tbl_users( emp_id, user_username, user_password, processed_by) VALUES  (?,?,?,?);');

        $pwdHashed = password_hash($emp_password, PASSWORD_DEFAULT);
        if (!$stmt->execute(array($emp_id, $emp_username, $pwdHashed, $processed_by))) {
            $stmt = null;
            header("location: ../index.php?error=StatementFailed");
            exit();
        }

        $stmt = null;
    }
}

class AddPosition extends Db
{

    protected function setPosition($role_name, $role_rate, $processed_by)
    {

        $stmt = $this->connect()->prepare('INSERT INTO tbl_roles( role_name, role_rate, processed_by) VALUES  (?,?,?);');
        if (!$stmt->execute(array($role_name, $role_rate, $processed_by))) {
            $stmt = null;
            header("location: ../index.php?error=StatementFailed");
            exit();
        }
        $stmt = null;
    }

}

