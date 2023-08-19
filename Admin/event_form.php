<?php

include("session.php");
include("config.php");
?>
<?php
$day=$_GET['day'];
?>
<html>
<head>
<title>Event|Conference Management System</title>
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
<h1>Add Event</h1>
</div>
</head>

<body>

<br><br>
<?php echo "<center><h3><u>Day: ".$day."</u></h3></center>";?>
<br><br>
<center>
<form action="event_action.php" method="post">
<center><strong>Schedule</strong></center><br><br>
<!--<center>Day: <input type="number" name="day" min="1" max="5" value="1" required></center><br><br>-->
<center>Event Name: <input type="text" name="event" required> Start Time: <input type="time" name="start" required> End Time: <input type="time" name="end" required></center><br><br>
<input type="hidden" name="day" value="<?php echo $day;?>">
<center><input type="submit" name="submit" value="Add Event">
<input type="reset" value="Reset"></center>
<input type="hidden" name="id">
</form>
</center>

</body>
</html>