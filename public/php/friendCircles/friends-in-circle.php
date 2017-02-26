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

//Retrieve friend circle with given circleId
 function retrieve_friendcircle_name($circleId){
    $result = db_query("SELECT * FROM friendcircles WHERE circleId=".$circleId);
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // Print circle info 
        $row = $result->fetch_assoc();     
        echo  '<table border = "1px"><tr>
            <th>circleId</th>
            <th>userId</th>
            <th>name</th>
            <th>Created At</th>
            <th>UpdatedAt</th>
           </tr>
           <tr>
                <td> '.$row['circleId'].'</td>
                <td> '.$row['userId'].'</td>
                <td> '.$row['name'].'</td>
                <td> '.$row['createdAt'] .' </td>
                <td>'.$row['updatedAt'].'</td>
            </tr></table>
              ';

        echo '<br>';
    }

    return $result;
 }


// Print all friends's in friend circles given a circleId
function print_users_FC($circleId) {
    echo 'Friends from circle Id ='.$circleId.'<br>';
  
echo '<br>';

    echo '<table border = "1px">';
    echo  '<tr>
            <th>userId</th>
    		<th>fName</th>
    		<th>lName</th>
    		<th>Created At</th>
    		<th>UpdatedAt</th>
		   </tr>';
	// Print each entry as table row
    $friendcircle_friends = retrieve_friendcircle_friends(db_quote($circleId));
    while($row = $friendcircle_friends->fetch_assoc()){

        echo '<tr>
                <td> '.$row['userId'].'</td>
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

// retrieving a user's friend circles
retrieve_friendcircle_name($circle);
print_users_FC($circle);

?>
<p>Update friend-circles name:</p>
<form action="friend-circles-U.php" method="post">
    <input type="text" value="Enter a circleId" name="circleId"></input>
    <input type="text" value="Enter new name" name="newName"></input>
    <input type="submit" value="Rename">
</form>

<p>Add a friend to a circle:</p>
<form action="friend-circles-add.php" method="post">
    <input type="text" value="Enter a circleId" name="circleId"></input>
    <input type="text" value="Enter the userId of friend" name="friendId"></input>
    <input type="submit" value="Add">
</form>
<p>Remove a friend from circle:</p>
<form action="friend-circles-remove.php" method="post">
    <input type="text" value="Enter a circleId" name="circleId"></input>
    <input type="text" value="Enter the userId of friend" name="friendId"></input>
    <input type="submit" value="Remove">
</form>

<form action="friend-circles-CRUD.php" method="post">
    <input type="submit" value="Back to CRUD">
</form>
