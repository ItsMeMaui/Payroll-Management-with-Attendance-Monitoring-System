
<?php

class Login extends Db {


    protected function getUser($user_username, $user_password){

        $stmt = $this->connect()->prepare('SELECT tbl_users.user_password FROM tbl_users WHERE tbl_users.user_username=?');
        if(!$stmt->execute(array($user_username))){
            $stmt = null;
            header("location: ../index.php?error=StatementFailed");
            exit();
        }
        if($stmt->rowCount() == 0 ){
            $stmt = null;
            header("location: ../index.php?error=UserNotFound");
            exit();
        }
        $pwdHashed = $stmt->fetch(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($user_password,$pwdHashed["user_password"]);

        if($checkPwd == false){
            $stmt = null;
            echo '<script type="text/javascript">console.log("Pass: '.$pwd.'  Hash: '.$pwdHashed["password"].'");</script>';
            header("location: ../index.php?error=WrongInputPassword");
            exit();
        }
        elseif($checkPwd == true){


            $stmt = $this->connect()->prepare('SELECT a.user_id, c.emp_fname, c.emp_mname, c.emp_lname, a.user_username, c.role_id, r.role_name
            FROM tbl_employees c
            INNER JOIN tbl_users a ON c.emp_id = a.emp_id
            LEFT JOIN tbl_roles r ON c.role_id = r.role_id
            WHERE a.user_username = ?;');

            if(!$stmt->execute(array($user_username))){
                $stmt = null;
                header("location: ../index.php?error=statementfailed");
                exit();
            }

            if($stmt->rowCount() == 0 ){
                $stmt = null;
                header("location: ../index.php?error=usernotfound");
                exit();
            }

            // $stmt = $this->connect()->prepare('SELECT user_id,image,fname,mname,lname,username,role_id
            // FROM tbl_employees c
            
            // INNER JOIN tbl_users a
            //     ON c.emp_id = a.emp_id
            // WHERE c.emp_id = a.user_id');
            $user= $stmt->fetch(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['image'] = $user['user_id'];
            $_SESSION['fname'] = $user['emp_fname'];
            $_SESSION['mname'] = $user['emp_mname'];
            $_SESSION['lname'] = $user['emp_lname'];
            $_SESSION['username'] = $user['user_username'];
            $_SESSION['role'] = $user['role_id'];
            $_SESSION['role_name'] = $user['role_name'];
            $_SESSION['loggedIn'] = 'loggedIn';


        }

        $stmt = null;

    }

}