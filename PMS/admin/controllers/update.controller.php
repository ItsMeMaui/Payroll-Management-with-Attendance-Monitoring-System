<?php

class updateEmpController extends updateEmp
{
    private $update_emp_fname;
    private $update_emp_mname;
    private $update_emp_lname;
    private $update_emp_fingerprint;
    private $update_role_id;
    private $update_processed_by;
    private $updateUser;




    public function __construct($update_emp_fname, $update_emp_mname, $update_emp_lname, $update_emp_fingerprint, $update_role_id, $update_processed_by, $updateUser)
    {
        $this->update_emp_fname = $update_emp_fname;
        $this->update_emp_mname = $update_emp_mname;
        $this->update_emp_lname = $update_emp_lname;
        $this->update_emp_fingerprint = $update_emp_fingerprint;
        $this->update_role_id = $update_role_id;
        $this->update_processed_by = $update_processed_by;
        $this->updateUser = $updateUser;
    }
    public function empupdate()
    {
        $this->updateEmpAcc($this->update_emp_fname, $this->update_emp_mname, $this->update_emp_lname, $this->update_emp_fingerprint, $this->update_role_id, $this->update_processed_by, $this->updateUser);
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

    public function __construct($current_username,$update_username, $update_current_password, $update_new_password, $update_repeat_password, $update_processed_by, $update_user_id)
    {
        $this->current_username = $current_username;
        $this->update_username = $update_username;
        $this->update_current_password = $update_current_password;
        $this->update_new_password = $update_new_password;
        $this->update_repeat_password = $update_repeat_password;
        $this->update_processed_by = $update_processed_by;
        $this->update_user_id = $update_user_id;
    }

    public function userupdatehandler()
    {

        $this->updateUserAcc($this->current_username,$this->update_username, $this->update_current_password, $this->update_new_password, $this->update_repeat_password, $this->update_processed_by, $this->update_user_id);
    }



}
