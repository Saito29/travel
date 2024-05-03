<?php   
include(ROOT_PATH."/app/config/db.php");
include(ROOT_PATH."/app/helpers/validateCategory.php");

#Global Variable for Category
$categName = '';
$categDesc = '';
$table = 'category';

$errors = array();

#This function is for session category
function sessionCategory($categ){
    $_SESSION['message'] = "Category has been created successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/category/add-category.php');
    exit();
}

if(isset($_POST["addCateg-btn"])){
    #Error alert function
    $errors = validateCategory($_POST);

    #Validate the category
    if(count($errors) === 0){
        #unset the creation button
        unset($_POST["addCateg-btn"]);

        #Collect the categories data from the form
        $categName = $_POST["categName"];
        $categDesc = $_POST["categDesc"];

        #crete a category data and insert into database
        $categ_id = create($table, $_POST);

        #Session the data category
        sessionCategory($categ_id);
            
        #after the session category is created clear all the fields
        $categName = '';
        $categDesc = '';
    }else{
        #Display all the information that the submitted but error
        $categName = $_POST['categName'];
        $categDesc = $_POST['categDesc'];

        #Display error alert
        $msg = "Category failed to be created.";
        $css_class = 'alert-danger';
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
        <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
     
    }  
}