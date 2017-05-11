<?php
//log out function
session_start();
session_destroy();
header("Location: index.php");