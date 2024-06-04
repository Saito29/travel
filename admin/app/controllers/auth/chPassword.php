<?php
include(ROOT_PATH.'/app/config/db.php');
include(ROOT_PATH.'/app/helpers/validateChPassword.php');
require(ROOT_PATH.'/vendor/autoload.php');

#Global Variables
$id = '';
$password = '';
$cfpassword = '';

#global variables messages
$msg = '';
$css_class = '';
$icon = '';

#global variables table
$table = 'users';

#global variables error messages
$errors = array();

#Get the user id
if(isset($_GET['SNID'])){
    #Get the id
    $id = $_GET['SNID'];

    #query the user
    $sql = "SELECT * FROM users WHERE id = ?";

    #prepare the query
    $stmt= $conn->prepare($sql);

    #bind the parameters user id
    $stmt->bind_param('i', $id);

    #execute the query
    $stmt->execute();

    $result = $stmt->get_result();  // get the result

    $users = $result->fetch_array(); // fetch the users

    $id = $users['id']; // fetch the user id from the table users
    $username = $users['username']; // fetch the username from the table users (Optional)
}

if (isset($_POST['chPassword'])) {
    $id = $_POST['id'];
  
    # Check if user ID is set
    if (!isset($id) || empty($id)) {
      $msg = "Invalid user ID.";
      $css_class = "alert-danger";
      $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
      <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
    } else {
  
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql); // prepare the query
        $stmt->bind_param('i', $id); // bind the user id 'i' integer value
        $stmt->execute(); // execute the query
  
        // Check for errors during user selection
        if ($stmt->error) {
            $msg = "Error selecting user: " . $stmt->error;
            $css_class = "alert-danger";
            $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
            <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
            // ... display error message
            exit; // Exit script on error
        }
  
        $result = $stmt->get_result(); // get the result
  
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc(); // fetch the user information
            $user_id = $row['id']; // row user id in table users
            $username = $row['username']; // username in table users
            $updated_at = $row['updated_at']; // updated_at in table users
            
            $password = trim($_POST['password']);
            $cfpassword = trim($_POST['cfpassword']);
  
            $errors = validatePassword($_POST);
  
            if (count($errors) === 0) {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  
                $sql = "UPDATE $table SET password = ? WHERE id = ?";
                $stmt = $conn->prepare($sql); // prepare query for update
                $stmt->bind_param('ss', $hashed_password, $user_id); // bind parameter
  
                // Check for errors during update query
                if ($stmt->error) {
                    $msg = "Error updating password: " . $stmt->error;
                    $css_class = "alert-danger";
                    $icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
                    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
                    exit; // Exit script on error
                }
  
                $stmt->execute(); // execute update query
  
                if ($stmt->affected_rows === 1) { // Check if update was successful
                    #clear the field data and session message
                    $user_id = '';
                    $password = '';
                    $cfpassword = '';

                    $_SESSION['messages'] = "Password changed successfully.";
                    $_SESSION['css_class'] = "alert-success";
                    $_SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(30, 197, 111, 1);transform: ;msFilter:;">
                    <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>';
                    header('location: ' . BASE_URL_LINKS . '/changepassword.php');
                    exit(0);
                } else { // Update failed (affected_rows might be
                    $_SESSION['messages'] = "Password Failed to be updated, Please try again.";
                    $_SESSION['css_class'] = 'alert-danger';
                    $__SESSION['icon'] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(179, 18, 20, 1);transform: ;msFilter:;">
                    <path d="M12.884 2.532c-.346-.654-1.422-.654-1.768 0l-9 17A.999.999 0 0 0 3 21h18a.998.998 0 0 0 .883-1.467L12.884 2.532zM13 18h-2v-2h2v2zm-2-4V9h2l.001 5H11z"></path></svg>';
                    header('location: '.BASE_URL_LINKS.'/changepassword.php');
                    exit(0);
                }
            }
        }
    }
}