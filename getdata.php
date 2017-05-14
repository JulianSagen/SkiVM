<?php
session_start();
session_regenerate_id();
include "inputvalidation.php";

$typeforespørsel = $_GET['requesttype'];

$db = new mysqli("student.cs.hioa.no", "s315584", "", "s315584");
if ($db->connect_error) {
    echo json_encode(null);
    $db->close();
    die();
}

switch ($typeforespørsel) {
    case "getusers":
        $sql = "SELECT userid, username, fullnavn, email, phonenr, address FROM users";
        break;
    case "getuserinfo":
        $sql = "SELECT username, fullnavn, email, phonenr, address FROM users WHERE username = '" . mysqli_real_escape_string($db, $_SESSION['login_user']) . "'";
        break;
    case "getuserid":
        $sql = "SELECT userid FROM users WHERE username = '" . mysqli_real_escape_string($db, $_SESSION['login_user']) . "'";
        break;
    case "getathletes":
        $sql = "SELECT athleteid, athletename FROM athletes";
        break;
    case "getsports":
        $sql = "SELECT sportid, sportname FROM sports";
        break;
    case "getLoggedOn":
        if (isset($_SESSION['login_user'])) {
            echo json_encode(true);
        } else echo json_encode(false);;
        die();
        break;
    case "getuserattending":
        $sql = "SELECT sportid, sportname FROM sports WHERE sportid = (SELECT sportid FROM tickets WHERE userid = '" . getuserid() . "')";
        break;
    case "getathletesattending":
        $sql = "SELECT atlethename FROM athlete WHERE atletheid = (SELECT atletheid FROM athleteduingsport WHERE sportid = (SELECT sportid FROM sports WHERE sportname = '" . mysqli_real_escape_string($db, $_SESSION['login_user']) . "'))";
        break;
    case "getattendingusers":
        $sql = "SELECT userid, username FROM sports WHERE sportid = (SELECT sportid FROM tickets WHERE userid = '" . getuserid() . "')";
        break;
    default:
        $db->close();
        echo json_encode(null);
        die();

}
$resultat = $db->query($sql);
if (!$resultat) {
    $db->close();
    echo json_encode(null);
    die();
}
$rows = array();
while ($r = mysqli_fetch_assoc($resultat)) {
    $rows[] = $r;
}
$utdata = json_encode($rows);
$db->close();
echo $utdata;
die();