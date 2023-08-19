<?php
session_start();
if(!isset($_SESSION['user'])||$_SESSION['user']!='x'){
	header("location:sp/index.html");
	exit();
}
include("config.php");
//$name=$_GET['name'];
?>

<html>
<head>
<title>Info|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="sp/css/bootstrap.min.css">
<?php
$id=$_GET['paperno'];
$email=$_GET['email'];
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
$sql="select * from author where id='$id'";


$res=mysqli_query($conn,$sql);
echo "<center>";
echo "<div class='container'>";
echo "<table class='table table-bordered table-hover table-striped'>";
echo "<thead><tr>
<th>Submission $id</th>
<th><a class='edit' href='addreview.php?id=$id&email=$email'>Add Review</a></th>
</tr></thead>";

while($row=mysqli_fetch_array($res)){
	echo "<tbody><tr>";
echo "<td>Title</td><td>".$row['title']."</td></tr>";
echo "<tr><td>Paper</td><td><a href='download2.php?id=$id'><img src='file.png' alt='Download' width='20' height='20'></a> (".date('d-m-Y h:i',strtotime($row['datetime']))." GMT)</td></tr>";
echo "<tr><td>Author Keywords</td><td>".$row['keywords']."</td></tr>";
echo "<tr><td>Abstract</td><td>".$row['abstract']."</td></tr>";
echo "<tr><td>Submitted</td><td>".date('d-m-Y h:i',strtotime($row['datetime']))." GMT</td></tr></tbody></table>";

echo "</div>";
echo "<br>";
}
echo "</center>";
?>
<br>
</center>
<body>