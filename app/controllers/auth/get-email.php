<?php
include(ROOT_PATH.'/app/config/db.php');
include(ROOT_PATH ."/app/helpers/validateUser.php");
require(ROOT_PATH."/vendor/autoload.php");

#Global Variables
$email = "";
$mail = "";

$table = 'users';

$msg = '';
$css_class = '';
$icon = '';

$errors = array();

# if user click email submit form
if(isset($_POST['email-btn'])){
    #email
    $email = $_POST['email'];

    if(empty($_POST['email'])){
        array_push($errors, "Email is required");
    }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Valid email address is required.");
    }

    #if theres is no error proceed to process the email
    if(count($errors) === 0){
        #check if email is exist
        $user_query = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $user_query);
        #validate the email
        if(mysqli_num_rows($result) > 0){
            #acitivation token for email registration
            $activation_token = bin2hex(random_bytes(16));
            $activation_token_hash = hash('sha256', $activation_token);

            #if user exist send verification email to user
            $sql = "UPDATE $table SET account_activation_hash = ? WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $activation_token_hash, $email);
            $stmt->execute();

            #if mail found
            if($conn->affected_rows){
                #Email verfication sender
                $mail = require(ROOT_PATH.'/app/controllers/auth/mailer.php');
                #Set the mail object 
                $mail->setFrom("message.travel.com@gmail.com");
                $mail->addAddress($email);
                $mail->Subject = "Email Account activation";
                $mail->Body = "<b>Dear User.</b>
                <p>We noticed you resubmitted an email verification, We sincerly apologies if you did'nt recieved the email verification when you creating an account.</p>                
                <p>Please click the link below to verify your activation of account, It will direct you to a new page to activate your email account page.</p>
                <p>Click <a href='http://localhost/travel/auth/account-activation.php?token=$activation_token_hash'>activate email account</a>
                here for you to be able to login to website.</p>
                <br>
                <p>If you ever encounter a problem on our website, please contact us at our page. We will do our best to
                respond to your message. Thank you</p>
                <br>";

                try{
                    $mail->send();
                    $mail ='';
                    $email = '';
                    $_SESSION['messages'] = "Please check your email inbox.";
                    $_SESSION['css_class'] = "alert-success";
                    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
                    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
                    header('location: '.BASE_URL_LINKS.'/emailActivation.php');
                    exit();
                }catch(Exception $e){
                    $email = $_POST['email'];
                    #Alert message
                    $msg = "Message could not be sent. Mailer error:{$mail->ErrorInfo}";
                    $css_class = "alert-danger";
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
                    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
                }
            }
            $stmt->close();
        }else{
            #return data
            $email = $_POST['email'];

            #Alert error message
            $msg = "Email is not registerd, Please register it first.";
            $css_class = "alert-danger";
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
            <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
        }
    }else{
        #return data
        $email = $_POST['email'];

        #Alert error message
        $msg = "Something went wrong, Please try again.";
        $css_class = "alert-danger";
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
        <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
    }
    #unset the form buttons
    unset($_POST['email-btn']);
}