<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'conference');


// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
$id=$_GET['id'];
    // name of the uploaded file
    $filename = $_FILES['video']['name'];

    // destination of the file on the server
    $destination = 'uploaded_video/' . $filename;

    // get the file extension
	//$allow=array("mp3","mp4","wma");
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['video']['tmp_name'];
    $size = $_FILES['video']['size'];

    if (!in_array($extension, ['mp4'])) {
        echo "You file extension must be .mp4";
    } else
	   if ($_FILES['video']['size'] > 100000000) { // file shouldn't be larger than 100Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO videofiles (id,name, size) VALUES ('$id','$filename', $size)";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
?>