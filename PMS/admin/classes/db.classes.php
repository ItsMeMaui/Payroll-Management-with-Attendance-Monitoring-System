<?php

class Db
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "pmswa";
    private $conn;

    public function __construct(){
        try{
            $this->conn = new mysqli($this->server,$this->username,$this->password,$this->database);
        }catch(\Throwable $th){
            echo "Connection error". $th->getMessage();
        }
    }
    protected function connect()
    {

        $username = "root";
        $password = "";
        try {
            $conn = new PDO('mysql:host=localhost;dbname=pmswa', $username, $password);
            return $conn;
        } catch (PDOException  $e) {
            print "Error: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function fetch(){
        $data = [];
        $query = "SELECT a.*, e.emp_fname, e.emp_mname, e.emp_lname
                    FROM tbl_attendances a
                    JOIN tbl_employees e ON a.emp_id = e.emp_id;";
        if($sql = $this->conn->query($query)){
            while($row = mysqli_fetch_assoc($sql)){
                $data[] = $row;
            }
            
        }
        return $data;
    }
    public function date_range($start_date,$end_date){
        $data = [];

        if(isset($start_date) && isset($start_date)){
            $query = "SELECT a.*, e.emp_fname, e.emp_mname, e.emp_lname

                    FROM tbl_attendances a
                    JOIN tbl_employees e ON a.emp_id = e.emp_id
                    WHERE DATE_FORMAT(a.attendance_date, '%m/%d/%Y') >= '$start_date'
                  AND DATE_FORMAT(a.attendance_date, '%m/%d/%Y') <= '$end_date';";
                
            if($sql = $this->conn->query($query)){
                while($row = mysqli_fetch_assoc($sql)){
                    $data[] = $row;
                }
            }
        }
        return $data;
    }
}
