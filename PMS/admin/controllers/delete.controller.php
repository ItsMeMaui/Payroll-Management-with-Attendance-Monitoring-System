<?php

class deletePositionController extends deletePosition{
    private $role_id;


    public function __construct($role_id){
        $this->role_id = $role_id;

    }
    public function deletePositionFunc(){
        $this->deletePositionData($this->role_id);
    }

}

class deleteUserController extends deleteUser{
    private $user_id;
    private $user_password;
    private $entered_password;


    public function __construct($user_id,$user_password,$entered_password){
        $this->user_id = $user_id;
        $this->user_password = $user_password;
        $this->entered_password = $entered_password;

    }
    public function deleteUserFunc(){
        if ($this->missing_input() == false) {
            header("location: ../pages/users.php?error=RequiredPassword");
            exit();
        }
        $this->deleteUserData($this->user_id,$this->user_password,$this->entered_password);
    }
    private function missing_input()
    {
        $result = "";
        if ($this->entered_password == "" ) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}