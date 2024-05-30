<?php
include("../path.php");
include(ROOT_PATH.'/app/config/config.php');
require(ROOT_PATH.'/vendor/autoload.php');

#Global Variables
$token = '';
$token_hash = '';

$password = '';
$cfpassword = '';

$table = 'users';

$msg = '';
$msg2 = '';
$msg3 = '';
$msg4 = '';
$msg5 = '';
$css_class = '';
$icon = '';


$token = $_POST['token'];

$token_hash = hash('sha256', $token);

$sql = "SELECT * FROM users
    WHERE reset_token_hash = ? ";

$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if($user === null) {
    die("Token could not found");
}

if (strtotime($user['reset_token_expires_at']) <= time()){
    die("Token has expired!");
}

$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$cfpassword = $_POST['cfpassword'];
    
#Validate the password before submitting
#password length
if(strlen($_POST['password']) < 8){
    die("Password must be at least 8 characters.");
}

#for letters
if(!preg_match("/[A-Za-z]/i", $_POST['password'])){
    die("Password must contain at least one letter");    
}

#number
if(!preg_match("/[0-9]/", $_POST['password'])){
    die("Password must contain at least one Number");
}

#If not match
if($_POST['password'] !== $_POST['cfpassword']){
    die("Password does not match");
}

    #Update password
    $sql = "UPDATE users 
        SET password = ?,
        reset_token_hash = NULL,
        reset_token_expires_at = NULL
        WHERE id = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param('ss', $password, $user['id']);

    $stmt->execute();

    echo "Password updated, you can now close this page.";
