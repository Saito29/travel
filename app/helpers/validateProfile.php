<?php
function validateProfileUser($user)
{
    #Pass all error in error array
    $errors = array();  

    if(empty($user['firstName'])){
        array_push($errors, "First Name is required.");
    }
    if(empty($user['lastName'])){
        array_push($errors, "Last Name is required.");
    }

    if(empty($user['username'])){
        array_push($errors, "Username is required.");
    }

    if(empty($user['email'])){
        array_push($errors, "Email address is required.");
    }

    #dd($errors);
    
    return $errors;
}
