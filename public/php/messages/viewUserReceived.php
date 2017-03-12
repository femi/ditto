<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection
//session_start();
// -----------------------------------------------------------------------------


// display messages in inbox
function viewUserReceived($receiverId) {
    //$result = db_query('SELECT * from messages WHERE receiverId = '.$receiverId.';');
    $result = db_query('SELECT messageId, senderId, receiverId, content, messages.createdAt, messages.updatedAt, fName, lName, username FROM messages, users WHERE messages.senderId = users.userId AND messages.receiverID = '.$receiverId.' ORDER BY createdAt;');
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // nada
    }
    return $result;
}

// print users messages
function printUserReceived($receiverId) {
    echo 'Message table: <br>';
    echo '<table>';
    $usersMessages = viewUserReceived(db_quote($receiverId));
    while($row = $usersMessages->fetch_assoc()){
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

printUserReceived($_POST['receiverId']);

?>
