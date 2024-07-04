<?php
#php Mailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require(ROOT_PATH.'/vendor/autoload.php');

#php object
$mail = new PHPMailer(true);

#Debugger mailer (optional if not working)
# $mail->SMTPDebug = SMTP::DEBUG_SERVER;

#call SMTP authentication
$mail->isSMTP();
$mail->SMTPAuth = true;

#Configure 
$mail->Host = 'smtp.gmail.com';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = '587';
$mail->Username = "message.travel.com@gmail.com";
$mail->Password = "lcnrqkxuqjcazdrx";

$mail->isHTML(true);

return $mail;