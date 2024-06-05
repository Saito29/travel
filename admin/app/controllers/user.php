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

#Table name for the user datbase
$table = 'users';

#Array of errors to display
$errors = array();

#Global variables of error messages and success messages, CSS classes and icons
$acmsg = '';
$msg = '';
$css_class = '';
$icon = '';

#Function for session login
function loginUser($user){
    #Login the user after the registration session
    $_SESSION['id'] = $user['id']; #id of users
    $_SESSION['firstName'] = $user['firstName'];
    $_SESSION['lastName'] = $user['lastName'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['profileImage'] = $user['profileImage'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['created_at'] = $user['created_at'];
    $_SESSION['updated_at'] = $user['updated_at'];
    $_SESSION['message'] = 'Login Successfully.';
    $_SESSION['css_class'] = 'alert-success';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';

    #Set some conditions for the admin, Sub admin or editor users
    if ($_SESSION['role'] === 'admin' || $_SESSION['role'] === 'sub-admin') {
        header('location:'.BASE_ADMIN.'/dashboard.php'); # dashboard admin and sub admin page
    } elseif($_SESSION['role'] === 'editor') { 
        header('location:'.BASE_EDITOR.'/editor-dashboard.php'); #editor dashboard page
    } else {
        #if not any defined direct it to home page
        header('location:'.BASE_URL.'/index.php'); #direct to index page for user
    }
    exit(); #terminate the session header after loggin in a account
}

#This is for Register user information
#If user click the button create and submit a profile image
if (isset($_POST['register-btn']) && isset($_FILES['profileImage']))
{   
    #Clear the registration buttons when submitting
    unset($_POST['register-btn']);

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

    #Function for image
    if(empty($_FILES['profileImage']['name'])){
        array_push($errors, "User image is required.");
    }

    #Validate the password before submitting
    #password length
    if(strlen($_POST['password']) < 8){
        array_push($errors, "Password must be at least 8 characters.");
    }

    #for letters
    if(!preg_match("/[A-Za-z]/i", $_POST['password'])){
        array_push($errors, "Password must contain at least one letter");
    }

    #number
    if(!preg_match("/[0-9]/", $_POST['password'])){
        array_push($errors, "Password must contain at least one Number");
    }  

    #if image error and alert error is equal 0
    if(count($errors) === 0 && $imageError === 0)
    {
        #Validate the image size, if its greater than 10mb alert error message
        if($imageSize > 625000)
        {
            $msg = "Sorry your Image file is to large, Please upload a new one at least 5mb.";
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
                $imagePath = ROOT_PATH.'/app/upload/uploadProfile/'.$newImgName; #Get the image path
                $result = move_uploaded_file($imageTmp, $imagePath); #Upload the image to the folder and database

                #if image path moved to thumbnail directory
                if($result){
                    $_POST['profileImage'] = $newImgName;
                }else{
                    array_push($errors, 'Failed to upload the Post image.');
                }

                #Insert the image into the database alongside the user information using MYSQLI
                #$query_user = create($table, $_POST);
                $sql = "INSERT INTO users (role, firstName, lastName, username, email, password, profileImage, created_at) VALUES ('$role','$firstName', '$lastName','$username', '$email', '$password', '$newImgName', '$created_at')";
                $query_result = mysqli_query($conn, $sql);

                #Select the user that has make account
                $user = selectOne($table,['id' => $query_result]);

                #validate the user information and profile image information when submitting the query to the database
                if($user)
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
        $msg = "Something went wrong!, Try again.";
        $css_class = "alert-danger";
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
        <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
    }
}

#This is for login in the user information
#if the user clicked the login button
if(isset($_POST['signin-btn']))
{
    $errors = validateLogin($_POST);

    if(count($errors) === 0){
        #check the user
        $user = selectOne($table, ['email' => $_POST['email']]);
        $user = selectOne($table, ['username' => $_POST['email']]);

        #Validate the email address
        if($user > 0){
            #if the user is exist verify the user credentials
            if($user && password_verify($_POST['password'], $user['password'])){
                #Session User login function
                loginUser($user);
                #after session login success clear the form fields
                $email = '';
                $password = '';
            }else{
                #Display the error message
                array_push($errors, "Email or Password Incorrect.");
                $email = $_POST['email'];
                $password = $_POST['password'];
            }
        }else{
            #return the submitted form data
            $email = $_POST['email'];
            $password = $_POST['password'];

            $msg = "Email is not registered, please register first!";
            $css_class = 'alert-danger';
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
            <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
        }
    }else{
        #return the submitted form data
        $email = $_POST['email'];
        $password = $_POST['password'];
    }
}

#This is for Forgotten Password Authentication
if(isset($_REQUEST['forget-btn'])){
    #Clear the forget-btn 
    unset($_REQUEST['forget-btn']);

    #print the email 
    dd($_REQUEST);
    
}