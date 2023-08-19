<?php

include("session.php");
include("config.php");
?>

<html>
<head>
<title>Add Conference|Admin|Conference Management System</title>
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
<h1>Add New Conference</h1>
</div>

</head>

<body>
<form action="form_action.php" method="post">
<br><br>

<center>
<div class="container2">
<center><strong><h3>Conference</h3></strong></center><br><br>
Conference Topic: <textarea name="conference" rows="2" cols="70" required></textarea><br><br>
Short Name:<input type="text" name="sname" required><br><br>
Start Date: <input type="date" name="date" id="datefield" required><br><br>
Location:<input type="text" name="location" required><br><br>
<center><strong><h3>Important Dates</h3></strong></center><br><br>
Full Paper Submission:<input type="date" name="date1" id="datefield1" required><br><br>
Submission of Special Session, Tutorial and Workshop Proposal:<input type="date" name="date2" id="datefield2"><br><br>
Student Conference: <input type="date" name="date3" id="datefield3"><br><br>
Acceptance Notification:<input type="date" name="date4" id="datefield4"  required><br><br>
Final Paper Submission:<input type="date" name="date5" id="datefield5"  required><br><br>
End Date:<input type="date" name="date6" id="datefield6" required><br><br>
</div>

<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
 if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;

document.getElementById("datefield").setAttribute("min", today);
document.getElementById("datefield1").setAttribute("min", today);
document.getElementById("datefield2").setAttribute("min", today);
document.getElementById("datefield3").setAttribute("min", today);
document.getElementById("datefield4").setAttribute("min", today);
document.getElementById("datefield5").setAttribute("min", today);
document.getElementById("datefield6").setAttribute("min", today);
</script>

</center>
<center><input type="submit" name="submit" value="Submit">
<input type="reset" value="Reset"></center>
<input type="hidden" name="id">
</form>
<br><br>

</body>
</html>