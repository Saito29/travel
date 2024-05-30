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