<?php


// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");
//require_once(realpath(dirname(__FILE__)) . "../home/session.php"); breaks if this is included here
//session_start();

$connection = db_connect(); // the db connection

// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE


// Adds a comment given a blogId
function add_comment($blogId, $userId, $message) {
    $result = db_query('INSERT INTO comments(message, userId, blogId) VALUES ('.db_quote($message).', '.$userId.', '.$blogId.')');
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {

        // nada
    }
    return $result;
}

echo 'Adding comment to blogId..' . $_POST['blogId'].'<br>';
//echo 'UserID default to 1 at present<br>';
add_comment($_POST['blogId'], $_POST['userId'], $_POST['message']);

?>
