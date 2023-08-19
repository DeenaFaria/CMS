<?php
include("config.php");
?>

<html>
<head>
<title>TPC Members|Conference Management System</title>
<?php

$sql="select * from logo";
$res=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{

if($row['size']>0)
{
echo '<link rel="icon" href="admin/Logo/'.$row['file'].'" type="image/x-icon">';
echo "<br>";
}}
?>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" >
  <div class="header">
<h1>TPC Members</h1>
</div>

</head>

<body>

<br><br>
<center><h2>TPC Members</h2></center>
<br>

<?php
$sql="select * from tpc";
$res=mysqli_query($conn,$sql);
echo "<center>";

echo "<table>";
echo "<tr>
<th> Name</th>
<th>Organization</th>
<th>Keywords</th>
</th>";
while($row = mysqli_fetch_array($res))
{
echo "<tr>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['org']."</td>";
echo "<td>".$row['keywords']."</td>";

echo "</tr>";
}
echo "</table>";

echo "</center>";
echo "<br><br>";
mysqli_close($conn);

?>	
<br>
<center>
<!--<a href="pclogin.php">Login to add review</a><br><br>
Not signed in? <a href="pcregister.php">Register</a> Here-->
<br>
</center>	
</body>
</html>