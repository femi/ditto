<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection

// -----------------------------------------------------------------------------



// Returns all the blogs from db.
// Probably not a good idea when this is massive!
function retrieve_all_blogs() {
    $result = db_query("SELECT * FROM blogs");
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // retrieval was successful
    }
    return $result;
}

// Prints all the blogs in table, format:
// blogId, content, createdAt, updatedAt
function print_blogs() {
    echo 'Blog table: <br>';
    echo '<table>';
    $blogs = retrieve_all_blogs();
    while($row = $blogs->fetch_assoc()){
        echo '<tr><td> '.$row['blogId'].' '.$row['content'].' '.$row['createdAt'] .' '.$row['updatedAt'].'</td></tr>';
    }
    echo '</table>';
    echo '<br><br>';
}


print_blogs();



?>
