<?php


class UpdateEmp extends Db
{
    protected function updateEmpAcc($updateImage, $update_emp_fname, $update_emp_mname, $update_emp_lname, $update_emp_gender, $update_emp_dateofbirth, $update_emp_fingerprint, $update_emp_status, $update_role_id, $update_processed_by, $updateUser, $create)
    {
        $conn = $this->connect(); // Assuming the connect method is part of the Db class.

        // Check if the fingerprint exists
        $checkFingerprintID = "SELECT fingerprint_id FROM tbl_fingerprints WHERE fingerprint_id = :fingerprint_id";
        $stmt = $conn->prepare($checkFingerprintID);
        $stmt->bindValue(':fingerprint_id', $update_emp_fingerprint);
        $stmt->execute();
        $result_FI = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result_FI) {
            // Fingerprint exists, proceed with the update
            $updateImageQuery = $_FILES['updateImage']['error'] === UPLOAD_ERR_OK ? 'emp_image = :emp_image,' : '';
            
            $updateStmt = $conn->prepare("UPDATE tbl_employees SET $updateImageQuery emp_fname = :emp_fname, emp_mname = :emp_mname, emp_lname = :emp_lname, emp_gender = :emp_gender, emp_dateofbirth = :emp_dateofbirth, fingerprint_id = :fingerprint_id, emp_status = :emp_status, role_id = :role_id, processed_by = :processed_by, created_at = NOW() WHERE emp_id = :emp_id");

            if ($_FILES['updateImage']['error'] === UPLOAD_ERR_OK) {
                $newImage = $_FILES['updateImage']['name'];
                $tempImage = $_FILES['updateImage']['tmp_name'];
                move_uploaded_file($tempImage, "../images/uploads/" . $newImage);
                $updateStmt->bindValue(':emp_image', $newImage);
            }
            
            $updateStmt->bindValue(':emp_fname', $update_emp_fname);
            $updateStmt->bindValue(':emp_mname', $update_emp_mname);
            $updateStmt->bindValue(':emp_lname', $update_emp_lname);
            $updateStmt->bindValue(':emp_gender', $update_emp_gender);
            $updateStmt->bindValue(':emp_dateofbirth', $update_emp_dateofbirth);
            $updateStmt->bindValue(':fingerprint_id', $update_emp_fingerprint);
            $updateStmt->bindValue(':emp_status', $update_emp_status);
            $updateStmt->bindValue(':role_id', $update_role_id);
            $updateStmt->bindValue(':processed_by', $update_processed_by);
            $updateStmt->bindValue(':emp_id', $updateUser);

            if ($updateStmt->execute()) {
                // Insert a log record
                $logStmt = $conn->prepare('INSERT INTO tbl_logs (action, processed_by) VALUES (:action, :processed_by)');
                $logStmt->bindValue(':action', $create);
                $logStmt->bindValue(':processed_by', $update_processed_by);

                if (!$logStmt->execute()) {
                    header("location: ../pages/employees.php?error=StatementFailed");
                    exit();
                }
            } else {
                header("location: ../pages/employees.php?error=StatementFailed");
                exit();
            }
        } else {
            header("location: ../pages/employees.php?error=NoFingerprintIDFound");
            exit();
        }
    }
}




class updateUser extends Db
{

    protected function updateUserAcc($current_username, $update_username, $update_current_password, $update_new_password, $update_repeat_password, $update_processed_by, $update_user_id ,$create)
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

                $stmt = $this->connect()->prepare('INSERT INTO tbl_logs (action, processed_by) VALUES (?,?);');

                if (!$stmt->execute(array($create, $update_processed_by))) {
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

    protected function updateRole($update_role_name, $update_role_rate, $role_rate_per_hour, $update_processed_by, $update_role_id ,$create)
    {

        $stmt = $this->connect()->prepare('UPDATE tbl_roles SET   role_name=?,role_rate=?,role_rate_per_hour=?, processed_by=?,created_at = NOW() WHERE role_id   =?;');

        if (!$stmt->execute(array($update_role_name, $update_role_rate, $role_rate_per_hour, $update_processed_by, $update_role_id))) {
            $stmt = null;
            header("location: ../pages/employees.php?error=StatementFailed");
            exit();
        }

        $stmt = $this->connect()->prepare('INSERT INTO tbl_logs (action, processed_by) VALUES (?,?);');

        if (!$stmt->execute(array($create, $update_processed_by))) {
            $stmt = null;
            header("location: ../pages/users.php?error=StatementFailed");
            exit();
        }
        $stmt = null;
    }
    protected function checkUpdateRoleName($update_role_name)
    {
        $stmt = $this->connect()->prepare('SELECT role_id FROM tbl_roles WHERE role_name = ?');

        if (!$stmt->execute(array($update_role_name))) {
            $stmt = null;
            header("location: ../pages/users.php?error=StatementFailed");
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
