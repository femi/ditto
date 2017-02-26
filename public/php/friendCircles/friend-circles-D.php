<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE

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

delete_circle($_POST['circleId']);

?>


<form action="friend-circles-CRUD.php" method="post">
    <input type="submit" value="Back to CRUD">
</form>
