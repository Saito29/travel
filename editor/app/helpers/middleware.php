<?php

function editorOnly($redirect ='/index.php'){
    if(empty($_SESSION['id']) || empty($_SESSION['editor'])){
        $_SESSION ['messages'] = "You are not authorized.";
        $_SESSION['tpye'] = "error";
        header("Location: " .BASE_URL. $redirect);
        exit(0);
    }
}

function adminOnly($redirect = '/index.php'){
    if(empty($_SESSION['id']) || empty($_SESSION['admin'])){
        $_SESSION ['messages'] = "You are not authorized.";
        $_SESSION['tpye'] = "error";
        header("Location: " .BASE_URL. $redirect);
        exit(0);
    }
}


function subadminOnly($redirect = '/index.php'){
    if(empty($_SESSION['id']) || empty($_SESSION['sub-admin'])){
        $_SESSION ['messages'] = "You are not authorized.";
        $_SESSION['tpye'] = "error";
        header("Location: " .BASE_URL. $redirect);
        exit(0);
    }
}

function userOnly($redirect = '/index.php'){
    if(empty($_SESSION['id'])){
        $_SESSION ['messages'] = "You need to login first.";
        $_SESSION['tpye'] = "error";
        header("Location: " .BASE_URL. $redirect);
        exit(0);
    }
}

function guestOnly($redirect = '/index.php'){
    if(empty($_SESSION['id'])){
        header("Location: " .BASE_URL. $redirect);
        exit(0);
    }
}