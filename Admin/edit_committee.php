<?php
include("session.php");
include("config.php");

?>

<?php

//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM committee WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
    $con = $res['con'];
	$name = $res['name'];
	$desi = $res['desi'];
    
}

?>

<html>
<head>
<title>Edit Committee|Conference Management System</title>
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
<form action="edit_committee.php" method="post">
<center><strong><h3>Edit Committee</h3></strong></center><br><br>
<div class="label">Contributor:</div> <div class="input"><input type="text" name="con" value="<?php echo $con;?>" required></div><br><br>
<div class="label">Name:       </div> <div class="input"><input type="text" name="name" value="<?php echo $name;?>" required></div><br><br>
<div class="label">Designation:</div> <div class="input"><input type="text" name="desi" value="<?php echo $desi;?>" required></div><br><br>
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
    
    @$con=$_POST['con'];
	@$name=$_POST['name'];
	@$desi=$_POST['desi'];


@$con=mysqli_real_escape_string($conn, $_REQUEST['con']);
@$name=mysqli_real_escape_string($conn, $_REQUEST['name']);
@$desi=mysqli_real_escape_string($conn, $_REQUEST['desi']);

@$res=mysqli_query($conn, "update committee set con='$con',name='$name',desi='$desi' where id='$id'");
 header("Location: committee_name.php");
}
 //echo "Records updated successfully!";
?>

<?php
//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM committee WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
    $con = $res['con'];
	$name = $res['name'];
	$desi = $res['desi'];
    
}

$conn->close();

?>