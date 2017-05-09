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
            <a class="navbar-brand" href="#">HOME</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <div id="log-head">
                <ul class="nav navbar-nav navbar-right">
                    <p class="navbar-text">Signed in as: </p>
                    <li><button type="button" class="btn btn-success" data-toggle="modal" data-target=".Login">Log In</button></li>
                    <li><button type="button" class="btn btn-group-justified" onclick="window.location.href='/SkiVM/RegInfo.php'" data-toggle="modal" data-target=".Registrer">Registrer</button></li>
            </div>
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
    <div id="regist">
    <form action="confirm.php" method="get">
        <div id="TextTBox">Brukernavn:</div>     <input type="text" name="username" placeholder="Username" ><br><br>
        <div id="TextTBox">Passord:</div>        <input type="password" placeholder="Password" name="password"><br><br>
        <div id="TextTBox"> Navn:</div>          <input type="text" name="name" pattern="[A-Za-z]{2,10}$" title="Trenger mellom 1-10 bokstaver" placeholder="Name"><br><br>
        <div id="TextTBox">E-mail:</div>         <input type="text" name="email"pattern="[a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" title="Ugyldig epost adresse" placeholder="E-mail"><br><br>
        <div id="TextTBox">Telefon nummer:</div> <input type="text" name="phoneNumber" pattern="[0-9/-]{5,13}" title="Telefonnummer er ugyldig" placeholder="Phonenumber"><br><br>
        <input type="submit" value="Bestill">
    </form>
    </div>
    <!-- Registrer Modal --><!--
    <div class="modal fade Registrer" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-lg" role="document">

            <div class="modal-content">
                <div id="modal">
                    <h2 class="h2">Registrer</h2>
                    <input type="text" placeholder="Username" onsubmit="catch "><br>
                    <input type="password" placeholder="Password" onsubmit="catch ">
                    <br>
                    <div id="log-head">
                        <button class="btn btn-success" type="submit">Create user</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    -->
</article>
<script src="dist/js/bootstrap.js"></script>


</body>
</html>