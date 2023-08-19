<?php
include("session.php");
include("config.php");
//$name=$_GET['name'];
?>

<html>
<head>
<title>Paper Submission|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../sp/css/bootstrap.min.css">
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
<br><br>
<head><h1>Paper Submission</h1></head></center>
<body>
<center>
<br>
<?php
$sql="select * from author";


$res=mysqli_query($conn,$sql);
echo "<center>";
echo "<div class='container'>";
echo "<table class='table table-bordered table-hover'>";
echo "<thead><tr>
<th>#</th>
<th>Title</th>
<th>Information</th>
<th>Paper</th>
<th>Time</th>
<th>Add Deadline</th>
<th>Status</th>

</tr></thead>";

while($row=mysqli_fetch_array($res)){
$sql1="select * from paper_status where paperno='$row[id]'";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($res1);
	echo "<tbody><tr>";
echo "<td>".$row['id']."</td>";
echo "<td>".$row['title']."</td>";
echo "<td><center><a href='Info.php?id=$row[id]'><img src='info.png' alt='Information' width='30' height='30'></a></center></td>";
echo "<td><center><a href='../download2.php?id=$row[id]'><img src='file.png' alt='Download' width='30' height='30'></a></center></td>";
echo "<td>".date('d F, Y h:i',strtotime($row['datetime']))." GMT</td>";

$sql2="select * from deadline where paperno='$row[id]'";
$res2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_array($res2);
if($row2['date']==NULL)
echo "<td><center><a href='deadline.php?id=$row[id]'>Add</a></center></td>";
else echo "<td><span style='color:purple;font-size:16px;'><strong>".date('h:i:s A',strtotime($row2['time'])).", ".date('d F, Y',strtotime($row2['date']))."</strong></span></td>";
echo "<td>".$row1['status']."</td>";
//echo "<td><center><a href='Update_status.php?id=$row[id]'>Update</a></center></td>";
echo "</tr></tbody>";
echo "<br>";
}
echo "</table></div>";
echo "</center>";
echo "<br><br>";

/*$sql1="select * from paper_status";
$res1=mysqli_query($conn,$sql1);
echo "<center>";
echo "<h3>Paper Status</h3>";
echo "<div class='container'>";
echo "<table class='table table-bordered table-hover'>";
echo "<thead><tr>
<th>Paper no.</th>
<th>Title</th>
<th>Status</th>
</tr></thead>";

while($row1=mysqli_fetch_array($res1)){
	echo "<tbody><tr>";
echo "<td>".$row1['paperno']."</td>";
echo "<td>".$row1['title']."</td>";
echo "<td>".$row1['status']."</td>";
echo "</tr></tbody>";
echo "<br>";
}
echo "</table></div>";
echo "</center>";
*/
?>
<br>

</center>
<body>