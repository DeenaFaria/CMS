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
<title>View Paper|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" >
  <div class="header">
<h1>My Paper/s</h1>
</div>

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
$author=$_GET['author'];

echo "<br><br>";
echo "<center><h4><u>Author Name:</u> ".$author."</h4><center>";
echo "<br><br>";
$result = mysqli_query($con,"SELECT * FROM files where author like '%$author%'");

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

echo "<td><a href=\"viewpdf.php?id=$row[id]\">View</a><br><br><a href=\"Files\fileslogic.php?id=$row[id]\">Download</a></td>";
//echo "<td><a href=\"feedback.php?id=$row[id]\">Send Feedback</a></td>";
echo "</tr>";
}
echo "</table>";

mysqli_close($con);
?>
</center>
</body>
</html>

