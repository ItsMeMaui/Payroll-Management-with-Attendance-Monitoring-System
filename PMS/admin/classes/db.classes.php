<?php

class Db
{

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
}
