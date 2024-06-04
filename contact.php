<?php
include('path.php');
include(ROOT_PATH.'/app/config/db.php');

#Global variables
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
    
    #php Mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require(ROOT_PATH.'/vendor/autoload.php');

#php object
$mail = new PHPMailer(true);

#Debugger mailer (optional if not working)
#$mail->SMTPDebug = SMTP::DEBUG_SERVER;

#call SMTP authentication
$mail->isSMTP();
$mail->SMTPAuth = true;

#Configure 
$mail->Host = 'your_host';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = '587';
$mail->Username = "your_email";
$mail->Password = "your_password";

$mail->setFrom($email, $name);
$mail->addAddress("your_email", "your_username");

$mail->Subject = $subject;
$mail->Body = $message;

$mail->send();

header("Location: ".BASE_URL."/index.php");
exit(0);