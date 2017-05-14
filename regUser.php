<?php
include 'authentication.php';
include 'inputvalidation.php';
function createUser($username, $password, $fullname, $email, $phonenr, $address)
{
    if(validateusername($username) || validatepassword($password) || validatename($fullname) || validatephonenr($phonenr) || validateaddress($address) || validateemail($email)){
        header("Location: Registrer.php");
    }
    $db = new mysqli("student.cs.hioa.no", "s315584", "", "s315584");
    if ($db->connect_error) {
        echo "Kunne ikke koble til database";
        die($db->connect_error);
    }
    $encryptedpassword = encryptPasswordHash($password);
        $sql = "Insert Into users (username, password, fullnavn, email, phonenr, address) Values (" . mysqli_real_escape_string($db, $username) . "," . $encryptedpassword . "," . mysqli_real_escape_string($db, $fullname) . "," . mysqli_real_escape_string($db, strtolower($email)) . "," . mysqli_real_escape_string($db, $phonenr) . "," .mysqli_real_escape_string($db, $address) . ")";

    $resultat = $db->query($sql);
    if(!$resultat)   {
        return 0;
    }
    else  {
        return $db->insert_id;
    }
    $db->close();

}