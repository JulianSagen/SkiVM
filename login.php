<?php
    session_start();
    session_regenerate_id();

    include 'authentication.php';
    $username = $_GET["username"];
    $password = $_GET["password"];

    if(!empty(checklogin($username, $password))){
        echo "Gratulerer du har nå blitt innlogget";
        if(checklogin($username, $password) == "isAdmin") {
            $_SESSION['user_role'] = "admin";
        }
        $_SESSION['login_user']=$username;
        // todo $_SESSION['userid']=$username;
    }else{
        echo "Your password is useless";
    }
    header("Location: index.php");


