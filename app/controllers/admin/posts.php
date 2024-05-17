<?php 
include(ROOT_PATH.'/app/config/db.php');
include(ROOT_PATH.'/app/helpers/validatePost.php');

#All global variables
$user_id = '';
$id = '';
$title = '';
$category = '';
$subcategory = '';
$status = '';
$description = '';
$postImage = '';
$googleWidget = '';
$created_at = '';
$updated_at = '';

#Global variables
$msg = '';
$icon = '';
$css_class = '';

#Table of database 
$tblPost = 'post';
$tblcategory = selectAll('category');
$tblsubcategory = selectAll('subcategory');

#errors array
$errors = array();

#Session message created
function sessionPost($post){
    $_SESSION['messages'] = "Post successfully created.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/posts/add-post.php');
    exit();
}

#Session update successfully
function sessionUpdatePost($post){
    $_SESSION['messages'] = "Post updated successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/posts/edit-post.php');
    exit();
}

#If update failed function
function sessionFailedPost($post){
    $_SESSION['messages'] = "Post update failed, try again!";
    $_SESSION['css_class'] = 'alert-danger';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    header('location:'.BASE_ADMIN.'/posts/edit-post.php');
    exit();
}

#This function is for deleted posts but in state of archived data
function sessionArchivePost($post){
    $_SESSION['messages'] = "Post has been deleted successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/posts/manage-post.php');
    exit();
}

function sessionRestorePost($post){
    $_SESSION['messages'] = 'Post has been restored successfully.';
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/posts/trash-post.php');
    exit();
}

#this function is for permanently deleted
function sessionDeletedPost($post){
    $_SESSION['messages'] = 'Post has been deleted permanently!';
    $_SESSION['css_class'] = 'alert-danger';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    header('location:'.BASE_ADMIN.'/posts/trash-post.php');
    exit();
}

