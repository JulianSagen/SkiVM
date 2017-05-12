<?php

function validatename($name){
    if(preg_match("/^[a-zæøåA-ZÆØÅ][a-zæøåA-ZÆØÅ. ]{1,22}$/",$name)){
        return true;
    }
    return false;
}

function validateusername($username){
    if(preg_match("/^[a-z]{3,12}$/",$username)){
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
function getuserid(){
    $userid = $_GET['userid'];
    if(validateid($userid)){
        return $userid;
    }
    else{
        echo json_encode("Kunne ikke validere data");
        die();
    }
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