<?php

$hostname = "127.0.0.1";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($hostname, $username, $password,"e_learning");
echo "<br>";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_GET['id'];
$res=mysqli_query($conn,"delete from files where id=$id");
header("Location:downloads.php");

?>