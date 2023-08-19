<?php
include("session.php");
include("config.php");
?>

<?php

//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM accpaper WHERE auto='$id'");
 
while($res = mysqli_fetch_array($result))
{
    $slno = $res['slno'];
    $pid = $res['pid'];
	$title = $res['title'];
}

//$conn->close();

// header("Location: home.php");
?>

<html>
<head>
<title>Edit Paper Information|Conference Management System</title>
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

<center><h3>Edit Paper Information</h3></center>
</head>

<body>

	    <!-- Body section -->
    <div class = "body_sec"> 
        <section id="Content"> 
		<center>
           <div class="form">
		   
		      <form name="form1" method="post" action="edit_acpaper.php">
                <br><br>
				<div class="container2">
                
                <center>Sl. No.: <input type="number" name="slno" min="1" max="10" value="<?php echo $slno;?>" required> </center><br><br>
                <center>Paper ID.: <input type="number" name="pid" min="1" max="1000" value="<?php echo $pid;?>" required> </center><br><br>
                <center>Paper Title: <input type="text" name="title" value="<?php echo $title;?>" required></center> <br><br>

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
    
    $slno=$_POST['slno'];
	$pid=$_POST['pid'];
	$title=$_POST['title'];


$slno=mysqli_real_escape_string($conn, $_REQUEST['slno']);
$pid=mysqli_real_escape_string($conn, $_REQUEST['pid']);
$title=mysqli_real_escape_string($conn, $_REQUEST['title']);

$res=mysqli_query($conn, "update accpaper set slno='$slno',pid='$pid',title='$title' where auto='$id'");
 header("Location: program.php");
}
 //echo "Records updated successfully!";
?>

<?php
//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM accpaper WHERE auto='$id'");
 
while($res = mysqli_fetch_array($result))
{
    $slno = $res['slno'];
    $pid = $res['pid'];
	$title = $res['title'];
}

$conn->close();

// header("Location: home.php");
?>