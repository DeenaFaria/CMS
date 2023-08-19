<html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style1.css">
	
</head>
</html>
<?php
$fname=$_GET['fname'];
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

	echo "<br>";
	echo "<br>";
	echo "<center><h3><u>Author Name:</u> ".$fname."</h3></center>";
	echo "<br>";
	echo "<br>";
	echo "<center><h2>Submit Paper</h2></center>";
	//echo "<div class='container'>
      //<div class='row'>";
	echo "<form action='Files/filesLogic.php?author=$fname' method='post' enctype='multipart/form-data' >
	    <center>First Name:* <input type='text' name='fname' required><br></center>
		<center>Last Name:* <input type='text' name='lname' required><br></center>
		<center>Date:* <input type='date' name='date' required><br></center>
		<center>Email:* <input type='mail' name='email' required><br></center>
		<center>Student ID Number:* <input type='text' name='idnum' required><br></center>
		<center>Title of Paper:* <input type='text' name='title' required><br></center>
		<center>Abstract: <textarea name='abstract' rows='10' cols='70'></textarea><br><br></center>
		<center>Keywords: <textarea name='key' rows='8' cols='70'></textarea><br><br></center>
		<center>Certification:*<input type='radio' name='certi' value='certified' required>I certify that this paper is not under review elsewhere<br></center>
          <center><p>Attach a File*</p></center>
          <center><input type='file' name='myfile' required></center> <br>
          <center><button type='submit' name='save'>Submit</button></center>
        </form>";
		echo "<br><br>";
		echo "<center><a href='seeReviewAuthor.php?name=$fname'>See Review</a></center>";
		//echo "<a href='viewfile.php?author=$name'>View Your Uploaded Paper</a>";
		//echo " </div>
    //</div>";


//}
?>