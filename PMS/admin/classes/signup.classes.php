<?php

class SignupEmp extends Db
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
