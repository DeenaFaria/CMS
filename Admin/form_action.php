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

$conference = mysqli_real_escape_string($conn, $_REQUEST['conference']);
$sname = mysqli_real_escape_string($conn, $_REQUEST['sname']);
$date = mysqli_real_escape_string($conn, $_REQUEST['date']);
$location = mysqli_real_escape_string($conn, $_REQUEST['location']);
$date1 = mysqli_real_escape_string($conn, $_REQUEST['date1']);
$date2 = mysqli_real_escape_string($conn, $_REQUEST['date2']);
$date3 = mysqli_real_escape_string($conn, $_REQUEST['date3']);
$date4 = mysqli_real_escape_string($conn, $_REQUEST['date4']);
$date5 = mysqli_real_escape_string($conn, $_REQUEST['date5']);
$date6 = mysqli_real_escape_string($conn, $_REQUEST['date6']);

if($date6<$date){
	echo "<center>Please enter a valid End Date!</center>";
}
else{
$sql = "INSERT INTO form (conference,shortname,date,location,date1,date2,date3,date4,date5,date6)
VALUES ('$conference','$sname', '$date','$location','$date1','$date2','$date3','$date4','$date5','$date6')";


if ($conn->query($sql) === TRUE) {
  //  echo "<h4>New record created successfully</h4>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
header("Location: home.php");
}
 
?>