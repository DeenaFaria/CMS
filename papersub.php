<?php
session_start();
if(!isset($_SESSION['user'])||$_SESSION['user']!='x'){
	header("location:tpc.php");
	exit();
}
include("config.php");
$name=$_GET['name'];
?>

<html>
<head>
<title>Paper Submission|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" >
<?php

$sql="select * from logo";
$res=mysqli_query($conn,$sql);

$row = mysqli_fetch_array($res);
if($row['size']>0)
{
echo '<link rel="icon" href="Logo/'.$row['file'].'" type="image/x-icon">';
}


?>
<center>
<head><h1>Paper Submission</h1></head></center>
<body>
<center>
<br>
<?php
$sql="select * from author";


$res=mysqli_query($conn,$sql);
echo "<center>";
echo "<table>";
echo "<tr>
<th>#</th>
<th>Title</th>
<th>Information</th>
<th>Paper</th>
<th>Time</th>
</th></tr>";

while($row=mysqli_fetch_array($res)){
	echo "<tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['title']."</td>";
echo "<td><center><a href='Info.php?id=$row[id]&name=$name'><img src='info.png' alt='Information' width='30' height='30'></a></center></td>";
echo "<td><center><a href='download2.php?id=$row[id]'><img src='file.png' alt='Download' width='30' height='30'></a></center></td>";
echo "<td>".date('d F, Y h:i',strtotime($row['datetime']))." GMT</td>";
echo "</tr>";
echo "<br>";
}

echo "</center>";
?>
<br>

</center>
<body>