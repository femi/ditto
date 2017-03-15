<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

// $connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE

// Insert content into blogs table
function insert_blog($userId, $content) {

    $result = db_query("INSERT INTO blogs (userId, content) VALUES (".db_quote($userId).", ".db_quote($content).")");
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // insertion was successful, ooer.
        // echo "<br>successfully inserted<br>" . $content . "into " . $userId. "'s blog";
    }

}

if (isset($_POST['blogEntry'])) {
  insert_blog($_SESSION['userId'], $_POST['blogEntry']);
  header("Location: /");
}

?>
