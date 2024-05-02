<?php
include("path.php");
#Logout all the users values from the database
session_start();

#unset all the sessions 
unset($_SESSION['id']);
unset($_SESSION['username']); 
unset($_SESSION['email']);
unset($_SESSION['role']);
unset($_SESSION['message']);
unset($_SESSION['css_class']);
unset($_SESSION['icon']);

#Destroy all the sessions happen in the website
session_destroy();

#After destroy all the sessions direct it to the home page
header('location:'.BASE_URL.'/index.php'); #direct to index page for user