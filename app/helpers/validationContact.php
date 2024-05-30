<?php
function validateContact($contact)
{
    #Pass all error in error array
    $errors = array();  

    if(empty($contact['name'])){
        array_push($errors, "Name is required.");
    }
    if(empty($contact['email'])){
        array_push($errors, "Email is required.");
    }

    if(empty($contact['subject'])){
        array_push($errors, "Subject is required.");
    }

    if(empty($contact['message'])){
        array_push($errors, "Message is required.");
    }

    #dd($errors);
    
    return $errors;
}
