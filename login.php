<?php
    session_start();
    include 'authentication.php';
    $username = $_GET["username"];
    $password = $_GET["password"];

    if(checklogin($username, $password) == "isAdmin" || checklogin($username, $password) == "isAdmin"){
        echo "Gratulerer du har nå blitt innlogget";
        if(checklogin($username, $password) == "isAdmin") {
            $_SESSION['user_role'] = "admin";
        }
        $isAdmin=true;
        if($isAdmin) {
            $_SESSION['user_role'] = "admin";
        }
        $_SESSION['login_user']=$username;
    }else{
        echo "Your password is useless";
    }
    header("Location: index.php");


