<?php

$hostname = "127.0.0.1";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($hostname, $username, $password,"conference");
echo "<br>";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_GET['id'];
$res=mysqli_query($conn,"delete from paperfile where id=$id");
header("Location:home.php");

?>