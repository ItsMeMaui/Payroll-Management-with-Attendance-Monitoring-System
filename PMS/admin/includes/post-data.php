<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pmswa";

$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $fingerprint = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") { 

    if (isset($_GET["fingerprint"])) { 
        $fingerprint = test_input($_GET["fingerprint"]);

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO tbl_fingerprints (fingerprint_string)
        VALUES ('" . $fingerprint . "')"; 

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

