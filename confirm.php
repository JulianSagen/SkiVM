<?php
    include 'regUser.php';
    $username = $_GET["username"];
    $password = $_GET["password"];
    $fullname = $_GET["name"];
    $email = $_GET["email"];
    $phone = $_GET["phonenumber"];
    $address = $_GET["address"];
echo $username . "<br>" . $password . "<br>" . $fullname . "<br>" . $email . "<br>" . $phone . "<br>" . $address;
    createUser($username, $password, $fullname, $email, $phone, $address);

?>