<?php

session_start();
if(!isset($_SESSION['student'])||$_SESSION['student']!='x'){
	header("location:index.html");
	exit();
}
//else
	//header("location:home.php");

?>

<html>
<head>
<title>User Information|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" >
  <div class="header">
<h1>Welcome to Conference Management System</h1>
</div>
<ul>
  <li><a href="logout.php">Logout</a></li>
  <li><a href="home.php">Home</a></li>
  <li><a href="speaker.html">Speakers</a></li>
  <li><a href="committee.html">Committee</a></li>
  <li><a href="venue.html">Venue</a></li>
   <li><a href="user.php">Manage User</a></li>

</ul>
<center><h3>User information</h3></center>
</head>

<body>


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
$result = mysqli_query($conn,"SELECT * FROM user");
echo "<center>";
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Address</th>
<th>Phone</th>
<th>E-mail</th>
<th>User Type</th>

<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['address'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";
echo "<td>" . $row['email'] . "</td>";
echo "<td>" . $row['user'] . "</td>";
echo "<td><a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\" >Delete</a></td>";
echo "</tr>";
}
echo "</table>";
echo "<br>";
echo "</center>";
mysqli_close($conn);
?>

</body>
</html>