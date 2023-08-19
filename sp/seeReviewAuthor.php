<html>
<head>
<title>Review|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<br><br>
<?php
session_start();
if(!isset($_SESSION['user'])||$_SESSION['user']!='x'){
	header("location:tpc.php");
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
//echo "<h4>Connected successfully</h4>";
$id=$_GET['id'];
$sql1="select * from author where id=$id";
$res1=mysqli_query($conn,$sql1);
while($row1=mysqli_fetch_array($res1)){
	$id=$row1['id'];
}
@$sql="select * from addreview where paperno=$id";
$res=mysqli_query($conn,$sql);

echo "<center>";


while(@$row=mysqli_fetch_array($res)){
	echo "<div class='container'>";
echo "<table class='table table-bordered table-hover'>";
echo "<thead><tr>
<th colspan='2' scope='colgroup'><center>Reviewer $row[id] comment</center></th>
</tr></thead>";
	echo "<tbody><tr>";
echo "<td>Paper</td><td>".@$row['paperno']."</td></tr>";
echo "<tr><td>PC member</td><td>".$row['name']."</td></tr>";
echo "<tr><td>Novelty of Work</td><td><b>".$row['novelty']."</b></td></tr>";
echo "<tr><td>Presentation</td><td><b>".$row['pres']."</b></td></tr>";
echo "<tr><td>Result and Analysis</td><td><b>".$row['res']."</b></td></tr>";
echo "<tr><td>Overall evaluation</td><td><b>".$row['eval']."</b><br><br>".$row['review']."</td></tr>";
echo "<tr><td>Reviewer's confidence</td><td><b>".$row['conf']."</b></td></tr>";
echo "<tr><td>Attachment</td><td><a href='download1.php?id=$row[id]'>".$row['reviewfile']."</a></td></tr>";

echo "</tbody>";
echo "</table>";

echo "<br>";
}
//echo "</table>
echo "</div></center>";



$sql2="select * from paper_status where paperno=$id";
$res2=mysqli_query($conn,$sql2);

echo "<center>";


while(@$row2=mysqli_fetch_array($res2)){
	echo "<div class='container'>";
echo "<table class='table table-bordered table-hover'>";
echo "<thead><tr>
<th colspan='2' scope='colgroup'><center>Overall Comment</center></th>
</tr></thead>";
	echo "<tbody><tr>";
echo "<td>Paper</td><td>".@$row2['paperno']."</td></tr>";
echo "<tr><td>Comment</td><td>".$row2['comment']."</td></tr>";


echo "</tbody>";
echo "</table>";

echo "<br>";
}
?>
</body>
</html>