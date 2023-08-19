<?php
include("config.php");
include("session.php");
$paperno=$_GET['id'];
?>

<html>
<head>
<title>Accept/Reject Paper|Admin|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../sp/css/bootstrap.min.css">
  </head>
   <body>
<br>
<br>
<div class='container'>
  <form class="w-50 m-auto" action="acceptAction.php?paperno=<?php echo $paperno;?>" method="post">
  
  <div class="form-group">
  <b>Decision about the paper(*):</b><br>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="dec" value="accepted" required> Accepted<br>
  <input class="form-check-input" type="radio" name="dec" value="rejected" required> Rejected<br><br>
  </div>

  <div class="form-group">
  <b>Subject:</b> <input class="form-control" type="text" name="sub" value="Review" required><br><br>
  </div>
  <div class="form-group">
  <b>Editor's Comment:</b> <textarea class="form-control" name="mess" rows="7" cols="60" required></textarea><br><br>
  </div>
  <input class="btn btn-secondary" type="submit" name="submit" value="Send">
  </div>
  <br><br>
 
  </body>
  </html>