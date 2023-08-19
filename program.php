<?php
include("config.php");
?>
<html>
<head>
<title>KTS|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
<?php

$sql="select * from logo";
$res=mysqli_query($conn,$sql);

$row = mysqli_fetch_array($res);
if($row['size']>0)
{
echo '<link rel="icon" href="admin/Logo/'.$row['file'].'" type="image/x-icon">';
}
?>    
<div class="header">
<h1>Keynote and Technical Sessions</h1>
</div>
</head>

<body>

<br><br>
<?php 
$sql="select * from form";
$res=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
	$start=strtotime($row['date']);
	$end=strtotime($row['date6']);

	$day=($end-$start)/60/60/24;
	$day=$day+1;
}

for($i=1;$i<=@$day;$i++){

	echo "<center>"."<h2><b><u>Day-".$i."</u></b></h2><br><br> "."</center>";
    echo "<br>";
	echo "<br>";
	$sql="select * from keynote";
$res=mysqli_query($conn,$sql);


while($row = mysqli_fetch_array($res))
{
	echo "<center><table>";
	//echo "<tr>";
	if($row['day']==$i){
	echo "<tr><td><b>Day:</b>".$i.", <b>Keynote Session:</b> ".$row['sessno']."<br><br>";
	echo "Room No.".$row['roomno']."<br><br>";
	$topic=$row['topic'];
	$sessno=$row['sessno'];
	
	$sql2="select * from speaker where topic like '%$topic%'";
    $res2=mysqli_query($conn,$sql2);
	$row2 = mysqli_fetch_array($res2);
	$name=$row2['name'];
	
	$sql1="select * from event where event like '%$name%' and event like '%Keynote%' and event like '%$sessno%'";
    if($res1=mysqli_query($conn,$sql1)){
	$row1 = mysqli_fetch_array($res1);
	$start=$row1['start'];
	$end=$row1['end'];
	
	echo date('h:i:s A',strtotime($start));
	echo "-".date('h:i:s A',strtotime($end))."</td>";
	
	
	echo "<td><strong>".$topic."</strong><br><br>";
	
	echo $name."<br><br>";
	echo $row2['designation']."</td>";
	
	echo "</tr>";
echo "</table></center>";
	}
	
	else echo "No Matching Data Found!";
}

}

	echo "<br>";
	echo "<br>";

$sql3="select * from technical";
$res3=mysqli_query($conn,$sql3);


while($row3 = mysqli_fetch_array($res3))
{

	if($row3['day']==$i){
		$tsession=$row3['tsession'];
		$psession=$row3['psession'];
		$id=$row3['id'];
	echo "<center><b>Technical Session:</b> ".$tsession."</center><br><br>";
	echo "<center><table>";
	echo "<tr>";
	echo "<td><b>D".$i."T".$tsession."P".$psession."</b><br><br>";
	echo "Room: ".$row3['room']."<br><br>";
	$topic=$row3['topic'];
	
	
	$sql4="select * from event where event like '%Technical Sessions%' and event like '%$tsession%'";
    $res4=mysqli_query($conn,$sql4);
	$row4 = mysqli_fetch_array($res4);
	$start=$row4['start'];
	$end=$row4['end'];
	echo date('h:i:s A',strtotime($start))."-".date('h:i:s A',strtotime($end))."</td>";
	
	echo "<td>Parallel Session:".$psession." <strong> ".$topic."</strong> <br><br> ";
	echo "</td>";
	
	echo "<center><table>";
	
	$sql5="select * from accpaper where id='$id'";
$res5=mysqli_query($conn,$sql5);



	
echo "<tr>";
echo "<td><b>SL.</b></td><td><b>Paper ID</b></td><td><b>Paper Title</b></td>";
echo "</tr>";

while($row5 = mysqli_fetch_array($res5))
{
	echo "<tr>";
	$slno=$row5['slno'];
	$pid=$row5['pid'];
	$title=$row5['title'];
	echo "<td>".$slno."</td>";
	echo "<td>".$pid."</td>";
	echo "<td>".$title."</td>";
	echo "</tr>";
}
echo "</table></center>";
}
echo "</tr>";

echo "</table></center>";
}
echo "<br>";
	echo "<br>";

}
?>
<br><br>
<center>

</center>

</body>
</html>