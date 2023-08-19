<?php
include("session.php");
include("config.php");
?>

<?php

//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM pub WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
    $text = $res['text'];
    
}

//$conn->close();

// header("Location: home.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Publications|Conference Management System</title>
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
<center><h3>Edit Publications</h3></center>
</head>

<body>
        
		<center>
           
		   
		      <form method="post" action="edit_pub.php">
                <br><br>
				
                
                <textarea class="tinymce" name="pub" rows="30" cols="50" required><?php echo $text;?></textarea><br><br>

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
    
    @$text=$_POST['pub'];


@$text=mysqli_real_escape_string($conn, $_REQUEST['pub']);

@$res=mysqli_query($conn, "update pub set text='$text' where id='$id'");
 header("Location: home.php");
}
 //echo "Records updated successfully!";
?>

<?php
//getting id from url
@$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM pub WHERE id='$id'");
 
while($res = mysqli_fetch_array($result))
{
    $text = $res['text'];
    
}

$conn->close();

// header("Location: home.php");
?>