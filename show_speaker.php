<?php
include("config.php");
?>

<html>
<head>
<title>Keynote Speakers|Conference Management System</title>
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
<h1>Keynote Speakers</h1>
</div>
</head>

<body>

<?php

$sql="select * from speaker";
$res=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($res)){
echo "<h3><span style='color:red;font-size:25px;'>"."<strong><u>Topic:</u></strong> ".$row['topic']."</span><h3>";
echo "<h3>$row[name]<h3>";
echo "<p>$row[designation]</p>";

//echo "<br>";

$sql1 = "select * from videofiles where id=$row[id]";
$res1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_assoc($res1);
if($row1['size']>0)
{	
echo "<video width='320' height='240' controls>";
echo '<source src="admin/uploaded_video/'.$row1['name'].'" type="video/mp4">';
echo "</video>";
echo "<br>";
}
else echo "<center><span style='color:black;font-size:15px;'>No Videos Available</span></center>";
echo "<br>";
}
echo "<br><br>";
?>
</body>
</html>
