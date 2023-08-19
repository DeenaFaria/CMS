<?php
include("session.php");
include("config.php");
?>

<html>
<head>
<title>Add Reviewers|Admin|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../sp/css/bootstrap.min.css">
  <?php

$sql="select * from logo";
$res=mysqli_query($conn,$sql);

$row = mysqli_fetch_array($res);
if($row['size']>0)
{
echo '<link rel="icon" href="Logo/'.$row['file'].'" type="image/x-icon">';
}
?>

<br><br>
<center><h1>Add Reviewer/s</h1></center>
</head>

<body>
<br><br>

<?php
$paperno=$_GET['id'];
$sql="select * from tpc";
$res=mysqli_query($conn,$sql);
echo "<center>";
echo "<div class='container'>";
echo "<table class='table table-bordered table-hover'>";
echo "<thead><tr>
<th> Name</th>
<th>Organization</th>
<th>Keywords</th>
<th>Select Reviewer</th>
</tr></thead>";
$count=1;
while($row = mysqli_fetch_array($res))
{
	
echo "<tbody><tr>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['org']."</td>";
echo "<td>".$row['keywords']."</td>";
echo "<form action='select_reviewer.php?paperno=$paperno' method='post'>";
echo "<td><center><input onChange='this.form.submit()' type='checkbox' name='select' value='$count'></center></td>";
//if ($page->checkbox_state==1){echo 'checked';}
$count++;
//echo "<td>"."<center><a class='edit' href='edit_tpc.php?id=$row[id]'>Edit</a> <a class='delete' href='delete_tpc.php?id=$row[id]' onClick='return confirm(\"Are you sure you want to delete?\")'>Delete</a></center>"."</td>";
echo "</tr></tbody>";
}
echo "</table>";
echo "</div>";
echo "</center>";
echo "<br><br>";
mysqli_close($conn);

?>

</body>
</html>