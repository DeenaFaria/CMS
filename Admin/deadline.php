<?php
include("session.php");
include("config.php");
$id=$_GET['id'];
?>

<html>
<head>
<title>Deadline|Conference Management System</title>
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
<head><h1>Add Deadline</h1></head></center>
<body>
<center>
<br>
<form action="deadline.php?id=<?php echo $id;?>" method="post">
<input type="date" name="date" required>
<input type="time" name="time" required>
<input type="hidden" name="id" value="<?php echo $id;?>"><br><br>
<input type="submit" name="submit" value="Add">
<br>
</body>
</html>
<?php
if(isset($_POST["submit"])){
	$id = mysqli_real_escape_string($conn, $_REQUEST['id']);
    $date = mysqli_real_escape_string($conn, $_REQUEST['date']);
	$time = mysqli_real_escape_string($conn, $_REQUEST['time']);
	$sql = "INSERT INTO deadline (paperno,date,time) VALUES ('$id','$date','$time')";
mysqli_query($conn, $sql);
}
?>