<?php

class deletePosition extends Db {
    protected function deletePositionData($role_id) {
        try {
            $stmt = $this->connect()->prepare('DELETE FROM tbl_roles WHERE role_id=?');
            if ($stmt->execute(array($role_id))) {
                // The deletion was successful
                $stmt = null;
                header("location: ../pages/positions.php?error=DataDeleted");
                exit();
            }
        } catch (PDOException $e) {
            $stmt = null;
            header("location: ../pages/positions.php?error=CantDeleteData" );
            exit();
        }
    }
}

class deleteUser extends Db{
    protected function deleteUserData($user_id,$user_password,$entered_password)
    {
        $stmt = $this->connect()->prepare('SELECT tbl_users.user_password FROM tbl_users WHERE tbl_users.user_id=?');
        if (!$stmt->execute(array($user_id))) {
            $stmt = null;
            header("location: ../admin/users.php?error=StatementFailed");
            exit();
        }
        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: ../pages/users.php?error=UserNotFound");
            exit();
        }
        
        $pwdHashed = $stmt->fetch(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($entered_password, $pwdHashed["user_password"]);
        if ($checkPwd == false) {
            $stmt = null;
            header("location: ../pages/users.php?error=WrongInputPassword");
            exit();
        }
        else{
            $stmt = $this->connect()->prepare('DELETE FROM tbl_users WHERE user_id=?');

            if (!$stmt->execute(array($user_id))) {
                $stmt = null;
                header("location: ../pages/users.php?error=StatementFailed");
                exit();
            }
            $stmt = null;
        }

        
    }
}