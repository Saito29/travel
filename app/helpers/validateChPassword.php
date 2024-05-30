<?php

function validatePassword($password)
{
    #Pass all error in error array
    $errors = array();  
        
    if(empty($password['password'])){
        array_push($errors, "New password is required.");
    }else if(strlen($password['password']) < 8){
        array_push($errors, "Password must be at least 8 characters long.");
    }else if(!preg_match("/[A-Za-z]/i", $password['password'])){
        array_push($errors, "Password must contain at least one letter");
    }else if(!preg_match("/[0-9]/", $password['password'])){
        array_push($errors, "Password must contain at least one Number");
    }
    if(empty($password['cfpassword'])){
        array_push($errors, "Confirm Password is required.");
    }
    if($password['password'] !== $password['cfpassword']){
        array_push($errors, "Password not match.");
    }
    
    #dd($errors);
    
    return $errors;
}