<?php
ob_start();
//include("session.php");
include("config.php");

$id=$_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM author where id=$id");
while($res = mysqli_fetch_array($result))
{
	//$id=$_POST['id'];
	$fname1 = $res['fname1'];
	$lname1 = $res['lname1'];
	$email1=$res['email1'];
    $org1 = $res['org1'];
    $corr1=$res['corr1'];
	
	$fname2 = $res['fname2'];
	$lname2 = $res['lname2'];
	$email2=$res['email2'];
    $org2 = $res['org2'];
    $corr2=$res['corr2'];
	
	$fname3 = $res['fname3'];
	$lname3 = $res['lname3'];
	$email3=$res['email3'];
    $org3 = $res['org3'];
    $corr3=$res['corr3'];
	
	$fname4 = $res['fname4'];
	$lname4 = $res['lname4'];
	$email4=$res['email4'];
    $org4 = $res['org4'];
    $corr4=$res['corr4'];
	
	$title=$res['title'];
	$abs=$res['abstract'];
	$key=$res['keywords'];
	$file=$res['file'];
	$datetime=$res['datetime'];
}
?>

<html>
<head>
<title>Edit Authors|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style1.css">


<div class="header">
<center><h2>Edit Authors</h2></center>
</div>


</head>

<body>

	    <!-- Body section -->
    <div class = "body_sec"> 
        <section id="Content"> 
		<center>
           <div class="form">
		   
		      <form method="post" action="Update_Authors.php">
                <br><br>
				<div class="container2">
        <p><b><u>Author 1</u></b></p>
	    <center>First Name:<input type='text' name='fname1' value='<?php echo $fname1;?>'><br></center>
		<center>Last Name:<input type='text' name='lname1' value='<?php echo $lname1;?>'><br></center>
		<center>Email:<input type='email' name='email1' value='<?php echo $email1;?>'><br></center>
		<center>Organization:<input type='text' name='org1' value='<?php echo $org1;?>'><br></center>
		<center>Corresponding Author<input type='checkbox' name='corr1' value='<?php echo $corr1;?>'><br></center>
		<p><b><u>Author 2</u></b></p>
	    <center>First Name:<input type='text' name='fname2' value='<?php echo $fname2;?>'><br></center>
		<center>Last Name:<input type='text' name='lname2' value='<?php echo $lname2;?>'><br></center>
		<center>Email:<input type='email' name='email2' value='<?php echo $email2;?>'><br></center>
		<center>Organization:<input type='text' name='org2' value='<?php echo $org2;?>'><br></center>
		<center>Corresponding Author<input type='checkbox' name='corr2' value='<?php echo $corr2;?>'><br></center>
		
		<!--<a id="toggleform" href="#">Add more author</a>-->
		<p><b><u>Author 3</u></b></p>
	    <center>First Name:<input type='text' name='fname3' value='<?php echo $fname3;?>'><br></center>
		<center>Last Name:<input type='text' name='lname3' value='<?php echo $lname3;?>'><br></center>
		<center>Email:<input type='email' name='email3' value='<?php echo $email3;?>'><br></center>
		<center>Organization:<input type='text' name='org3' value='<?php echo $org3;?>'><br></center>
		<center>Corresponding Author<input type='checkbox' name='corr3' value='<?php echo $corr3;?>'><br></center>
		
	    <p><b><u>Author 4</u></b></p>
	    <center>First Name:<input type='text' name='fname4' value='<?php echo $fname4;?>'><br></center>
		<center>Last Name:<input type='text' name='lname4' value='<?php echo $lname4;?>'><br></center>
		<center>Email:<input type='email' name='email4' value='<?php echo $email4;?>'><br></center>
		<center>Organization:<input type='text' name='org4' value='<?php echo $org4;?>'><br></center>
		<center>Corresponding Author<input type='checkbox' name='corr1' value='<?php echo $corr4;?>'><br></center>
	
		
	
		<div id="block" style="display:none">
		<h3>Title and Abstract</h3>
		<p>The title and the abstract should be entered as plain text, they should not contain HTML elements.</p>
		<center>Title of Paper:* <input type='text' name='title' value='<?php echo $title;?>' required><br></center>
		<p>The abstract should not exceed 500 words<p>
		<center>Abstract: <textarea name='abstract' rows='10' cols='70'><?php echo $abs;?></textarea><br><br></center>
		<h3>Keywords</h3>
		<p>Type a list of keywords (also known as key phrases or key terms), <b>one per line</b> to characterize your submission. You should specify at least three keywords.<p>
		<center>Keywords: <textarea name='key' rows='8' cols='70'><?php echo $key;?></textarea><br><br></center>
		<!--<center>Certification:*<input type='radio' name='certi' value='certified' required>I certify that this paper is not under review elsewhere<br></center>-->
          
          <center><input type='hidden' name='myfile' value='<?php echo $file;?>'></center> <br>
		  <center><input type='hidden' name='datetime' value='<?php echo $datetime;?>'></center> <br>
		  <center><input type='hidden' name='id' value='<?php echo $id;?>'></center> <br>
		  </div>
		  
          <center><button type='submit' name='update'>Update</button></center>
