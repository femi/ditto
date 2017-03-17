<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");
// session_start();
$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE

// accept friend request and add accepted friend to users 'everyone' circle - for both users
function accept_request($friendId) {

	 
    $result = db_query("INSERT INTO friendcircle_users (circleId, userId) VALUES ((SELECT circleId from friendcircles WHERE userId =".$_SESSION['userId']." AND name='everyone'), ".db_quote($friendId).")");

    $result1 = db_query("INSERT INTO friendcircle_users (circleId, userId) VALUES ((SELECT circleId from friendcircles WHERE userId =".db_quote($friendId)." AND name='everyone'), ".$_SESSION['userId'].")");

    if($result === false OR $result1 === false) {
        echo mysqli_error(db_connect());
    } else {
        // insertion was successful, ooer.
        echo "successfully added<br>";

    }

}


// Deletes request from incoming friend requests
function delete_request($friendId) {
	

    $result = db_query("DELETE FROM friend_requests WHERE userId =".$_SESSION['userId']." AND friendId =". $friendId);
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
      
        echo "request deleted";

    }

}


// Deletes request from outgoing friend requests
function retract_request($friendId) {
    

    $result = db_query("DELETE FROM friend_requests WHERE userId =". $friendId." AND friendId =".$_SESSION['userId']);
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
      
        echo "request retracted";

    }

}

//to delete a friend for both users everyone circle.
function delete_friend($friendId) {

    $result = db_query("DELETE FROM friendcircle_users WHERE userId =".$friendId." AND circleId IN (SELECT circleId from friendCircles WHERE userId =".$_SESSION['userId'].")");

    $result1 = db_query("DELETE FROM friendcircle_users WHERE userId =".$_SESSION['userId']." AND circleId =(SELECT circleId from friendCircles WHERE userId =".$friendId." AND name='everyone')");
    
    if($result === false OR $result1 === false)  {
        echo mysqli_error(db_connect());
    } else {
      
        echo "Friendship has sunk";

    }

}

$username = $_SESSION['username'];

if (isset($_POST['accept'])) {
    accept_request($_POST['friendId']);
    delete_request($_POST['friendId']);
    header ("Location: /$username/friends");
}

if (isset($_POST['delete'])) {
    delete_request($_POST['friendId']);
    header ("Location: /$username/friends");
}

if (isset($_POST['retract'])) {
    retract_request($_POST['friendId']);
    header ("Location: /$username/friends");
}

if (isset($_POST['abolish'])) {

    delete_friend($_POST['friendId']);
    header ("Location: /$username/friends/all");
}

?>
<!-- <br>
<form action="../friends" method="post">
    <input type="submit" value="Back to friend-requests">
</form> -->