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
$uname=$_POST['uname'];
$pass=$_POST['pass'];
//echo "<h4>Connected successfully</h4>";

$uname = mysqli_real_escape_string($conn, $_REQUEST['uname']);
$pass = mysqli_real_escape_string($conn, $_REQUEST['pass']);
$pass=md5($pass);
$sql="select * from user where username like '%$uname%' and password like '%$pass%'";
$res=mysqli_query($conn,$sql);
if($res){
$row=mysqli_fetch_array($res);
	//echo "Login Successful!";
	echo "<br>";
}

session_start();
//if(isset($_POST['uname'])&& isset($_POST['pass'])){
if($row['username']==$uname&& $row['password']==$pass){

	$_SESSION["user"]="x";
	header("Location:my_account.php?email=$row[email]");
	//echo "Login Successful!";
}
else{
	//echo "Invalid username or password!";
	//header("Location:index.html");
	echo "Invalid username or password!";
}
//}
?>