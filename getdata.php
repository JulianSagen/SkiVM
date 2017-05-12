<?php
session_start();
session_regenerate_id();
//if (!isset($_SESSION['login_user'])){      // if there is no valid session
//    header("Location: index.php");
//}
function getuser(){
   $user = $_GET['requesttype'];
   return $user;

}
function isLoggedOn(){
    if(isset($_SESSION['login_user'])){
        return true;
    }
    else return false;
}



$typeforespørsel = $_GET['requesttype'];

$db = new mysqli("student.cs.hioa.no", "s315584", "", "s315584");
if($db->connect_error)
{
    echo json_encode(null);
    $db->close();
    die();
}

switch($typeforespørsel){
    case "getusers":
        $sql = "SELECT userid, username, fullnavn, email, phonenr, address from users";
        break;
    case "getathletes":
        $sql = "SELECT athleteid, athletename from athletes";
        break;
    case "getsports":
        $sql = "SELECT sportid, sportname from sports";
        break;
    case "getusersattending":
        $sql = "SELECT sportid, sportname from sports";
    case "getLoggedOn":
        if(isset($_SESSION['login_user'])){
            echo json_encode(true);
        }
        else echo json_encode(false);;
        die();
        break;
    default:
        $db->close();
        echo json_encode(null);
        die();

}
$resultat = $db->query($sql);
if(!$resultat)
{
    $db->close();
    echo json_encode(null);
    die();
}
$rows = array();
while($r = mysqli_fetch_assoc($resultat)){
$rows[] = $r;
}
$utdata = json_encode($rows);
$db->close();
echo $utdata;
die();