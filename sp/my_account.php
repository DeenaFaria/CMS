<?php
session_start();
if(!isset($_SESSION['user'])||$_SESSION['user']!='x'){
	header("location:index.html");
	exit();
}
$hostname = "127.0.0.1";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($hostname, $username, $password,"conference");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email=$_GET['email'];
$sql="select * from user where email='$email'";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($res)){
	$uname=$row['username'];
	$id=$row['id'];
}
$sql1="select count(id) as total from review_req where email='$email' and rev_stat='Not reviewed'";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($res1);
//echo $row1['total'];
?>

<html>
<head>
<title>My Account</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- <link rel="stylesheet" type="text/css" href="style.css" >-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <header class="bg-light">
  <div class="col-lg-8 m-auto">
<h1 class="text-center mb-0 py-5">Conference Management System</h1>
</div>
</header>
</head>

<body>
<br><br>
<center><h3>Welcome <?php echo $uname;?></h3></center>
<br><br>

<div class="container">
<center>
<div class="row">
<div class="col-lg-3 col-md-6">
Submit Paper<br>
<a href="author1.php?email=<?php echo $email;?>"><img src='icons/submit_paper.png' alt='Submit Paper' width='100' height='100'></a>
</div>
<div class="col-lg-3 col-md-6">
Review Request<?php echo "<b>(".$row1['total'].")</b>";?><br>
<a href="review_req.php?email=<?php echo $email;?>"><img src='icons/review.png' alt='Review Request' width='100' height='100'></a>
</div>
<div class="col-lg-3 col-md-6">
Edit Account<br>
<a href="edit_user.php?id=<?php echo $id;?>"><img src='icons/account.png' alt='Edit Account' width='110' height='100'></a>
</div>
<div class="col-lg-3 col-md-6">
Logout<br>
<a href="logout_user.php"><img src='icons/logout.png' alt='Logout' width='110' height='80'></a>
</div>
</div>
</center>
</div>

</body>
</html>