<?php

class Signup extends Db
{

    protected function setUser($emp_fname, $emp_mname, $emp_lname, $emp_fingerprint, $role_id, $processed_by)
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

    protected function setUserEmp($empID, $position, $username, $password, $userstatus, $processed_by, $create)
    {

        $stmt = $this->connect()->prepare('INSERT INTO tbl_users( emp_id, username, password, role_id, status, processed_by) VALUES  (?,?,?,?,?,?);');

        $pwdHashed = password_hash($password, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($empID, $username, $pwdHashed, $position, $userstatus, $processed_by))) {
            $stmt = null;
            header("location: ../index.php?error=StatementFailed");
            exit();
        }

        $stmt = $this->connect()->prepare('INSERT INTO tbl_logs (action, processed_by) VALUES (?,?);');

        if (!$stmt->execute(array($create, $processed_by))) {
            $stmt = null;
            header("location: ../admin/EmployeeManagement.php?error=StatementFailed");
            exit();
        }
        $stmt = null;
    }

    protected function checkUser($username)
    {
        $stmt = $this->connect()->prepare('SELECT user_id FROM tbl_users WHERE username = ?');

        if (!$stmt->execute(array($username))) {
            $stmt = null;
            header("location: ../index.php?error=StatementFailed");
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
    // protected function checkEmail($emailAdd){
    //     $stmt = $this->connect()->prepare('SELECT emp_id FROM tbl_employees WHERE  email=?');

    //     if (!$stmt->execute(array($emailAdd))) {
    //         $stmt = null;
    //         header("location: ../admin/index.php?error=StatementFailed");
    //         exit();
    //     }
    //     $resultCheck = true;
    //     if ($stmt->rowCount() > 0) {
    //         $resultCheck = false;
    //     } else {
    //         $resultCheck = true;
    //     }
    //     return $resultCheck;
    // }
}

class addCategory extends Db
{

    protected function setCategory($categoryName, $status, $processed_by, $create)
    {


        $stmt = $this->connect()->prepare('INSERT INTO tbl_categories (category_name,status) VALUES (?,?);');


        if (!$stmt->execute(array($categoryName, $status))) {
            $stmt = null;
            header("location: ../admin/categories.php?error=StatementFailed");
            exit();
        }

        $stmt = $this->connect()->prepare('INSERT INTO tbl_logs (action, processed_by) VALUES (?,?);');

        if (!$stmt->execute(array($create, $processed_by))) {
            $stmt = null;
            header("location: ../admin/EmployeeManagement.php?error=StatementFailed");
            exit();
        }
        $stmt = null;
    }
}

class addProduct extends Db
{

    protected function addProdFunc($image, $prodName, $prodprice, $prodCategory, $product_quantity, $create, $processed_by)
    {


        $stmt = $this->connect()->prepare('INSERT INTO tbl_products (product_image,product_name,product_price,category_id,product_quantity) VALUES (?,?,?,?,?);');
        if (!$stmt->execute(array($image, $prodName, $prodprice, $prodCategory, $product_quantity))) {
            $stmt = null;
            header("location: ../admin/products.php?error=StatementFailed");
            exit();
        }

        $stmt = $this->connect()->prepare('INSERT INTO tbl_logs (action, processed_by) VALUES (?,?);');

        if (!$stmt->execute(array($create, $processed_by))) {
            $stmt = null;
            header("location: ../admin/EmployeeManagement.php?error=StatementFailed");
            exit();
        }

        move_uploaded_file($_FILES["prodImageID"]["tmp_name"], "../upload/" . $_FILES["prodImageID"]["name"]);

        $stmt = null;
    }
}
