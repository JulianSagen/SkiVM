<?php
/**
 * Created by PhpStorm.
 * User: Teritry
 * Date: 10.05.2017
 * Time: 13.17
 */
checklogin('julian4', 'julian4');

function encryptPasswordHash($password)
{

   $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

   return $encryptedPassword;
}

function checklogin($username, $password)
{

    $db = new mysqli("student.cs.hioa.no", "s315584", "", "s315584");
    if ($db->connect_error) {
        echo $db->connect_error;
        die("Kunne ikke koble til databasen");
    }

    $sql = 'SELECT password FROM users WHERE username="' . $username . '";';
    echo $sql;

    $resultat = $db->query($sql);
    if(!$resultat)   {
        die("Kunne ikke finne bruker i databasen");
    }

    if ($resultat->num_rows > 0) {
        if($resultat->num_rows > 1){
            die("Feil i databasespørring");
        }
        // output data of each row
        $row = $resultat->fetch_assoc();
        $passfromDB = $row["password"];
        echo "<br>Passord fra DB:" . $passfromDB . "<br>";
    } else {
        echo "0 results";
    }

    if(password_verify($password, $passfromDB))
    {
        echo "Brukeren " . $username . " er nå logget inn";
    }else{
        echo '<br>Feil passord! -  Forsøkt passord: ' . $password . " <br>   Passordet i databasen skal være:" . encryptPasswordHash($passfromDB) . "<br>    Passordet i databasen er: " . $passfromDB . "<br>";
    }

    $db->close();

}
