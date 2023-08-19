<html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style1.css">
	
</head>
</html>
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
//$user = mysqli_real_escape_string($conn, $_REQUEST['user']);
$uname = mysqli_real_escape_string($conn, $_REQUEST['uname']);
$pass = mysqli_real_escape_string($conn, $_REQUEST['pass']);
$sql="select * from user where username like '%$uname%' and password like '%$pass%'";
$res=mysqli_query($conn,$sql);
if($res){
$row=mysqli_fetch_array($res);
	//echo "Login Successful!";
	echo "<br>";
}

session_start();
//if(isset($_POST['uname'])&& isset($_POST['pass'])){
if($row['username']==$uname&& $row['password']==$pass && $row['user']=="Reviewer"){
	//echo "Login Successful!";
	
	$_SESSION["student"]="x";
	//header("Location:home.php");
	echo "<center>Login Successful!</center><br><br>";
	//echo "<center><h1>Welcome $uname</h1></center><br><br>";
	echo "<center><h2>View Paper</h2></center><br><br>";
	echo "<center><a href='viewfile.php'>View</a></center><br><br>";
	echo "<center><h2>Give Feedback</h2></center>";
	echo "
	<form action='rAction.php' method='post'>
	<input type='text' name='feedback'>
	<input type='submit' name='submit' value='send'>
	</form>";
	
}
else{
	//echo "Invalid username or password!";
	//header("Location:login.html");
	echo '<script>alert("Invalid username or password!")</script>'; 
	 echo "<script>document.location.href='login.html'</script>";
	//header("Location:login.html");
	//echo "Invalid username or password!";
}
//}

?>