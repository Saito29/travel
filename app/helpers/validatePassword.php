<?php

function validatePassword($password)
{
    #Pass all error in error array
    $errors = array();  

    if(empty($password['password'])){
        array_push($errors, "New password is required.");
    }
    if(empty($password['cfpassword'])){
        array_push($errors, "Confirm Password is required.");
    }
    

    #dd($errors);
    
    return $errors;
}