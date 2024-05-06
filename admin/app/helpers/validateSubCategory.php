<?php

function validateSubCategory($subcategory)
{
    #Pass all error in error array
    $errors = array();  
    
    if(empty($subcategory['categoryName'])){
        array_push($errors, "Category Name is required.");
    }
    if(empty($subcategory['name'])){
        array_push($errors, "Sub-category Name is required.");
    }
    if(empty($subcategory['description'])){
        array_push($errors, "Sub-Category description is required.");
    }

    #Find an existing category name in the database
    $existingSubCategName = selectOne('tblsubcategory', ['name' => $subcategory['name']]);
    if(isset($existingSubCategName)){
        array_push($errors, "Sub-Category name is already exist.");
    }

    #dd($errors);
    
    return $errors;
}