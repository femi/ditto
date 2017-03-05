<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");
session_start();
$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE

// add accepted friend to users 'everyone' circle 
function accept_request($friendId) {


	//$circleId = db_query("SELECT circleId from friendCircles WHERE userId =".$_SESSION['userId']." AND name='everyone'");
	 
    $result = db_query("INSERT INTO friendcircle_users (circleId, userId) VALUES ((SELECT circleId from friendCircles WHERE userId =".$_SESSION['userId']." AND name='everyone'), ".db_quote($friendId).")");
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // insertion was successful, ooer.
        echo "<br>successfully inserted<br>";

    }

}


// Deletes request from 
function delete_request($friendId) {
	

    $result = db_query("DELETE FROM friend_requests WHERE userId =".$_SESSION['userId']." AND friendId =". $friendId);
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
      
        echo "<br>success<br>";

    }

}

accept_request($_POST['friendId']);
delete_request($_POST['friendId']);

?>
<br>
<form action="friend-requests.php" method="post">
    <input type="submit" value="Back to friend-requests">
</form>