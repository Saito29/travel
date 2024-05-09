<?php
include(ROOT_PATH."/app/config/db.php");

$user = 'users';
$category = 'category';
$subcategory = 'subcategory';
$post = '';

#select all the users
$selectUser = selectAll($user);

#select all the categories
$selectCategory = selectAll($category);

#select all the subcategories
$selectSubcategory = selectAll($subcategory);

#for number of users 
if(count($selectUser) > 0){
    $users = count($selectUser);
}

#count of the category
if(count($selectCategory) > 0){
    $categories = count($selectCategory);
}

#count of the subcategories
if(count($selectSubcategory) > 0){
    $subcategories = count($selectSubcategory);
}


