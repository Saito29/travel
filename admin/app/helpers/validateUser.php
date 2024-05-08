<?php
function validateUser($user)
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

    if(empty($user['password'])){
        array_push($errors, "Password is required.");
    }  

    if(empty($user['role'])){
        array_push($errors, "Please select user type.");
    }

    #Find an existing user email acc from database
    $existingUser = selectOne('users', ['username' => $user['username']]);
    if(isset($existingUser)){
        array_push($errors, "Username is already taken.");
    }

    #Find an existing user account username from database
    $existingUSN = selectOne('users', ['email' => $user['email']]);
    if(isset($existingUSN)){
        array_push($errors, "Email Address is already exists.");
    }

    #dd($errors);
    
    return $errors;
}


#Function of validate user
function validateUpdateUser($user)
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

    if(empty($user['password'])){
        array_push($errors, "Password is required.");
    }  

    if(empty($user['role'])){
        array_push($errors, "Please select user type.");
    }

    #dd($errors);
    
    return $errors;
}

