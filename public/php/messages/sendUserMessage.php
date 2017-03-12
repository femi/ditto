



<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection
// -----------------------------------------------------------------------------


// send message
// for individual - senderId, receiverId, content
function sendUserMessage($senderId, $receiverId, $content) {
    $result = db_query('INSERT INTO messages (senderId, receiverId, content) VALUES('.$senderId.','.$receiverId.','.$content.')');
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // nada
    }
    return $result;
}

sendUserMessage($_POST['senderId'], $_POST['receiverId'], db_quote($_POST['message']));


?>
