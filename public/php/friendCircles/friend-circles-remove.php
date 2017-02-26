<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE

// Insert content into blogs table
function remove_friend($circleId, $userId) {

    $result = db_query("DELETE FROM friendcircle_users WHERE circleId =".db_quote($circleId)." AND userId=".db_quote($userId));

    if($result === false) {
    	while 
        echo mysqli_error(db_connect());
    } else {
        // insertion was successful, ooer.
        echo "<br>successfully inserted<br>" . $content . "into " . $userId. "'s blog";
        header('Location: friends-in-circle.php?circleId='.$circleId); exit();
    }

}

remove_friend($_POST['circleId'], $_POST['friendId']);

?>
