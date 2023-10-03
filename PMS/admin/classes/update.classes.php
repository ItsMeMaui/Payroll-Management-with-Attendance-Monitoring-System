<?php

class updateEmp extends Db
{
    protected function updateUserAcc($update_emp_fname, $update_emp_mname, $update_emp_lname, $update_emp_fingerprint, $update_role_id, $update_processed_by, $updateUser)
    {


        $stmt = $this->connect()->prepare('UPDATE tbl_employees SET   emp_fname=?,emp_mname=?,emp_lname=?,emp_fingerprint=?,role_id=?, processed_by=?,created_at = NOW() WHERE emp_id   =?;');


        if (!$stmt->execute(array($update_emp_fname, $update_emp_mname, $update_emp_lname, $update_emp_fingerprint, $update_role_id, $update_processed_by, $updateUser))) {
            $stmt = null;
            header("location: ../pages/employees.php?error=StatementFailed");
            exit();
        }
    }
}
