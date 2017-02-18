<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE

// Retrieve all blogs for a given userId
function retrieve_blog_content($userId) {
    $result = db_query("SELECT * FROM blogs WHERE userId = ". $userId);
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // nada
    }
    return $result;
}


// Print all a user's blogs given a userId
function print_users_blogs($userId) {
    echo 'Blog table: <br>';
    echo '<table>';
    $usersblogs = retrieve_blog_content(db_quote($userId));
    while($row = $usersblogs->fetch_assoc()){
        echo '<tr><td> '.$row['blogId'].' '.$row['content'].' '.$row['createdAt'] .' '.$row['updatedAt'].'</td></tr>';
    }
    echo '</table>';
}


// retrieving a user's blogs
echo "RETRIEVING A USER'S BLOGS FROM USERID PASSED BY FORM";
echo '<br>';
print_users_blogs($_POST['userId']);

?>
