<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_monitoring";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}


if(!empty($_POST['suhudht']) || !empty($_POST['kelembabandht']))
{
    $sensorData1 = $_POST['suhudht'];
    $sensorData2 = $_POST['kelembabandht'];


    $sql = "INSERT INTO sensors (suhu, kelembaban) VALUES ('".$sensorData1."', '".$sensorData2."')";


    if ($conn->query($sql) === TRUE) {
        echo "OK";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
    ?>