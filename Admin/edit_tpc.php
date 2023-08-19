<?php
include("session.php");
include("config.php");
?>

<?php
//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM tpc WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
   
	$name = $res['name'];
	$org = $res['org'];
	$key = $res['keywords'];
    $email = $res['email'];
	$phone = $res['phone'];
}

?>

<html>
<head>
<title>Edit TPC|Conference Management System</title>
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
<h1>Edit TPC</h1>
</div>
</head>

<body>

<br><br>

<center>
<div class="regi">
<form action="edit_tpc.php" method="post">

<div class="label">Name:        </div><div class="input"><input type="text" name="name" value="<?php echo $name;?>" required></div><br><br>
<div class="label">Organization:</div><div class="input"><input type="text" name="org" value="<?php echo $org;?>" required></div><br><br>
<div class="label">Keywords:</div><div class="input"><input type="text" name="key" value="<?php echo $key;?>" required></div><br><br>
<div class="label">E-mail:      </div><div class="input"><input type="email" name="email" value="<?php echo $email;?>" required></div><br><br>
<div class="label">Phone Number:</div><div class="input"><input type="text" name="phone" pattern="(^([+]{1}[8]{2}|0088)?(01){1}[3-9]{1}\d{8})$" value="<?php echo $phone;?>" required></div><br><br>
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
	@$name=$_POST['name'];
	@$org=$_POST['org'];
	@$key=$_POST['key'];
    @$email=$_POST['email'];
	@$phone=$_POST['phone'];

@$name=mysqli_real_escape_string($conn, $_REQUEST['name']);
@$org=mysqli_real_escape_string($conn, $_REQUEST['org']);
@$key=mysqli_real_escape_string($conn, $_REQUEST['key']);
@$email=mysqli_real_escape_string($conn, $_REQUEST['email']);
@$phone=mysqli_real_escape_string($conn, $_REQUEST['phone']);

@$res=mysqli_query($conn, "update tpc set name='$name',org='$org',keywords='$key',email='$email',phone='$phone' where id='$id'");
 header("Location: tpc.php");
}
 //echo "Records updated successfully!";
?>

<?php
//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM tpc WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$org = $res['org'];
	$key = $res['keywords'];
	$email = $res['email'];
    $phone = $res['phone'];
}

$conn->close();

?>