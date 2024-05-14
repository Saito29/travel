<?php 
include(ROOT_PATH ."/app/config/db.php");
include(ROOT_PATH ."/app/helpers/validateUser.php");

#empty information details of user information
$role = '';
$firstName = '';
$lastName = '';
$username = '';
$email = '';
$password = '';
$profileImage = '';
$created_at = '';
$updated_at = '';

#Table name for the user datbase
$table = 'users';

#Array of errors to display
$errors = array();

#Global variables of error messages and success messages, CSS classes and icons
$acmsg = '';
$msg = '';
$css_class = '';
$icon = '';

#this function is for updates sessions
function sessionUpdateUser($user){
    $_SESSION['messages'] = "User has been updated successfully.";
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
    header('location:'.BASE_ADMIN.'/users/edit-user.php');
    exit();
}

function sessionFailedUser($user){
    $_SESSION['messages'] = "User update failed, try again!";
    $_SESSION['css_class'] = 'alert-danger';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    header('location:'.BASE_ADMIN.'/users/edit-user.php');
    exit();
}

#this function is for permanently deleted
function sessionDeletedCategory($user){
    $_SESSION['messages'] = 'User has been deleted permanently!';
    $_SESSION['css_class'] = 'alert-danger';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    header('location:'.BASE_ADMIN.'/users/manage-user.php');
    exit();
}

#Select all the categories created 
$user = selectAll($table);

