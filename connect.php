<?php
$mysqli = new mysqli("localhost", "test", "t35t", "test");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connection was unsuccessful: %s\n", $mysqli->connect_error);
    exit();
}

if (!$mysqli->set_charset("utf8")) {
    printf("Unable to set charset: %s\n", $mysqli->error);
}