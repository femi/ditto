<?php

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

/**
 * This function is called using AJAX and changes an album's privacy settings to friends (0), friendcircles (1), or friends of friends (2)
 */
function addAlbumFriendCircle() {
    $albumId = db_quote($_REQUEST['albumId']);
    $circleId = db_quote($_REQUEST['circleId']);

	$albumId = (int) substr($albumId, 1, strlen($albumId) - 2); // Get rid of quotation marks e.g. from '2' to 2.
    $circleId = (int) substr($circleId, 1, strlen($circleId) - 2); // Get rid of quotation marks e.g. from '2' to 2.

	$connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}


	// build query
	$query = "INSERT INTO album_friendcircles (albumId, circleId) VALUES ($albumId, $circleId)";

	// Execute the query
	$qry_result = db_query($query);

	if ($qry_result === false) {
		echo mysqli_error(db_connect());
		return;
	}

}
addAlbumFriendCircle();
?>
