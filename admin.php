<?php
session_start();
session_regenerate_id();
if (!isset($_SESSION['login_user'])){      // if there is no valid session
    header("Location: index.php");
}
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Admin</title>
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


<article id="regart">
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
    <!--Innhold i admin -->
    <h1 id="tittleAdmin">Admin Konsoll</h1>
    <h2 id="tittle">Registrerte Brukere</h2>
    <div class="tabeller" id="tabellusers">
    </div>
    <table class="table">
        <tr>
            <td><h2 id="tittleOvelse">Opprett Øvelse</h2></td>
            <td><h2 id="tittleAtlet">Opprett Atlet</h2></td>
        </tr>
        <tr>
            <td>
                <div id="tabellOvelser">
                    <!-- TODO legge inn From til Øvelser-->

                    <div id="TextTBox">Øvelse:</div>
                    <input type="text" name="sportname" id="sportname" placeholder="Skriv øvelse her.."><br><br>
                    <input type="submit" id="regsport" value="Registrer" onclick="regsport()">
                    <div id="messageregsport"></div>


                </div>
            </td>
            <td>
                <div id="tabellAtleter">
                    <!-- TODO legg inn form til Atleter-->

                    <div id="TextTBox">Atlet:</div>
                    <input type="text" name="athletename" id="athletename" placeholder="Skriv atlet her.."><br><br>
                    <input type="submit" value="Registrer" onclick="regathlete()">
                    <div id="messageregathlete"></div>
                </div>
            </td>
        </tr>

        <tr>
            <td id="T">
                <div class="tabeller" id="tabellsports">
                </div>
            </td>
            <td id="B">
                <div class="tabeller" id="tabellAthletes">
                </div>
            </td>
        </tr>
    </table>
</article>
<script type="text/javascript">
    var urluser = "getdata.php?requesttype=getusers";
    var urlathlete = "getdata.php?requesttype=getathletes";
    var urlsport = "getdata.php?requesttype=getsports";
    $.getJSON(urluser, function (data) {
        var userinfo = '';
        for (row in data) {
            userinfo += "<tr><th >" + data[row].userid + "</th><td >" + data[row].username + "</td><td>" + data[row].fullnavn + "</td><td>" + data[row].email + "</td><td>" + data[row].phonenr + "</td><td>" + data[row].address + "</td></tr>";
        }
        $("#tabellusers").append("<table class=\"table\" id=\"table-props\">" +
            "<thead class=\"thead-inverse\"><tr><th> # </th><th> Brukernavn: </th><th> Navn: </th><th> Email: </th><th> Tlf. nr.: </th><th> Adresse </th></tr></thead>" + userinfo + "</table>");
    });

    $.getJSON(urlathlete, function (data) {
        var athleteinfo = '';
        for (row in data) {
            athleteinfo += "<tr><th>" + data[row].athleteid + "</th><td >" + data[row].athletename + "</td></tr>";
        }
        $("#tabellAthletes").append("<table class=\"table\" id=\"table-props2\"><thead class=\"thead-inverse\"><tr><th> # </th><th> Atlet: </th></tr></thead>" + athleteinfo + "</table>");
    });

    $.getJSON(urlsport, function (data) {
        var sportinfo = '';
        for (row in data) {
            var i = Object.keys(row).indexOf(data);
            sportinfo += "<tr><th>" + data[row].sportid + "</th><td >" + data[row].sportname + "</td></tr>";
        }
        $("#tabellsports").append("<table class=\"table\" id=\"table-props\">" + "<thead class=\"thead-inverse\"><tr><th> # </th><th> Øvelse: </th></tr></thead>" + sportinfo + "</table>");
    });



    function regsport() {
        var urlregsport = "setdata.php?requesttype=regsport&sportname=" + $('#sportname').val();
        console.log(urlregsport);
        $.getJSON(urlregsport, function (data) {
            if (data === "OK") {
                $("#messageregsport").text("Grenen har blitt opprettet");
            } else {
                $("#messageregsport").text(data);
            }
        });
    }

    function regathlete() {
        var urlregsport = "setdata.php?requesttype=regathlete&athletename=" + $('#athletename').val();
        console.log(urlregsport);

        $.getJSON(urlregsport, function (data) {
            if (data === "OK") {
                $("#messageregathlete").text("Utdøveren har nå blitt lagt til");
            } else {
                $("#messageregathlete").text(data);
            }
        });
    }

    $(document).ready(function() {
        $("#tabellusers ").on( 'click', 'tr', function() {
            var thistabel = this;
            var urluserattending = "getdata.php?requesttype=getuserattending&userid=" + $( this ).children('th').text();
            console.log( $( this ).children('th').text() );
            $.getJSON(urluserattending, function (data) {
                var sportinfo = '';
                for (row in data) {
                    sportinfo += "<tr><td >" + data[row].sportname + "</td></tr>";
                }
                $(thistabel).after(sportinfo);
            });

        });
    });

</script>
<script src="dist/js/bootstrap.js"></script>


</body>
</html>