<?php
    session_start();
    include 'authentication.php';
    $username = $_GET["username"];
    $password = $_GET["password"];

    if(checklogin($username, $password)){
        echo "Gratulerer du har nå blitt innlogget";
        $isAdmin=true;
        if($isAdmin) {
            $_SESSION['user_role'] = "admin";
        }
        $_SESSION['login_user']=$username;
    }else{
        echo "Your password is useless";
    }
    header("Location: index.php");


