<?php

// escapes the user input so no SQL injection possible
function db_quote($value) {
    include 'db_connect.php';
    $connection = db_connect();
    return "'" . mysqli_real_escape_string($connection,$value) . "'";
}

?>
