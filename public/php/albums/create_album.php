<?php

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");
require_once(realpath(dirname(__FILE__)) . "/retrieve_albumId.php");

function create_album() {
	$connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

	// Retrieve data from input and strip.
	$userId = db_quote($_REQUEST['userId']);
	$albumName = db_quote($_REQUEST['albumName']);

	// build query
	$query = "INSERT INTO albums (userId, albumName) VALUES ($userId, $albumName);";

	// Execute the query
	$qry_result = db_query($query);

	if ($qry_result === false) {
		echo mysqli_error(db_connect());
		return;
	}

	$userId = (int) substr($userId, 1, strlen($userId) - 2); // Get rid of quotation marks e.g. from '2' to 2.
	$albumName = substr($albumName, 1, strlen($albumName) - 2);

	// Create user's album directory if it's not already there.
	if (!file_exists("../../../resources/album_content/$userId")) {
		mkdir("../../../resources/album_content/$userId", 0777, true);
	}	
	
	// need to retrieve the albumId and make a directory
	$albumId = retrieve_albumId($userId, $albumName);
	if (!file_exists("../../../resources/album_content/$userId/$albumId")) {
		echo "Shit buddy";
		mkdir("../../../resources/album_content/$userId/$albumId", 0777, true);
	}
	echo "New album created!";
}

create_album();

?>
