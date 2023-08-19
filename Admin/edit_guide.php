<?php
include("session.php");
include("config.php");
?>

<?php

//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM guideline WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
    $guide = $res['guide'];
    
}

//$conn->close();

// header("Location: home.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Guidelines|Conference Management System</title>
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

<center><h3>Edit Guidelines</h3></center>
</head>

<body>

	   
    
		<center>
          
		   
		      <form method="post" action="edit_guide.php"> 
              
                <textarea class="tinymce" name="guide" rows="30" cols="50"><?php echo $guide;?></textarea><br><br>

                <input type="hidden" name="id" value=<?php echo $id;?>>
				
		        <input type="submit" name="update" value="Update">
				</form>
				
				<script type="text/javascript" src="tinymce/js/jquery.min.js"></script>
                <script type="text/javascript" src="tinymce/plugin/tinymce/tinymce.min.js"></script>
                <script type="text/javascript" src="tinymce/plugin/tinymce/init-tinymce.js"></script>
		   
	      </center>
   
</body> 
</html>   


<?php
 
if(isset($_POST['update']))
{    
    @$id = $_POST['id'];
    
    @$guide=$_POST['guide'];


@$guide=mysqli_real_escape_string($conn, $_REQUEST['guide']);

@$res=mysqli_query($conn, "update guideline set guide='$guide' where id='$id'");
 header("Location: home.php");
}
 //echo "Records updated successfully!";
?>

<?php
//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM guideline WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
    $guide = $res['guide'];
    
}

$conn->close();

// header("Location: home.php");
?>