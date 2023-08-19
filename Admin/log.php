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

$uname = mysqli_real_escape_string($conn, $_REQUEST['uname']);
$pass = mysqli_real_escape_string($conn, $_REQUEST['pass']);
$pass=md5($pass);
$sql="select * from register where username like '%$uname%' and password like '%$pass%'";
$res=mysqli_query($conn,$sql);
if($res){
$row=mysqli_fetch_array($res);
	//echo "Login Successful!";
	echo "<br>";
}

session_start();
//if(isset($_POST['uname'])&& isset($_POST['pass'])){
if($row['username']==$uname&& $row['password']==$pass){
	//echo "Login Successful!";
	
	$_SESSION["student"]="x";
	header("Location:home.php");
	echo "Login Successful!";
}
else{
	//echo "Invalid username or password!";
	//header("Location:index.html");
	echo "Invalid username or password!";
}
//}
?>