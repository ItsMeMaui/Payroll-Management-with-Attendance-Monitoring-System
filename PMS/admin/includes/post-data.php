<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pmswa";

$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $fingerprint = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") { 

    if (isset($_GET["id"])) { 
        $id = test_input($_GET["id"]);

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO tbl_fingerprints (fingerprint_string)
        VALUES ('pmswa_".$id."')"; 

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "No 'fingerprint' parameter provided in the GET request.";
    }
       
} else {
    echo "No data posted with HTTP GET.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

