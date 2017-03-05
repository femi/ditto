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

            //only displays users apart from the logged in user
	         if ($userId != $_SESSION['userId']){echo '<option value="'.$userId.'">'.$userId.'. '.$fName.'</option>';}
    	}
    }

}

// gets all circles and echo's option for each circle
function all_circles() {
    $result = db_query("SELECT circleId, name FROM friendcircles");
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        return $results;
    	while($row = $result->fetch_assoc()){
	    	$circleId = $row['circleId'];
	    	$name = $row['name'];
	        echo '<option value="'.$circleId.'">'.$circleId.'. '.$name.'</option>';
    	}
    }

}

// gets user's circles and echo's option for each circle
function users_circles() {

    $result = db_query("SELECT * FROM friendCircles WHERE userId = ". $_SESSION['userId']);
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

//gets user's pending friend requests and echo's option for each request
function get_friendrequests() {

    $result = db_query("SELECT friendId FROM friend_requests WHERE userId = ". $_SESSION['userId']);
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
     
        while($row = $result->fetch_assoc()){
            $friendId = $row['friendId'];
            echo '<option value="'.$friendId.'">'.$friendId.'</option>';
        }
    }

}

//gets a list of all members that are not already friends with the user and echo's option for each request
function get_nonfriends() {

    $result = db_query("SELECT * FROM users WHERE userId NOT IN (SELECT userId FROM friendcircle_users WHERE circleId=(SELECT circleId from friendCircles WHERE userId =".$_SESSION['userId']." AND name='everyone'))");
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
     
        while($row = $result->fetch_assoc()){
            $userId = $row['userId'];
            $name = $row['fName'];
            echo '<option value="'.$userId.'">'.$userId.' '.$name.'</option>';
        }
    }

}


?>