</form>
</center>
	
 </section> 
    </div> 
      
    <!-- Footer Section -->
   
</body> 
</html>   

<?php

if(isset($_POST['update']))
{    
    $id = $_POST['id'];
	$fname1 = $_POST['fname1'];
	$lname1 = $_POST['lname1'];
	$email1=$_POST['email1'];
    $org1 = $_POST['org1'];
    $corr1=$_POST['corr1'];
	
	$fname2 = $_POST['fname2'];
	$lname2 = $_POST['lname2'];
	$email2=$_POST['email2'];
    $org2 = $_POST['org2'];
    $corr2=$_POST['corr2'];
	
	$fname3 = $_POST['fname3'];
	$lname3 = $_POST['lname3'];
	$email3=$_POST['email3'];
    $org3 = $_POST['org3'];
    $corr3=$_POST['corr3'];
	
	$fname4 = $_POST['fname4'];
	$lname4 = $_POST['lname4'];
	$email4=$_POST['email4'];
    $org4 = $_POST['org4'];
    $corr4=$_POST['corr4'];
	
	$title=$_POST['title'];
	$abs=$_POST['abstract'];
	$key=$_POST['key'];
	$file=$_POST['myfile'];
	$datetime=$_POST['datetime'];
    
    /*$fname1 = mysqli_real_escape_string($conn, $_REQUEST['fname1']);
	$lname1 = mysqli_real_escape_string($conn, $_REQUEST['lname1']);
    $email1 = mysqli_real_escape_string($conn, $_REQUEST['email1']);
    $org1 = mysqli_real_escape_string($conn, $_REQUEST['org1']);
	$corr1 = mysqli_real_escape_string($conn, $_REQUEST['corr1']);
	
	$fname2 = mysqli_real_escape_string($conn, $_REQUEST['fname2']);
	$lname2 = mysqli_real_escape_string($conn, $_REQUEST['lname2']);
    $email2 = mysqli_real_escape_string($conn, $_REQUEST['email2']);
    $org2 = mysqli_real_escape_string($conn, $_REQUEST['org2']);
	@$corr2 = mysqli_real_escape_string($conn, $_REQUEST['corr2']);
	
	$fname3 = mysqli_real_escape_string($conn, $_REQUEST['fname3']);
	$lname3 = mysqli_real_escape_string($conn, $_REQUEST['lname3']);
    $email3 = mysqli_real_escape_string($conn, $_REQUEST['email3']);
    $org3 = mysqli_real_escape_string($conn, $_REQUEST['org3']);
	@$corr3 = mysqli_real_escape_string($conn, $_REQUEST['corr3']);
	
	$fname4 = mysqli_real_escape_string($conn, $_REQUEST['fname4']);
	$lname4 = mysqli_real_escape_string($conn, $_REQUEST['lname4']);
    $email4 = mysqli_real_escape_string($conn, $_REQUEST['email4']);
    $org4 = mysqli_real_escape_string($conn, $_REQUEST['org4']);
	@$corr4 = mysqli_real_escape_string($conn, $_REQUEST['corr4']);
	
    $title = mysqli_real_escape_string($conn, $_REQUEST['title']);
	$abs = mysqli_real_escape_string($conn, $_REQUEST['abstract']);
    $key = mysqli_real_escape_string($conn, $_REQUEST['key']);
	$file = mysqli_real_escape_string($conn, $_REQUEST['file']);
	$datetime = mysqli_real_escape_string($conn, $_REQUEST['datetime']);*/
   
        //updating the table
        $result = mysqli_query($conn, "UPDATE author SET fname1='$fname1', lname1='$lname1',email1='$email1',org1='$org1',corr1='$corr1',fname2='$fname2', lname2='$lname2',email2='$email2',org2='$org2',corr2='$corr2',fname3='$fname3', lname3='$lname3',email3='$email3',org3='$org3',corr3='$corr3',fname4='$fname4', lname4='$lname4',email4='$email4',org4='$org4',corr4='$corr4',title='$title',abstract='$abs',keywords='$key',file='$file',datetime='$datetime' WHERE id=$id");
		header("Location: submission.php");
   
    
}
		   
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM author WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $fname1 = $res['fname1'];
	$lname1 = $res['lname1'];
	$email1=$res['email1'];
    $org1 = $res['org1'];
    $corr1=$res['corr1'];
	
	    $fname2 = $res['fname2'];
	$lname2 = $res['lname2'];
	$email2=$res['email2'];
    $org2 = $res['org2'];
    $corr2=$res['corr2'];
	
	    $fname3 = $res['fname3'];
	$lname3 = $res['lname3'];
	$email3=$res['email3'];
    $org3 = $res['org3'];
    $corr3=$res['corr3'];
	
	    $fname4 = $res['fname4'];
	$lname4 = $res['lname4'];
	$email4=$res['email4'];
    $org4 = $res['org4'];
    $corr4=$res['corr4'];
	
	$title=$res['title'];
	$abs=$res['abstract'];
	$key=$res['keywords'];
	$file=$res['file'];
	$datetime=$res['datetime'];
}
?>