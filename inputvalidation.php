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