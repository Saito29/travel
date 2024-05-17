<?php
include(ROOT_PATH."/app/config/db.php");

$tbluser = 'users';
$tblcategory = 'category';
$tblsubcategory = 'subcategory';
$tblpost = 'post';

#select all the users
$selectUser = selectAll($tbluser);

#select all the categories
$selectCategory = selectAll($tblcategory);

#select all the subcategories
$selectSubcategory = selectAll($tblsubcategory);

$selectPost = selectAll($tblpost);

function sessionDeletedCategory($user){
    $_SESSION['messages'] = 'User has been deleted permanently!';
    $_SESSION['css_class'] = 'alert-danger';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    header('location:'.BASE_ADMIN.'/dashboard.php');
    exit();
}

#This function is for deleted posts but in state of archived data
function sessionArchivePost($post){
    $_SESSION['messages'] = "Post has been deleted successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/dashboard.php');
    exit();
}

#for number of users 
if(count($selectUser) >= 0){
    $users = count($selectUser);
}

#count of the category
if(count($selectCategory) >= 0){
    $categories = count($selectCategory);
}

#count of the subcategories
if(count($selectSubcategory) >= 0){
    $subcategories = count($selectSubcategory);
}

#Count all the post
if(count($selectPost) >= 0){
    $posted = count($selectPost);
}

#This function is for permanently deleting the user from the database
if(isset($_GET['del_id'])){
    #Get the user id
    $id = $_GET['del_id'];

    #Deleted the user from the database
    $user_id = deleted($tbluser, $id);

    #Session the data
    sessionDeletedCategory($user_id);
}

#delete Post data made by users, transform it into archives data
if(isset($_GET['delArcPS_ID'])){
    #Get the id of the data post
    $id = $_GET['delArcPS_ID'];

    #Select the id of the data
    $post_id = selectOne($tblpost, ['id' => $id]);

    #update the status of the post
    $_POST['is_Active'] = 0;

    #update the database data
    $post_query = update($tblpost, $id, $_POST);

    #Session the data
    sessionArchivePost($post_query);
}