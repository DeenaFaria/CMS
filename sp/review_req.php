<html>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	
</head>
<body>
<br><br>
<?php
session_start();
if(!isset($_SESSION['user'])||$_SESSION['user']!='x'){
	header("location:index.html");
	exit();
}
$hostname = "127.0.0.1";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($hostname, $username, $password,"conference");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email=$_GET['email'];
$sql="select * from review_req where email='$email'";
$res=mysqli_query($conn,$sql);
/*
while($row=mysqli_fetch_array($res)){
	$paperno=$row['paperno'];
}
header("Location:../info.php?paperno=$paperno");
*/
echo "<center>";
echo "<div class='container'>";
echo "<table class='table table-bordered table-hover'>";
echo "<thead><tr>
<th>Authors</th>
<th>Title</th>
<th>Review request status</th>
<th>Review status</th>
<th>Deadline</th>
</tr></thead>";

while($row=mysqli_fetch_array($res)){
	$sql1="select * from author where id='$row[paperno]'";
    $res1=mysqli_query($conn,$sql1);
	$sql2="select * from addreview where paperno='$row[paperno]'";
    $res2=mysqli_query($conn,$sql2);
	while($row1=mysqli_fetch_array($res1)){
		$row2=mysqli_fetch_array($res2);
	echo "<tbody><tr>";
echo "<td>".$row1['fname1']." ".$row1['lname1']."<br>".$row1['fname2']." ".$row1['lname2']."<br>".$row1['fname3']." ".$row1['lname3']."<br>".$row1['fname4']." ".$row1['lname4']."<br>"."</td>";

echo "<td>"."<a href='../ansreq.php?paperno=$row[paperno]&email=$email'>".$row1['title']."</a>"."</td>";
if($row['rev_req_stat']=='Accepted'){
echo "<td><p class='text-success'>".$row['rev_req_stat']."</p></td>";
}
else {
	echo "<td><p class='text-danger'>".$row['rev_req_stat']."</p></td>";
}
echo "<td>".$row['rev_stat']."</td>";
//if($row2['datetime']!=NULL)
//echo "<td>".date('d-m-Y h:i',strtotime($row2['datetime']))." GMT</td></tr>";
$sql3="select * from deadline where paperno='$row[paperno]'";
$res3=mysqli_query($conn,$sql3);
$row3=mysqli_fetch_array($res3);
if($row3['date']==NULL)
echo "<td><center>No deadline available</center></td>";
else echo "<td><span style='color:red;font-size:16px;'><strong>".date('h:i:s A',strtotime($row3['time'])).", ".date('d F, Y',strtotime($row3['date']))."</strong></span></td>";

echo "</tbody>";

echo "</div>";
echo "<br>";
	}
}
echo "</center>";
?>
</body>
</html>