<?php

require_once(realpath(dirname(__FILE__)) . "/db_connect.php");

// escapes the user input so no SQL injection possible
function db_quote($value) {
    $connection = db_connect();
    return "'" . mysqli_real_escape_string($connection,$value) . "'";
}

?>
