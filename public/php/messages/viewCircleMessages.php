<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection
//session_start();
// -----------------------------------------------------------------------------


// display messages in inbox
function viewCircleMessages($circleId) {
    //$result = db_query('SELECT * from messages WHERE receiverId = '.$receiverId.';');
    $result = db_query('SELECT messageId, senderId, circleId, content, messages.createdAt, messages.updatedAt, fName, lName, username FROM messages, users WHERE messages.senderId = users.userId AND circleId =' . $circleId . 'ORDER BY createdAt;');

    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // nada
    }
    return $result;
}

// print users messages
function printCircleMessages($circleId) {
    echo 'Message table: <br>';
    echo '<table>';
    $circleMessages = viewCircleMessages(db_quote($circleId));
    while($row = $circleMessages->fetch_assoc()){
        echo '<tr>';
        echo '<td>'.$row['content'].'</td>';
        echo '<td>'.$row['createdAt'].'</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>'.$row['fName'];
        echo ' '.$row['lName'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
}

printCircleMessages($_POST['circleId']);

?>
