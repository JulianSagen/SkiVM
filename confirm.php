<?php

include 'regUser.php';
$username = $_GET["username"];
$password = $_GET["password"];
$fullname = $_GET["name"];
$email = $_GET["email"];
$phonenr = $_GET["phonenumber"];
$address = $_GET["address"];
if ($username == "" || $password == "" || $fullname == "" ||$phonenr == "" ||$address == "" || $email == "") {
    header("Location: Registrer.php");
} else {
    createUser($username, $password, $fullname, $email, $phonenr, $address);
    header("Location: index.php");
}

?>