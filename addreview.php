<?php
session_start();
if(!isset($_SESSION['user'])||$_SESSION['user']!='x'){
	header("location:sp/index.html");
	exit();
}
include("config.php");

//$name=$_GET['name'];
?>

<html>
<head>
<title>Add Review|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="sp/css/bootstrap.min.css">
<?php

$sql="select * from logo";
$res=mysqli_query($conn,$sql);

$row = mysqli_fetch_array($res);
if($row['size']>0)
{
echo '<link rel="icon" href="admin/Logo/'.$row['file'].'" type="image/x-icon">';
}


?>

<center>
<head><h1>Review</h1></head></center>
<body>
<center>
<br>
<?php
@$id=$_GET['id'];
@$email=$_GET['email'];
$sql="select * from author where id='$id'";
$res=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($res)){
$title=$row['title'];
}

$sql1="select * from user where email='$email'";
$res1=mysqli_query($conn,$sql1);

while($row1=mysqli_fetch_array($res1)){
$fname=$row1['fname'];
$lname=$row1['lname'];
}

echo " <b>Title: </b>".$title."<br><br>";
echo " <b>Author: </b> Anonymous";
echo "</center>";
?>
<br>
<div class='container'>
<h2>Evaluation</h2>
<body>
<form action="reviewAction.php?id=<?php echo $id;?>&email=<?php echo $email;?>" method='post' enctype='multipart/form-data'>
<input type="hidden" name="name" value="<?php echo $fname." ".$lname;?>" required><br><br>
<p><b>Novelty of the work.</b> *How do you score novelty of this work?</p><br>
<input type="radio" name="novelty" value="5: excellent" required> 5: excellent<br>
<input type="radio" name="novelty" value="4: good" required> 4: good<br>
<input type="radio" name="novelty" value="3: fair" required> 3: fair<br>
<input type="radio" name="novelty" value="2: poor" required> 2: poor<br>
<input type="radio" name="novelty" value="1: very poor" required> 1: very poor<br>

<br><br>
<p><b>Presentation.</b> *How do you score quality of the presentation of the work? Organization of the content and English quality are important points to consider for scoring.</p><br>
<input type="radio" name="pres" value="5: excellent" required> 5: excellent<br>
<input type="radio" name="pres" value="4: good" required> 4: good<br>
<input type="radio" name="pres" value="3: fair" required> 3: fair<br>
<input type="radio" name="pres" value="2: poor" required> 2: poor<br>
<input type="radio" name="pres" value="1: very poor" required> 1: very poor<br>

<br><br>
<p><b>Result and Analysis.</b> *At what extent have they carried out sufficient perfomance evaluation and presented the results to support the list the contributions?</p><br>
<input type="radio" name="res" value="5: excellent" required> 5: excellent<br>
<input type="radio" name="res" value="4: good" required> 4: good<br>
<input type="radio" name="res" value="3: fair" required> 3: fair<br>
<input type="radio" name="res" value="2: poor" required> 2: poor<br>
<input type="radio" name="res" value="1: very poor" required> 1: very poor<br>

<br><br>
<p><b>Overall Evaluation.</b> *Please provide a detailed review, including a justification for your scores. Both the score and the review text are required.</p><br>
<input type="radio" name="eval" value="3: strong accept" required> 3: strong accept<br>
<input type="radio" name="eval" value="2: accept" required> 2: accept<br>
<input type="radio" name="eval" value="1: weak accept" required> 1: weak accept<br>
<input type="radio" name="eval" value="0: borderline paper" required> 0: borderline paper<br>
<input type="radio" name="eval" value="-1: weak reject" required> -1: weak reject<br>
<input type="radio" name="eval" value="-2: reject" required> -2: reject<br>
<input type="radio" name="eval" value="-3: strong reject" required> -3: strong reject<br><br>
<textarea name="review" rows="15" cols="100" required></textarea>

<br><br>
<p><b>Reviewer's confidence.</b> *Reviewer's confidence</p><br>
<input type="radio" name="conf" value="5: (expert)" required> 5: (expert)<br>
<input type="radio" name="conf" value="4: (high)" required> 4: (high)<br>
<input type="radio" name="conf" value="3: (medium)" required> 3: (medium)<br>
<input type="radio" name="conf" value="2: (low)" required> 2: (low)<br>
<input type="radio" name="conf" value="1: (none)" required> 1: (none)<br>

<p><b>Confidential remarks for the program committee.</b>If you wish to add any remarks intended only for PC members please write them below. These remarks will only be seen by the PC members having access to reviews for this submission. They will not be sent to the authors. This field is optional.</p> <br>
<textarea name="remark" rows="15" cols="100"></textarea><br><br>
<p><b>Attachment</b> If your review is in a non-text format, for example, a PDF file, upload it here:</p><br><br>
<input type="file" name="reviewfile"><br><br>
<input type="hidden" name="id" value="<?php echo $id;?>">
<input type="submit" name="submit" value="Submit Review">
<input type="reset" value="Reset"><br>
</div>
</center>
</body>