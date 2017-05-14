<?php
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
    <h1 id="tittleAdmin">Registrer Bruker</h1>
    <div id="regist">
    <form action="confirm.php" method="get">
        <div id="TextTBox">Brukernavn:</div>     <input type="text" name="username" pattern="[a-zæøåA-ZÆØÅ]{3,12}" title="Brukernavn mellom 3 og 12 bokstaver" placeholder="Username" ><br><br>
        <div id="TextTBox">Passord:</div>        <input type="password" pattern="[0-9A-Za-z%@!$#]{6,20}" title="Passord må være mellom 6 og 20 tegn" placeholder="Password" name="password"><br><br>
        <div id="TextTBox"> Navn:</div>          <input type="text" name="name" pattern="[a-zæøåA-ZÆØÅ][a-zæøåA-ZÆØÅ. ]{4,22}" title="Trenger mellom 4-22 bokstaver" placeholder="Name"><br><br>
        <div id="TextTBox">E-mail:</div>         <input type="text" name="email"pattern="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" title="Ugyldig epost adresse" placeholder="E-mail"><br><br>
        <div id="TextTBox">Telefon nummer:</div> <input type="text" name="phonenumber" pattern="\d{8}" title="Telefonnummer er ugyldig, venligst bruk 8 siffer" placeholder="Phonenumber"><br><br>
        <div id="TextTBox"> Addresse:</div>          <input type="text" name="address" pattern="[0-9a-zæøåA-ZÆØÅ.- ]{4,40}" title="Trenger mellom 4-40 bokstaver" placeholder="Name"><br><br>
        <input type="submit" value="Registrer">
    </form>
    </div>
</article>
<script src="dist/js/bootstrap.js"></script>


</body>
</html>