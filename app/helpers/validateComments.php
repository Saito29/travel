<?php

function validateComment($comment)
{
    #Pass all error in error array
    $errors = array();  

    if(empty($comment['username'])){
        array_push($errors, "Username is required.");
    }
    if(empty($comment['comment'])){
        array_push($errors, "Comment is required.");
    }

    #Find an existing category name in the database
    $existingUsername = selectOne('users', ['username' => $comment['username']]);
    if($existingUsername){
        array_push($errors, "Username is already exist.");
    }

    #dd($errors);
    
    return $errors;
}