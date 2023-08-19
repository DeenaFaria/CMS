<?php
include("session.php");
include("config.php");
?>

<html>
<head>
<title>TPC Members|Admin|Conference Management System</title>
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
<h1>Welcome to Conference Management System</h1>
</div>

</head>

<body>
<br><br>
<center>
<div class="regi">
<center><strong><h3><span style="font-size:25px;">TPC Members</span></h3></strong></center><br><br>
<form action="tpc_action.php" method="post">

<div class="label">Name:        </div> <div class="input"><input type="text" name="name" required></div><br><br>
<div class="label">Organization:</div> <div class="input"><input type="text" name="org" required></div><br><br>
<div class="label">Keywords:</div> <div class="input"><input type="text" name="key" required></div><br><br>
<div class="label">E-mail:      </div> <div class="input"><input type="email" name="email" required></div><br><br>
<div class="label">Phone Number:</div> <div class="input"><input type="text" name="phone" pattern="(^([+]{1}[8]{2}|0088)?(01){1}[3-9]{1}\d{8})$" required></div><br><br>

<center><input type="submit" name="submit" value="Submit">
<input type="reset" value="Reset"></center>
</center>
</form>
</div>
<br><br>

<?php

$sql="select * from tpc";
$res=mysqli_query($conn,$sql);
echo "<center>";

echo "<table>";
echo "<tr>
<th> Name</th>
<th>Organization</th>
<th>Keywords</th>
<th>Edit TPC</th>
</th>";
//$count=1;
while($row = mysqli_fetch_array($res))
{
	
echo "<tr>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['org']."</td>";
echo "<td>".$row['keywords']."</td>";
//echo "<form action='select_reviewer.php' method='post'>";
//echo "<td><center><input onChange='this.form.submit()' type='checkbox' name='select' value='$count'></center></td>";
//if ($page->checkbox_state==1){echo 'checked';}
//$count++;
echo "<td>"."<center><a class='edit' href='edit_tpc.php?id=$row[id]'>Edit</a> <a class='delete' href='delete_tpc.php?id=$row[id]' onClick='return confirm(\"Are you sure you want to delete?\")'>Delete</a></center>"."</td>";
echo "</tr>";
}
echo "</table>";

echo "</center>";
echo "<br><br>";
mysqli_close($conn);

?>

</body>
</html>