<?php
session_start();
session_regenerate_id();
if (!isset($_SESSION['login_user']))      // if there is no valid session
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
        <?php
        $db = new mysqli("student.cs.hioa.no", "s315584", "", "s315584");
        if ($db->connect_error) {
            echo $db->connect_error;
            die("Kunne ikke koble til databasen");
        }

        $sql = "SELECT * from users";
        $resultat = mysqli_query($db, $sql);

        echo "<table class=\"table\" id=\"table-props\">";
        echo "<thead class=\"thead-inverse\"><tr><th> # </th><th> Brukernavn: </th><th> Navn: </th><th> Email: </th><th> Tlf. nr.: </th><th> Adresse </th></tr></thead>";
        while ($row = mysqli_fetch_array($resultat)) {   //Creates a loop to loop through results
            echo "<tr><th >" . $row['userid'] . "</th><td >" . $row['username'] . "</td><td>" . $row['fullnavn'] . "</td><td>";
            echo $row['email'] . "</td><td>" . $row['phonenr'] . "</td><td>" . $row['address'] . "</td></tr>";
        }
        echo "</table>";
        ?>
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
                    <form action="admin.php" method="get">
                        <div id="TextTBox">Øvelse: </div>     <input type="text" name="ovelse" placeholder="Skriv øvelse her.." ><br><br>
                        <input type="submit" value="Registrer">
                    </form>

            </div>
            </td>
            <td>
                <div id="tabellAtleter">
                    <!-- TODO legg inn form til Atleter-->
                    <form action="admin.php" method="get">
                        <div id="TextTBox">Atlet:</div>     <input type="text" name="atlet" placeholder="Skriv atlet her.." ><br><br>

                        <input type="submit" value="Registrer">
                    </form>
                </div>
            </td>
        </tr>

        <tr>
            <td id="T">
                <div id="tabellBrukere">
                    <!-- TODO Legg inn tabell til Øvelser-->
                    <?php
                    $sql = "SELECT * from sports";
                    $resultatOvelse = mysqli_query($db, $sql);

                    echo "<table class=\"table\" id=\"table-props\">";
                    echo "<thead class=\"thead-inverse\"><tr><th> # </th><th> Øvelse: </th></tr></thead>";
                    while ($row = mysqli_fetch_array($resultatOvelse)) {   //Creates a loop to loop through results
                    echo "<tr><th>" . $row['sportid'] . "</th><td >" . $row['sportname'] . "</td></tr>";
                    }
                    echo "</table>";
                    ?>

                </div>
            </td>
            <td id="B">
                <div id="tabellBrukere">
                    <!-- TODO legg inn tabell til Atleter-->
                    <?php
                    $sql = "SELECT * from athletes";
                    $resultatAtlet = mysqli_query($db, $sql);

                    echo "<table class=\"table\" id=\"table-props2\">";
                    echo "<thead class=\"thead-inverse\"><tr><th> # </th><th> Atlet: </th></tr></thead>";
                    while ($row = mysqli_fetch_array($resultatAtlet)) {   //Creates a loop to loop through results
                        echo "<tr><th>" . $row['athleteid'] . "</th><td >" . $row['athletename'] . "</td></tr>";
                    }
                    echo "</table>";
                    ?>

                </div>
            </td>
        </tr>
    </table>
</article>

<script src="dist/js/bootstrap.js"></script>
<?php
mysqli_close($db);
?>

</body>
</html>