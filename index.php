<?php


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
                <?php
                /* TODO make this only show if user is signed in*/
                $userIsSignedIn = true;
                if($userIsSignedIn){
                    echo "<p class='navbar-text'>Signed in as: </p>";
                }
                ?>
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
                <?php
                /* TODO make this only show if user is an admin*/
                $userIsAdmin = true;
                if($userIsAdmin){
                    echo "<li><a id=\"admin\" href=\"admin.php\">Admin</a></li>";
                }
                ?>
            </ul>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<article id="upper">

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
    <div id="tittle">
        <h1>Welcome to ski VM in Norway</h1>
        <p>Register a user if you want to join yourself!</p>
        <ul>
            <li>Ski jumping</li>
            <li>Langrenn</li>
        </ul>
    </div>
</article>
<script src="dist/js/bootstrap.js"></script>


</body>
</html>
