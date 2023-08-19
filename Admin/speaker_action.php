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
$topic=mysqli_real_escape_string($conn, $_REQUEST['topic']);
$name=mysqli_real_escape_string($conn, $_REQUEST['name']);
$designation=mysqli_real_escape_string($conn, $_REQUEST['designation']);

$sql1 = "INSERT INTO speaker (topic,name,designation)
VALUES ('$topic','$name','$designation')";


if ($conn->query($sql1) === TRUE) {
  //  echo "<h4>New record created successfully</h4>";
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

$conn->close();

header("Location: speaker.php");
?>
