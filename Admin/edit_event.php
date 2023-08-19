<?php
include("session.php");
include("config.php");

?>
<?php
 
//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM event WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
	$day=$res['day'];
    $event = $res['event'];
	$start = $res['start'];
	$end = $res['end'];
    
}

?>

<html>
<head>
<title>Edit Event|Conference Management System</title>
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

</div>

<center><h3>Edit Event</h3></center>
</head>

<body>

	    <!-- Body section -->
    <div class = "body_sec"> 
        <section id="Content"> 
		<center>
           <div class="form">
		   
		      <form name="form1" method="post" action="edit_event.php">
                <br><br>
				<div class="container2">
                <center>Day: <input type="number" name="day" min="1" max="5" value="<?php echo $day;?>" required></center><br><br>
               <center>Event Name: <input type="text" name="event" value="<?php echo $event;?>" required> <br><br>
			  
			   Start Time: <?php echo date('h:i:s A',strtotime($start));?> <input type="time" name="start" required><br><br> 
			   End Time:   <?php echo date('h:i:s A',strtotime($end));?> <input type="time" name="end" required></center><br><br>
                
                <input type="hidden" name="id" value=<?php echo $id;?>>
				 </div> 
                <input type="submit" name="update" value="Update">
				</form>
		   
	</center>
	
        </section> 
   
      
    <!-- Footer Section -->
   
</body> 
</html>   


<?php

$hostname = "127.0.0.1";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($hostname, $username, $password,"conference");
echo "<br>";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 
if(isset($_POST['update']))
{    
    @$id = $_POST['id'];
    @$day = $_POST['day'];
    @$event=$_POST['event'];
	@$start=$_POST['start'];
	@$end=$_POST['end'];


@$event=mysqli_real_escape_string($conn, $_REQUEST['event']);

@$res=mysqli_query($conn, "update event set day='$day',event='$event',start='$start',end='$end' where id='$id'");
 header("Location: home.php");
}
 //echo "Records updated successfully!";
?>

<?php
//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM event WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
	$day=$res['day'];
    $event = $res['event'];
	$start = $res['start'];
	$end = $res['end'];
    
}

$conn->close();

// header("Location: home.php");
?>