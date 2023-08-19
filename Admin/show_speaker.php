<?php

include("session.php");
include("config.php");
?>

<html>
<head>
<title>Keynote Speakers|Admin|Conference Management System</title>
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
<h1>Speakers</h1>
</div>
</head>

<body>
<br><br>
<center><strong><h2><u>Keynote Speakers</u></h2></strong></center>
<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($hostname, $username, $password,"conference");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="select * from speaker";


$res=mysqli_query($conn,$sql);
echo "<center>";
echo "<table>";
echo "<tr>
<th>Topic</th>
<th>Name</th>
<th>Designation</th>
<th>Video</th>
<th>Edit/Delete</th>
</th></tr>";

while($row=mysqli_fetch_array($res)){
	echo "<tr>";
echo "<td>".$row['topic']."</td>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['designation']."</td>";
echo "<td><center><a class='watch' href='watch_video.php?id=$row[id]'>Watch Video</a></center></td>";
echo "<td><center><a class='edit' href='edit_speaker.php?id=$row[id]'>Edit</a> <a class='delete' href='delete_speaker.php?id=$row[id]' onClick='return confirm(\"Are you sure you want to delete?\")'>Delete</a></center></td>";
echo "</tr>";
echo "<br>";
}
echo "</center>";
//echo "<br>";
?>
</body>
</html>
