<?php

// removed this as it caused a problem with session.php 26/02/17
//require_once(realpath(dirname(__FILE__)) . "/db_connect.php");

// escapes the user input so no SQL injection possible
function db_quote($value) {
    $connection = db_connect();
    return "'" . mysqli_real_escape_string($connection,$value) . "'";
}

?>
