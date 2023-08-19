<html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['user'])||$_SESSION['user']!='x'){
	header("location:index.html");
	exit();
}
$email=$_GET['email'];
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
?>
<br><br>
<div class="container">
<center><a href="submission.php?email=<?php echo $email;?>">Submissions</a></center>
<br><br>
	
	<h2>New Submission</h2>
	<p>Follow the instructions, step by step, and then use the "Submit" button at the bottom of the form. The required fields are marked by (*)</p>
	<br>
	<h2>Author Information</h2>
	<p>For each of the authors please fill out the form below. Some items on the form are explained here:</p>
	<ul>
	<li><b><p>Email address </b>will only be used for communication with the authors. It will not appear in public Web pages of this conference. The email address can be omitted for authors who not corresponding. These authors will also have no access to the submission page</li>
	<!--<li><b><p>Web site </b>can be used on the conference Web pages, for example, for making the program. It should be a Web site of the author, not the Web site of her or his organization.</li>-->
	<li><p>There must be at least one <b>corresponding author</b>.</p>
	</ul>
	</div>
	<br>
	<center><h2>Submit Paper</h2></center>
	<div class='container'>
     
	<form class="w-50 m-auto" action='author_action.php' method='post' enctype='multipart/form-data' >
	 <div class="form-group">
	    <p><b>Author 1</b></p>
	    <center>First Name:* <input class="form-control" type='text' name='fname1' required><br></center>
		<center>Last Name:* <input class="form-control" type='text' name='lname1' required><br></center>
		<center>Email:* <input class="form-control" type='mail' name='email1' required><br></center>
		<center>Organization:* <input class="form-control" type='text' name='org1' required><br></center>
		<center>Corresponding Author: <input type='checkbox' name='corr1' value='yes'><br></center>
		</div>
		<div class="form-group">
		<p><b>Author 2</b></p>
	    <center>First Name:* <input class="form-control" type='text' name='fname2'><br></center>
		<center>Last Name:* <input class="form-control" type='text' name='lname2'><br></center>
		<center>Email:* <input class="form-control" type='mail' name='email2'><br></center>
		<center>Organization:* <input class="form-control" type='text' name='org2'><br></center>
		<center>Corresponding Author: <input type='checkbox' name='corr2' value='yes'><br></center>
		</div>
		
		<!--<a id="toggleform" href="#">Add more author</a>-->
		<div id='hideform' style="display:none;">
		<div class="form-group">
		<p><b>Author 3</b></p>
	    <center>First Name:* <input class="form-control" type='text' name='fname3'><br></center>
		<center>Last Name:* <input class="form-control" type='text' name='lname3'><br></center>
		<center>Email:* <input class="form-control" type='mail' name='email3'><br></center>
		<center>Organization:* <input class="form-control" type='text' name='org3'><br></center>
		<center>Corresponding Author: <input type='checkbox' name='corr3' value='yes'><br></center><br>
		<button class="btn btn-secondary" type="button" id="button2" onclick='show2()'>Click here to add more authors</button>
		<br>
		</div>
		</div>
		
		<div id='hideform2' style="display:none;">
		<div class="form-group">
		<p><b>Author 4</b></p>
	    <center>First Name:* <input class="form-control" type='text' name='fname4'><br></center>
		<center>Last Name:* <input class="form-control" type='text' name='lname4'><br></center>
		<center>Email:* <input class="form-control" type='mail' name='email4'><br></center>
		<center>Organization:* <input class="form-control" type='text' name='org4'><br></center>
		<center>Corresponding Author: <input type='checkbox' name='corr4' value='yes'><br></center>
		</div>
		</div>
		
		<button class="btn btn-secondary" type="button" id="button" onclick='show()'>Click here to add more authors</button>
		<br><br>
		<div class="form-group">
		<h3>Title and Abstract</h3>
		<p>The title and the abstract should be entered as plain text, they should not contain HTML elements.</p>
		<center>Title of Paper:* <input class="form-control" type='text' name='title' required><br></center>
		<p>The abstract should not exceed 500 words<p>
		<center>Abstract: <textarea class="form-control" name='abstract' rows='10' cols='70'></textarea><br><br></center>
		</div>
		<div class="form-group">
		<h3>Keywords</h3>
		<p>Type a list of keywords (also known as key phrases or key terms), <b>one per line</b> to characterize your submission. You should specify at least three keywords.<p>
		<center>Keywords: <textarea class="form-control" name='key' rows='6' cols='50'></textarea><br><br></center>
		</div>
		<!--<center>Certification:*<input type='radio' name='certi' value='certified' required>I certify that this paper is not under review elsewhere<br></center>-->
          <div class="form-group">
		  <center><p><b>Attach a File*</b></p></center>
          <center><input class="form-control-file" type='file' name='myfile' required></center> <br>
		  </div>
          <center><button class="btn btn-primary" type='submit' name='submit'>Submit</button></center>
        </form>
		<br><br>
		
		<!--<a href='viewfile.php?author=$name'>View Your Uploaded Paper</a>-->
		 </div>
    </div>
	<script>
	function show(){
		document.getElementById('hideform').style.display='block';
		document.getElementById('button').style.display='none';
	}
	
	function show2(){
		document.getElementById('hideform2').style.display='block';
		document.getElementById('button2').style.display='none';
	}
	</script>
	</body>
	</html>