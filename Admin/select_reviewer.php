<?php
include("config.php");
?>

<?php
$paperno=$_GET['paperno'];
$id=$_POST['select'];
$sql="select * from tpc where id=$id";
$res=mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($res))
{
$email=$row['email'];
//echo $email;
}
$sql1 = "INSERT INTO review_req (paperno,email,rev_stat) VALUES ('$paperno','$email','Not reviewed')";
mysqli_query($conn, $sql1);

// Import PHPMailer classes into the global namespace 
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailerAutoload.php';
require 'credential.php';

//Create an instance; passing `true` enables exceptions
$mail =  new PHPMailer(true);

try {
	$mail->isSMTP();
//$mail->Host = 'localhost';
//$mail->SMTPAuth = false;
//$mail->SMTPAutoTLS = false; 
//$mail->Port = 25; 
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = EMAIL;                     //SMTP username
    $mail->Password   = PASS;                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom(EMAIL, 'Conference Management System');
    $mail->addAddress($email);     //Add a recipient
   // $mail->addAddress('ellen@example.com');               //Name is optional
    $mail->addReplyTo(EMAIL, 'Information');
  //  $mail->addCC('cc@example.com');
  //  $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Review Request';
    $mail->Body    = "Dear Sir/Madam,<br>We requested you to review a submission. Click the link to answer that request.<a href='localhost/Conference_Management_System/ansreq.php?paperno=$paperno&email=$email'>Link</a><br><b>Regards</b><br>Conference Management System";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
