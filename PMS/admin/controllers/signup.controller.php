
<?php

class SignupController extends Signup
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

    public function signupUser()
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


        $this->setUser($this->emp_fname, $this->emp_mname, $this->emp_lname, $this->emp_fingerprint, $this->role_id, $this->processed_by);
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
