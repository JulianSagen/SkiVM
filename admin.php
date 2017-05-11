<?php
    session_start();
    session_regenerate_id();
    if(!isset($_SESSION['login_user']))      // if there is no valid session
    {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <link href="dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="mainCss.css" rel="stylesheet">
    <script src="dist/js/jquery.min.js"></script>
</head>
<body>

<nav id="navbar" class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">HOME </a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right" id="loginNav">
                <p class="navbar-text">Signed in as: </p>
                <li>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target=".Login">Log In
                    </button>
                </li>
                <li>
                    <button id="regBtn" type="submit" class="btn btn-default"
                            onclick="window.location.href='/SkiVM/RegInfo.php'" data-toggle="modal"
                            data-target=".Registrer">Registrer
                    </button>
                </li>
                <li><a id="admin" href="admin.php">Admin</a></li>
            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

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
    <div id="tabellBrukere">
        <script type="text/javascript">

            var url = "getdata.php?requesttype=getUsers";

            $.getJSON(url,function(data){
                var userinfo = '';
                for(row in data){
                    userinfo += "<tr><th >" + data[row].userid + "</th><td >" + data[row].username + "</td><td>" + data[row].fullnavn + "</td><td>" + data[row].email + "</td><td>" + data[row].phonenr + "</td><td>" + data[row].address + "</td></tr>";
                }



            $("#tabellBrukere").append("<table class=\"table\" id=\"table-props\">" +
                "<thead class=\"thead-inverse\"><tr><th> # </th><th> Brukernavn: </th><th> Navn: </th><th> Email: </th><th> Tlf. nr.: </th><th> Adresse </th></tr></thead>" +
                userinfo + "</table>");
            });
        </script>

    </div>
</article>

<script src="dist/js/bootstrap.js"></script>


</body>
</html>