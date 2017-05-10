<?php
include 'authentication.php';
function createUser($username, $password, $fullname, $email, $phonenr, $address)
{
    if($username == null || $password == null || $fullname == null ||$phonenr == null ||$address == null || $email == null){
        die("Alle datafelt må fylles");
    }
    $db = new mysqli("student.cs.hioa.no", "s315584", "", "s315584");
    if ($db->connect_error) {
        echo $db->connect_error;
        die($db->connect_error);
    }
    $sql = "Insert Into users (username, password, fullnavn, email, phonenr, address) Values ('$username','$password','$fullname','$email','$phonenr','$address')";

    $resultat = $db->query($sql);
    if(!$resultat)   {
        return 0;
    }
    else  {
        return $db->insert_id;
    }
    $db->close();


}