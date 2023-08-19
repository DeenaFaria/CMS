<?php
include("session.php");
include("config.php");
?>

<?php

if(isset($_POST['submit'])){

$id=$_GET['id'];

$slno=mysqli_real_escape_string($conn, $_REQUEST['slno']);
$pid=mysqli_real_escape_string($conn, $_REQUEST['pid']);
$title=mysqli_real_escape_string($conn, $_REQUEST['title']);
//$id=$_POST['id'];
//$id=mysqli_real_escape_string($conn, $_REQUEST['id']);

$sql = "INSERT INTO accpaper (slno,pid,title,id)
VALUES ('$slno','$pid','$title','$id')";


if ($conn->query($sql) === TRUE) {
    echo "<h4>New record created successfully</h4>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

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
<form action="paper.php?id=<?php echo $_GET['id'];?>" method="post">
<center><strong>Paper</strong></center><br><br>
<!--<center>Day: <input type="number" name="day" min="1" max="5" value="1" required></center><br><br>-->
<center>Sl. No.: <input type="number" name="slno" min="1" max="10" required> </center><br><br>
<center>Paper ID.: <input type="number" name="pid" min="1" max="1000" required> </center><br><br>
<center>Paper Title: <input type="text" name="title" required></center> <br><br>

<center><input type="submit" name="submit" value="Add">
<input type="reset" value="Reset"></center>
<input type="hidden" name="id">
</form>


</center>

</body>
</html>

