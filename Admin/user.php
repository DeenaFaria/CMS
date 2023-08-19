<?php
include("session.php");
include("config.php");
?>

<html>
<head>
<title>Manage User|Admin|Conference Management System</title>
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
<h1>Admin Information</h1>
</div>

</head>

<body>
<br><br><br>

<?php

$result = mysqli_query($conn,"SELECT * FROM register");
echo "<center>";
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Name</th>
<th>Address</th>
<th>Phone</th>

<th>Action</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['address'] . "</td>";
echo "<td>" . $row['phone'] . "</td>";
echo "<td><a class='edit' href=\"edit.php?id=$row[id]\">Edit</a> <a class='delete' href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\" >Delete</a></td>";
echo "</tr>";
}
echo "</table>";
echo "<br>";
echo " <a class='kts' href='register.html'>Create new account</a>";
echo "</center>";
mysqli_close($conn);
?>

</body>
</html>