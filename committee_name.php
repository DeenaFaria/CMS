<?php
include("config.php");
?>

<html>
<head>
<title>Committees|Conference Management System</title>
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
<h1>Committees</h1>
</div>
</head>

<body>
<br><br>

<?php

$sql="select * from committee";
$res=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
	echo "<div class='committee'>";
echo "<center><h3><span style='color:gray;font-size:30px;'><strong>".$row['con']."</strong></span></h3></center>";
echo "<center><p> <span style='color:purple;font-size:20px;'><strong>".$row['name']."<br><br>".$row['desi']."</strong></span></p></center>";
echo "</div>";

}
echo "<br><br>";
?>	

</body>
</html>