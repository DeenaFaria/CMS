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
//echo "<h4>Connected successfully</h4>";
$name=mysqli_real_escape_string($conn, $_REQUEST['name']);
$org=mysqli_real_escape_string($conn, $_REQUEST['org']);
$key=mysqli_real_escape_string($conn, $_REQUEST['key']);
$email=mysqli_real_escape_string($conn, $_REQUEST['email']);
$phone=mysqli_real_escape_string($conn, $_REQUEST['phone']);

$sql = "INSERT INTO tpc (name,org,keywords,email,phone)
VALUES ('$name','$org','$key','$email','$phone')";


if ($conn->query($sql) === TRUE) {
  //  echo "<h4>New record created successfully</h4>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: tpc.php");
?>
