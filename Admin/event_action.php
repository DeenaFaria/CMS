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
//$day=$_GET['day'];
$day=$_POST['day'];
//$day=mysqli_real_escape_string($conn, $_REQUEST['day']);
$event=mysqli_real_escape_string($conn, $_REQUEST['event']);
$start=mysqli_real_escape_string($conn, $_REQUEST['start']);
$end=mysqli_real_escape_string($conn, $_REQUEST['end']);
$sql = "INSERT INTO event (day,event,start,end)
VALUES ('$day','$event', '$start','$end')";


if ($conn->query($sql) === TRUE) {
  //  echo "<h4>New record created successfully</h4>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

 header("Location: home.php");
?>
