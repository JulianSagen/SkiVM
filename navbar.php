<?php
session_start();
session_regenerate_id();

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
                        echo "<p class='navbar-text'>Logget inn som: " . $_SESSION['login_user'] . "</p>";
                    }
                    ?>

                    <li>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target=".Login">Logg På
                        </button>
                    </li>
                    <li>
                        <button id="regBtn" type="submit" class="btn btn-default"
                                onclick="window.location.href='Registrer.php'" data-toggle="modal"
                                data-target=".Registrer">Registrer
                        </button>
                    </li>
                    <?php
                    $dropdown = isset($_SESSION['login_user']);
                    if($dropdown){?>
                    <li id="dropdown" class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <?php
                            /* TODO make this only show if user is an admin*/
                            /* if ($_SESSION['user_type']=="Admin"){ */
                            if (isset($_SESSION['login_user'])) {
                                echo "<li><a href=\"admin.php\">Admin</a></li>";
                            }

                            ?>
                            <li><a href="Profile.php">Profil</a></li>
                            <li><a href="logout.php">Logg Ut</a></li>
                        </ul>
                    </li
                        <?php }
                        ?>
                </ul>
            </div>
        </div>
    </nav>
<?php }
?>