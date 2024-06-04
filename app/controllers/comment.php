<?php
include(ROOT_PATH.'/app/config/db.php');


#Global variables
$post_id = '';
$username = '';
$email = '';
$comment = '';
$created_at = '';
$status = '';

#table
$tblComment = 'comments';

#Global messages
$msg = '';
$icon = '';
$css_class = '';

$errors = array();


#Disapproved comments
function sessionDisapproved($comment){
    $_SESSION['messages'] = "Post comment disapproved successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/comments/approved-comments.php');
    exit();
}

#Approved comments
function sessionApproved($comment){
    $_SESSION['messages'] = "Post comment approved successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/comments/disapproved-comment.php');
    exit();
}

#If update failed function
function sessionDelete($comment){
    $_SESSION['messages'] = "Post comments deleted successfully";
    $_SESSION['css_class'] = 'alert-danger';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    header('location:'.BASE_ADMIN.'/comments/approved-comments.php');
    exit();
}

#Approved comments
if(isset($_POST['postComment'])){
    #unset the comment button
    unset($_POST['postComment']);

    #Sanitize the email
    $post_id = mysqli_real_escape_string($conn, $_POST['post_id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL));
    $comment = mysqli_real_escape_string($conn, htmlentities($_POST['comment']));
    $status = 1;
    $created_at = date("Y-m-d H:i:s");

    if(empty($_POST['username'])){
        array_push($errors, "username is required");
        $username = $_POST['username'];
    }else if(empty($_POST['comment'])){
        array_push($errors, "Comment is required");
        $comment = $_POST['comment'];
    }

    if(count($errors) === 0){
        #proceed to process
        $sql = "INSERT INTO $tblComment (post_id, username, email, comments, created_at, status) VALUES (?, ?, ?, ?, ?, ?)"; #query
        $stmt = $conn->prepare($sql); #prepare statement
        $stmt->bind_param("issssi", $post_id, $username, $email, $comment, $created_at, $status); #bind parameters
        if($stmt->execute()){
            $_SESSION['messages'] = "Post comment successfully.";
            $_SESSION['css_class'] = 'alert-success';
            $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
            <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
            header('location: '.BASE_URL.'/single-page.php?psId='.$post_id);
            exit();
        }else{
            $_SESSION['messages'] = "Comment Failed, Please Try again!";
            $_SESSION['css_class'] = 'alert-danger';
            $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
            <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
            header('location:'.BASE_URL.'/single-page.php?psId='.$post_id);
            exit();
        }
    }else{
        $_SESSION['messages'] = "Something went wrong with your comment. Please fill out every field";
        $_SESSION['css_class'] = "alert-danger";
        $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
        <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
        header('Location: '.BASE_URL.'/single-page.php?psId='.$post_id);
        exit();
    }
}

#Disapproved the comment
if(isset($_GET['dm_Id'])){
    #get the id of the comment
    $id = $_GET['dm_Id'];

    #Select the id from the comments
    $comment_id = selectOne($tblComment, ['id' => $id]);

    #update
    $_POST['status'] = 0;

    #update the table
    $comment_query = update($tblComment, $id, $_POST);
    
    #Session data
    sessionDisapproved($comment_query);
}

#approved the comments
if(isset($_GET['apr_Id'])){
    #Get the id from the comments
    $id = $_GET['apr_Id'];

    #Select the id from the comments
    $comment_id = selectOne($tblComment, ['id' => $id]);

    #update
    $_POST['status'] = 1;

    #update the table
    $comment_query = update($tblComment, $id, $_POST);
    
    #session
    sessionApproved($comment_query);
}

#Delete permanently
if(isset($_GET['del_id'])){
    #Get the id
    $id = $_GET['del_id'];

    #delete the comments
    $comment_query = deleted($tblComment, $id);

    #session
    sessionDelete($comment_query);
}