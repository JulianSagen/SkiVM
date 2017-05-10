<?php
$db = new mysqli("student.cs.hioa.no", "s315584", "", "s315584");
if ($db->connect_error) {
    echo $db->connect_error;
    die($db->connect_error);
}