<?php
$conn = mysqli_connect('localhost', 'root', '', 'conference');
$id=$_GET['id'];
$sql = "select * from addreview where id='$id'";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Downloads files
//if (isset($_GET['file_id'])) {
  //  $id = $_GET['file_id'];

    // fetch file to download from database
  $sql = "select * from addreview where id='$id'";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'ReviewFiles/' . $file['reviewfile'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('ReviewFiles/' . $file['reviewfile']));
        readfile('ReviewFiles/' . $file['reviewfile']);

        // Now update downloads count
        //$newCount = $file['downloads'] + 1;
        //$updateQuery = "UPDATE paperfile SET downloads=$newCount WHERE id=$id";
        //mysqli_query($conn, $updateQuery);
        exit;
    }

//}
?>