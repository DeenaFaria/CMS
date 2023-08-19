<?php
include("session.php");
include("config.php");
?>


<!DOCTYPE html>
<html>
<head>
<title>About|Conference Management System</title>
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
<h1>Add Details</h1>
</div>
</head>

<body>

<br>

<center>
<form action="about.php" method="post">
<center><textarea class="tinymce" name="detail" rows="30" cols="60"></textarea></center><br><br>
<center><input type="submit" name="submit" value="Add Details">
<input type="reset" value="Reset"></center>
<input type="hidden" name="id">
</form>
</center>

<script type="text/javascript" src="tinymce/js/jquery.min.js"></script>
<script type="text/javascript" src="tinymce/plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="tinymce/plugin/tinymce/init-tinymce.js"></script>


<?php
if(isset($_POST['submit']))
{    
    @$id = $_POST['id'];
    
    @$detail=$_POST['detail'];

@$detail=mysqli_real_escape_string($conn, $_REQUEST['detail']);
 if(!empty($detail)){
$sql = "INSERT INTO about (detail)
VALUES ('$detail')";


if ($conn->query($sql) === TRUE) {
    echo "<h4>New record created successfully</h4>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();

 //header("Location: home.php");
}
else echo "Required Field is empty! Please add something first!<br>";
}

?>
</body>
</html>
