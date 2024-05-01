<?php
include(ROOT_PATH ."/app/config/db.php");
include(ROOT_PATH ."/app/helpers/validateUser.php");

#empty information details of user information
$firstName = '';
$lastName = '';
$username = '';
$email = '';
$password = '';
$profileImage = '';
$role = '';
$table = 'users';
$errors = array();

if (isset($_POST['register-btn']) && isset($_FILES['profileImage']))
{
   $errors = validateUser($_POST);
    
    if(count($errors) === 0)
    {
        #Clear registerbutton name in array
        unset($_POST['register-btn']);

        #insert admin role in array
        $_POST['admin'] = 0;

        #Grab all user information
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $profileImage = time(). "-" .$username. "-" .$_FILES['profileImage']['name'];
        $error = $_FILES['profileImage']['error'];

        #Encypt Password using Password hashing
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        #Create a user and insert into database
        $user_id = create($table, $_POST);

        #Find the user
        $user = selectOne($table, $user_id);

        #validate image size. Size is calculated in Bytes
        if($_FILES['profileImage']['size'] > 10000000) 
        {
            $msg = "Image size should not be greated than 10mb";
            $css_class = "alert-danger";
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
            <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
        }

        #Insert users information into database
        $query = "INSERT INTO users (firstName,lastName,username,email,password,profileImage) Values ($firstName,$lastName,$username,$email,$password,$profileImage)";
        $result = mysqli_query($conn, $query);

        #Validate users information
        if($result){
            #Alert Success Message
            $acmsg = "Account successfully created";
            $css_class = "alert-success";
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
            <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
        }else{
            #Alert Failure Message
            $acmsg = "Failed to create account";
            $css_class = "alert-danger";
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
            <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>'; 
        }

    } else
    {
        #if the user inputed information is missing from submission, return the array 
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $profileImage = $_FILES ['profileImage'];
        header(BASE_URL_LINKS."/signup.php");
    }
}else{
    header(BASE_URL_LINKS."/signup.php");
}
