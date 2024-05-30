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
    }else if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        array_push($errors, "Valid email is required.");
    }

    if(empty($user['password'])){
        array_push($errors, "Password is required.");
    } else if (strlen($user['password']) < 8) {
        array_push($errors, "Password must be at least 8 characters long.");
    } else if (!preg_match("/[A-Za-z]/", $user['password'])) {
        array_push($errors, "Password must contain at least one letter.");
    } else if (!preg_match("/[0-9]/", $user['password'])) {
        array_push($errors, "Password must contain at least one number.");
    }      

    if(empty($user['role'])){
        array_push($errors, "Please select user type.");
    }

    if(empty($user['created_at'])){
        array_push($errors, "Date time is required.");
    }

    #Find an existing user email acc from database
    $existingUser = selectOne('users', ['username' => $user['username']]);
    if($existingUser){
        array_push($errors, "Username is already taken.");
    }

    #Find an existing user account username from database
    $existingUSN = selectOne('users', ['email' => $user['email']]);
    if($existingUSN){
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

    if(empty($user['updated_at'])){
        array_push($errors, "Update date time is required.");
    }

    #dd($errors);
    
    return $errors;
}

#This function validates the login and password fields
function validateLogin($user){
    $errors = array();

    if(empty($user['email'])){
        array_push($errors, "Email address is required.");
    }

    if(empty($user['password'])){
        array_push($errors, "Pasword is required.");
    }

    #dd($user);

    return $errors;
}

