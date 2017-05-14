<?php

function validatename($name){
    if(preg_match("/^[a-zæøåA-ZÆØÅ][a-zæøåA-ZÆØÅ. ]{4,22}$/",$name)){
        return true;
    }
    return false;
}

function validateusername($username){
    if(preg_match("/^[a-zæøåA-ZÆØÅ]{3,12}$/",$username)){
        return true;
    }
    return false;
}
function validatepassword($password){
    if(preg_match("/^[0-9A-Za-z%@!$#]{6,20}$/",$password)){
        return true;
    }
    return false;
}

function validateid($id){
    if(preg_match("/^[0-9]{1,9}$/",$id)){
        return true;
    }
    return false;
}

function validatephonenr($phonenr){
    if(preg_match("/^\d{8}$/",$phonenr)){
        return true;
    }
    return false;
}

function validateemail($email){
    if(preg_match("/^([A-za-z0-9_\.-]+)@([\da-zA-z\.-]+)\.([a-zA-Z\.]{2,6})$/",$email)){
        return true;
    }
    return false;
}

function validateaddress($address){
    if(preg_match("/^[0-9a-zæøåA-ZÆØÅ. ]{4,40}$/",$address)){
        return true;
    }
    return false;
}


function getsportname(){
    $sportname = $_GET['sportname'];
    if(validatename($sportname)){
        return $sportname;
    }
    else{
        echo json_encode("Kunne ikke validere data");
        die();
    }
}

function getathletename(){
    $athletename = $_GET['athletename'];
    if(validatename($athletename)){
        return $athletename;
    }
    else{
        echo json_encode("Kunne ikke validere data");
        die();
    }
}

function getsportid(){
    $sportid = $_GET['sportid'];
    if(validateid($sportid)){
        return $sportid;
    }
    else{
        echo json_encode("Kunne ikke validere data");
        die();
    }
}
function getusername(){
    $username = $_SESSION['login_user'];
    return $username;
}

function getathleteid(){
    $athleteid = $_GET['athleteid'];
    if(validateid($athleteid)){
        return $athleteid;
    }
    else{
        echo json_encode("Kunne ikke validere data");
        die();
    }
}