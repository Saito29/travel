<?php

function validatePage($page)
{
    #Pass all error in error array
    $errors = array();  

    if(empty($page['title'])){
        array_push($errors, "Page Title is required.");
    }
    if(empty($page['created_at'])){
        array_push($errors, "Posted on is required.");
    }
    if(empty($page['details'])){
        array_push($errors, "Page details is required.");
    }

    #Find an existing page title name in the database
    $existingPageTitle = selectOne('pages', ['title' => $page['title']]);
    if($existingPageTitle){
        array_push($errors, "Page title is already exist.");
    }

    #dd($errors);
    
    return $errors;
}

function validatePageUpt($page)
{
    #Pass all error in error array
    $errors = array();  

    if(empty($page['title'])){
        array_push($errors, "Page Title is required.");
    }
    if(empty($page['details'])){
        array_push($errors, "Page details is required.");
    }
    if(empty($page['updated_at'])){
        array_push($errors, "Posted update is required.");
    }

    #dd($errors);
    
    return $errors;
}