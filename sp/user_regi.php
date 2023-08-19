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
/*
$sql="select * from user";
$res=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
	$user_email=$row['email'];
}
*/

$fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
$lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);

$email = mysqli_real_escape_string($conn, $_REQUEST['email']);

$uname = mysqli_real_escape_string($conn, $_REQUEST['uname']);
$pass = mysqli_real_escape_string($conn, $_REQUEST['pass']);
$pass=md5($pass);

$sql="select * from user where email='$email'";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
	echo "This email has already been taken!";
}
else{
$sql = "INSERT INTO user (fname,lname,email,username,password)
VALUES ('$fname','$lname','$email','$uname','$pass')";
}

if ($conn->query($sql) === TRUE) {
    echo "<h4>Account created successfully</h4>";
} 
/*else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/

$conn->close();

// header("Location: index.html");
?>