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
$con=mysqli_real_escape_string($conn, $_REQUEST['con']);
$name=mysqli_real_escape_string($conn, $_REQUEST['name']);
$desi=mysqli_real_escape_string($conn, $_REQUEST['desi']);

$sql = "INSERT INTO committee (con,name,desi)
VALUES ('$con','$name','$desi')";


if ($conn->query($sql) === TRUE) {
  //  echo "<h4>New record created successfully</h4>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: committee_name.php");
?>
