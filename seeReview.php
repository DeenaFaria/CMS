<html>
<head>
<title>Review|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="sp/css/bootstrap.min.css">
  
</head>
<body>
<br><br>
<?php
session_start();
if(!isset($_SESSION['user'])||$_SESSION['user']!='x'){
	header("location:index.html");
	exit();
}
include("config.php");
$paperno=$_GET['paperno'];

$sql="select * from addreview where paperno=$paperno";
$res=mysqli_query($conn,$sql);

echo "<center>";

echo "<div class='container'>";
while($row=mysqli_fetch_array($res)){
	echo "<table class='table table-bordered table-hover'>";
echo "<thead><tr>
<th colspan='2' scope='colgroup'><center>Review</center></th>
</tr></thead>";
	echo "<tbody><tr>";
echo "<td>Paper</td><td>".$row['paperno']."</td></tr>";
echo "<tr><td>PC member</td><td>".$row['name']."</td></tr>";
echo "<tr><td>Novelty of Work</td><td><b>".$row['novelty']."</b></td></tr>";
echo "<tr><td>Presentation</td><td><b>".$row['pres']."</b></td></tr>";
echo "<tr><td>Result and Analysis</td><td><b>".$row['res']."</b></td></tr>";
echo "<tr><td>Overall evaluation</td><td><b>".$row['eval']."</b><br><br>".$row['review']."</td></tr>";
echo "<tr><td>Reviewer's confidence</td><td><b>".$row['conf']."</b></td></tr>";
echo "<tr><td>Confidential remarks for the program committee</td><td>".$row['remark']."</td></tr>";
echo "<tr><td>Attachment</td><td><a href='download1.php?id=$row[id]'>".$row['reviewfile']."</a></td></tr></tbody>";

echo "</table>";
echo "<br>";
}
echo "</div>";
echo "</center>";

?>
</body>
</html>