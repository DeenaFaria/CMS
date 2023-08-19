<?php  
  $id = $_GET['id'];
    if($id==''){
  header("Location:downloads.php");
}
$con=mysqli_connect("localhost","root","","conference") or die('Could not connect to server');
mysqli_select_db($con,"conference") or die('Could not connect to database');
$query="select id,name,size from files where id=$id";
$res=mysqli_query($con,$query) or die(mysqli_error());
$row = mysqli_fetch_array($res);
$id=$row['id'];
$name=$row['name'];
$size=$row['size'];
header("Content-type: image/jpeg");
@readfile("Files/uploads/".$name);
?> 