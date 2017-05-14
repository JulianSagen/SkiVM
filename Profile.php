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
    <title>Meld Deg På!</title>
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
    <table id="profilTabell">
        <tr>
            <td>
                <div id="profilinfo"><img src="img/avatar.png">
                <div id="user">
                    <?php
                    /* this only show if user is signed in*/
                    if (isset($_SESSION['login_user'])) {
                        echo "<p class='text-success'>Velkommen til din profil: "."<br>". $_SESSION['login_user'] . "</p>";
                    }
                    ?>
                </div> </div>
            </td>
            <td>
                <div id="profilTab">
                    <script type="text/javascript">
                    var urluser = "getdata.php?requesttype=getuserinfo";
                    $.getJSON(urluser, function (data) {
                        var userinfo = '';
                        for (var row in data) {
                            userinfo += "<tr><td >" + data[row].username + "</td><td>" + data[row].fullnavn + "</td><td>" + data[row].email + "</td><td>" + data[row].phonenr + "</td><td>" + data[row].address + "</td></tr>";
                        }
                        $("#profilTab").append("<table class=\"table\" id=\"table-props\">" +
                            "<thead class=\"thead-inverse\"><tr><th> Brukernavn: </th><tr><th> Navn: </th></tr><tr><th> Email: </th></tr><tr><th> Tlf. nr.: </th></tr><th> Adresse: </th></tr></thead>" + userinfo + "</table>");
                    });
                    </script>
                </div>
            </td></tr>
        <tr>
            <td>
                <div id="profilBar"></div>
            </td>
        </tr>
        <tr>
            <td>
                <div id="tabellOvelser"></div>
            </td>
        </tr>
    </table>


</article>
<script src="dist/js/bootstrap.js"></script>


</body>
</html>