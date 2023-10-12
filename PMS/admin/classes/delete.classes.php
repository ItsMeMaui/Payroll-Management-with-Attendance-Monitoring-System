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