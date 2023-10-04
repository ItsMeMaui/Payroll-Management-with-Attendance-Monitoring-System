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

class updateUserController extends updateEmp
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
    public function userupdate()
    {
        $this->updateUserAcc($this->update_emp_fname, $this->update_emp_mname, $this->update_emp_lname, $this->update_emp_fingerprint, $this->update_role_id, $this->update_processed_by, $this->updateUser);
    }
}
