<?php
$host = "localhost";
$user = "root"; // Change this if necessary
$password = ""; // Change this if necessary
$database = "vehicle_management"; // The database name

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
