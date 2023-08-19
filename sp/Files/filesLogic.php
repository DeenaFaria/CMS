<?php
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'conference');
$datetime='';
// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked

    $filename = $_FILES['myfile']['name'];
	//date_default_timezone_set('Asia/Dhaka');
	$datetime=gmdate("y-m-d h:i:sa");
	
	$fname = mysqli_real_escape_string($conn, $_REQUEST['fname']);
	$lname = mysqli_real_escape_string($conn, $_REQUEST['lname']);
	$date = mysqli_real_escape_string($conn, $_REQUEST['date']);
    $email = mysqli_real_escape_string($conn, $_REQUEST['email']);
    $idnum = mysqli_real_escape_string($conn, $_REQUEST['idnum']);
    $title = mysqli_real_escape_string($conn, $_REQUEST['title']);
	$abs = mysqli_real_escape_string($conn, $_REQUEST['abstract']);
    $key = mysqli_real_escape_string($conn, $_REQUEST['key']);
    $certi = mysqli_real_escape_string($conn, $_REQUEST['certi']);
    //$datetime = mysqli_real_escape_string($conn, $_REQUEST(date("h:i:sa")));





    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['docx','pdf'])) {
        echo "You file extension must be .docx or .pdf";
    } 
	else if ($_FILES['myfile']['size'] > 100000000) { // file shouldn't be larger than 100 Megabyte
        echo "File too large!";
       } 
	else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (fname,lname,date,email,idnum,title,abs,keyword,certi,name,size,downloads,datetime) VALUES ('$fname','$lname','$date','$email','$idnum','$title','$abs','$key','$certi','$filename',$size,0,'$datetime')";
            if (mysqli_query($conn, $sql)) {
                echo "Paper uploaded successfully";
            }
        }
		else {
            echo "Failed to upload paper.";
        }
    }
}

// connect to database
$conn = mysqli_connect('localhost', 'root', '', 'conference');

$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}
?>