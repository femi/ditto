<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE

// Create new friend circle for a given user
function insert_circle($userId, $circleName) {

    $result = db_query("INSERT INTO friendcircles (userId, name) VALUES (".db_quote($userId).", ".db_quote($circleName).")");
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // insertion was successful, ooer.
        echo "<br>successfully created <br>" . $circleName . " into " . $userId. "'s circles";
        header('Location: friend-circles-R.php?userId='.$userId); exit();
    }

}

insert_circle($_POST['userId'], $_POST['circleName']);

?>