<?php
include (ROOT_PATH."/app/config/db.php");
include (ROOT_PATH."/app/helpers/validateProfile.php");

#User information in session
$id = '';
$firstName = '';
$lastName = '';
$username = '';
$email = '';
$profileImage = '';
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
    header('location:'.BASE_ADMIN.'/profile.php');
    exit();
}

function sessionFailedUser($user){
    $_SESSION['messages'] = "User update failed, try again!";
    $_SESSION['css_class'] = 'alert-danger';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    header('location:'.BASE_ADMIN.'/profile.php');
    exit();
}

#This is for updating the user profile
if(isset($_POST['uptProf-btn'])){
    #Get the id of the session user
    $id = $_POST['id'];

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $profileImage = $_FILES['profileImage'];
    $updated_at = $_POST['updated_at'];

    #Unset the information of id and the button
    unset($_POST['uptProf-btn'], $_POST['id']);

    #Image identification
    $profileImage = $_FILES['profileImage']['name']; #image name
    $imageSize = $_FILES['profileImage']['size']; #image size
    $imageTmp = $_FILES['profileImage']['tmp_name']; #image name of the image temporary
    $imageError = $_FILES['profileImage']['error']; #Image error either 1 or 0
    $imageType = $_FILES['profileImage']['type']; #Image type of the image
    
    /*
    echo "<pre>", print_r($_POST, true), "</pre>";
    echo "<pre>", print_r($_FILES['profileImage'],true), "</pre>";
    echo "<pre>", print_r($_FILES['profileImage']['name'],true), "</pre>"; 
    */

    #Error array
    $errors = validateProfileUser($_POST);

    #Validate if theres an error
    if(count($errors) === 0){
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
                $result = move_uploaded_file($imageTmp, $imagePath); #Upload the image to the folder and database
                
                #if image path moved to thumbnail directory
                if($result){
                    $_POST['profileImage'] = $newImgName;
                }else{
                    array_push($errors, 'Failed to upload the Post image.');
                }

                #Update user account in the database
                $query_user = update($table, $id, $_POST);
                #$query = "UPDATE users SET firstName=?, lastName=?, username=?, email=?, profileImage=?, updated_at=? WHERE id=?";
                #$stmt_profile = $conn->prepare($query);
                #$stmt_profile->execute([$firstName, $lastName, $username, $email, $newImgName, $updated_at, $id]);

                #Select the user that has make account
                $user = selectOne($table,['id' => $id]);

                #validate the user information and profile image information when submitting the query to the database
                if($user)
                {
                    #Alert the user success and uploading the image to the database successfully
                    sessionUpdateUser($user);
                }else
                {
                    #Alert the user failed to upload and create account
                    sessionFailedUser($stmt_profile);
                }
            } else
            {
                #Return array of user information if encountered errors
                $firstName = $_POST['firstName']; 
                $lastName = $_POST['lastName'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $profileImage = $_FILES['profileImage']['name'];
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
        $profileImage = $_FILES['profileImage']['name'];
        $updated_at = $_POST['updated_at'];

        #Alert Error message and direct again to register page
        $msg = "Something went wrong!, Profile Image is required.";
        $css_class = "alert-danger";
        $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
        <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
    }
}

#This is for the permanent delete user information
if(isset($_POST['delete-btn'])){
    #get the id of the user
    $id = $_SESSION['id'];

    #Select the user session id
    $user_id = deleted($table, $id);

    $_SESSION['message'] = 'User has been deleted permanently!';
    $_SESSION['css_class'] = 'alert-danger';
    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';

    #unset all the sessions 
    unset($_SESSION['id']);
    unset($_SESSION['firstName']);
    unset($_SESSION['lastName']);
    unset($_SESSION['username']); 
    unset($_SESSION['email']);
    unset($_SESSION['profileImage']);
    unset($_SESSION['role']);    

    #Destroy all the sessions
    session_destroy();

    #direct to the homepage after the session destroy
    header('location:'.BASE_URL.'/index.php');
    exit();
}