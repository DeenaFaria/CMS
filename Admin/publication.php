<?php
include("session.php");
include("config.php");
?>



<!DOCTYPE html>
<html>
<head>
<title>Publications|Conference Management System</title>
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
<h1>Publications</h1>
</div>
</head>

<body>

<br><br>
<center>
<form action="publication.php" method="post">
<textarea class="tinymce" name="pub" rows="25" cols="60"></textarea><br><br>
<input type="submit" name="submit" value="Submit">
<input type="reset" value="Reset">
</form>
</center>
<script type="text/javascript" src="tinymce/js/jquery.min.js"></script>
<script type="text/javascript" src="tinymce/plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="tinymce/plugin/tinymce/init-tinymce.js"></script>


<?php


if(isset($_POST['submit'])){
	
//$day=mysqli_real_escape_string($conn, $_REQUEST['day']);
$text=mysqli_real_escape_string($conn, $_REQUEST['pub']);
if(!empty($text)){
$sql = "INSERT INTO pub (text)
VALUES ('$text')";


if ($conn->query($sql) === TRUE) {
    echo "<h4>New record created successfully</h4>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//$conn->close();

 //header("Location: program.php");
}
else echo "Publication Field is empty! Please add something first!";
}
?>
</body>
</html>