#This is for Register user information
#If user click the button create and submit a profile image
if (isset($_POST['addUser-btn']) && isset($_FILES['profileImage']))
{   
    #Show user information and profile image details
    /*
    echo "<pre>", print_r($_POST, true), "</pre>";
    echo "<pre>", print_r($_FILES['profileImage'],true), "</pre>";
    echo "<pre>", print_r($_FILES['profileImage']['name'],true), "</pre>";  
    */

    #Clear the registration buttons when submitting
    unset($_POST['addUser-btn']);

    #identify user information and profile image
    $firstName = trim($_POST['firstName']); 
    $lastName = trim($_POST['lastName']);
    $username = trim($_POST['username']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); #Password hash Encyption Algorithm for security purposes
    $role = $_POST['role'];
    $created_at = $_POST['created_at'];

    #Image identification
    $profileImage = $_FILES['profileImage']['name']; #image name
    $imageSize = $_FILES['profileImage']['size']; #image size
    $imageTmp = $_FILES['profileImage']['tmp_name']; #image name of the image temporary
    $imageError = $_FILES['profileImage']['error']; #Image error either 1 or 0
    $imageType = $_FILES['profileImage']['type']; #Image type of the image

    #Array of error messages
    $errors = validateUser($_POST);

    #if image error and alert error is equal 0
    if(count($errors) === 0 && $imageError === 0)
    {
        #Validate the image size, if its greater than 10mb alert error message
        if($imageSize > 10000000)
        {
            $msg = "Sorry your Image file is to large, Please upload a new one at least 10mb.";
            $css_class = "alert-danger";
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
            <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
        }else
        {
            $imageEx = pathinfo($profileImage, PATHINFO_EXTENSION); #return the image path info using pathinfo extension ex: '.jpg'
            $imageEx_Lc = strtolower($imageEx); #Convert to lowercase

            $allowed_exs = array('jpg', 'jpeg', 'png', 'webp'); #Allowed extensions of image type

            #Validate if the image type extension is in array of supported extensions
            if(in_array($imageEx_Lc, $allowed_exs))
            {
                #The uniqid() function generates a unique ID based on the microtime
                $newImgName = uniqid("IMG-", true).'-'.$username.'.'.$imageEx_Lc; #Create unique id and insert the username in the image
                $imagePath = ROOT_PATH.'../../app/upload/uploadProfile/'.$newImgName; #Get the image path
                move_uploaded_file($imageTmp, $imagePath); #Upload the image to the folder and database

                #Validate the user image already exists 
                if(file_exists($newImgName)){
                    $msg = "The uploaded image already exists";
                    $css_class = "alert-warning";
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(236, 243, 53, 1);transform: ;msFilter:;">
                    <path d="M16.707 2.293A.996.996 0 0 0 16 2H8a.996.996 0 0 0-.707.293l-5 5A.996.996 0 0 0 2 8v8c0 .266.105.52.293.707l5 5A.996.996 0 0 0 8 22h8c.266 0 .52-.105.707-.293l5-5A.996.996 0 0 0 22 16V8a.996.996 0 0 0-.293-.707l-5-5zM13 17h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg>';
                }

                #Insert the image into the database alongside the user information using MYSQLI
                $query = "INSERT INTO users (role, firstName, lastName, username, email, password, profileImage, created_at) VALUES ('$role','$firstName', '$lastName','$username', '$email', '$password', '$newImgName', '$created_at')";
                $result = mysqli_query($conn, $query);

                #Select the user that has make account
                $user = selectOne($table,['id' => $result]);

                #validate the user information and profile image information when submitting the query to the database
                if($result)
                {
                    #Alert the user success and uploading the image to the database successfully
                    $msg = "Account Successfully created.";
                    $msg2 = "Profile Image Uploaded Successfully.";
                    $css_class = "alert-success";
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
                    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';

                    #Once successfuly created empty every field
                    $role = '';
                    $firstName = '';
                    $lastName = '';
                    $username = '';
                    $email = '';
                    $password = '';
                    $profileImage = '';
                    $created_at = '';
                }else
                {
                    #Alert the user failed to upload and create account
                    $msg = "Failed to create and upload the Image, please try again.";
                    $css_class = "alert-danger";
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
                    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
                }
            } else
            {
                #Return array of user information if encountered errors
                $firstName = $_POST['firstName']; 
                $lastName = $_POST['lastName'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $profileImage = $_FILES['profileImage']['name'];
                $role = $_POST['role'];
                $created_at = $_POST['created_at'];

                #Alert error message if the file type is not supported and return it to current page
                $msg = "You can't upload this type of file, Please check the file type again ['jpeg, jpg, png, webp'].";
                $css_class = "alert-danger";
                $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
                <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
            }
        }
    } else
    {
        #Return array of user information if encountered errors
        $firstName = $_POST['firstName']; 
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $profileImage = $_FILES['profileImage']['name'];
        $role = $_POST['role'];
        $created_at = $_POST['created_at'];

        #Alert Error message and direct again to register page
        #$msg = "Something went wrong, please validate your username and email.";
        #$msg2 = "Once no alert message of any user information requirements.";
        #$msg3 = "Please upload your profile picture.";
        $msg4 = "Something went wrong!, Profile Image is required.";
        $css_class = "alert-danger";
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
        <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
    }
}

#This to get the user information by updating their profile
if(isset($_GET['id'])){
    #get the id of the user to update
    $id = $_GET['id'];

    #Select that match the id of the category to update
    $user = selectOne($table, ['id' => $id]);

    #Set the category to update based on the database
    $id = $user['id'];
    $firstName = $user['firstName'];
    $lastName = $user['lastName'];
    $username = $user['username'];
    $email = $user['email'];
    $password = $user['password'];
    $profileImage = $user['profileImage'];
    $role = $user['role'];
    $updated_at = $user['updated_at'];
}

#Check if the user clicked the update button
if(isset($_POST['updateUser-btn'])){
    #insert the category id
    $id = $_POST['id'];

    #Clear the update button and the id
    unset($_POST['updateUser-btn'], $_POST['id']);

    #identify user information and profile image
    $firstName = trim($_POST['firstName']); 
    $lastName = trim($_POST['lastName']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $role = $_POST['role'];
    $updated_at = $_POST['updated_at'];

    #Image identification
    $profileImage = $_FILES['profileImage']['name']; #image name
    $imageSize = $_FILES['profileImage']['size']; #image size
    $imageTmp = $_FILES['profileImage']['tmp_name']; #image name of the image temporary
    $imageError = $_FILES['profileImage']['error']; #Image error either 1 or 0
    $imageType = $_FILES['profileImage']['type']; #Image type of the image

    #errors
    $errors = validateUpdateUser($_POST);

    #if image error and alert error is equal 0
    if(count($errors) === 0)
    {
        #Validate the image size, if its greater than 10mb alert error message
        if($imageSize > 10000000)
        {
            $msg = "Sorry your Image file is to large, Please upload a new one at least 10mb.";
            $css_class = "alert-danger";
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
            <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
        }else
        {
            $imageEx = pathinfo($profileImage, PATHINFO_EXTENSION); #return the image path info using pathinfo extension ex: '.jpg'
            $imageEx_Lc = strtolower($imageEx); #Convert to lowercase

            $allowed_exs = array('jpg', 'jpeg', 'png', 'webp'); #Allowed extensions of image type

            #Validate if the image type extension is in array of supported extensions
            if(in_array($imageEx_Lc, $allowed_exs))
            {
                #The uniqid() function generates a unique ID based on the microtime
                $newImgName = uniqid("IMG-", false)."-".$username.'.'.$imageEx_Lc; #Create unique id and insert the username in the image
                $imagePath = ROOT_PATH.'../../app/upload/uploadProfile/'.$newImgName; #Get the image path

                #Delete old profile image
                $old_image_des = ROOT_PATH.'../../app/upload/uploadProfile/'.$profileImage; #Old path of profile image
                if(unlink($old_image_des)){
                    #Deleted recently
                    move_uploaded_file($imageTmp, $imagePath); #Upload the image to the folder and database
                }else{
                    #Error or already deleted
                    move_uploaded_file($imageTmp, $imagePath); #Upload the image to the folder and database
                }

                #Validate the user image already exists 
                if(file_exists($newImgName)){
                    $msg = "The uploaded image already exists";
                    $css_class = "alert-warning";
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(236, 243, 53, 1);transform: ;msFilter:;">
                    <path d="M16.707 2.293A.996.996 0 0 0 16 2H8a.996.996 0 0 0-.707.293l-5 5A.996.996 0 0 0 2 8v8c0 .266.105.52.293.707l5 5A.996.996 0 0 0 8 22h8c.266 0 .52-.105.707-.293l5-5A.996.996 0 0 0 22 16V8a.996.996 0 0 0-.293-.707l-5-5zM13 17h-2v-2h2v2zm0-4h-2V7h2v6z"></path></svg>';
                }

                #Update user account in the database
                $query = "UPDATE users SET role=?, firstName=?, lastName=?, username=?, email=?, profileImage=?, updated_at=?
                        WHERE id=?";
                $stmt_user = $conn->prepare($query);
                $stmt_user->execute([$role, $firstName, $lastName, $username, $email, $newImgName, $updated_at, $id]);

                #Select the user that has make account
                $user = selectOne($table,['id' => $id]);

                #validate the user information and profile image information when submitting the query to the database
                if($stmt_user)
                {
                    #Alert the user success and uploading the image to the database successfully
                    sessionUpdateUser($stmt_user);

                    #Once successfuly created empty every field
                    $role = '';
                    $firstName = '';
                    $lastName = '';
                    $username = '';
                    $email = '';
                    $password = '';
                    $profileImage = '';
                    $updated_at = '';
                }else
                {
                    #Alert the user failed to upload and create account
                    sessionFailedUser($stmt_user);
                }
            } else
            {
                #Return array of user information if encountered errors
                $firstName = $_POST['firstName']; 
                $lastName = $_POST['lastName'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $profileImage = $_FILES['profileImage']['name'];
                $role = $_POST['role'];
                $updated_at = $_POST['updated_at'];

                #Alert error message if the file type is not supported and return it to current page
                $msg = "You can't upload this type of file, Please check the file type again ['jpeg, jpg, png, webp'].";
                $css_class = "alert-danger";
                $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
                <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
            }
        }
    } else
    {
        #Return array of user information if encountered errors
        $firstName = $_POST['firstName']; 
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $profileImage = $_FILES['profileImage']['name'];
        $role = $_POST['role'];
        $updated_at = $_POST['updated_at'];

        #Alert Error message and direct again to register page
        #$msg = "Something went wrong, please validate your username and email.";
        #$msg2 = "Once no alert message of any user information requirements.";
        #$msg3 = "Please upload your profile picture.";
        $msg4 = "Something went wrong!, Profile Image is required.";
        $css_class = "alert-danger";
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
        <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
    }
}

#This function is for permanently deleting the user from the database
if(isset($_GET['del_id'])){
    #Get the user id
    $id = $_GET['del_id'];

    #Deleted the user from the database
    $user_id = deleted($table, $id);

    #Session the data
    sessionDeletedCategory($user_id);
}
