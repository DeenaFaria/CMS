<?php

include("session.php");
include("config.php");
?>

<?php

//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM sponsor WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
	 $type = $res['type'];
     $name = $res['name'];
	 $logo = $res['filename'];
     $size = $res['size'];
}

?>

<html>
<head>
<title>Edit Sponsor|Conference Management System</title>
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
<h1>Edit Sponsor</h1>
</div>
</head>

<body>

<br><br>

<center>
<div class="regi">
<form action="edit_sponsor.php" method="post" enctype='multipart/form-data'>
<center><strong><h3><u>Edit Sponsor</u></h3></strong></center><br>
<div class="label">Sponsor Type:</div> <div class="input"><input type="text" name="type" value="<?php echo $type;?>" required></div><br><br><br>
<div class="label">Sponsor Name:</div> <div class="input"><input type="text" name="name" value="<?php echo $name;?>" required></div><br><br><br>
<center><div class="label">Change Logo:</div> <div class="input"> <input type="file" name="logo" required></div><br><br><br> 
<input type="hidden" name="id" value=<?php echo $id;?>>
<center><input type="submit" name="submit" value="Update">
<input type="reset" value="Reset"></center>
</form>
</div>
</center>

</body>
</html>

<?php
if (isset($_POST['submit'])) { 
$id = $_POST['id'];
$type=$_POST['type'];
$name=$_POST['name'];
$type=mysqli_real_escape_string($conn, $_REQUEST['type']);
$name=mysqli_real_escape_string($conn, $_REQUEST['name']);
    $filename = $_FILES['logo']['name'];

    // destination of the file on the server
    $destination = 'Sponsors/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['logo']['tmp_name'];
    $size = $_FILES['logo']['size'];

  if (!in_array($extension, ['jpg','png'])) {
        echo "You file extension must be .jpg or .png";
    } else
	   if ($_FILES['logo']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
          $sql = "update sponsor set type='$type', name='$name', filename='$filename', size='$size'  where id='$id'";
		    if (mysqli_query($conn, $sql)) {
			echo "Sponsor updated successfully";}
           
        } else {
            echo "Failed to update sponsor.";
        }
    }
	header("Location:sponsor.php");
}

?>

<?php
//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM sponsor WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
    $type = $res['type'];
	$name = $res['name'];
	$logo = $res['filename'];
	$size = $res['size'];
    
}

$conn->close();

?>