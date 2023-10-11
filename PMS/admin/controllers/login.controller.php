
<?php

class loginController extends Login{
    private $user_username;
    private $user_password;



    public function __construct($user_username, $user_password){

        $this->user_username = $user_username;
        $this->user_password = $user_password;


    }

    public function loginUserHandler(){
        if ($this->missing_input() == false) {
            header("location: ../index.php?error=MissingSomeInputFields");
            exit();
        }

        $this->getUser($this->user_username,$this->user_password);
    }
    private function missing_input()
    {
        $result = "";
        if ($this->user_username == ""  || $this->user_password == "" ) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }


}