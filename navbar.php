<?php
session_start();
if(true){ ?>
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
                    /* this only show if user is signed in*/
                    if (isset($_SESSION['login_user'])) {
                        $user = $_SESSION['login_user'];
                        echo "<p class='navbar-text'>Signed in as: " . $user . "</p>";
                    }
                    ?>

                    <li>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".Login">Log In
                        </button>
                    </li>
                    <li>
                        <button id="regBtn" type="submit" class="btn btn-default"
                                onclick="window.location.href='Registrer.php'" data-toggle="modal"
                                data-target=".Registrer">Registrer
                        </button>
                    </li>
                    <li id="dropdown" class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Menu
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <?php
                            /* TODO make this only show if user is an admin*/
                            if (isset($_SESSION['login_user'])) {
                                echo "<li><a href=\"admin.php\">Admin</a></li>";
                            }

                            ?>
                            <li><a href="#">Profil</a></li>
                            <li><a href="#">Logg Ut</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
<?php }
?>