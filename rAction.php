<?php
$var = $_POST['feedback'];
file_put_contents("Feedback.txt", $var . "\n", FILE_APPEND);
exit();
?>