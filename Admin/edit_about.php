<?php
include("session.php");
include("config.php");
?>

<?php

//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM about WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
    $detail = $res['detail'];
    
}

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
<h1>Edit Details</h1>
</div>
</head>

<body>

<br><br>

<center>
<form action="edit_about.php" method="post">
<center><textarea class="tinymce" id="detail" name="detail" rows="25" cols="60"><?php echo $detail;?></textarea></center><br><br>
<input type="hidden" name="id" value=<?php echo $id;?>>
<center><input type="submit" name="submit" value="Update">
<input type="reset" value="Reset"></center>
</form>
</center>

<script type="text/javascript" src="tinymce/js/jquery.min.js"></script>
<script type="text/javascript" src="tinymce/plugin/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="tinymce/plugin/tinymce/init-tinymce.js"></script>

</body>
</html>

<?php
 
if(isset($_POST['submit']))
{    
    @$id = $_POST['id'];
    
    @$detail=$_POST['detail'];


@$detail=mysqli_real_escape_string($conn, $_REQUEST['detail']);

@$res=mysqli_query($conn, "update about set detail='$detail' where id='$id'");
 header("Location: home.php");
}
 //echo "Records updated successfully!";
?>

<?php
//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM about WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
    $detail = $res['detail'];
    
}

$conn->close();

?>