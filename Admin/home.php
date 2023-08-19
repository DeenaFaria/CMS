<?php
include("session.php");
include("config.php");
?>

<html>
<head>
<title>Home|Admin|Conference Management System</title>
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
<h2><span style='color:yellow;font-size:25px;'><strong>Admin Panel</strong></span></h2>

</div>
<ul>
  <li><a class="nav" href="logout.php">Logout</a></li>
  <li><a class="nav" href="user.php">Manage User</a></li>
  <li><a class="nav" href="home.php">Home</a></li>
  <li><a class="nav" href="form.php">Add Conference</a></li>
  <li><a class="nav" href="speaker.php">Speakers</a></li>
  <li><a class="nav" href="committee_name.php">Committee</a></li>
  <li><a class="nav" href="tpc.php">TPC</a></li>
  <!-- <li><a href="venue.html">Venue</a></li>-->  
  <!--  <li><a href="view_user.php">View User</a></li>-->
  <!--<li><a href="event_form.php">Event</a></li>-->
  <li><a class="nav" href="publication.php">Publications</a></li>
  <li><a class="nav" href="guide.php">Guidelines</a></li>
  <li><a class="nav" href="sponsor.php">Sponsors</a></li>
  <li><a class="nav" href="about.php">About</a></li>
  <li><a class="nav" href="contact.php">Contact</a></li>

</ul>
</head>

<body>
<br><br>

<?php

echo "<div class='con'>";

$sql="select * from form";
$res=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
echo "<h2><span style='color:darkslategray;font-size:30px;'><strong>".$row['conference']."</strong></span></h2>";
echo "<h2><span style='color:red;font-size:30px;'><strong>".$row['shortname']."</strong></span></h2>";
if($row['date']==$row['date6'])
{
	echo "<h3> <span style='color:purple;font-size:20px;'><strong>".date('d F, Y',strtotime($row['date']))."<br><br>".$row['location']."</strong></span></h3>";
}
else{
echo "<h3> <span style='color:purple;font-size:20px;'><strong>".date('d F',strtotime($row['date']))."-".date('d F, Y',strtotime($row['date6']))."<br><br>".$row['location']."</strong></span></h3>";
}
echo "<center><a class='edit' href='edit_form.php?id=$row[id]'>Edit</a> <a class='delete' href='delete_form.php?id=$row[id]' onClick='return confirm(\"Are you sure you want to delete?\")'>Delete</a></center>";
}
echo "</div>";
?>	
<br>
<br>

<center>
<div class="logo">
<?php
echo "<center><button onclick=window.location.href='logo.php'>Add Conference Logo</button></center>";
echo "<br>";
echo "<br>";
$sql="select * from logo";
$res=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{

if($row['size']>0)
{
echo '<img src="Logo/'.$row['file'].'" alt="Logo" style="width:100px;height:100px">';
echo "<br>";
echo "<br>";
echo "<center> <a class='edit' href='edit_logo.php?id=$row[id]'>Change Logo</a>  <a class='delete' href='delete_logo.php?id=$row[id]' onClick='return confirm(\"Are you sure you want to delete this logo?\")'>Delete Logo</a></center>";
echo "<br>";
}
else{
	echo "No logo found";
}
echo "<br>";
}
echo "<br>";
echo "<br>";
?>
</center>
</div>
<br><br>
<center>
<div class="about">
<h3><span style='color:navy;font-size:30px;'>About The Event</span></h3>	
<?php

$sql="select * from about";
$res=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
echo $row['detail'];
echo "<center><a class='edit' href='edit_about.php?id=$row[id]'>Edit Details</a> <a class='delete' href='delete_details.php?id=$row[id]' onClick='return confirm(\"Are you sure you want to delete?\")'>Delete Details</a></center>";
}
?>
</div>
</center>
<br><br>
<div class="pub">
<h3><span style='color:navy;font-size:30px;'>Publications Details</span></h3>	
<?php

$sql="select * from pub";
$res=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
echo $row['text'];
echo "<center><a class='edit' href='edit_pub.php?id=$row[id]'>Edit Publications Details</a> <a class='delete' href='delete_pub.php?id=$row[id]' onClick='return confirm(\"Are you sure you want to delete?\")'>Delete Publications Details</a></center>";
}
?>
</div>
<br><br>
<div class="paper">
<h4><span style="color:purple;font-size:25px;"><strong>Call for Paper</strong></span></h4>
<?php


$sql = "select * from paperfile";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res)){
if($row['size']>0)
{
echo '<img src="images/'.$row['name'].'" alt="Call for Paper Image" style="width:230px;height:280px">';
echo "<br>";
echo "<br>";
echo "<center> <a class='delete' href='delete_paper.php?id=$row[id]' onClick='return confirm(\"Are you sure you want to delete?\")'>Delete Paper</a></center>";
echo "<br>";
}
else{
	echo "No Paper Found";
	echo "<br>";
}}
	


?>
<br>
<form action='up.php' method='post' enctype='multipart/form-data'>
<input type='file' name='myfile'>
<input type='submit' name='save' value='Upload File'>
<br>
<br>
<br>





