<?php
    session_start();
    session_regenerate_id();

    include 'authentication.php';
    $username = $_GET["username"];
    $password = $_GET["password"];

    if(!empty(checklogin($username, $password))){
        echo "Gratulerer du har nå blitt innlogget";
        if(checklogin($username, $password) == "isAdmin") {
            $_SESSION['isAdmin'] = true;
        }
        $_SESSION['login_user']=$username;
        $_SESSION['userid']=$username;
    }else{
        echo "Your password is useless";
    }
    header("Location: index.php");


