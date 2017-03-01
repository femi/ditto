<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");
require_once(__DIR__.'/get-all-users.php');


$connection = db_connect(); // the db connection
session_start();
$_SESSION['circleId'] = $_POST['circleId'];



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

// retrieving a user's friend circles
retrieve_friendcircle_name($_POST['circleId']);
print_users_FC($_POST['circleId']);

?>

Add a friend to current circle:


<form action="friend-circles-add.php" method="post">
    <select name="userId">
                    <?php
                    all_users();
                    ?>   
    </select>
    <input type="submit" value="Add">
</form>

Remove a friend from circle:
<form action="friend-circles-remove.php" method="post">
    <select name="userId">
        <?php
        all_users();
        ?>   
    </select>
    <input type="submit" value="Remove">
</form>


<form action="friend-circles-CRUD.php" method="post">
    <input type="submit" value="Back to CRUD">
</form>
