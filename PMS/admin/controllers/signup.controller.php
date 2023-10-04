
<?php

class SignupEmpController extends SignupEmp
{

    private $emp_fname;
    private $emp_mname;
    private $emp_lname;
    private $emp_fingerprint;
    private $role_id;
    private $processed_by;

    public function __construct($emp_fname, $emp_mname, $emp_lname, $emp_fingerprint, $role_id, $processed_by)
    {

        $this->emp_fname = $emp_fname;
        $this->emp_mname = $emp_mname;
        $this->emp_lname = $emp_lname;
        $this->emp_fingerprint = $emp_fingerprint;
        $this->role_id = $role_id;
        $this->processed_by = $processed_by;
    }

    public function signupemphandler()
    {


        if ($this->invalid_input_fname() == false) {
            header("location: ../admin/EmployeeManagement.php?error=InvalidInputFname");
            exit();
        }
        if ($this->invalid_input_mnane() == false) {
            header("location: ../admin/EmployeeManagement.php?error=InvalidInputMname");
            exit();
        }
        if ($this->invalid_input_lname() == false) {
            header("location: ../admin/EmployeeManagement.php?error=InvalidInputLname");
            exit();
        }


        $this->setEmp($this->emp_fname, $this->emp_mname, $this->emp_lname, $this->emp_fingerprint, $this->role_id, $this->processed_by);
    }


    private function invalid_input_fname()
    {
        $result = "";
        if (!preg_match('/^[a-zA-Z- ]{1,30}$/', $this->emp_fname)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalid_input_mnane()
    {
        $result = "";
        if (!preg_match('/^[a-zA-Z- ]{1,30}$/', $this->emp_mname)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalid_input_lname()
    {
        $result = "";
        if (!preg_match('/^[a-zA-Z- ]{1,30}$/', $this->emp_lname)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}


class SignupUserController extends SignupUser
{

    private $emp_id;
    private $emp_username;
    private $emp_password;
    private $processed_by;

    public function __construct($emp_id, $emp_username, $emp_password, $processed_by)
    {

        $this->emp_id = $emp_id;
        $this->emp_username = $emp_username;
        $this->emp_password = $emp_password;
        $this->processed_by = $processed_by;
    }

    public function signupuserhandler()
    {


        // if ($this->invalid_input_fname() == false) {
        //     header("location: ../admin/EmployeeManagement.php?error=InvalidInputFname");
        //     exit();
        // }
        // if ($this->invalid_input_mnane() == false) {
        //     header("location: ../admin/EmployeeManagement.php?error=InvalidInputMname");
        //     exit();
        // }
        // if ($this->invalid_input_lname() == false) {
        //     header("location: ../admin/EmployeeManagement.php?error=InvalidInputLname");
        //     exit();
        // }

        $this->setUser($this->emp_id, $this->emp_username, $this->emp_password, $this->processed_by);
    }


    // private function invalid_input_fname()
    // {
    //     $result = "";
    //     if (!preg_match('/^[a-zA-Z- ]{1,30}$/', $this->emp_fname)) {
    //         $result = false;
    //     } else {
    //         $result = true;
    //     }
    //     return $result;
    // }
    // private function invalid_input_mnane()
    // {
    //     $result = "";
    //     if (!preg_match('/^[a-zA-Z- ]{1,30}$/', $this->emp_mname)) {
    //         $result = false;
    //     } else {
    //         $result = true;
    //     }
    //     return $result;
    // }
    // private function invalid_input_lname()
    // {
    //     $result = "";
    //     if (!preg_match('/^[a-zA-Z- ]{1,30}$/', $this->emp_lname)) {
    //         $result = false;
    //     } else {
    //         $result = true;
    //     }
    //     return $result;
    // }
}

class AddPositionController extends AddPosition
{

    private $role_name;
    private $role_rate;
    private $processed_by;

    public function __construct($role_name, $role_rate, $processed_by)
    {

        $this->role_name = $role_name;
        $this->role_rate = $role_rate;
        $this->processed_by = $processed_by;
    }

    public function setPositionHandler()
    {


        if ($this->invalid_input_role_name() == false) {
            header("location: ../pages/positions.php?error=InvalidInputPositionName");
            exit();
        }
        if ($this->invalid_input_role_rate() == false) {
            header("location: ../pages/positions.php?error=InvalidInputPositionRate");
            exit();
        }


        $this->setPosition($this->role_name, $this->role_rate, $this->processed_by);
    }


    private function invalid_input_role_name()
    {
        $result = "";
        if (!preg_match('/^[a-zA-Z- ]{1,30}$/', $this->role_name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalid_input_role_rate()
    {
        $result = "";
        if (!preg_match('/^[0-9]/', $this->role_rate)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}

