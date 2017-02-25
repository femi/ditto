<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE


// Retrieve friends from a given friend circle
 function retrieve_friendcircle_friends($circleId){
 	$result = db_query("SELECT * FROM users WHERE userId IN (SELECT userId from friendcircle_users WHERE circleId=".$circleId.")");
 	if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // nada
    }
    return $result;
 }

// Print all friends's in friend circles given a circleId
function print_users_FC($circleId) {
    echo 'Friends from circle Id ='.$circleId.'<br>';
    echo '<br>';
 
    echo '<table border = "1px">';
    echo  '<tr>
    		<th>fName</th>
    		<th>lName</th>
    		<th>Created At</th>
    		<th>UpdatedAt</th>
		   </tr>';
	// Print each entry as table row
    $friendcircle_friends = retrieve_friendcircle_friends(db_quote($circleId));
    while($row = $friendcircle_friends->fetch_assoc()){

        echo '<tr>
	        	<td> '.$row['fName'].'</td>
	        	<td> '.$row['lName'].'</td>
	        	<td> '.$row['createdAt'] .' </td>
	        	<td>'.$row['updatedAt'].'</td>
	        </tr>
        	  ';
       	
    }
    echo '</table>';
}


if (isset($_POST['circleId'])){
    $circle = $_POST['circleId'];
} else {
    $circle = $_GET['circleId'];
}

// retrieving a user's FC
echo "RETRIEVING A USER'S FRIEND CIRCLES FROM USERID PASSED BY FORM";
echo '<br>';
print_users_FC($circle);

?>
<p>Add a friend to a circle:</p>
<form action="friend-circles-add.php" method="post">
    <input type="text" value="Enter a circleId" name="circleId"></input>
    <input type="text" value="Enter the userId of friend" name="friendId"></input>
    <input type="submit" value="Add">
</form>
