<?php
session_start();
if(!isset($_SESSION['user'])||$_SESSION['user']!='x'){
	header("location:index.html");
	exit();
}
include("config.php");
@$email=$_GET['email'];
?>

<html>
<head>
<title>Submission|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
<!--  
<ul>
<li><a href="Update_Info.php">Update Information</a></li>
<li><a href="Update_Authors.php">Update Authors</a></li>
<li><a href="Update_File.php">Update Files</a></li>
<li><a href="Withdraw.php">Withdraw Submission</a></li>
</ul>
-->
<center>
<head><h1>Paper Submission</h1></head></center>
<body>
<center><p>If you want to <b>change any information</b> about your paper or withdraw it, use links in the below.</p></center>
<center>
<br>
<?php
$sql="select * from author where email1='$email' or email2='$email' or email3='$email' or email4='$email'";


$res=mysqli_query($conn,$sql);
echo "<center>";

echo "<div class='container'>";

while($row=mysqli_fetch_array($res)){
	echo "<a class='text-primary' href='Update_Info.php?id=$row[id]'>Update Information</a>
	<a class='text-success' href='Update_Authors.php?id=$row[id]'>Update Authors</a>
	<a class='text-info' href='Update_File.php?id=$row[id]'>Update File</a>
	<a class='text-warning' href='withdraw.php?id=$row[id]' onClick='return confirm(\"Are you sure you want to withdraw this submission?\")'>Withdraw Submission</a><br><br>";
echo "<table class='table table-bordered table-hover'>";
echo "<thead class='thead-primary'><th colspan='2' scope='colgroup'><center><b>Paper ".$row['id']." </b></center></th></thead>";
echo "<tbody><tr><td>Title: </td><td>".$row['title']."</td></tr>";
echo "<tr><td>Author keywords: </td><td>".$row['keywords']."</td></tr>";
echo "<tr><td>Abstract: </td><td>".$row['abstract']."</td><tr>";
echo "<tr><td>File: </td><td>".$row['file']."</td><tr>";
echo "<tr><td>Time: </td><td>".date('d F, Y h:i',strtotime($row['datetime']))." GMT</td>";
echo "</tr></tbody></table>";
echo "<br><br>";

echo "<table class='table table-striped table-hover'>";
echo "<thead><th colspan='5' scope='colgroup'><center><b>Authors</b></center></th></thead>";
echo "<tbody><tr><td><b>First Name</b></td>
<td><b>Last Name</b></td>
<td><b>Email</b></td>
<td><b>Organization</b></td>
<td><b>Corresponding?</b></td></tr>";

if($row['fname1']!=NULL){
echo "<tr><td>".$row['fname1']."</td>
<td>".$row['lname1']."</td>
<td>".$row['email1']."</td>
<td>".$row['org1']."</td>
<td>".$row['corr1']."</td></tr>";
}

if($row['fname2']!=NULL){
echo "<tr><td>".$row['fname2']."</td>
<td>".$row['lname2']."</td>
<td>".$row['email2']."</td>
<td>".$row['org2']."</td>
<td>".$row['corr2']."</td></tr>";
}

if($row['fname3']!=NULL){
echo "<tr><td>".$row['fname3']."</td>
<td>".$row['lname3']."</td>
<td>".$row['email3']."</td>
<td>".$row['org3']."</td>
<td>".$row['corr3']."</td></tr>";
}

if($row['fname4']!=NULL){
echo "<tr><td>".$row['fname4']."</td>
<td>".$row['lname4']."</td>
<td>".$row['email4']."</td>
<td>".$row['org4']."</td>
<td>".$row['corr4']."</td></tr>";
}
echo "<tbody></table><br>";
echo "<br><br><center><a href='seeReviewAuthor.php?id=$row[id]'>See Review</a></center><br><br>";
}
echo "</div>";
echo "</center>";
?>
<br>

</center>
<body>