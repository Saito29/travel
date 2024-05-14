<?php
include(ROOT_PATH."/app/config/db.php");

$subcategory = 'subcategory';
$post = 'posts';

#select all the subcategories
$selectSubcategory = selectAll($subcategory);

$selectPost = selectAll($post);

#count of the subcategories
if(count($selectSubcategory) >= 0){
    $subcategories = count($selectSubcategory);
}

#Count all the post
if(count($selectPost) >= 0){
    $posts = count($selectPost);
}

