<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'conference');
$datetime='';
// Uploads files
if (isset($_POST['submit'])) { // if save button on the form is clicked

    $filename = $_FILES['myfile']['name'];
	//date_default_timezone_set('Asia/Dhaka');
	$datetime=gmdate("y-m-d h:i:sa");
	
	$fname1 = mysqli_real_escape_string($conn, $_REQUEST['fname1']);
	$lname1 = mysqli_real_escape_string($conn, $_REQUEST['lname1']);
    $email1 = mysqli_real_escape_string($conn, $_REQUEST['email1']);
    $org1 = mysqli_real_escape_string($conn, $_REQUEST['org1']);
	$corr1 = mysqli_real_escape_string($conn, $_REQUEST['corr1']);
	
	$fname2 = mysqli_real_escape_string($conn, $_REQUEST['fname2']);
	$lname2 = mysqli_real_escape_string($conn, $_REQUEST['lname2']);
    $email2 = mysqli_real_escape_string($conn, $_REQUEST['email2']);
    $org2 = mysqli_real_escape_string($conn, $_REQUEST['org2']);
	@$corr2 = mysqli_real_escape_string($conn, $_REQUEST['corr2']);
	
	$fname3 = mysqli_real_escape_string($conn, $_REQUEST['fname3']);
	$lname3 = mysqli_real_escape_string($conn, $_REQUEST['lname3']);
    $email3 = mysqli_real_escape_string($conn, $_REQUEST['email3']);
    $org3 = mysqli_real_escape_string($conn, $_REQUEST['org3']);
	@$corr3 = mysqli_real_escape_string($conn, $_REQUEST['corr3']);
	
	$fname4 = mysqli_real_escape_string($conn, $_REQUEST['fname4']);
	$lname4 = mysqli_real_escape_string($conn, $_REQUEST['lname4']);
    $email4 = mysqli_real_escape_string($conn, $_REQUEST['email4']);
    $org4 = mysqli_real_escape_string($conn, $_REQUEST['org4']);
	@$corr4 = mysqli_real_escape_string($conn, $_REQUEST['corr4']);
	
    $title = mysqli_real_escape_string($conn, $_REQUEST['title']);
	$abs = mysqli_real_escape_string($conn, $_REQUEST['abstract']);
    $key = mysqli_real_escape_string($conn, $_REQUEST['key']);
   
    //$datetime = mysqli_real_escape_string($conn, $_REQUEST(date("h:i:sa")));





    // destination of the file on the server
    $destination = 'Author_Papers/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['pdf'])) {
        echo "You file extension must be .pdf";
    } 
	else if ($_FILES['myfile']['size'] > 100000000) { // file shouldn't be larger than 100 Megabyte
        echo "File too large!";
       } 
	else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO author (fname1,lname1,email1,org1,corr1,fname2,lname2,email2,org2,corr2,fname3,lname3,email3,org3,corr3,fname4,lname4,email4,org4,corr4,title,abstract,keywords,file,datetime) VALUES ('$fname1','$lname1','$email1','$org1','$corr1','$fname2','$lname2','$email2','$org2','$corr2','$fname3','$lname3','$email3','$org3','$corr3','$fname4','$lname4','$email4','$org4','$corr4','$title','$abs','$key','$filename','$datetime')";
            if (mysqli_query($conn, $sql)) {
                echo "Paper uploaded successfully";
            }
        }
		else {
            echo "Failed to upload paper.";
        }
    }
}
?>