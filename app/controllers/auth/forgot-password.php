<?php
include(ROOT_PATH.'/app/config/db.php');
include(ROOT_PATH."/app/helpers/validateForgot.php");
require(ROOT_PATH."/vendor/autoload.php");

#Global Variables
$email = '';
$token = '';
$token_hash = '';
$password = '';
$cfpassword = '';


#Table user
$table = 'users';

#Message
$msg = '';
$css_class = '';
$icon = '';

#array of error 
$errors = array();

#Forgot password, if user click the button
if(isset($_POST['forget-btn'])){
    #Array of errors
    $errors = validateEmail($_POST);

    if(count($errors) === 0){
        #unset the button
        unset($_POST['forget-btn']);

        #Get the email address
        $email = $_POST['email'];

        $queryEmail = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $queryEmail);
        #Validate email address
        if(mysqli_num_rows($result) > 0){
            #Generate random bytes
            $token = bin2hex(random_bytes(16));
            $token_hash = hash('sha256', $token);

            #random token hash expired
            $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

            #create a query for token
            $sql = "UPDATE $table 
            SET reset_token_hash = ?,
                reset_token_expires_at = ?
            WHERE email = ?";

            #prepare query 
            $stmt = $conn->prepare($sql);

            #bind the parameter query
            $stmt->bind_param("sss", $token_hash, $expiry, $email);

            #execute the statement
            $stmt->execute();

            #if the mail was found
            if($conn->affected_rows){
                $mail = require(ROOT_PATH.'/app/controllers/auth/mailer.php');
                #Set the mail object 
                $mail->setFrom("noreply@example.com");
                $mail->addAddress($email);
                $mail->Subject = "Password Reset";
                $mail->Body = "<b>Dear User.</b>
                <p>We noticed you want to reset your password, in order to reset your password click the link below.</p>                
                <p>It will direct you to a new page to reset your password page.</p>
                Click <a href='http://localhost/travel/auth/reset-password.php?token=$token'>reset password here</a>
                to reset your password.
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
                    header('location: '.BASE_URL_LINKS.'/forgetpassword.php');
                    exit(0);
                }catch(Exception $e){
                    $email = $_POST['email'];
                    #Alert message
                    $msg = "Message could not be sent. Mailer error:{$mail->ErrorInfo}";
                    $css_class = "alert-danger";
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
                    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
                }
            }else{
                #Alert message
                $msg = "Message sent, please check your inbox.";
                $css_class = "alert-success";
                $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
                <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
            }
        }else{
            array_push($errors, "Email address is not exits!");
        }        
    }   
}

#Get token
if(isset($_GET['token'])){
    $token = $_GET['token'];

    // Hash the received token for comparison
    $token_hash = hash('sha256', $token);

    $user = selectOne($table, ['reset_token_hash' => $token_hash]);
}

#if user click the update password button
if (isset($_POST['rsPassword'])) {

    // Token Retrieval and Validation
    $token = trim($_POST['token']); // Remove leading/trailing whitespace
    if (empty($token)) {
        array_push($errors, "Please provide a token.");
    } else {
        $token_hash = hash('sha256', $token);
        $sql = "SELECT * FROM $table WHERE reset_token_hash = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $token_hash);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user === NULL) {
            array_push($errors, "Invalid or expired token."); // Combined message
        } else {
            // Token is valid
            $current_time = time();

            if ($user['reset_token_expires_at'] <= $current_time) {
                array_push($errors, "Token has expired.");
            } else {
                // User has a valid token, proceed with password reset

                // Password and Confirmation Validation
                $password = trim($_POST['password']);
                $cfpassword = trim($_POST['cfpassword']);

                if (empty($password)) {
                    array_push($errors, "Please enter a new password.");
                }else if(empty($cfpassword)){
                    array_push($errors, "Please enter confirmation password.");
                } else if (strlen($password) < 8) {
                    array_push($errors, "Password must be at least 8 characters long.");
                } else if (!preg_match("/[A-Za-z]/", $password)) {
                    array_push($errors, "Password must contain at least one letter.");
                } else if (!preg_match("/[0-9]/", $password)) {
                    array_push($errors, "Password must contain at least one number.");
                } else if ($password !== $cfpassword) {
                    array_push($errors, "Passwords do not match.");
                }            

                if (count($errors) === 0) {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    // Update User Password in Database
                    $sql = "UPDATE $table SET password = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $hashed_password, $user['id']);
                    $stmt->execute();

                    // Success Message or Redirect
                    $_SESSION['message'] = "Password successfully changed. You can now close this page.";
                    $_SESSION['css_class'] = "alert-success";
                    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
                    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
                    header("location: ".BASE_URL_LINKS.'/reset-password.php');
                    exit(0);
                }
            }
        }
    }

    // Unset Button Fields
    unset($_POST['rsPassword']);
}
