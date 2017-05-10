<?php
function createUser($username, $password, $fullname, $email, $phonenr, $address)
{
    if($username == null || $password == null || $fullname == null ||$phonenr == null ||$address == null || $email == null){
        die("Alle datafelt må fylles");
    }
    $db = new mysqli("student.cs.hioa.no", "s315584", "", "s31584");
    if (!$db->connect_error) {
        die("Feil kunne ikke knytte meg til databasen");
    }
    $sql = "Insert Into users (username, password, fullnavn, email, phonenr, address,";
    $sql.= "Values ('$username','$password','$fullname','$email','$phonenr','$address')";
  //  $sql .= "Postnr, Telefonnr) Values ('$this->fornavn',";
  //  $sql .= "'$this->etternavn','$this->adresse','$this->postnr'";
  //  $sql .= ",'$this->telefonnr')";
    $resultat = $db->query($sql);
    if (!$resultat) {
        return 0;
    } else {
        return $db->insert_id;
    }
    $db->close();
}