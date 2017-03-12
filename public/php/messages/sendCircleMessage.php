<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection
// -----------------------------------------------------------------------------

// send message
// for circles - senderId, circleId, content
function sendCircleMessage($senderId, $circleId, $content) {
    $result = db_query('INSERT INTO messages (senderId, circleId, content) VALUES('.$senderId.','.$circleId.','.$content.')');
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // nada
    }
    return $result;
}


sendCircleMessage($_POST['senderId'], $_POST['circleId'], db_quote($_POST['circleMessage']));

?>
