<?php
include("session.php");
include("config.php");
?>

<?php

//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM keynote WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
    $sessno = $res['sessno'];
    $roomno = $res['roomno'];
	$topic = $res['topic'];
	$day = $res['day'];
}

//$conn->close();

// header("Location: home.php");
?>

<html>
<head>
<title>Edit Keynote Session|Conference Management System</title>
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

<center><h3>Edit Keynote Session</h3></center>
</head>

<body>

	    <!-- Body section -->
    <div class = "body_sec"> 
        <section id="Content"> 
		<center>
           <div class="form">
		   
		      <form name="form1" method="post" action="edit_keysession.php">
                <br><br>
				<div class="container2">
                
                <center>Keynote Session No.: <input type="number" name="num" min="1" max="10" value="<?php echo $sessno;?>" required> </center><br><br>
                <center>Room No.: <input type="text" name="room" value="<?php echo $roomno;?>" required> </center><br><br>
                <center>Keynote Topic: <input type="text" name="topic" value="<?php echo $topic;?>" required></center> <br><br>

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
    
    $sessno=$_POST['num'];
	$roomno=$_POST['room'];
	$topic=$_POST['topic'];


$sessno=mysqli_real_escape_string($conn, $_REQUEST['num']);
$roomno=mysqli_real_escape_string($conn, $_REQUEST['room']);
$topic=mysqli_real_escape_string($conn, $_REQUEST['topic']);

$res=mysqli_query($conn, "update keynote set sessno='$sessno',roomno='$roomno',topic='$topic' where id='$id'");
 header("Location: program.php");
}
 //echo "Records updated successfully!";
?>

<?php
//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM keynote WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
    $sessno = $res['sessno'];
    $roomno = $res['roomno'];
	$topic = $res['topic'];
}

$conn->close();

// header("Location: home.php");
?>