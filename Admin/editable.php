<?php

session_start();
if(!isset($_SESSION['student'])||$_SESSION['student']!='x'){
	header("location:index.html");
	exit();
}
//else
	//header("location:home.php");

?>

<?php

$hostname = "127.0.0.1";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($hostname, $username, $password,"conference");
echo "<br>";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
    $conference1=$_POST['conference'];
	 $date=$_POST['date']; 
    $location=$_POST['location'];
    $date1=$_POST['date1'];   
    $date2=$_POST['date2']; 
     $date3=$_POST['date3'];
 $date4=$_POST['date4'];
 $date5=$_POST['date5'];
 $date6=$_POST['date6']; 
 
 