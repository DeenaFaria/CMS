<?php
include("config.php");
?>

<html>
<head>
<title>Answer Request|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="sp/css/bootstrap.min.css">
  </head>
   <body>
   <br><br>
  <?php
   $email=$_GET['email'];
  $paperno=$_GET['paperno'];
  $sql="select * from author where id='$paperno'";


$res=mysqli_query($conn,$sql);
echo "<center>";
echo "<div class='container'>";
echo "<table class='table table-bordered table-hover'>";
echo "<thead><tr>
<th colspan='2' scope='colgroup'>Paper $paperno</th>
</tr></thead>";

while($row=mysqli_fetch_array($res)){
	echo "<tbody><tr>";
echo "<td>Title</td><td>".$row['title']."</td></tr>";
echo "<tr><td>Paper</td><td><a href='download2.php?id=$paperno'><img src='file.png' alt='Download' width='20' height='20'></a> (".date('d-m-Y h:i',strtotime($row['datetime']))." GMT)</td></tr>";
echo "</tr></tbody></table>";

//echo "</tr>";
echo "<br>";
}
echo "</div>";
echo "</center>";
?>
<br>
<br>
<div class='container'>
  <form class="w-50 m-auto" action="ansreqAction.php?paperno=<?php echo $paperno;?>&email=<?php echo $email;?>" method="post">
  <div class="form-group">
  <b>Your decision(*):</b><br>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="dec" value="agree" required> I agree to review this submission<br>
  <input class="form-check-input" type="radio" name="dec" value="notagree" required> I will not review it<br>
  <input class="form-check-input" type="radio" name="dec" value="later" required> I will decide later<br><br>
  </div>
  </div>
  <div class="form-group">
  <b>Subject:</b> <input class="form-control" type="text" name="sub" value="Your review request"><br><br>
  </div>
  <div class="form-group">
  <b>Message:</b> <textarea class="form-control" name="mess" rows="7" cols="60"></textarea><br><br>
  </div>
  <input class="btn btn-secondary" type="submit" name="submit" value="Submit">
  </div>
  <br><br>
 
  </body>
  </html>