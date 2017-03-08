<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE

// Delete a blog from the table by userId and blogId
function delete_blog($userId, $blogId) {
    $result = db_query("DELETE FROM blogs WHERE blogId = ".db_quote($blogId)." AND userId = ".db_quote($userId));
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // echo "<br>success<br>";
        // echo "deleted blogId: ".$blogId;
        // echo "from userId: ".$userId;
    }
}

delete_blog($_POST['userId'], $_POST['blogId']);

?>
