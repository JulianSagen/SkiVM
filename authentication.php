<?php
/**
 * Created by PhpStorm.
 * User: Teritry
 * Date: 10.05.2017
 * Time: 13.17
 */
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

    $sql = 'SELECT password, isadmin FROM users WHERE username="' . $username . '";';

    $resultat = $db->query($sql);
    if(!$resultat){
        die("Kunne ikke finne bruker i databasen");
    }

    if ($resultat->num_rows > 0) {
        if($resultat->num_rows > 1){
            die("Feil i databasespørring");
        }
        // output data of each row
        $row = $resultat->fetch_assoc();
        $db->close();
        $passfromDB = $row["password"];
    } else {
        echo "0 results";
    }

    if(password_verify($password, $passfromDB))
    {
        if ($row['isadmin']==='1'){
            return "isAdmin";
        }
        return "isUser";
    }else{

    }



}
