<?php
include(ROOT_PATH.'/app/config/db.php');
include(ROOT_PATH.'/app/helpers/validateChPassword.php');
require(ROOT_PATH.'/vendor/autoload.php');

#Global Variables
$new_password = '';
$cf_password = '';

#global variables messages
$msg = '';
$css_class = '';
$icon = '';

#global variables table
$table = 'users';

#global variables error messages
$errors = array();

if(isset($_POST['chPassword'])){
    #get the id of the user
    $id = $_POST['id'];

    #unset the user id and submit button
    unset($_POST['chPassword'], $_POST['id']);

    #Form data
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cfpassword = mysqli_real_escape_string($conn, $_POST['cfpassword']);

    $errors = validatePassword($_POST);

    #Validate the password before submitting
    #password length
    if(strlen($_POST['password']) < 8){
        array_push($errors, "Password must be at least 8 characters.");
    }

    #for letters
    if(!preg_match("/[A-Za-z]/i", $_POST['password'])){
        array_push($errors, "Password must contain at least one letter");
    }

    #number
    if(!preg_match("/[0-9]/", $_POST['password'])){
        array_push($errors, "Password must contain at least one Number");
    }

    #Special character
    if(!preg_match("/[@$!%*#?&]/", $_POST['password'])){
        array_push($errors, "Password must contain at least one special characters");
    }

    if($password !== $cfpassword){
        array_push($errors, "Password not match");
    }

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    #Validate the new password
    if(count($errors) === 0){
        #validate the password
        $query = "UPDATE users SET password=? WHERE id=?";
        $stmt_user = $conn->prepare($query);
        $stmt_user->execute([$password, $id]);
            
        if($stmt_user){
            #Clear all the fields
            $id = '';
            $password = '';
            $cfpassword = '';

            $_SESSION['messages'] = "Password changed successfully.";
            $_SESSION['css_class'] = 'alert-success';
            $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
            <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
            header('location: '.BASE_URL_LINKS.'/changepassword.php');
            exit(0);
        }else{
            #Return data from fields
            $password = $_POST['password'];
            $cfpassword = $_POST['cfpassword'];

            $_SESSION['messages'] = "Passwords failed to changed.";
            $_SESSION['css_class'] = 'alert-danger';
            $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
            <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
            header('locaation: '.BASE_URL_LINKS.'/changepassword.php');
            exit(0);
        }
    }else{
        #Error message
        $msg = 'Something went wrong, please try again.';
        $css_class = 'alert-danger';
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
        <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    
        #Return data
        $password = $_POST['password'];
        $cfpassword = $_POST['cfpassword'];
    }
}