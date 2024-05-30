<?php

#Global variables
$name = '';
$email = '';
$subject = '';
$message = '';

if(isset($_POST['contact-btn'])){
    #unset the submit button
    unset($_POST['contact-btn']);
    
    #Form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    # validation of form data
    if(empty($name) || empty($email) || empty($subject) || empty($message)){
        $_SESSION['message'] = "Error: Contact form submitted. Please fill in the blank fields.";
        $_SESSION['css_class'] = 'alert-danger';
        $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
        <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';

        header('Location: '.BASE_URL.'/index.php');
        exit(0);
    }else{
        #My email address
        $to = "markkinnedyanda@gmail.com";

        #mail function of php
        if(mail($to, $subject, $message, $email)){
            $_SESSION['messages'] = "Successfully sent message, thanks for sending message we will surely read your feedback.";
            $_SESSION['css_class'] = "alert-success";
            $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
            <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
            header("location: ".BASE_URL.'/index.php');
            exit(0);
        }
    }
}