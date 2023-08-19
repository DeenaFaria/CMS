<?php
ob_start();
include("session.php");
include("config.php");

$id=$_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM form where id=$id");
while($res = mysqli_fetch_array($result))
{
	$conference = $res['conference'];
	$sname = $res['shortname'];
	$date=$res['date'];
    $location = $res['location'];
    $date1=$res['date1'];
	$date2=$res['date2'];
	$date3=$res['date3'];
	$date4=$res['date4'];
	$date5=$res['date5'];
	$date6=$res['date6'];
}
?>

<html>
<head>
<title>Edit Form|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">

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
<h1>Edit</h1>
</div>

<center><h2>Edit Information</h2></center>
</head>

<body>

	    <!-- Body section -->
    <div class = "body_sec"> 
        <section id="Content"> 
		<center>
           <div class="form">
		   
		      <form name="form1" method="post" action="edit_form.php">
                <br><br>
				<div class="container2">
                <center><strong><h3><u>Conference</u></h3></strong></center><br><br>
<center>Conference Topic: <textarea name="conference" rows="2" cols="70" required><?php echo $conference;?></textarea></center><br><br>
<center>Short Name:<textarea name="sname" rows="2" cols="70" required><?php echo $sname;?></textarea></center><br><br>
<center>Start Date: <input type="date" name="date" id="datefield" value="<?php echo $date;?>" required></center><br><br>
<center>Location:<textarea name="location" rows="2" cols="70" required><?php echo $location;?></textarea></center><br><br>
<center><strong><h3><u>Important Dates</u></h3></strong></center><br><br>
<center>Full Paper Submission:<input type="date" name="date1" id="datefield1" value="<?php echo $date1;?>" required></center><br><br>
<center>Submission of Special Session, Tutorial and Workshop Proposal:<input type="date" name="date2" id="datefield2" value="<?php echo $date2;?>"></center><br><br>
<center>Student Conference: <input type="date" name="date3" id="datefield3" value="<?php echo $date3;?>"></center><br><br>
<center>Acceptance Notification:<input type="date" name="date4" id="datefield4" value="<?php echo $date4;?>" required></center><br><br>
<center>Final Paper Submission:<input type="date" name="date5" id="datefield5" value="<?php echo $date5;?>" required></center><br><br>
<center>End Date:<input type="date" name="date6" id="datefield6" value="<?php echo $date6;?>" required></center><br><br>
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

<input type="hidden" name="id" value="<?php echo $id;?>">
<input type="submit" name="update" value="Update">
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
    
    $conference=$_POST['conference'];
	$sname=$_POST['sname'];
	$date=$_POST['date']; 
    $location=$_POST['location'];
    $date1=$_POST['date1'];   
    $date2=$_POST['date2']; 
    $date3=$_POST['date3'];
    $date4=$_POST['date4'];
    $date5=$_POST['date5'];
    $date6=$_POST['date6']; 

    @$conference = mysqli_real_escape_string($conn, $_REQUEST['conference']);
	@$sname = mysqli_real_escape_string($conn, $_REQUEST['sname']);
	@$location = mysqli_real_escape_string($conn, $_REQUEST['location']);
   if($date6<$date){
	echo "<center>Please enter a valid End Date!</center>";
}
else{
        //updating the table
        $result = mysqli_query($conn, "UPDATE form SET conference='$conference', shortname='$sname',date='$date',location='$location',date1='$date1',date2='$date2',date3='$date3',date4='$date4',date5='$date5',date6='$date6' WHERE id=$id");
		header("Location: home.php");
}
    //    header("Location: home.php");
   
    
}
		   
?>
<?php
//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM form WHERE id=$id");
 
while($res = @mysqli_fetch_array($result))
{
    $conference = $res['conference'];
	$sname = $res['shortname'];
	$date=$res['date'];
    $location = $res['location'];
    $date1=$res['date1'];
	$date2=$res['date2'];
	$date3=$res['date3'];
	$date4=$res['date4'];
	$date5=$res['date5'];
	$date6=$res['date6'];
}
?>