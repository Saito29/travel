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
    if(empty($categ['categCreated_at'])){
        array_push($errors, "Category DateTime is required.");
    }

    #Find an existing category name in the database
    $existingCategName = selectOne('category', ['categName' => $categ['categName']]);
    if(isset($existingCategName)){
        array_push($errors, "Category name is already exist.");
    }

    #dd($errors);
    
    return $errors;
}

#This function is for update category
function validateUpdateCategory($categ)
{
    #Pass all error in error array
    $errors = array();  

    if(empty($categ['categName'])){
        array_push($errors, "Category Name is required.");
    }
    if(empty($categ['categDesc'])){
        array_push($errors, "Category description is required.");
    }
    if(empty($categ['categUpt_at'])){
        array_push($errors, "Category DateTime update is required.");
    }

    #dd($errors);
    
    return $errors;
}