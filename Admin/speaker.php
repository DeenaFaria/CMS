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
<h1>Speaker</h1>
</div>
</head>

<body>
<br><br>
<center><strong><h2><u>Keynote Speakers</u></h2></strong></center>

<br><br>

<center>
<div class="regi">
<form action="speaker_action.php" method="post">
<center><strong><h3><u>Add Speakers</u></h3></strong></center><br>
<center><div class="label">Topic:       </div> <div class="input"><input type="text" name="topic" required></div><br><br><br>
<center><div class="label">Speaker Name:</div> <div class="input"><input type="text" name="name" required></div><br><br><br>
<center><div class="label">Designation: </div> <div class="input"> <input type="text" name="designation" required></div><br><br><br>  
<input type="hidden" name="id">
<center><input type="submit" name="submit" value="Submit">
<input type="reset" value="Reset"></center>

</form>
</div>
<br><br>
<a class='kts' href="show_speaker.php">Show Speakers</a>
<br><br>
</center>

</body>
</html>