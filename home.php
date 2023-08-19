<html>
<head>
<title>Home|Conference Management System</title>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css" >
  <div class="header">
<h1>Welcome to Conference Management System</h1>
</div>
<ul>
  
  <li><a href="index.php">Home</a></li>
  <li><a href="speaker.html">Speakers</a></li>
  <li><a href="committee.html">Committee</a></li>
  <li><a href="venue.html">Venue</a></li>
  <li><a href="user_reg.html">Registration</a></li>
  <li><a href="login.html">Login</a></li>

</ul>
</head>

<body>
<br><br>
<h2><span style="color:gray;font-size:30px;"><strong>Conference Topics</strong></span></h2>
<?php
$hostname = "127.0.0.1";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($hostname, $username, $password,"conference");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = mysqli_query($conn,"SELECT * FROM form");
echo "<center>";
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Conference Topic</th>
<th>Date</th>
<th>Location</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['Conference'] . "</td>";
echo "<td>" . $row['date'] . "</td>";
echo "<td>" . $row['location'] . "</td>";

echo "</tr>";
}
echo "</table>";
echo "<br>";

echo "</center>";
mysqli_close($conn);
?>

<div class="paper">
<h4><span style="color:purple;font-size:25px;"><strong>Call for Paper</strong></span></h4>
<img src="paper.png" alt="Call For Paper Image" height="320" width="300">
<br>
<br>
<br>
<!--<a href="viewimage.php">View</a><br><br>
<a href="Files/index.php">Upload</a><br><br>-->
<a href="Files/downloads.php">Download</a><br>
</div>
<br>
<br>
<div class="date">
<h4><span style="color:purple;font-size:25px;"><strong><u>Important Dates</u></strong></span></h4>
<p><strong>Full Paper Submission:</strong><span style="color:red;"> 20 october,2020<span></p>
<p><strong>Submission of Special Session, Tutorial and Workshop Proposal:</strong> <span style="color:red;"> 25 october,2020</span></p>
<p><strong>Student Conference:</strong> <span style="color:red;">10 november,2020</span></p>
<p><strong>Acceptance Notification:</strong> <span style="color:red;">15 November,2020</span></p>
<p><strong>Final Paper Submission:</strong> <span style="color:red;">25 Novemberber,2020</span></p>
<p><strong>Conference Date:</strong> <span style="color:red;">20 December,2020</span></p>
</div>
<br>
<div class="schedule">
<h4><span style="color:purple;font-size:25px;">Schedule</strong></span></h4>
<table>
<TR>
<TH> Start Time</TH>
<TH>End Time</TH>
<TH>Event</TH>
</TR>
<TR>
<td>7.30am</td>
<td>9.00am</td>
<td>Registration and Reception</td>
</TR>
<TR>
<td>9.00am </td>
<td>10.00am</td>
<td>Presentation on Cyber Security 2020</td>
</TR>
<TR>
<td>10.00 am </td>
<td>11.00am</td>
<td>Opening Ceremonies</td>
</TR>
<TR>
<td>11.00am </td>
<td> 12.00pm</td>
<td>MS Conference</td>
</TR>
<TR>
<td>12.00pm </td>
<td> 2.00pm</td>
<td>Break</td>
</TR>
<TR>
<td>2.00pm </td>
<td> 5.00pm</td>
<td>Lecture Series</td>
</TR>
</table>
</div>
<br>
<div class="guide">
<h4><span style="color:purple;font-size:25px;">Submission Guidelines</strong></span></h4>
<P>*Please ensure your submission meets the conferences strict guidlines for accepting scholarly papers.</P>
<P>*Prospective author are invited to submit manuscript reporting original unpublished research and recent developments in the topics related to the conference.</p>
<P>*Submitted paper should be in PDF format and should be of 4-6 pages</P>
<P>*Submissions must include title,abstract,keywords,body and references.</P>
</P>*Due to double-blind peer review requirements,paper must contain author and affiliation information.</P>
</div>
<br>
<div class="footer">
<h3>Contact Us</h3>
<div class="address">
<p><u>Address</u></p>
<p>Permanent campus:Jatiya Kabi Kazi Nazrul Islam University</p>
<p>Trishal,Mymensingh</p>
</div>
<div class="mobile">
<p><u>Mobile Number:</u></p>
<p>+01726264062</p>
<p>+01956529989</p>
</div>
<div class="email">
<p><u>Email:</u></p>
 <p>mahmudaakhter483@gmail.com</p>
 <P>deenafaria@gmail.com</p>
 </div>
</div>
</body>
</html>