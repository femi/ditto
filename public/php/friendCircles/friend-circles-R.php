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
    $result = db_query("SELECT * FROM friendCircles WHERE userId = ". $userId);
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
        echo '<tr>
	        	<td> '.$circleID.'</td>
	        	<td> '.$row['name'].'</td>
	        	<td> '.$row['createdAt'] .' </td>
	        	<td>'.$row['updatedAt'].'</td>
	        </tr>';
    }
    echo '</table>';
}

if (isset($_POST['userId'])){
    $user = $_POST['userId'];
} else {
    $user = $_GET['userId'];
}

// retrieving a user's FC
echo 'Friend circles of userId:'.$user.' <br><br>';
print_users_FC($user);

?>

<?php
    require_once(__DIR__.'/get-all-users.php');
?> 

<!-- form to obtain circleID to view friends in circle -->
Retrieve 'friends' friend-circles :
<form action="friends-in-circle.php" method="post">
    <select name="circleId">
        <?php
        all_circles();
        ?>   
    </select>
    <input type="submit" value="Retrieve">
</form>
Delete circle:
<form action="friend-circles-D.php" method="post">
    <select name="circleId">
        <?php
        all_circles();
        ?>   
    </select>
    <input type="submit" value="Delete">
</form>
<form action="friend-circles-CRUD.php" method="post">
    <input type="submit" value="Back to CRUD">
</form>
