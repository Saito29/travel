<?php
$servername = "localhost";
$username = 'root';
$password = '';
$db_name = 'travel';

#Procedural MySQLi Database
#Create a connection to the database
$conn = mysqli_connect($servername,$username,$password,$db_name);

#Check connection for the database 
if(!$conn){
    die("Error connecting to" . mysqli_connect_error());
}
    