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


$name = mysqli_real_escape_string($conn, $_REQUEST['name']);

$email = mysqli_real_escape_string($conn, $_REQUEST['email']);

//$uname = mysqli_real_escape_string($conn, $_REQUEST['uname']);
$pass = mysqli_real_escape_string($conn, $_REQUEST['pass']);
$pass=md5($pass);

$sql="select * from pcregister where email='$email'";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
	echo "This email has already been taken!";
}
else{
$sql = "INSERT INTO pcregister (name,email,password)
VALUES ('$name','$email','$pass')";
}

if ($conn->query($sql) === TRUE) {
    echo "<h4>Account created successfully</h4>";
} 
/*else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/

$conn->close();
}
// header("Location: index.html");
?>

<html>
<head>
<title>Register</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" >
  <div class="header">
<h1>Register</h1>
</div>
</head>
<body>
<h3>Register Here</h3>
<div class="regi">
<center>
<form method="post" action="pcregister.php">
<div class="label">Name:</div>   <div class="input"> <input type="text" name="name" required></div><br><br>

<div class="label">Email:</div>  <div class="input"> <input type="mail" name="email" required></div><br><br>

<div class="label">Password:</div><div class="input"><input type="password" name="pass" id="pass" onchange="check_pass();" pattern=".{6,}" required title="6 characters minimum"></div><br><br>

<center><input type="checkbox" onclick="show()">Show Password</center>
<br><br>
<div class="label">Confirm Password:</div><div class="input"><input type="password" name="conpass" id="conpass" onchange="check_pass();" pattern=".{6,}" required title="6 characters minimum"></div><br><br>
<center><input type="checkbox" onclick="showcon()">Show Password</center>
<br><br><input type="submit" name="submit" id="submit" value="Sign Up" disabled>
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
<script>
function showcon(){
	var y=document.getElementById("conpass");
	if(y.type==="password"){
		y.type="text";
	}
	else{
    	y.type="password";
	}
}
</script>
<script>
function check_pass(){
if(document.getElementById('pass').value==document.getElementById('conpass').value){
document.getElementById('submit').disabled=false;
}
else{
document.getElementById('submit').disabled=true;
}
}
</script>	