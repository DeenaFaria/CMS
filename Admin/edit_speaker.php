<?php

include("session.php");
include("config.php");
?>

<?php

//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM speaker WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
	 $topic = $res['topic'];
     $name = $res['name'];
	 $designation = $res['designation'];
    
}

?>

<html>
<head>
<title>Edit Speaker|Conference Management System</title>
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
<h1>Welcome to Conference Management System</h1>
</div>
</head>

<body>

<br><br>

<center>
<div class="regi">
<form action="edit_speaker.php" method="post">
<center><strong><h3><u>Edit Speakers</u></h3></strong></center><br>
<div class="label">Topic:       </div> <div class="input"><input type="text" name="topic" value="<?php echo $topic;?>" required></div><br><br><br>
<div class="label">Speaker Name:</div> <div class="input"><input type="text" name="name" value="<?php echo $name;?>" required></div><br><br><br>
<div class="label">Designation: </div> <div class="input"><input type="text" name="designation" value="<?php echo $designation;?>" required></div><br><br><br>  
<input type="hidden" name="id" value=<?php echo $id;?>>
<center><input type="submit" name="submit" value="Update">
<input type="reset" value="Reset"></center>
</form>
</div>
</center>

</body>
</html>

<?php
 
if(isset($_POST['submit']))
{    
    @$id = $_POST['id'];
    
    @$topic=$_POST['topic'];
	@$name=$_POST['name'];
	@$designation=$_POST['designation'];


@$topic=mysqli_real_escape_string($conn, $_REQUEST['topic']);
@$name=mysqli_real_escape_string($conn, $_REQUEST['name']);
@$designation=mysqli_real_escape_string($conn, $_REQUEST['designation']);

@$res=mysqli_query($conn, "update speaker set topic='$topic', name='$name', designation='$designation'  where id='$id'");
 header("Location: show_speaker.php");
}
 //echo "Records updated successfully!";
?>

<?php
//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM speaker WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
    $topic = $res['topic'];
	$name = $res['name'];
	$designation = $res['designation'];
    
}

$conn->close();

?>