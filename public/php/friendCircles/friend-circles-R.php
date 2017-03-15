<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");
$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE


// Retrieve all friend circles for a given userId
function retrieve_friend_circles($userId) {
  
    $result = db_query("SELECT * FROM friendCircles WHERE userId = $userId ORDER BY circleId DESC");

    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // nada
    }
    return $result;
}


// Print all a user's friend circles given a userId
function print_users_FC($userId) {

    echo '<table border = "1px">';
    echo  '<tr>
    		<th>circleId</th>
    		<th>name</th>
    		<th>Created At</th>
    		<th>UpdatedAt</th>
		   </tr>';

    // Print each entry as table row
    $usersFC = retrieve_friend_circles(db_quote($userId));
    while($row = $usersFC->fetch_assoc()){

    	$circleID = $row['circleId'];
        $name = $row['name'];
        if($name != "everyone"){
        echo '<tr>
	        	<td> '.$circleID.'</td>
	        	<td> '.$name.'</td>
	        	<td> '.$row['createdAt'] .' </td>
	        	<td> '.$row['updatedAt'].'</td>
	        </tr>';
        }
    }
    echo '</table>';
}


?>
