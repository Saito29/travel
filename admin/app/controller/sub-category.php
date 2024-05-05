<?php
include(ROOT_PATH."/app/config/db.php");
include(ROOT_PATH."/app/helpers/validateSubCategory.php");

#Global Variable for Category
$id = '';
$category = '';
$name = '';
$description = '';
$created_at = '';
$updated_at = '';
$is_Active = '';
$table = 'tblsubcategory';
$tables = 'category';

#Array of Category errors messages
$errors = array();

#This function is for session subcategory
function sessionSubCategory($subcateg){
    $_SESSION['messages'] = "Sub-Category has been created successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/category/add-subcategory.php');
    exit();
}

#This function is for session update subcategory
function sessionUpdateSubCategory($subcateg){
    $_SESSION['messages'] = "Sub-Category has been updated successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/category/edit-category.php');
    exit();
}

#Select all the categories created to select the categories from the add sub categories
$category = selectAll($tables);

#Select all the sub categories created and displayed to manage sub categories
$subcategory = selectAll($table);

if(isset($_POST["addSubCateg-btn"])){
    #Error alert function
    $errors = validateSubCategory($_POST);

    #Validate the category
    if(count($errors) === 0){
        #unset the creation button
        unset($_POST["addSubCateg-btn"]);

        #Save the category as active key 1
        $_POST['is_Active'] = 1;    

        #Get current timestamp 
        $timeStamp = time();
        $created_at = gmdate('Y-m-d H:i:s', $timeStamp);
        $_POST['created_at'] = $created_at;

        #crete a category data and insert into database
        $subcateg_id = create($table, $_POST);

        #Session the data category
        sessionSubCategory($subcateg_id);
            
        #after the session category is created clear all the fields
        $category = '';
        $name = '';
        $description = '';
    }else{
        #Display all the information that the submitted on error
        $category = $_POST['categoryName'];
        $name = $_POST['name'];
        $description = $_POST['description'];

        #Display error alert
        $msg = "Sub-Category failed to be created.";
        $css_class = 'alert-danger';
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
        <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    }  
}

#This is for the updating the category
if(isset($_GET['id'])){
    #get the id of the category to update
    $id = $_GET['id'];

    #Select that match the id of the category to update
    $subcategory = selectOne($table,['id' => $id]);

    #Set the category to update based on the database
    $id = $subcategory['id'];
    $category = $subcategory['categoryName'];
    $name = $subcategory['name'];
    $description = $subcategory['description'];
    $updated_at = $subcategory['updated_at'];
}

#Check if the user clicked the update button
if(isset($_POST['upt-btn'])){
    #insert the category id
    $id = $_POST['id'];

    #Clear the update button and the id
    unset($_POST['upt-btn'], $_POST['id']);

    #Get the current timestamp
    $timeStamp = time();
    $updated_at = gmdate('Y-m-d H:i:s', $timeStamp);
    $_POST['updated_at'] = $updated_at;

    #Update the category
    $subcateg_id = update($table, $id, $_POST);

    #Called the update function
    sessionUpdateSubCategory($categ_id);
}