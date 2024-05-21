<?php
include(ROOT_PATH.'/app/config/db.php');
include(ROOT_PATH.'/app/helpers/validatePage.php');

#Global variables
$id = '';
$title = '';
$details = '';
$contact = '';
$email = '';
$created_at = '';
$updated_at = '';

#Table
$tblPage = 'pages';
$page = selectAll($tblPage);

#Global variables message 
$msg = '';
$icon = '';
$css_class = '';

#Array variables
$errors = array();

#This function is for session Creation
function sessionPage($page){
    $_SESSION['messages'] = "Page has been created successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/pages/aboutpage.php');
    exit();
}

#this function is for updates sessions
function sessionUpdatePage($page){
    $_SESSION['messages'] = "Page been updated successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/pages/edit-page.php');
    exit();
}

function sessionPageFailed($page){
    $_SESSION['messages'] = "Page updated failed, Try again.";
    $_SESSION['css_class'] = 'alert-danger';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
    header('location:'.BASE_ADMIN.'/pages/edit-page.php');
    exit();
}

function sessionDeletePage($page){
    $_SESSION['messages'] = "Page been deleted successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/pages/manage-page.php');
    exit();
}

if(isset($_POST['create-btn'])){
    #unset the submit button
    unset($_POST['create-btn']);

    #Convert the data into html format
    $details = htmlentities($_POST['details']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

    #Date format
    $created_at = $_POST['created_at'];

    #Array of errors
    $errors = validatePage($_POST);

    if(count($errors) === 0){
        #Insert the data into the database
        $page_query = create($tblPage, $_POST);

        #Session data
        sessionPage($page_query);

        #Clear all the fields in the form data
        $title = '';
        $details = '';    
        $contact = '';
        $email = '';
        $created_at = '';
    }else{
        #Alert the user
        $msg = 'There was an error, please try again';
        $css_class = 'alert-danger';
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
        <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';

        #fill the data submitted on form submit
        $title = $_POST['title'];
        $details = $_POST['details'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $created_at = $_POST['created_at'];
    }
}

#get the id and the data submitted
if(isset($_GET['pg_Id'])){
    #Select the id from the database table
    $page = selectOne($tblPage, ['id' => $_GET['pg_Id']]);

    #Set the data
    $id = $page['id'];
    $title = $page['title'];
    $details = $page['details'];
    $contact = $page['contact'];
    $email = $page['email'];
    $updated_at = $page['updated_at'];
}

#For the update
if(isset($_POST['update-btn'])){
    #Get the id data
    $id = $_POST['id'];

    #Unset the id and the button
    unset($_POST['update-btn'], $_POST['id']);

    #Convert the data into html format
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $details = htmlentities($_POST['details']);

    #Date format
    $updated_at = $_POST['updated_at'];

    #errors array
    $errors = validatePageUpt($_POST);

    if(count($errors) === 0){
        #update the data
        $page_query = update($tblPage, $id, $_POST);

        #Session update
        sessionUpdatePage($page_query);

        #Clear all the fields
        $id = '';
        $title = '';
        $details = '';
        $contact = '';
        $email = '';
        $updated_at = '';
    }else{
        #Return all the data
        $id = $_POST['id'];
        $title = $_POST['title'];
        $details = htmlentities($_POST['details']);
        $contact = htmlentities($_POST['contact']);
        $email = htmlentities($_POST['email']);
        $updated_at = $_POST['updated_at'];

        #Session failed to update
        sessionPageFailed($page_query);
    }
}

#Delete permanently
if(isset($_GET['pgDel_id'])){
    #Get the id of the data
    $id = $_GET['pgDel_id'];

    #select the id of the data to delete permanently
    $page_query = deleted($tblPage, $id);

    #Session the data deleted
    sessionDeletePage($page_query);
}