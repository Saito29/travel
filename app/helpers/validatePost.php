<?php

#Validate post data
function validatePost($posts){
    $errors = array();

    if(empty($posts['title'])){
        array_push($errors, "Post Title is required.");
    }
    if(empty($posts['category'])){
        array_push($errors, "Category is required.");
    }
    if(empty($posts['subcategory'])){
        array_push($errors, "Sub-Category is required.");
    }
    if(empty($posts['status'])){
        array_push($errors, "Post status is required.");
    }
    if(empty($posts['description'])){
        array_push($errors, "Post description is required.");
    }
    if(empty($posts['created_at'])){
        array_push($errors, "Post creation time is required.");
    }

    #dd($errors)

    return $errors;
}

#Function for update validation

#Validate post data
function validateUpdatePost($posts){
    $errors = array();

    if(empty($posts['title'])){
        array_push($errors, "Post Title is required.");
    }
    if(empty($posts['category'])){
        array_push($errors, "Category is required.");
    }
    if(empty($posts['subcategory'])){
        array_push($errors, "Sub-Category is required.");
    }
    if(empty($posts['status'])){
        array_push($errors, "Post status is required.");
    }
    if(empty($posts['description'])){
        array_push($errors, "Post description is required.");
    }
    if(empty($posts['updated_at'])){
        array_push($errors, "Post updated time is required.");
    }

    #dd($errors)

    return $errors;
}