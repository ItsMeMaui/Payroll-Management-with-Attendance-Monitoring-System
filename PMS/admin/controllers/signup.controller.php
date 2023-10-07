
<?php

class SignupEmpController extends SignupEmp
{

    private $emp_fname;
    private $emp_mname;
    private $emp_lname;
    private $emp_fingerprint;
    private $status;
    private $role_id;
    private $processed_by;
    private $create;

    public function __construct($emp_fname, $emp_mname, $emp_lname, $emp_fingerprint,$status, $role_id, $processed_by,$create)
    {

        $this->emp_fname = $emp_fname;
        $this->emp_mname = $emp_mname;
        $this->emp_lname = $emp_lname;
        $this->emp_fingerprint = $emp_fingerprint;
        $this->status = $status;
        $this->role_id = $role_id;
        $this->processed_by = $processed_by;
        $this->create = $create;

    }

    public function signupemphandler()
    {

        if ($this->missing_input() == false) {
            header("location: ../pages/employees.php?error=MissingSomeInputFields");
            exit();
        }
        if ($this->invalid_input_fname() == false) {
            header("location: ../pages/employees.php?error=InvalidInputFname");
            exit();
        }
        if ($this->valid_input_mname() == false) {
            header("location: ../pages/employees.php?error=InvalidInputMname");
            exit();
        }
        if ($this->invalid_input_lname() == false) {
            header("location: ../pages/employees.php?error=InvalidInputLname");
            exit();
        }


        $this->setEmp($this->emp_fname, $this->emp_mname, $this->emp_lname, $this->emp_fingerprint, $this->status ,$this->role_id, $this->processed_by, $this->create);
    }

    private function missing_input()
    {
        $result = "";
        if ($this->emp_fname == ""  || $this->emp_lname == "" || $this->emp_fingerprint == ""|| $this->status == "" || $this->role_id == "" || $this->processed_by == "" || $this->create == "") {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
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
    private function valid_input_mname()
    {
        if ($this->emp_mname === '' || preg_match('/^[a-zA-Z- ]{1,30}$/', $this->emp_mname)) {
            return true;
        } else {
            return false;
        }
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
    private $create;

    public function __construct($emp_id, $emp_username, $emp_password, $processed_by,$create)
    {

        $this->emp_id = $emp_id;
        $this->emp_username = $emp_username;
        $this->emp_password = $emp_password;
        $this->processed_by = $processed_by;
        $this->create = $create;

    }

    public function signupuserhandler()
    {
        if ($this->missing_input() == false) {
            header("location: ../pages/users.php?error=MissingSomeInputFields");
            exit();
        }
        if ($this->invalid_input_username() == false) {
            header("location: ../pages/users.php?error=InvalidUsername");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            header("location: ../pages/users.php?error=UsernameAlreadyTaken");
            exit();
        }

        $this->setUser($this->emp_id, $this->emp_username, $this->emp_password, $this->processed_by,$this->create);
    }

    private function missing_input()
    {
        $result = "";
        if ($this->emp_id == "" || $this->emp_username == "" || $this->emp_password == "" || $this->processed_by == "" || $this->create == "") {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalid_input_username()
    {
        $result = "";
        if (!preg_match('/^[a-zA-Z0-9- ]{8,20}$/', $this->emp_username)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function uidTakenCheck()
    {
        $result = '';
        if (!$this->checkUser($this->emp_username)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}

class AddPositionController extends AddPosition
{

    private $role_name;
    private $role_rate;
    private $role_rate_per_hour;
    private $processed_by;
    private $create;

    public function __construct($role_name, $role_rate, $role_rate_per_hour, $processed_by,$create)
    {

        $this->role_name = $role_name;
        $this->role_rate = $role_rate;
        $this->role_rate_per_hour = $role_rate_per_hour;
        $this->processed_by = $processed_by;
        $this->create = $create;

    }

    public function setPositionHandler()
    {
        if ($this->roleNameExist() == false) {
            header("location: ../pages/positions.php?error=RoleNameExist");
            exit();
        }
        if ($this->missing_input() == false) {
            header("location: ../pages/positions.php?error=MissingSomeInputFields");
            exit();
        }
        if ($this->invalid_input_role_name() == false) {
            header("location: ../pages/positions.php?error=InvalidInputPositionName");
            exit();
        }
        if ($this->invalid_input_role_rate() == false) {
            header("location: ../pages/positions.php?error=InvalidInputPositionRate");
            exit();
        }


        $this->setPosition($this->role_name, $this->role_rate, $this->role_rate_per_hour, $this->processed_by, $this->create);
    }
    private function roleNameExist()
    {
        $result = "";
        if (!$this->checkRoleName($this->role_name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function missing_input()
    {
        $result = "";
        if ($this->role_name == "" || $this->role_rate == "" || $this->role_rate_per_hour == "" || $this->processed_by == "" || $this->create == "") {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalid_input_role_name()
    {
        $result = "";
        if (!preg_match('/^[a-zA-Z0-9- ]{5,30}$/', $this->role_name)) {
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
