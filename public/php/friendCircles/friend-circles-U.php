<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE


// Update circle name
function update_circle($circleId, $name) {
    $result = db_query("UPDATE friendcircles SET name = ".db_quote($name)." WHERE circleId = ".db_quote($circleId));
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        echo "<br>successfully updated<br>";
        echo 'circleId = '.$circleId;
        echo 'name = '.$name;
        
    }

}

update_circle($_POST['circleId'], $_POST['newName']);

?>
<br>
<form action="../circles" method="post">
    <input type="submit" value="Back to CRUD">
</form>