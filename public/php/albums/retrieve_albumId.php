<?php
// For use with AJAX request.

// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

/**
 * This function should only be called straight after creating a new album, as it 
 * gets the most recently created album with the given name.
 */
function retrieve_albumId($userId, $albumName) {
	// Called after creating an album to get the 
	$connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

	// build query - by default it selects just one.
	$query = "SELECT * FROM albums WHERE userId = '$userId' AND albumName = '$albumName'";

	// Order results descending for now
	$query .= " ORDER BY createdAt DESC LIMIT 1";
	
	// Execute the query
	$qry_result = db_query($query); 

	if ($qry_result === false) {
		echo mysqli_error(db_connect());
		return;
	}
	
	while($row = $qry_result->fetch_assoc()){
	        return $row['albumId'];
	}
	
}
?>
