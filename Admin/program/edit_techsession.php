<?php
include("session.php");
include("config.php");
?>

<?php

//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM technical WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
    $tsession = $res['tsession'];
	$psession = $res['psession'];
    $room = $res['room'];
	$topic = $res['topic'];
	$day = $res['day'];
}

//$conn->close();

// header("Location: home.php");
?>

<html>
<head>
<title>Edit Technical Session|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
<?php

$sql="select * from logo";
$res=mysqli_query($conn,$sql);

$row = mysqli_fetch_array($res);
if($row['size']>0)
{
echo '<link rel="icon" href="../Logo/'.$row['file'].'" type="image/x-icon">';
}
?>  
<div class="header">

</div>

<center><h3>Edit Technical Session</h3></center>
</head>

<body>

	    <!-- Body section -->
    <div class = "body_sec"> 
        <section id="Content"> 
		<center>
           <div class="form">
		   
		      <form name="form1" method="post" action="edit_techsession.php">
                <br><br>
				<div class="container2">
                
                <center>Technical Session No.: <input type="number" name="num" min="1" max="10" value="<?php echo $tsession;?>" required> </center><br><br>
				<center>Parallel Session No.: <input type="number" name="pnum" min="1" max="10" value="<?php echo $psession;?>" required> </center><br><br>
                <center>Room No.: <input type="text" name="room" value="<?php echo $room;?>" required> </center><br><br>
                <center>Session Topic: <input type="text" name="topic" value="<?php echo $topic;?>" required></center> <br><br>

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
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $tsession=$_POST['num'];
	$psession=$_POST['pnum'];
	$room=$_POST['room'];
	$topic=$_POST['topic'];


$tsession=mysqli_real_escape_string($conn, $_REQUEST['num']);
$psession=mysqli_real_escape_string($conn, $_REQUEST['pnum']);
$room=mysqli_real_escape_string($conn, $_REQUEST['room']);
$topic=mysqli_real_escape_string($conn, $_REQUEST['topic']);

$res=mysqli_query($conn, "update technical set tsession='$tsession',psession='$psession',room='$room',topic='$topic' where id='$id'");
 header("Location: program.php");
}
 //echo "Records updated successfully!";
?>

<?php
//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM technical WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
    $tsession = $res['tsession'];
	$psession = $res['psession'];
    $room = $res['room'];
	$topic = $res['topic'];
}

$conn->close();

// header("Location: home.php");
?>