<?php
include("config.php");
?>

<html>
<head>
<title>Home|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" >
  
<?php

$sql="select * from logo";
$res=mysqli_query($conn,$sql);

$row = mysqli_fetch_array($res);
if($row['size']>0)
{
echo '<link rel="icon" href="admin/Logo/'.$row['file'].'" type="image/x-icon">';
}
?>
  
<div class="navbar" id="navbar">
<div class="header">

<h1>Welcome to Conference Management System</h1>
</div>
  
<ul>
<?php

$sql="select * from logo";
$res=mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($res))
{

if($row['size']>0)
{
$logo=$row['file'];
}}
?>
  <li><a class="nav" href="#logo"><?php echo '<img src="admin/Logo/'.$logo.'" alt="Logo" style="width:35px;height:30px">';?></a></li>
  

  
  <li><a class="nav" href="index.php">Home</a></li>
  <li><a class="nav" href="show_speaker.php">Speakers</a></li>
  <li><a class="nav" href="committee_name.php">Committee</a></li>
  <li><a class="nav" href="tpc.php">TPC</a></li>
  <li><a class="nav" href="#ate">About</a></li>
  <li><a class="nav" href="#cfp">Call For Paper</a></li>
  <li><a class="nav" href="#impdt">Important Dates</a></li>
  <li><a class="nav" href="#es">Schedule</a></li>
  <li><a class="nav" href="#sg">Submission</a></li>
  <li><a class="nav" href="#spn">Sponsors</a></li>

</ul>
</div>
<script>
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-100px";
  }
  prevScrollpos = currentScrollPos;
}
</script>
</head>

<body>
<div class="logo">
<?php

$sql="select * from logo";
$res=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{

if($row['size']>0)
{
echo '<img src="admin/Logo/'.$row['file'].'" alt="Logo" style="width:100px;height:100px">';
echo "<br>";
}}
?>
</div>
<div class="main">
<?php

echo "<div class='con'>";
$sql="select * from form";
$res=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
echo "<h2><span style='color:DarkSlateGray;font-size:30px;'><strong>".$row['conference']."</strong></span></h2>";
echo "<h2><span style='color:red;font-size:30px;'><strong>".$row['shortname']."</strong></span></h2>";
if($row['date']==$row['date6'])
{
	echo "<h3> <span style='color:purple;font-size:20px;'><strong>".date('d F, Y',strtotime($row['date']))."<br><br>".$row['location']."</strong></span></h3>";
}
else{
echo "<h3> <span style='color:purple;font-size:20px;'><strong>".date('d F',strtotime($row['date']))."-".date('d F, Y',strtotime($row['date6']))."<br><br>".$row['location']."</strong></span></h3>";
}
}
echo "</div>";
?>
<br>
<section id="ate">
<div class="about">

<h3><span style='color:DarkSlateGray;font-size:30px;'><u>About The Event</u></span></h3>	
<?php

$sql="select * from about";
$res=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
echo "<p><span style='font-size:20px;'>".$row['detail']."</span></p>";
}
?>
</div>
</section>
<br>
<div class="pub">
<h3><span style='color:DarkSlateGray;font-size:30px;'>Publications Details</span></h3>	
<?php

$sql="select * from pub";
$res=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
echo "<p><span style='color:black;font-size:20px;'>".$row['text']."</span></p>";
}
?>
</div>
<br><br>
<section id="cfp">
<div class="paper">
<h4><span style="color:purple;font-size:25px;"><strong><u>Call for Paper</u></strong></span></h4>
<?php


$sql = "select * from paperfile";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res)){
if($row['size']>0)
{
echo '<img src="admin/images/'.$row['name'].'" alt="Call for Paper Image" style="width:230px;height:280px">';
echo "<br>";
echo "<br>";
echo "<center><a class='download' href='down.php?id=$row[id]'>Download</a></center>";
echo "<br>";
}
else{
	echo "No Paper Found";
	echo "<br>";
}}
	
?>


</div>
</section>
<br>
<br>
<br>
<a id="impdt">
<div class="date">
<center><h2><span style="color:purple;font-size:25px;"><strong><u>Important Dates</u></strong></span></h2></center>
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
</a>
<br>
<a id="es">
<div class="schedule">
<h4><span style="color:purple;font-size:25px;"><u>Event Schedule</u></strong></span></h4>
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
	echo "<h3>"."Day-".$i."</h3>";
	echo "</td></tr></table>";
$sql="select * from event order by day asc";
$res=mysqli_query($conn,$sql);
echo "
<table>";
echo "<TR>
<TH> Start Time</TH>
<TH>End Time</TH>
<TH>Event</TH>
</TR>";
while($row = mysqli_fetch_array($res))
{
echo "<TR>";
if($row['day']==$i){
//echo "<td style='background-color:navy;color:white;'>"."Day ".$row['day']."</td>";
echo "<td>".date('h:i:s A',strtotime($row['start']))."</td>";
echo "<td>".date('h:i:s A',strtotime($row['end']))."</td>";
echo "<td>".$row['event']."</td>";
}
echo "</TR>";
}
echo "</table>";
}

?>

<br><br>
<a class='kts' href="program.php">Keynote and Technical Session</a><br><br>
</div>
</a>
<br>

<div class="guide">
<a NAME="sg">
<center><h4><span style="color:purple;font-size:25px;"><u>Submission Guidelines</u></strong></span></h4></center></a>
<?php

$sql="select * from guideline";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($res)){
echo "$row[guide]"."<br><br>";

}
//echo "<span style='color:navy;'>"."**Authors are advised to upload full papers using this<a class='link' href='sp/'>link</a> "."</span>"."<br>";
?>
</div>

<br>
<br>
<a id="spn">
<div class="sponsor">
<center><h4><span style="color:navy;font-size:30px;"><u>Sponsors</u></strong></span></h4></center>
<?php

$sql="select * from sponsor";
$res=mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($res))
{
echo "<center><h3><span style='color:gray;font-size:30px;'><strong>".$row['type']."</strong></span></h3></center>";
echo "<center><p> <span style='color:purple;font-size:20px;'><strong>".$row['name']."</strong></span></p></center>";
echo "<br>";
if($row['size']>0)
{
echo '<img src="admin/Sponsors/'.$row['filename'].'" alt="Logo" style="width:300px;height:130px">';
echo "<br>";
}
}
echo "<br>";
?>
</div>
</a>
<br>
<br>
<div class="footer">
<h3>Contact Us</h3>

<?php

$sql="select * from contact";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($res)){
echo $row['contact']."<br>";
echo "</div>";
}

?>

</div>
</body>
</html>