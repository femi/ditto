<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection
//session_start();

/**
 * Display messages in inbox
 */
function viewUserReceived($receiverId) {
    //$result = db_query('SELECT * from messages WHERE receiverId = '.$receiverId.';');
    $result = db_query("SELECT messageId, senderId, receiverId, content, messages.createdAt, messages.updatedAt, fName, lName, username FROM messages, users WHERE messages.senderId = users.userId AND messages.receiverID = $receiverId ORDER BY createdAt");
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // nada
    }
    return $result;
}

// print users messages
function printUserReceived($receiverId) {
    $usersMessages = viewUserReceived(db_quote($receiverId));
    while($row = $usersMessages->fetch_assoc()){
        $fName = $row['fName'];
        $lName = $row['lName'];
        $username = $row['username'];
        $content = $row['content'];
        $updatedAt = $row['updatedAt'];

        echo "<div class=\"box\"><article class=\"media\"><div class=\"media-left\"><figure class=\"image is-32x32\"><img src=\"\"></figure></div><div class=\"media-content\"><div class=\"content\"><p><st        rong>$fName $lName</strong><small>$username</small><small>$updatedAt</small><br>$content</p></div></div></article></div>";}
}

printUserReceived($_POST['receiverId']);

?>
