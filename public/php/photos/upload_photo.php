<?php
// For use with AJAX request.

// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

function get_album_photos() {
	$connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

	// Retrieve data from GET request and escape.
	$userId = db_quote($_GET['userId']);

	// build query - by default it selects just one.
	$query = "SELECT * FROM albums WHERE userId = $userId";

	// Order results descending for now
	$query .= " ORDER BY createdAt DESC";
	
	// Execute the query
	$qry_result = db_query($query); 

	if ($qry_result === false) {
		echo mysqli_error(db_connect());
	}
	
	// TODO encapsulate into print function.
	$result = 'Album table: <br>';
	$result .= '<img src="../../img/invalid.png" alt="Test" onclick="Hi">';
	$result .= '<table>';
	while($row = $qry_result->fetch_assoc()){
	        $result .= '<tr><td> '.$row['albumId'].' '.$row['userId'].' '.$row['albumName'].' '.$row['createdAt'] .' '.$row['updatedAt'].'</td></tr>';
	}
	$result .= '</table>';
	echo $result;
	
}
retrieve_user_albums();
?>
