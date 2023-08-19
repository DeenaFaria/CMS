<?php
$conn = mysqli_connect('localhost', 'root', '', 'conference');
	if (isset($_POST['save'])) { 
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'images/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

  if (!in_array($extension, ['jpg','png'])) {
        echo "You file extension must be .jpg or .png";
    } else
	   if ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
           $sql = "INSERT INTO paperfile (name, size, downloads) VALUES ('$filename', $size, 0)";
		    if (mysqli_query($conn, $sql)) {
			echo "File uploaded successfully";}
           
        } else {
            echo "Failed to upload file.";
        }
    }
}
?>