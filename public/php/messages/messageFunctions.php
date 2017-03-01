<?php


// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");
//require_once(realpath(dirname(__FILE__)) . "../home/session.php"); breaks if this is included here
//session_start();

$connection = db_connect(); // the db connection

// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE

// https://www.phpclasses.org/blog/package/3213/post/1-Tutorial-on-Creating-an-AJAX-based-Chat-system-in-PHP.html
// display messages in


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

// display messages in inbox
function viewUserReceived($receiverId) {
    $result = db_query('SELECT * from messages WHERE receiverId = '.$receiverId.';');
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // nada
    }
    return $result;
}

// display only the most recent message with a senderId
// then display all the messages with that particular receiverId on


// select * from messages where senderId = SESSIONUSER or receiverId = SESSIONUSER
//      ORDER BY createdAt




?>
