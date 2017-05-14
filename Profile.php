<?php
session_start();
session_regenerate_id();
if (!isset($_SESSION['login_user'])) {      // if there is no valid session
    header("Location: index.php");
}
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Din profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <link href="dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="mainCss.css" rel="stylesheet">
    <script src="dist/js/jquery.min.js"></script>
</head>
<body>

<?php
include_once('navbar.php');
?>


<article id="profArt">
    <!-- Log in Modal -->
    <div class="modal fade Login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">
                <div id="modal">
                    <h2 class="h2">Log In</h2>
                    <input type="text" placeholder="Username" onsubmit="catch "><br>
                    <input type="password" placeholder="Password" onsubmit="catch ">
                    <br>
                    <div id="log-head">
                        <button class="btn btn-success" type="submit">Log in</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h1 id="tittleProfile">Din Profil</h1>
    <table class="table" id="profilTabell">
        <tr>
            <td>
                <div id="profilinfo"><img src="img/avatar.png" width="220px" height="200px">
                    <div id="user">
                        <?php
                        /* this only show if user is signed in*/
                        if (isset($_SESSION['login_user'])) {
                            echo "<p class='text-success'>Velkommen til din profil: " . "<br>" . $_SESSION['login_user'] . "</p>";
                        }
                        ?>
                    </div>
                </div>
            </td>
            <td>
                <div id="profilTab1">
                    <table class="table">

                        <tr>
                            <th> Brukernavn:</th>
                        </tr>
                        <tr>
                            <th> Navn:</th>
                        </tr>
                        <tr>
                            <th> Email:</th>
                        </tr>
                        <tr>
                            <th> Tlf. nr.:</th>
                        </tr>
                        <tr>
                            <th> Adresse:</th>
                        </tr>
                    </table>
            </td>
            <td>
                <div id="profilTab">


                    <script type="text/javascript">
                        var urluser = "getdata.php?requesttype=getuserinfo";
                        $.getJSON(urluser, function (data) {
                            var userinfo = '';
                            for (row in data) {
                                userinfo += "<tr><td>" + data[row].username + "</td></tr><tr><td>" + data[row].fullnavn + "</td></tr><tr><td>" + data[row].email + "</td></tr><tr><td>" + data[row].phonenr + "</td></tr><tr><td>" + data[row].address + "</td></tr></tr>";
                            }
                            $("#profilTab").append("<table class=\"table\">" + userinfo);
                        });
                    </script>
                </div>
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td>
                <div id="tabellOvelserProfil">
                    <script type="text/javascript">
                        var urlsport = "getdata.php?requesttype=userAttending";
                        var urluserid = "getdata.php?requesttype=getuserid";
                        var userid = 13;
                        $.getJSON(urlsport, function (data) {
                            var sportinfo = '';
                            var headerName = "";
                            for (var row in data) {
                                var value = data[row].sportid;
                                var buttonInTable = "<th><button type=\"button\" class=\"joinButton\" value=\"" + value + "\" onclick=\"removeTicket(" + value + ")\" class=\"btn btn-success\">Meld deg av</button></th>";
                                sportinfo += "<tr><td >" + data[row].sportname + "</td>" + buttonInTable + "</tr>";
                            }
                            $("#tabellOvelserProfil").append("<table class=\"table\" id=\"tableSport\">" + "<thead class=\"thead-inverse\"><tr><th> Påmeldte Konkurranser: </th>" + headerName + "</tr></thead>" + sportinfo + "</table>");
                        });
                        $.getJSON(urluserid, function (data) {
                            for (var row in data) {
                                userid = data[row].userid;
                            }
                        });
                        function removeTicket(sportVal) {
                            var sportid = sportVal;
                            var urlregticket = "setdata.php?requesttype=removeticket&sportid=" + sportid + "&userid=" + userid;
                            console.log(userid);
                            $.getJSON(urlregticket, function (data) {
                                if (data === "OK") {
                                    $("#outputMelding").text("Du er nå meldt av!");
                                } else {
                                    $("#outputMelding").text("Error: noe rart skjedde");
                                }
                            });
                        }
                    </script>
                </div>

            </td>
            <td>
                <div id="outputMelding">
                </div>
            </td>>
        </tr>
    </table>
</article>
<script src="dist/js/bootstrap.js"></script>


</body>
</html>