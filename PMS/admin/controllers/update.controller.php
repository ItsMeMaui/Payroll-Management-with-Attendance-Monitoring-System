<?php

class updateEmpController extends updateEmp
{
    private $update_emp_fname;
    private $update_emp_mname;
    private $update_emp_lname;
    private $update_emp_fingerprint;
    private $update_emp_status;
    private $update_role_id;
    private $update_processed_by;
    private $updateUser;
    private $create;

    public function __construct($update_emp_fname, $update_emp_mname, $update_emp_lname, $update_emp_fingerprint, $update_emp_status , $update_role_id, $update_processed_by, $updateUser ,$create)
    {
        $this->update_emp_fname = $update_emp_fname;
        $this->update_emp_mname = $update_emp_mname;
        $this->update_emp_lname = $update_emp_lname;
        $this->update_emp_fingerprint = $update_emp_fingerprint;
        $this->update_emp_status = $update_emp_status;
        $this->update_role_id = $update_role_id;
        $this->update_processed_by = $update_processed_by;
        $this->updateUser = $updateUser;
        $this->create = $create;

    }
    public function empupdate()
    {

        if ($this->missing_input() == false) {
            header("location: ../pages/employees.php?error=MissingSomeInputFields");
            exit();
        }
        if ($this->invalid_input_fname() == false) {
            header("location: ../pages/employees.php?error=InvalidInputFname");
            exit();
        }
        if ($this->invalid_input_mnane() == false) {
            header("location: ../pages/employees.php?error=InvalidInputMname");
            exit();
        }
        if ($this->invalid_input_lname() == false) {
            header("location: ../pages/employees.php?error=InvalidInputLname");
            exit();
        }

        $this->updateEmpAcc($this->update_emp_fname, $this->update_emp_mname, $this->update_emp_lname, $this->update_emp_fingerprint, $this->update_emp_status,$this->update_role_id, $this->update_processed_by, $this->updateUser, $this->create);
    }

    private function missing_input()
    {
        $result = "";
        if ($this->update_emp_fname == ""  || $this->update_emp_lname == "" || $this->update_emp_fingerprint == "" || $this->update_emp_status == "" || $this->update_role_id == "" || $this->update_processed_by == "" || $this->updateUser == "" || $this->create == "") {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalid_input_fname()
    {
        $result = "";
        if (!preg_match('/^[a-zA-Z- ]{1,30}$/', $this->update_emp_fname)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalid_input_mnane()
    {
        if ($this->update_emp_mname === '' || preg_match('/^[a-zA-Z- ]{1,30}$/', $this->update_emp_mname)) {
            return true;
        } else {
            return false;
        }
    }
    private function invalid_input_lname()
    {
        $result = "";
        if (!preg_match('/^[a-zA-Z- ]{1,30}$/', $this->update_emp_lname)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}

class updateUserController extends updateUser
{
    private $current_username;
    private $update_username;
    private $update_current_password;
    private $update_new_password;
    private $update_repeat_password;
    private $update_processed_by;
    private $update_user_id;
    private $create;

    public function __construct($current_username, $update_username, $update_current_password, $update_new_password, $update_repeat_password, $update_processed_by, $update_user_id, $create)
    {
        $this->current_username = $current_username;
        $this->update_username = $update_username;
        $this->update_current_password = $update_current_password;
        $this->update_new_password = $update_new_password;
        $this->update_repeat_password = $update_repeat_password;
        $this->update_processed_by = $update_processed_by;
        $this->update_user_id = $update_user_id;
        $this->create = $create;
    }

    public function userupdatehandler()
    {

        if ($this->missing_input() == false) {
            header("location: ../pages/users.php?error=MissingSomeInputFields");
            exit();
        }

        $this->updateUserAcc($this->current_username, $this->update_username, $this->update_current_password, $this->update_new_password, $this->update_repeat_password, $this->update_processed_by, $this->update_user_id , $this->create);
    }
    private function missing_input()
    {
        $result = "";
        if ($this->current_username == "" || $this->update_username == "" || $this->update_current_password == "" || $this->update_new_password == "" || $this->update_repeat_password == "" || $this->update_processed_by == "" || $this->update_user_id == "" || $this->create == "") {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}

class updateRoleController extends updateRole
{
    private $update_role_name;
    private $update_role_rate;
    private $update_processed_by;
    private $role_rate_per_hour;
    private $update_role_id;
    private $create;


    public function __construct($update_role_name, $update_role_rate, $role_rate_per_hour, $update_processed_by, $update_role_id, $create)
    {
        $this->update_role_name = $update_role_name;
        $this->update_role_rate = $update_role_rate;
        $this->update_processed_by = $update_processed_by;
        $this->role_rate_per_hour = $role_rate_per_hour;
        $this->update_role_id = $update_role_id;
        $this->create = $create;

    }
    public function roleupdatehandler()
    {
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
        $this->updateRole($this->update_role_name, $this->update_role_rate, $this->role_rate_per_hour, $this->update_processed_by, $this->update_role_id , $this->create);
    }

    private function missing_input()
    {
        $result = "";
        if ($this->update_role_name == "" || $this->update_role_rate == "" || $this->role_rate_per_hour == "" || $this->update_processed_by == "" ||  $this->update_role_id == "" ||  $this->create == "") {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalid_input_role_name()
    {
        $result = "";
        if (!preg_match('/^[a-zA-Z0-9- ]{5,30}$/', $this->update_role_name)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalid_input_role_rate()
    {
        $result = "";
        if (!preg_match('/^[0-9]/', $this->update_role_rate)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}
