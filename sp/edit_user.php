<?php
session_start();
if(!isset($_SESSION['user'])||$_SESSION['user']!='x'){
	header("location:index.html");
	exit();
}
include("config.php");
?>
<?php

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $fname = $res['fname'];
	 $lname = $res['lname'];
	$email=$res['email'];
    $uname = $res['username'];
	$pass = $res['password'];
}
?>

<html>
<head>
<title>Edit User|Conference Management System</title>
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
<h1>Edit Information</h1>
</div>

</head>

<body><br><br>

	    <!-- Body section -->
    <div class = "body_sec"> 
        <section id="Content"> 
		<center>
		<div class="regi">
           <div class="form">
		   
		      <form name="form1" method="post" action="edit_user.php">
                <br><br>
               <div class="label">First Name:</div>
                <div class="input"><input type="text" name="fname" id="fname" required value="<?php echo $fname;?>"></div><br><br>
				<div class="label">Last Name:</div>
                <div class="input"><input type="text" name="lname" id="lname" required value="<?php echo $lname;?>"></div><br><br>
                <div class="label">Email:</div>
               <div class="input"> <input type="email" name="email" id="email" required value="<?php echo $email;?>"></div><br><br>
            
                <div class="label">Username:</div>
                <div class="input"><input type="text" name="uname" id="uname" required value="<?php echo $uname;?>"></div><br><br>
				<div class="label">Password:</div>
                <div class="input"><input type="password" name="pass" id="pass" pattern=".{6,}" required title="6 characters minimum"></div><br><br>
			
				<input type="checkbox" onclick="show()">Show Password
				<br><br>		
			
                <input type="hidden" name="id" value=<?php echo $id;?>>
                <input type="submit" name="update" value="Update">
				</form>
				</div>
		   
	</center>
        </section> 
    </div> 
      
    <!-- Footer Section -->
   
</body> 
</html>   

 <script>
function show(){
	var x=document.getElementById("pass");
	if(x.type==="password"){
		x.type="text";
	}
	else{
    	x.type="password";
	}
}

</script>	
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
    
    $fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email']; 
    $uname=$_POST['uname'];   
    $pass=$_POST['pass']; 	
    $pass=md5($pass);
    
    // checking empty fields
    if(empty($fname) || empty($lname) ||empty($email) || empty($uname)|| empty($pass)) {            
        if(empty($fname)) {
            echo "<font color='red'>First Name field is empty.</font><br/>";
        }
		if(empty($lname)) {
            echo "<font color='red'>Last Name field is empty.</font><br/>";
        } 
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        
        if(empty($uname)) {
            echo "<font color='red'>Username field is empty.</font><br/>";
        }        
		        if(empty($pass)) {
            echo "<font color='red'>Password field is empty.</font><br/>";
        } 
		   
    } else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE user SET fname='$fname',lname='$lname',email='$email',username='$uname',password='$pass' WHERE id=$id");
        
        //redirectig to the display page. 
        header("Location: my_account.php?email=$email&uname=$uname");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $fname = $res['fname'];
	$lname=$res['lname'];
    $email = $res['email'];
    $uname = $res['username'];
	 $pass = $res['password'];
}
?>
