<?php
session_start();
session_regenerate_id();
if (!isset($_SESSION['login_user']))
{
    header("Location: index.php");
}
include "inputvalidation.php";

$db = new mysqli("student.cs.hioa.no", "s315584", "", "s315584");
if($db->connect_error)
{
    echo json_encode("Kan ikke koble til på grunn av tekniske problemer");
    $db->close();
    die();
}

$typeforespørsel = $_GET['requesttype'];
switch($typeforespørsel){
    case "regsport":
        $sql="INSERT INTO sports(sportname) VALUES ('" . mysqli_real_escape_string($db, getsportname()) . "')";
        break;
    case "regathlete":
        $athletename = $_GET['athletename'];
        $sql="INSERT INTO athletes(athletename) VALUES ('" . mysqli_real_escape_string($db, getathletename()) . "')";
        break;
    case "regisdoingsport":
        $sql="INSERT INTO athleteduingsport(sportid, athleteid) VALUES ((SELECT sportid from sports where sportname ='" . getsportname() . "'), (SELECT athleteid from athletes where athletename ='" . getathletename() ."'))";
        break;
    case "regticket":
        $subquery ="SELECT userid FROM users WHERE username = " . getusername();
        $sql="INSERT INTO tickets(sportid, userid) VALUES ('" . getsportid() ."','". $subquery . "')";
        break;
    default:
        echo json_encode("Feil på spørring2");
        die();
        break;
}







$resultat = $db->query($sql);
if(!$resultat)
{
    $db->close();
    echo json_encode("Kunne ikke lagre data");
    die();
}
$utdata = json_encode("OK");
$db->close();
echo $utdata;
die();