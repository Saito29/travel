<?php

function validateCategory($categ)
{
    #Pass all error in error array
    $errors = array();  

    if(empty($categ['categName'])){
        array_push($errors, "Category Name is required.");
    }
    if(empty($categ['categDesc'])){
        array_push($errors, "Category description is required.");
    }

    #Find an existing category name in the database
    $existingCategName = selectOne('category', ['categName' => $categ['categName']]);
    if(isset($existingCategName)){
        array_push($errors, "Category name is already exist.");
    }

    #dd($errors);
    
    return $errors;
}