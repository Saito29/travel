<?php 
include(ROOT_PATH.'/app/config/db.php');
include(ROOT_PATH.'/app/helpers/validatePost.php');

#All global variables
$title = '';
$category = '';
$subcategory = '';
$status = '';
$description = '';
$postImage = '';
$googleWidget = '';
$created_at = '';
$updated_at = '';

#Table of database 
$tblPost = 'post';

$post_id = selectAll($tblPost);

#errors array
$errors = array();

function sessionPost($post){
    $_SESSION['messages'] = "Post successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/post/add-post.php');
    exit();
}


#This function is creating a post
if(isset($_POST['submitPost'])){
    #echo "<pre>", print_r($_POST, true), "</pre>";
    #echo "<pre>", print_r($_FILES['image']['name'], true), "</pre>";

    #Unset the submit button
    unset($_POST['submitPost']);
    
    #Add the user id
    $_POST['user_id'] = $_SESSION['id'];

    #Add value of 1 as active status
    $_POST['is_Active'] = isset($_POST['status']) ? 1 : 2; 

    #All fields data
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
                $newImgName = uniqid("Thumbnail-", true).'.'.$imageEx_Lc; #Create unique id and insert the username in the image
                $imagePath = ROOT_PATH.'../../app/upload/uploadThumbnail/'.$newImgName; #Get the image path
                move_uploaded_file($imageTmp, $imagePath); #Upload the image to the folder and database

                #Insert into the database
                $query_post = "INSERT INTO post (title, category, subcategory, status, description, googleWidget, image, created_at) VALUES ('$title', '$category', '$subcategory', '$status', '$description', '$googleWidget', $newImgName', '$created_at')";
                $query_result = mysqli_query($conn, $query_post);

                #select that table
                $post = selectOne($tblPost, ['id' => $query_result]);

                #validate the post data
                if($post){
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

        $msg = "Something went wrong!, Post Thubmnail image is required.";
        $css_class = "alert-danger";
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
        <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
    }
}
