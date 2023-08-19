<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($hostname, $username, $password,"conference");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>