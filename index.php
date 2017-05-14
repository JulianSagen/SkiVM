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
                <img src="img/ski.jpg" height="1080" alt="ski">
            </div>

            <div class="item">
                <img src="img/jump.jpg" height="1080" alt="jump">
            </div>

            <div class="item">
                <img src="img/Snow.jpg" height="1080" alt="Snow">
                
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
    <div id="outputMelding">
    </div>
</article>
<footer class="panel-footer">
    <p>
        copyright © all rights reserved
    </p>
</footer>
<script src="dist/js/bootstrap.js"></script>
<script type="text/javascript">
    var urlsport = "getdata.php?requesttype=getsports";
    var urlLoggedOn = "getdata.php?requesttype=getLoggedOn";
    var urluserid = "getdata.php?requesttype=getuserid";
    var headerName="";
    var userid = 13;
    var buttonInTable="";
    $.getJSON(urlLoggedOn, function (data) {
        if (data === true) {
            headerName="<th>Påmelding:</th>";
            buttonInTable="<th><button type=\"button\" class=\"joinButton\" onclick=\"regTicket(1)\" class=\"btn btn-success\">Meld deg på!</button></th>";
        }
    });

    $.getJSON(urlsport, function (data) {
        var sportinfo = '';
        var value = 0;
        for (var row in data) {
            if (buttonInTable !== "") {
                value = data[row].sportid;
                buttonInTable = "<th><button type=\"button\" class=\"joinButton\" value=\"" + value + "\" onclick=\"regTicket(" + value + ")\" class=\"btn btn-success\">Meld deg på!</button></th>";
            }
            sportinfo += "<tr><td class=\"thick\">" + data[row].sportname + "</td class>" + buttonInTable + "</tr>";
        }
        $("#sportsDiv").append("<table class=\"table\" id=\"tableSport\">" + "<thead class=\"thead-inverse\"><tr><th> Konkurranser: </th>"+ headerName +"</tr></thead>" + sportinfo + "</table>");
    });
    $.getJSON(urluserid, function (data) {
        for(var row in data){
            userid = data[row].userid;
        }
    });
    function regTicket(sportVal) {
        console.log(userid);
        var sportid=sportVal;
        var urlregticket = "setdata.php?requesttype=regticket&sportid=" + sportid + "&userid=" + userid;
        $.getJSON(urlregticket, function (data) {
            if (data === "OK") {
                $("#outputMelding").text("Du er nå med!");
            } else {
                $("#outputMelding").text("Error: noe rart skjedde og du ble ikke med :(");
            }
        });
    }
    $(document).ready(function() {
        $("#sportsDiv").on( 'click', 'tr', function() {
            var thistabel = this;
            var urlathletesattending = "getdata.php?requesttype=getathletesattending&sportname=" + $( this ).children('td').text();
            console.log($( this ).children('td').text());
            $.getJSON(urlathletesattending, function (data) {
                var sportinfo = "";
                for (var row in data) {
                    sportinfo += "<tr><td>" + data[row].athletename + "</td></tr>";
                    console.log(data[row].athletename)
                }
                $(thistabel).after(sportinfo);
            });
        });
    });
</script>

</body>
</html>
