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

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Brand</a>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">Small modal</button>
            <p class="navbar-text">Signed in as Mark Otto</p>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
                <li><a href="#">Hjem</a> </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<article id="upper">
    <!-- Small modal -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm" role="document">

            <div class="modal-content">
                <div id="modal">
                <h2 class="h2">Log In</h2>
                <input type="text" placeholder="Username" onsubmit="catch ">
                <input type="password" placeholder="Password" onsubmit="catch ">
                    <br>
                    <button type="submit">Log in</button>
            </div>
            </div>
        </div>
    </div>
</article>
<script src="dist/js/bootstrap.js"></script>


</body>
</html>
