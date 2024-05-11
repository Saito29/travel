<?php   
include(ROOT_PATH."/app/config/db.php");
include(ROOT_PATH."/app/helpers/validateCategory.php");

#Global Variable for Category
$id = '';
$categName = '';
$categDesc = '';
$categCreated_at = '';
$categUpt_at = '';
$is_Active = '';
$table = 'category';

#Array of Category errors messages
$errors = array();

#This function is for session category
function sessionCategory($categ){
    $_SESSION['messages'] = "Category has been created successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/category/add-category.php');
    exit();
}

#this function is for updates sessions
function sessionUpdateCategory($categ){
    $_SESSION['messages'] = "Category has been updated successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/category/edit-category.php');
    exit();
}

#This function is for delete category session
function sessionDeleteCategory($categ){
    $_SESSION['messages'] = "Category has been deleted successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/category/manage-category.php');
    exit();
}

#This function is for success restored attmepts messages
function sessionSuccessCategory($categ){
    $_SESSION['messages'] = 'Category has been restored successfully.';
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/category/manage-category.php');
    exit();
}

#this function is for permanently deleted
function sessionDeletedCategory($categ){
    $_SESSION['messages'] = 'Category has been deleted permanently!';
    $_SESSION['css_class'] = 'alert-danger';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    header('location:'.BASE_ADMIN.'/category/manage-category.php');
    exit();
}

#Select all the categories created global variables 
$category = selectAll($table);

#This is to create a category
if(isset($_POST["addCateg-btn"])){
    #Error alert function
    $errors = validateCategory($_POST);

    #Validate the category
    if(count($errors) === 0){
        #unset the creation button
        unset($_POST["addCateg-btn"]);

        #Save the category as active key 1
        $_POST['Is_Active'] = 1;
        
        #crete a category data and insert into database
        $categ_id = create($table, $_POST);

        #Session the data category
        sessionCategory($categ_id);
            
        #after the session category is created clear all the fields
        $categName = '';
        $categDesc = '';
        $categCreated_at = '';
    }else{
        #Display all the information that the submitted but error
        $categName = $_POST['categName'];
        $categDesc = $_POST['categDesc'];
        $categCreated_at = $_POST['categCreated_at'];

        #Display error alert
        $msg = "Category failed to be created.";
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
    $category = selectOne($table, ['id' => $id]);

    #Set the category to update based on the database
    $id = $category['id'];
    $categName = $category['categName'];
    $categDesc = $category['categDesc'];
    $categUpt_at = $category['categUpt_at'];
}

#Check if the user clicked the update button
if(isset($_POST['upt-btn'])){
    $errors = validateUpdateCategory($_POST);
    if(count($errors) === 0){
        #insert the category id
        $id = $_POST['id'];

        #Clear the update button and the id
        unset($_POST['upt-btn'], $_POST['id']);

        #Update the category
        $categ_id = update($table, $id, $_POST);

        #Called the update function
        sessionUpdateCategory($categ_id);
    }
}

#Delete the category but actually archive the data
if(isset($_GET['del_id'])){
    #Get the id
    $id = $_GET['del_id'];

    #Select the category data to be deleted
    $category = selectOne($table, ['id' => $id]);

    #Category value 0 as deleted
    $_POST['Is_Active'] = 0;

    #Update the category
    $categ_id = update($table, $id, $_POST);

    #Session the deleted function
    sessionDeleteCategory($categ_id);
}

#This function is for recovering data from the delete function
if(isset($_GET['id_rec'])){
    #get the id from the delete category data
    $id = $_GET['id_rec'];

    #Select the category data to be recovered from delete function
    $category = selectOne($table, ['id' => $id]);

    #Recover data parameters 1 as active
    $_POST['Is_Active'] = 1;

    #Update the category data
    $categ_id = update($table, $id, $_POST);

    #Session the recovered function
    sessionSuccessCategory($categ_id);
}

#This function is for permanently deleting the category
if(isset($_GET['id_del'])){
    #Get the id
    $id = $_GET['id_del'];

    #Delete the category permanently
    $categ_id = deleted($table, $id);

    #Session the message deleted
    sessionDeletedCategory($categ_id);
}