<?php
session_start();
// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE

// Deletes request from outgoing friend requests
function retract_request($friendId) {


    $result = db_query("DELETE FROM friend_requests WHERE userId =". $friendId." AND friendId =".$_SESSION['userId']);
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {

        echo "request retracted";

    }

}

retract_request($_REQUEST['friendId']);

?>