#This function is creating a post
if(isset($_POST['submitPost'])){
    #echo "<pre>", print_r($_POST, true), "</pre>";
    #echo "<pre>", print_r($_FILES['image']['name'], true), "</pre>";

    #Unset the submit button
    unset($_POST['submitPost']);

    #All fields data
    $user_id = $_SESSION['username'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $status = $_POST['status'];
    $description = htmlentities($_POST['description']);
    $googleWidget = htmlentities($_POST['googleWidget']);
    $postImage = $_FILES['image'];
    $created_at = $_POST['created_at'];

    #Image identification
    $postImage = $_FILES['image']['name']; #image name
    $imageSize = $_FILES['image']['size']; #image size
    $imageTmp = $_FILES['image']['tmp_name']; #image name of the image temporary
    $imageError = $_FILES['image']['error']; #Image error either 1 or 0
    $imageType = $_FILES['image']['type']; #Image type of the image

    #Add value of 1 as active status 
    $_POST['is_Active'] = 1;

    #Push error for image requried
    if(empty($_FILES['image'])){
        array_push($errors, "Post Image is required.");
    }   

    #array of errors
    $errors = validatePost($_POST);

    if(count($errors) === 0 && $imageError === 0){
        #If images size is to large to 10mb
        if($imageSize > 10000000){
            $msg = "Image size is to large to upload. Please upload up to 10mb only.";
            $css_class = "alert-danger";
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
            <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
        }else{
            $imageEx = pathinfo($postImage, PATHINFO_EXTENSION); #return the image path info using pathinfo extension ex: '.jpg'
            $imageEx_Lc = strtolower($imageEx); #Convert to lowercase
            $allowed_exs = array('jpg', 'jpeg', 'png', 'webp'); #Allowed extensions of image type

            #Validate if the image type extension is in array of supported extensions
            if(in_array($imageEx_Lc, $allowed_exs)){
                #The uniqid() function generates a unique ID based on the microtime
                $newImgName = uniqid("Thumbnail-", false).'.'.$imageEx_Lc; #Create unique id
                $imagePath = ROOT_PATH.'../../app/upload/uploadThumbnail/'.$newImgName; #Get the image path
                $result = move_uploaded_file($imageTmp, $imagePath); #Upload the image to the folder and database
                
                #if image path moved to thumbnail directory
                if($result){
                    $_POST['image'] = $newImgName;
                }else{
                    array_push($errors, 'Failed to upload the Post image.');
                }

                #Insert into the database
                $query_post = create($tblPost, $_POST);
                #$query_post = "INSERT INTO post (postedBy, title, category, subcategory, status, description, googleWidget, created_at) VALUES ('".$_SESSION['username']."', '$title', '$category', '$subcategory', '$status', '$description', '$googleWidget', '$created_at')";
                #$query_result = mysqli_query($conn, $query_post);

                #select that table in post if the post is exist
                $post = selectOne($tblPost, ['id' => $query_post]);

                #validate the post data
                if($post){
                    #Session the post data
                    sessionPost($post);

                    #Clear all the field set
                    $title = '';
                    $category = '';
                    $subcategory = '';
                    $status = '';
                    $description = '';
                    $googleWidget = '';
                    $postImage = '';
                    $created_at = '';
                }else{
                    #Alert the user failed to upload and create account
                    $msg = "Post failed to create, Try again.";
                    $css_class = "alert-danger";
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
                    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
                }
            }else{
                #return all the information in the field set
                $title = $_POST['title'];
                $category = $_POST['category'];
                $subcategory = $_POST['subcategory'];
                $status = $_POST['status'];
                $description = $_POST['description'];
                $postImage = $_FILES['image'];
                $googleWidget = $_POST['googleWidget'];
                $created_at = $_POST['created_at'];
                
                #Alert error message if the file type is not supported and return it to current page
                $msg = "You can't upload this type of file, Please check the file type again ['jpeg, jpg, png, webp'].";
                $css_class = "alert-danger";
                $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
                <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
            }
        }
    }else{
        #Return all the data in the form 
        $title = $_POST['title'];
        $category = $_POST['category'];
        $subcategory = $_POST['subcategory'];
        $status = $_POST['status'];
        $description = $_POST['description'];
        $postImage = $_FILES['image'];
        $googleWidget = $_POST['googleWidget'];
        $created_at = $_POST['created_at'];

        $msg = "Something went wrong!, Try again.";
        $css_class = "alert-danger";
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
        <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
    }
}

#This is for the update post, get the id of the post
if(isset($_GET['psID'])){
    #select the id of the post
    $ps_id = selectOne($tblPost, ['id' => $_GET['psID']]);
    
    #Fetch all the data
    $id = $ps_id['id'];
    $title = $ps_id['title'];
    $category = $ps_id['category'];
    $subcategory = $ps_id['subcategory'];
    $status = $ps_id['status'];
    $description = $ps_id['description'];
    $postImage = $ps_id['image'];
    $googleWidget = $ps_id['googleWidget'];
    $updated_at = $ps_id['updated_at'];
}

#This is for the update the post
if(isset($_POST['updatePost'])){
    #insert the id 
    $id = $_POST['id'];

    #unset the submit button and post id
    unset($_POST['updatePost'], $_POST['id']);

    #All data information
    $user_id = $_SESSION['username'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $subcategory = $_POST['subcategory'];
    $status = $_POST['status'];
    $description = htmlentities($_POST['description']);
    $googleWidget = htmlentities($_POST['googleWidget']);
    $postImage = $_FILES['image'];
    $updated_at = $_POST['updated_at'];

    #Image identification
    $postImage = $_FILES['image']['name']; #image name
    $imageSize = $_FILES['image']['size']; #image size
    $imageTmp = $_FILES['image']['tmp_name']; #image name of the image temporary
    $imageError = $_FILES['image']['error']; #Image error either 1 or 0
    $imageType = $_FILES['image']['type']; #Image type of the image

    #Add value of 1 as active status
    $_POST['is_Active'] = 1;

    #Push error for image requried
    if(empty($_FILES['image'])){
        array_push($errors, "Post Image is required.");
    }   

    #array of errors
    $errors = validateUpdatePost($_POST);

    if(count($errors) === 0 && $imageError === 0){
        #If images size is to large to 10mb
        if($imageSize > 10000000){
            $msg = "Image size is to large to upload. Please upload up to 10mb only.";
            $css_class = "alert-danger";
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
            <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
        }else{
            $imageEx = pathinfo($postImage, PATHINFO_EXTENSION); #return the image path info using pathinfo extension ex: '.jpg'
            $imageEx_Lc = strtolower($imageEx); #Convert to lowercase
            $allowed_exs = array('jpg', 'jpeg', 'png', 'webp'); #Allowed extensions of image type

            #Validate if the image type extension is in array of supported extensions
            if(in_array($imageEx_Lc, $allowed_exs)){
                #The uniqid() function generates a unique ID based on the microtime
                $newImgName = uniqid("Thumbnail-", false).'.'.$imageEx_Lc; #Create unique id
                $imagePath = ROOT_PATH.'../../app/upload/uploadThumbnail/'.$newImgName; #Get the image path
                $result = move_uploaded_file($imageTmp, $imagePath); #Upload the image to the folder and database

                #if image path moved to thumbnail directory
                if($result){
                    $_POST['image'] = $newImgName;
                }else{
                    array_push($errors, 'Failed to upload the Post image.');
                }

                #Insert into the database
                $query_post = update($tblPost, $id, $_POST);
                #$query_post = "INSERT INTO post (postedBy, title, category, subcategory, status, description, googleWidget, created_at) VALUES ('".$_SESSION['username']."', '$title', '$category', '$subcategory', '$status', '$description', '$googleWidget', '$created_at')";
                #$query_result = mysqli_query($conn, $query_post);

                #select that table in post if the post is exist
                $post = selectOne($tblPost, ['id' => $query_post]);

                #validate the post data
                if($post){
                    #Session the post data
                    sessionUpdatePost($post);

                    #Clear all the field set
                    $id = '';
                    $title = '';
                    $category = '';
                    $subcategory = '';
                    $status = '';
                    $description = '';
                    $googleWidget = '';
                    $postImage = '';
                    $updated_at = '';
                }else{
                    #Alert failed
                    sessionFailedPost($post);
                }
            }else{
                #return all the information in the field set
                $title = $_POST['title'];
                $category = $_POST['category'];
                $subcategory = $_POST['subcategory'];
                $status = $_POST['status'];
                $description = $_POST['description'];
                $postImage = $_FILES['image'];
                $googleWidget = $_POST['googleWidget'];
                $updated_at = $_POST['updated_at'];
                
                #Alert error message if the file type is not supported and return it to current page
                $msg = "You can't upload this type of file, Please check the file type again ['jpeg, jpg, png, webp'].";
                $css_class = "alert-danger";
                $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
                <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
            }
        }
    }else{
        #Return all the data in the form 
        $title = $_POST['title'];
        $category = $_POST['category'];
        $subcategory = $_POST['subcategory'];
        $status = $_POST['status'];
        $description = $_POST['description'];
        $postImage = $_FILES['image'];
        $googleWidget = $_POST['googleWidget'];
        $updated_at = $_POST['updated_at'];

        $msg = "Something went wrong!, Try again.";
        $css_class = "alert-danger";
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
        <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
    }
}

#delete data, transform it into archives data
if(isset($_GET['delArcPS_ID'])){
    #Get the id of the data post
    $id = $_GET['delArcPS_ID'];

    #Select the id of the data
    $post_id = selectOne($tblPost, ['id' => $id]);

    #update the status of the post
    $_POST['is_Active'] = 0;

    #update the database data
    $post_query = update($tblPost, $id, $_POST);

    #Session the data
    sessionArchivePost($post_query);
}

#Recovery data
if(isset($_GET['recPS_ID'])){
    #Get the id that is been archived
    $id = $_GET['recPS_ID'];

    #select the id of the archived data to recover
    $post_id = selectOne($tblPost, ['id' => $id]);

    #update the status of the post data
    $_POST['is_Active'] = 1;

    #update the database data
    $post_query = update($tblPost, $id, $_POST);

    #Session the data
    sessionRestorePost($post_query);
}

#Deleted the post data permanently
if(isset($_GET['delPS_ID'])){
    #Get the id of the data
    $id = $_GET['delPS_ID'];

    #select the id to be permanently deleted
    $post_id = deleted($tblPost, $id);

    #Session the data
    sessionDeletedPost($post_id);
}