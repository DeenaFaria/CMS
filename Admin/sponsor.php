<?php
include("session.php");
include("config.php");
?>

<html>
<head>
<title>Sponsors|Admin|Conference Management System</title>
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
<h1>Sponsor</h1>
</div>
</head>

<body>

<br><br>

<center>
<div class="regi">
<form action="sponsor.php" method="post" enctype='multipart/form-data'>
<center><strong><h3><u>Add Sponsor</u></h3></strong></center><br>
<center><div class="label">Sponsor Type:</div> <div class="input"><input type="text" name="type" required></div><br><br><br>
<center><div class="label">Sponsor Name:</div> <div class="input"><input type="text" name="name" required></div><br><br><br>
<center><div class="label">Add Logo:    </div> <div class="input"> <input type="file" name="logo" required></div><br><br><br>  
<input type="hidden" name="id">
<center><input type="submit" name="submit" value="Submit">
<input type="reset" value="Reset"></center>

</form>
</div>
<br><br>
</center>
<center>
<?php

if (isset($_POST['submit'])) { 
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
          $sql = "INSERT INTO sponsor (type,name,filename,size) VALUES ('$type','$name','$filename','$size')";
		    if (mysqli_query($conn, $sql)) {
			echo "Sponsor uploaded successfully";}
           
        } else {
            echo "Failed to upload sponsor.";
        }
    }
}


echo "<br>";
echo "<br>";
$sql="select * from sponsor";
$res=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
echo "<center><h3><span style='color:gray;font-size:30px;'><strong>".$row['type']."</strong></span></h3></center>";
echo "<center><p> <span style='color:purple;font-size:20px;'><strong>".$row['name']."</strong></span></p></center>";
echo "<br>";
if($row['size']>0)
{
echo '<img src="Sponsors/'.$row['filename'].'" alt="Logo" style="width:300px;height:130px">';
echo "<br>";
}
echo "<br>";
echo "<center> <a class='edit' href='edit_sponsor.php?id=$row[id]'>Edit Sponsor</a>  <a class='delete' href='delete_sponsor.php?id=$row[id]' onClick='return confirm(\"Are you sure you want to delete this sponsor?\")'>Delete Sponsor</a></center>";
echo "<br>";
}
echo "<br>";
echo "<br>";
?>
</center>
</body>
</html>