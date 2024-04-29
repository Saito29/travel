<?php
    $severname = "localhost";
    $username = 'root';
    $password = '';
    $db_name = 'cube.io.com';
    
    //Create a connection
    $conn = new mysqli($severname,$username,$password,$db_name);

    //Check connection
    if($conn->connect_error){
        die("Error connecting to" . $conn->connect_error);
    }               
    $conn->close();
?>;