</div>
<br>
<br>
<div class="date">
<h4><span style="color:purple;font-size:25px;"><strong><u>Important Dates</u></strong></span></h4>
<?php

$sql="select * from form";
$res=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
echo "<p><div class='label2'><strong>Full Paper Submission:</strong></div><div class='dat'><span style='color:red;'>" .date('d F, Y',strtotime($row['date1']))."</span></div></p><br>";
if($row['date2']!='0000-00-00')
echo "<p><div class='label2'><strong>Submission of Special Session, Tutorial and Workshop Proposal:</strong></div><div class='dat'> <span style='color:red;'>".date('d F, Y',strtotime($row['date2']))."</span></div></p><br><br>";
if($row['date3']!='0000-00-00')
echo "<p><div class='label2'><strong>Student Conference:</strong></div><div class='dat'> <span style='color:red;'>".date('d F, Y',strtotime($row['date3']))."</span></div></p><br>";
echo "<p><div class='label2'><strong>Acceptance Notification:</strong></div><div class='dat'> <span style='color:red;'>".date('d F, Y',strtotime($row['date4']))."</span></div></p><br>";
echo "<p><div class='label2'><strong>Final Paper Submission:</strong></div><div class='dat'> <span style='color:red;'>".date('d F, Y',strtotime($row['date5']))."</span></div></p><br>";
if($row['date']==$row['date6'])
{
	echo "<p><div class='label2'><strong>Conference Date:</strong></div><div class='dat'> <span style='color:red;'>".date('d F, Y',strtotime($row['date']))."</span></div></p><br>";
}
else{
echo "<p><div class='label2'><strong>Conference Date:</strong></div><div class='dat'> <span style='color:red;'>".date('d F',strtotime($row['date']))."-".date('d F, Y',strtotime($row['date6']))."</span></div></p><br>";

}
}
?>
</div>
<br>
<div class="schedule">
<h4><center><span style="color:purple;font-size:25px;"><strong>Event Schedule</strong></span></center></h4>
<?php
$sql3="select * from form";
$res3=mysqli_query($conn,$sql3);

while($row3 = mysqli_fetch_array($res3))
{
	$start=strtotime($row3['date']);
	$end=strtotime($row3['date6']);

	$day=($end-$start)/60/60/24;
	$day=$day+1;
}

for($i=1;$i<=@$day;$i++){
	echo "<table><tr style='background-color:lightgray'><td>";
	echo "<h3>"."Day-".$i." "."<a class='event' href='event_form.php?day=$i'>Add Event</a>"."</h3>";
echo "</td></tr></table>";
$sql="select * from event order by day asc";
$sql1="select distinct day from event";
$res=mysqli_query($conn,$sql);
$res1=mysqli_query($conn,$sql1);
echo "<center>";
echo "
<table>";
//echo "<tr><center><td>Day</td></center><tr>";
echo "<TR>

<TH> Start Time</TH>
<TH>End Time</TH>
<TH>Event</TH>
<TH>Edit Event</TH>
</TR>";
while($row = mysqli_fetch_array($res))
{
echo "<TR>";
//echo "<td style='background-color:navy;color:white;'>"."Day ".$row['day']."</td>";
if($row['day']==$i){
echo "<td>".date('h:i:s A',strtotime($row['start']))."</td>";
echo "<td>".date('h:i:s A',strtotime($row['end']))."</td>";
echo "<td>".$row['event']."</td>";
echo "<td>"."<a class='edit' href='edit_event.php?id=$row[id]'>Edit</a> <a class='delete' href='delete_event.php?id=$row[id]' onClick='return confirm(\"Are you sure you want to delete?\")'>Delete</a>"."</td>";}
echo "</TR>";
}
echo "</table>";
echo "</center>";}
?>
<br><br>
<a class='kts' href="program/program.php">Keynote and Technical Session</a><br><br>
<br><br>
<a class='kts' href="papersub.php">Paper Submission</a>
</div>
<br>
<div class="guide">

<center>
<br>
<center><h4><span style="color:purple;font-size:25px;">Submission Guidelines</strong></span></h4></center>
<?php

$sql="select * from guideline";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($res)){
echo $row['guide']."<br>";
echo "<div class='sublink'>";
echo "<br> <a class='edit' href='edit_guide.php?id=$row[id]'>Edit</a> <a class='delete' href='delete_guide.php?id=$row[id]' onClick='return confirm(\"Are you sure you want to delete?\")'>Delete</a><br>";
echo "</div>";
}

?>
<center>

</div>
<br>

<div class="footer">
<h3>Contact Us</h3>

<?php

$sql="select * from contact";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($res)){
echo $row['contact']."<br>";

echo "<center><div class='sublink'>";
echo "<br> <a class='edit' href='edit_contact.php?id=$row[id]'>Edit</a> <a class='delete' href='delete_contact.php?id=$row[id]' onClick='return confirm(\"Are you sure you want to delete?\")'>Delete</a><br>";
echo "</div></center>";
}

?>

</div>
</body>
</html>