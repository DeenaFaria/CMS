<?php
if(isset($_POST['submit'])){
$hostname = "127.0.0.1";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($hostname, $username, $password,"conference");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email=$_POST['email'];
$pass=$_POST['pass'];
//echo "<h4>Connected successfully</h4>";

//$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
//$pass = mysqli_real_escape_string($conn, $_REQUEST['pass']);
$pass=md5($pass);
$sql="select * from pcregister where email like '%$email%' and password like '%$pass%'";
$res=mysqli_query($conn,$sql);
if($res){
$row=mysqli_fetch_array($res);
	//echo "Login Successful!";
	echo "<br>";
}

session_start();
//if(isset($_POST['uname'])&& isset($_POST['pass'])){
if($row['email']==$email&& $row['password']==$pass){

	$_SESSION["user"]="x";
	$name=$row['name'];
	header("Location:papersub.php?name='$name'");
	//echo "Login Successful!";
}
else{
	//echo "Invalid username or password!";
	//header("Location:index.html");
	echo "Invalid username or password!";
}
//}
}
?>

<html>
<head>
<title>Login</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" >
  <div class="header">

</div>
</head>
<body>
<br><br><br>
<div class="regi">
<center>
<form method="post" action="pclogin.php">
<center>Email:<input type="text" name="email" required></center><br><br>
<center>Password:<input type="password" name="pass" id="pass" required></center><br><br>
<input type="checkbox" onclick="show()">Show Password
<br><br>
<input type="submit" name="submit" value="Sign in">
<input type="reset">
</form>
</center>
</div>

</body>
</html>

<script>
function show(){
	var x=document.getElementById("pass");
	if(x.type==="password"){
		x.type="text";
	}
	else{
    	x.type="password";
	}
}
</script>