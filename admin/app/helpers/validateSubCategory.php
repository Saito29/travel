<?php

function validateSubCategory($subcateg)
{
    #Pass all error in error array
    $errors = array();  

    if(empty($subcateg['subcategName'])){
        array_push($errors, "Category Name is required.");
    }
    if(empty($subcateg['subcategDesc'])){
        array_push($errors, "Category description is required.");
    }

    #Find an existing category name in the database
    $existingSubCategName = selectOne('sub-category', ['categName' => $subcateg['subcategName']]);
    if(isset($existingSubCategName)){
        array_push($errors, "Sub-Category name is already exist.");
    }

    #dd($errors);
    
    return $errors;
}