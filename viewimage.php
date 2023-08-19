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
<title>Home|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" >
  <div class="header">
<h1>Welcome to Conference Management System</h1>
</div>
<ul>
  <li><a href="index.html">Logout</a></li>
  <li><a href="home.php">Home</a></li>
  <li><a href="speaker.html">Speakers</a></li>
  <li><a href="committee.html">Committee</a></li>
  <li><a href="venue.html">Venue</a></li>

</ul>
</head>

<body>
<br><br>
<center>
<?php
$con=mysqli_connect("localhost","root","","conference");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM files where name like '%png%' or name like '%jpg%'");

echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Size</th>
<th>View</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['size'] . "</td>";

echo "<td><a href=\"img.php?id=$row[id]\">View</a></td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
</center>
</body>
</html>

