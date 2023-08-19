<?php
include("session.php");
include("config.php");
?>

<html>
<head>
<title>Committee|Admin|Conference Management System</title>
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
<h1>Add Committees</h1>
</div>

</head>

<body>
<br><br>
<!--<center><a href="tpc.php">TPC Members</a></center>
<br><br>-->
<center>
<div class="regi">
<center><strong><h3><span style="font-size:25px;">Committees</span></h3></strong></center><br><br>
<form action="committee_action.php" method="post">
<div class="label">Contributor:</div> <div class="input"><input type="text" name="con" required></div><br><br>
<div class="label">Name:       </div> <div class="input"><input type="text" name="name" required></div><br><br>
<div class="label">Designation:</div> <div class="input"><input type="text" name="desi" required></div><br><br>

<center><input type="submit" name="submit" value="Submit">
<input type="reset" value="Reset"></center>
</center>
</form>
</div>
<br><br>

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



$sql="select * from committee";
$res=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
	echo "<div class='committee'>";
echo "<center><h3><span style='color:gray;font-size:30px;'><strong>".$row['con']."</strong></span></h3></center>";
echo "<center><p> <span style='color:purple;font-size:20px;'><strong>".$row['name']."<br><br>".$row['desi']."</strong></span></p></center>";
echo "<center><a class='edit' href='edit_committee.php?id=$row[id]'>Edit</a> <a class='delete' href='delete_committee.php?id=$row[id]' onClick='return confirm(\"Are you sure you want to delete?\")'>Delete</a></center>";
echo "<br>";
echo "<br>";
echo "</div>";
}
echo "<br>";
?>	
</body>
</html>