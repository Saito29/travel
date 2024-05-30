<?php

function validateEmail($email)
{
    #Pass all error in error array
    $errors = array();  

    if(empty($email['email'])){
        array_push($errors, "Email address is required.");
    }
   
    #dd($errors);
    
    return $errors;
}

function validatePassword($password)
{
    #Pass all error in error array
    $errors = array();  

    if(empty($password['password'])){
        array_push($errors, "New password is required.");
    }
    if(empty($password['cfpassword'])){
        array_push($errors, "Confirm password is required.");
    }
   
    #dd($errors);
    
    return $errors;
}