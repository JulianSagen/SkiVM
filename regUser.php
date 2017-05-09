<?php
function createUser()
{
    $db = new mysqli("student.cs.hioa.no", "s315584", "", "s31584");
    if (!$db->connect_error) {
        die("Feil kunne ikke knytte meg til databasen");
    }
    $sql = "Insert Into user (Fornavn, Etternavn, Adresse,";
    $sql .= "Postnr, Telefonnr) Values ('$this->fornavn',";
    $sql .= "'$this->etternavn','$this->adresse','$this->postnr'";
    $sql .= ",'$this->telefonnr')";
    $resultat = $db->query($sql);
    if (!$resultat) {
        return 0;
    } else {
        return $db->insert_id;
    }
    $db->close();
}