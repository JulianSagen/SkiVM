<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Ski VM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <link href="dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="mainCss.css" rel="stylesheet">
    <script src="dist/js/jquery.min.js"></script>
</head>
<body>
<?php
session_start();
session_regenerate_id();
include_once('navbar.php');
?>

<article id="upper">

    <!-- Log in Modal -->
    <div class="modal fade Login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">
                <div id="modal">
                    <h2 class="h2">Log In</h2>
                    <form action="login.php" method="get">
                        <input name="username" type="text" placeholder="Username" onsubmit="catch "><br>
                        <input name="password" type="password" placeholder="Password" onsubmit="catch ">

                        <br>
                        <div id="log-head">
                            <button class="btn btn-success" type="submit">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="front-tittle"><h1 id="big">SKI VM</h1>
    </div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="img/ski.jpg" alt="ski">
            </div>

            <div class="item">
                <img src="img/jump.jpg" alt="jump">
            </div>

            <div class="item">
                <img src="img/Snow.jpg" alt="Snow">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</article>

<article id="downer">
    <!-- TODO show information about all the events-->
    <div id="tittle">
        <h1>Velkommen til Ski-VM i Oslo</h1>
        <?php
            if(isset($_SESSION['login_user'])){
                echo "<p>Meld deg på en av arrangementene for å delta som tilskuer!</p>";
            }
            else echo "<p>Registrer en bruker og meld deg på hvis du har lyst å være tilskuer!</p>";
        ?>
    </div>
    <div id="sportsDiv" class="tabeller">

    </div>
</article>
<footer class="panel-footer">
    <table>
        <tr>
            <td>
               Vet ikke
            </td>
            <td>
                hva
            </td>
        </tr>
        <tr>
            <td>
                vi skal
            </td>
            <td>
                ha her rip
            </td>
        </tr>
    </table>
</footer>
<script src="dist/js/bootstrap.js"></script>
<script type="text/javascript"><!-- writes the table -->
    var urlsport = "getdata.php?requesttype=getsports";
    var loggedOn = "getdata.php?requesttype=getLoggedOn";
    var topField="";
    var bottomField="";
    $.getJSON(loggedOn, function (data) {
        if (data == true) {
            topField="<th>Påmelding:</th>";
            bottomField="<th><button type=\"button\" id=\"joinButton\" class=\"btn btn-success\">Meld deg på!</button></th>";
        }
    });
    $.getJSON(urlsport, function (data) {
        var sportinfo = '';
        for (var row in data) {
            sportinfo += "<tr><td >" + data[row].sportname + "</td>" + bottomField + "</tr>";
        }
        $("#sportsDiv").append("<table class=\"table\" id=\"tableSport\">" + "<thead class=\"thead-inverse\"><tr><th> Konkurranser: </th>"+ topField +"</tr></thead>" + sportinfo + "</table>");
    });
</script>

</body>
</html>
