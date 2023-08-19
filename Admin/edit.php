<?php

include("session.php");
include("config.php");
?>
<?php

//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM register WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
	$address=$res['address'];
    $phone = $res['phone'];
    $uname = $res['username'];
	$pass = $res['password'];
}
?>

<html>
<head>
<title>Edit User|Admin|Conference Management System</title>
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

<center><h3>Edit Information</h3></center>
</head>

<body>

	    <!-- Body section -->
    <div class = "body_sec"> 
        <section id="Content"> 
		<center>
		<div class="regi">
           <div class="form">
		   
		      <form name="form1" method="post" action="edit.php">
                <br><br>
               <div class="label"> Name:</div>
                <div class="input"><input type="text" name="name" id="name" required value="<?php echo $name;?>"></div><br><br>
                <div class="label">Address:</div>
               <div class="input"> <input type="text" name="address" id="address" required value="<?php echo $address;?>"></div><br><br>
          
               <div class="label"> Phone:</div>
                <div class="input"><input type="text" name="phone" id="phone" required value="<?php echo $phone;?>"></div><br><br>
            
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
    
    $name=$_POST['name'];
	$address=$_POST['address']; 
    $phone=$_POST['phone'];
    $uname=$_POST['uname'];   
    $pass=$_POST['pass']; 	
    $pass=md5($pass);
    
    // checking empty fields
    if(empty($name) || empty($phone) || empty($uname)|| empty($pass)) {            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
		if(empty($address)) {
            echo "<font color='red'>Address field is empty.</font><br/>";
        } 
        
        if(empty($phone)) {
            echo "<font color='red'>Phone field is empty.</font><br/>";
        }
        
        if(empty($uname)) {
            echo "<font color='red'>Username field is empty.</font><br/>";
        }        
		        if(empty($pass)) {
            echo "<font color='red'>Password field is empty.</font><br/>";
        } 
		   
    } else {    
        //updating the table
        $result = mysqli_query($conn, "UPDATE register SET name='$name',address='$address',phone='$phone',username='$uname',password='$pass' WHERE id=$id");
        
        //redirectig to the display page. 
        header("Location: user.php");
    }
}
?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM register WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $name = $res['name'];
	$address=$res['address'];
    $phone = $res['phone'];
    $uname = $res['username'];
	 $pass = $res['password'];
}
?>
