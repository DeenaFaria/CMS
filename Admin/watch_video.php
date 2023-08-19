<?php

include("session.php");
include("config.php");
?>

<html>
<head>
<title>Video|Conference Management System</title>
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
  <div class="header">
<h1>Watch Video</h1>
</div>
</head>

<body>
<br><br>
<center><strong><h2><u>VIDEO</u></h2></strong></center><br>
<?php

@$id=$_GET['id'];
$sql="select * from speaker";


$res=mysqli_query($conn,$sql);
//while($row=mysqli_fetch_array($res)){
	$sql1 = "select * from videofiles where id=$id";
$res1=mysqli_query($conn,$sql1);
@$row1=mysqli_fetch_assoc($res1);
if($row1['size']>0)
{	
echo "<center><video width='400' height='320' controls>";
echo '<source src="uploaded_video/'.$row1['name'].'" type="video/mp4">';
echo "</video></center>";
echo "<br>";
echo "<center><a class='delete' href='delete_video.php?id=$row1[id]' onClick='return confirm(\"Are you sure you want to delete this video?\")'>Delete Video</a></center>";
echo "<br>";
}
else{
echo "<center>";
echo "<h3>No Videos Available</h3>";
echo "<div class='form3'>";
echo "<form action='video.php?id=$id' method='post' enctype='multipart/form-data'>";
echo "<input type='file' name='video'>";
echo "<input type='hidden' name='id'>";
echo "<input type='submit' name='save' value='Upload Video'>";
echo "</form>";
echo "</div>";
echo "</center>";
}
//}
?>