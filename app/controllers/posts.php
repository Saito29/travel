<?php 
include(ROOT_PATH.'/app/config/db.php');

#All global variables
$id = '';
$title = '';
$category = '';
$subcategory = '';
$status = '';
$description = '';
$created_at = '';
$updated_at = '';
$details = '';
$postImage = '';
$googleWidget = '';
$is_Active = '';

#Table of database 
$tblCategory = 'category';
$tblSubcategory = 'subcategory';
$tblUsers = 'users';

$selectCategories = selectAll($tblCategory);
$selectSubcategories = selectAll($tblSubcategory);
$selectUser = selectAll($tblUsers);

#This function is creating a post
if(isset($_POST['submitPost'])){
    #Username and image
    $_SESSION['username'];
    $_SESSION['profileImage'];

    unset($_POST['submitPost']);

    #Get all the data that will be submitted
    $title = $_POST['postTitle'];
    $category = $_POST['category'];
    $subcategory = $_POST['subCategory'];
    $status = $_POST['status'];
    $description = $_POST['description'];
    $created_at = $_POST['created_at'];
    $details = $_POST['details'];
    $postImage = $_FILES['postImage'];
    $googleWidget = $_POST['googleWidget'];

    echo "<pre>", print_r($_POST, true), "</pre>";
    echo "<pre>", print_r($_FILES['postImage']['name'], true), "</pre>";
}
