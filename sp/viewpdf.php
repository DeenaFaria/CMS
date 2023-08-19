<?php  
  $id = $_GET['id'];
    if($id==''){
  header("Location:reviewer.php");
}
$con=mysqli_connect("localhost","root","","conference") or die('Could not connect to server');
mysqli_select_db($con,"conference") or die('Could not connect to database');
$query="select id,name,size from files where id=$id";
$res=mysqli_query($con,$query) or die(mysqli_error());
$row = mysqli_fetch_array($res);
$id=$row['id'];
$name=$row['name'];
$size=$row['size'];
 // $lesson = New Lesson();
  //$res = $lesson->single_lesson($id);
echo " <h2>View PDF</h2>";

header("Content-type: application/pdf");
header("Content-Disposition: inline;filename=$name");
@readfile("Files/uploads/".$name);
?> 

