<?php
include(ROOT_PATH."/app/config/db.php");

#Tables
$tblsubcategory = 'subcategory';
$tblpost = 'post';

#select all the subcategories
$selectSubcategory = selectAll($tblsubcategory);

#Select all the posts
$selectPost = selectAll($tblpost);

#This function is for deleted posts but in state of archived data
function sessionArchivePost($post){
    $_SESSION['messages'] = "Post has been deleted successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_EDITOR.'/post/manage-post.php');
    exit();
}

#count of the subcategories
if(count($selectSubcategory) >= 0){
    $subcategories = count($selectSubcategory);
}

// Escape the session username to prevent SQL injection
$username = mysqli_real_escape_string($conn, $_SESSION['username']);

#Construct the prepared statement (recommended for security)
$post = "SELECT COUNT(*) AS total_posts FROM $tblpost WHERE postedBy = '$username'";

#Execute the query 
$result = mysqli_query($conn, $post);

#Fetch the count as an associative array
$row = mysqli_fetch_assoc($result);

#Extract the total posts count
$totalPost = $row['total_posts'];

#Close the result set (optional)
mysqli_free_result($result);


#This part is for counting numbers post in the trash
#Escape the session username to prevent SQL injection
$username = mysqli_real_escape_string($conn, $_SESSION['username']);

#Construct the prepared statement (recommended for security)
$posts = "SELECT COUNT(*) AS total_posts_trash FROM $tblpost WHERE postedBy = '$username' AND is_Active = 0";

#Execute the query 
$result = mysqli_query($conn, $posts);

#Fetch the count as an associative array
$row = mysqli_fetch_assoc($result);

#Extract the total posts count
$totalPostTrash = $row['total_posts_trash'];

#Close the result set (optional)
mysqli_free_result($result);

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

