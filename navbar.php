<?php
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
                    /* TODO make this only show if user is signed in*/
                    $userIsSignedIn = true;
                    if($userIsSignedIn){
                        echo "<p class='navbar-text'>Signed in as: CoolKid69 </p>";
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
<?php } ?>