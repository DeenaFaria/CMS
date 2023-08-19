<?php
session_start();
if(!isset($_SESSION['user'])||$_SESSION['user']!='x'){
	header("location:tpc.php");
	exit();
}
include("config.php");
$paperno=$_GET['id'];
$email=$_GET['email'];
?>

<?php
if(isset($_POST['submit'])){
	$datetime=gmdate("y-m-d h:i:sa");
	$id=$_POST['id'];
	$id = mysqli_real_escape_string($conn, $_REQUEST['id']);
	$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
	$reviewfile = $_FILES['reviewfile']['name'];
	$novelty = mysqli_real_escape_string($conn, $_REQUEST['novelty']);
	$pres = mysqli_real_escape_string($conn, $_REQUEST['pres']);
	$res = mysqli_real_escape_string($conn, $_REQUEST['res']);
    $eval = mysqli_real_escape_string($conn, $_REQUEST['eval']);
    $review = mysqli_real_escape_string($conn, $_REQUEST['review']);
    $conf = mysqli_real_escape_string($conn, $_REQUEST['conf']);
	$remark = mysqli_real_escape_string($conn, $_REQUEST['remark']);
 //   @$reviewfile = mysqli_real_escape_string($conn, $_REQUEST['reviewfile']);

    // destination of the file on the server
    $destination = 'ReviewFiles/' . $reviewfile;

    // get the file extension
    $extension = pathinfo($reviewfile, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['reviewfile']['tmp_name'];
    $size = $_FILES['reviewfile']['size'];

    if (!in_array($extension, ['docx','pdf'])) {
        echo "You file extension must be .docx or .pdf";
    } 
	else if ($_FILES['reviewfile']['size'] > 100000000) { // file shouldn't be larger than 100 Megabyte
        echo "File too large!";
       } 
	else {
        // move the uploaded (temporary) file to the specified destination
            move_uploaded_file($file, $destination);
            $sql = "INSERT INTO addreview (name,paperno,novelty,pres,res,eval,review,conf,remark,reviewfile,size,datetime) VALUES ('$name','$id','$novelty','$pres','$res','$eval','$review','$conf','$remark','$reviewfile',$size,'$datetime')";
            if (mysqli_query($conn, $sql)) {
                echo "Review submitted successfully";
				header("Location:seeReview.php?paperno=$paperno&email=$email");
            }
        
		else {
            echo "Failed to submit review.";
        }
    }
	
	$sql1="select * from review_req where paperno='$paperno' and email='$email'";
$res1=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($res1)){
	$id=$row['id'];
	$paperno=$row['paperno'];
	$email=$row['email'];
	$rev_req_stat=$row['rev_req_stat'];
	$result = mysqli_query($conn, "UPDATE review_req SET id='$id',paperno='$paperno',email='$email',rev_req_stat='$rev_req_stat',rev_stat='Reviewed' WHERE paperno='$paperno' and email='$email'");
}
}

?>