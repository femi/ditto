
<?php
session_start();
// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE

// Create new friend circle for a given logged in user
function make_request($userId) {

    $result = db_query("INSERT INTO friend_requests (userId, friendId) VALUES (".$userId.", ".$_SESSION['userId'].")");
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
    	echo 'Friend request made';
    }

}

make_request($_POST['friendId']);

?>

<form action="friend-requests.php" method="post">
    <input type="submit" value="Back to friend-requests">
</form>



