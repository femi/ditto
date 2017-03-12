<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE

// Remove all friends from a given circleId
function remove_all_friend($circleId) {

    $result = db_query("DELETE FROM friendcircle_users WHERE circleId =".db_quote($circleId));

    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        //
    }

}


// Delete a circle by circleId
function delete_circle($circleId) {
    $result = db_query("DELETE FROM friendcircles WHERE circleId = ".db_quote($circleId));
   
    if($result === false) {
        echo mysqli_error(db_connect());
        echo '<br>PLEASE REMOVE ALL USERS WITHIN FRIEND CIRCLE FIRST';
    } else {
        echo "<br>success<br>";
        echo "deleted circleId: ".$circleId;
    }
}
remove_all_friend($_POST['circleId']);
delete_circle($_POST['circleId']);

?>
<form action="../circles" method="post">
    <input type="submit" value="Back to CRUD">
</form>
