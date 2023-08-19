<?php

include("session.php");
include("config.php");
?>


<html>
<head>
<title>Logo|Admin|Conference Management System</title>
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
<h1>Logo</h1>
</div>
</head>

<body>

<br><br>

<center>
<div class="regi">
<form action="logo.php" method="post" enctype='multipart/form-data'>
<center><strong><h3><u>Add Logo</u></h3></strong></center><br>
<center><div class="label">Select Logo:</div> <div class="input"> <input type="file" name="logo" required></div><br><br><br>  
<input type="hidden" name="id">
<center><input type="submit" name="submit" value="Submit">
<input type="reset" value="Reset"></center>

</form>
</div>
<br><br>
</center>
<center>
<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($hostname, $username, $password,"conference");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "<h4>Connected successfully</h4>";


if (isset($_POST['submit'])) { 

    $filename = $_FILES['logo']['name'];

    // destination of the file on the server
    $destination = 'Logo/' . $filename;

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
          $sql = "INSERT INTO logo (file,size) VALUES ('$filename','$size')";
		    if (mysqli_query($conn, $sql)) {
			echo "Logo uploaded successfully";}
           
        } else {
            echo "Failed to upload logo.";
        }
    }
}


echo "<br>";
echo "<br>";

?>
</center>
</body>
</html>