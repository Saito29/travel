<?php

function validateSubCategory($subcategory)
{
    #Pass all error in error array
    $errors = array();  
    
    if(empty($subcategory['categName'])){
        array_push($errors, "Category Name is required.");
    }
    if(empty($subcategory['name'])){
        array_push($errors, "Sub-category Name is required.");
    }
    if(empty($subcategory['description'])){
        array_push($errors, "Sub-Category description is required.");
    }
    if(empty($subcategory['created_at'])){
        array_push($errors, "Sub-Category created Datatime is required.");
    }

    #dd($errors);
    
    return $errors;
}

#This function is for validation of sub-categories
function validateUpdateSubCategory($subcategory)
{
    #Pass all error in error array
    $errors = array();  
    
    if(empty($subcategory['categName'])){
        array_push($errors, "Category Name is required.");
    }
    if(empty($subcategory['name'])){
        array_push($errors, "Sub-category Name is required.");
    }
    if(empty($subcategory['description'])){
        array_push($errors, "Sub-Category description is required.");
    }
    if(empty($subcategory['updated_at'])){
        array_push($errors, "Sub-Category updated DateTime is required.");
    }

    #dd($errors);
    
    return $errors;
}