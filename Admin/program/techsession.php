<?php
include("session.php");
include("config.php");
?>
<?php

$day=$_GET['day'];
if(isset($_POST['submit'])){
	
//$day=mysqli_real_escape_string($conn, $_REQUEST['day']);
$sessno=mysqli_real_escape_string($conn, $_REQUEST['num']);
$psessno=mysqli_real_escape_string($conn, $_REQUEST['pnum']);
$roomno=mysqli_real_escape_string($conn, $_REQUEST['room']);
$topic=mysqli_real_escape_string($conn, $_REQUEST['topic']);
$day=$_POST['day'];
$sql = "INSERT INTO technical (tsession,psession,room,topic,day)
VALUES ('$sessno','$psessno','$roomno', '$topic','$day')";


if ($conn->query($sql) === TRUE) {
  //  echo "<h4>New record created successfully</h4>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//$conn->close();

 header("Location: program.php");
}
?>
<html>
<head>
<title>KTS|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  
<?php

$sql="select * from logo";
$res=mysqli_query($conn,$sql);

$row = mysqli_fetch_array($res);
if($row['size']>0)
{
echo '<link rel="icon" href="../Logo/'.$row['file'].'" type="image/x-icon">';
}
?>
<div class="header">
<h1>Add Keynote and Technical Session</h1>
</div>
</head>

<body>

<br><br>

<br><br>
<center>
<form action="techsession.php" method="post">
<center><strong>Technical Session</strong></center><br><br>
<!--<center>Day: <input type="number" name="day" min="1" max="5" value="1" required></center><br><br>-->
<center>Technical Session No.: <input type="number" name="num" min="1" max="10" required> </center><br><br>
<center>Parallel Session No.: <input type="number" name="pnum" min="1" max="10" required> </center><br><br>
<center>Room No.: <input type="text" name="room" required> </center><br><br>
<center>Session Topic: <input type="text" name="topic" required></center> <br><br>
<input type="hidden" name="day" value="<?php echo $day;?>">
<center><input type="submit" name="submit" value="Add Session">
<input type="reset" value="Reset"></center>
<input type="hidden" name="id">
</form>


</center>

</body>
</html>

