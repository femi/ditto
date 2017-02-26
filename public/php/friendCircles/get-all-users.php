<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE


// gets all current users and echo's option for each user
function all_users() {
    $result = db_query("SELECT userId, fName FROM users");
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
     
    	while($row = $result->fetch_assoc()){
	    	$userId = $row['userId'];
	    	$fName = $row['fName'];
	        echo '<option value="'.$userId.'">'.$userId.'. '.$fName.'</option>';
    	}
    }

}

// gets all circles and echo's option for each circle
function all_circles() {
    $result = db_query("SELECT circleId, name FROM friendcircles");
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
     
    	while($row = $result->fetch_assoc()){
	    	$circleId = $row['circleId'];
	    	$name = $row['name'];
	        echo '<option value="'.$circleId.'">'.$circleId.'. '.$name.'</option>';
    	}
    }

}



?>
