<?php


class updateEmp extends Db
{
    protected function updateEmpAcc($update_emp_fname, $update_emp_mname, $update_emp_lname, $update_emp_fingerprint, $update_emp_status,$update_role_id, $update_processed_by, $updateUser)
    {


        $stmt = $this->connect()->prepare('UPDATE tbl_employees SET   emp_fname=?,emp_mname=?,emp_lname=?,emp_fingerprint=?,emp_status=?,role_id=?, processed_by=?,created_at = NOW() WHERE emp_id   =?;');


        if (!$stmt->execute(array($update_emp_fname, $update_emp_mname, $update_emp_lname, $update_emp_fingerprint, $update_emp_status,$update_role_id, $update_processed_by, $updateUser))) {
            $stmt = null;
            header("location: ../pages/employees.php?error=StatementFailed");
            exit();
        }
    }
}

class updateUser extends Db
{

    protected function updateUserAcc($current_username, $update_username, $update_current_password, $update_new_password, $update_repeat_password, $update_processed_by, $update_user_id)
    {

        $stmt = $this->connect()->prepare('SELECT tbl_users.user_password FROM tbl_users WHERE tbl_users.user_username=?');
        if (!$stmt->execute(array($current_username))) {
            $stmt = null;
            header("location: ../admin/pages.php?error=StatementFailed");
            exit();
        }
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../pages/users.php?error=UserNotFound");
            exit();
        }
        $pwdHashed = $stmt->fetch(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($update_new_password, $pwdHashed["user_password"]);

        if ($checkPwd == false) {
            $stmt = null;
            header("location: ../pages/users.php?error=WrongInputPassword");
            exit();
        } else {
            if ($update_new_password != $update_repeat_password) {
                $stmt = null;
                header("location: ../pages/users.php?error=PasswordnotMatched");
                exit();
            } else {
                $stmt = $this->connect()->prepare('UPDATE tbl_users SET  user_username=?,user_password=?,processed_by=?,created_at = NOW() WHERE user_id =?;');
                $pwdHashed = password_hash($update_new_password, PASSWORD_DEFAULT);

                if (!$stmt->execute(array($update_username, $pwdHashed, $update_processed_by, $update_user_id))) {
                    $stmt = null;
                    header("location: ../pages/users.php?error=StatementFailed");
                    exit();
                }
                $stmt = null;
            }
        }
    }
}

class updateRole extends Db
{

    protected function updateRole($update_role_name, $update_role_rate, $role_rate_per_hour, $update_processed_by, $update_role_id)
    {

        $stmt = $this->connect()->prepare('UPDATE tbl_roles SET   role_name=?,role_rate=?,role_rate_per_hour=?, processed_by=?,created_at = NOW() WHERE role_id   =?;');

        if (!$stmt->execute(array($update_role_name, $update_role_rate, $role_rate_per_hour, $update_processed_by, $update_role_id))) {
            $stmt = null;
            header("location: ../pages/employees.php?error=StatementFailed");
            exit();
        }
    }
}
