<?php
// For use with AJAX request.

// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

function get_photo() {
	$connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

	// Retrieve data from request and escape.
	$userId = db_quote($_REQUEST['userId']);
	$photoId = db_quote($_REQUEST['photoId']);

	// TODO check that userId is allowed to view the album
	
	// build query - by default it selects just one.
	$query = "SELECT * FROM photos WHERE photoId = $photoId LIMIT 1";

	// Execute the query
	$qry_result = db_query($query); 

	if ($qry_result === false) {
		// No such album.
		echo mysqli_error(db_connect());
	}

	$userId = (int) substr($userId, 1, strlen($userId) - 2); // Get rid of quotation marks e.g. from '2' to 2.
	$photoId = (int) substr($photoId, 1, strlen($photoId) - 2); // Get rid of quotation marks e.g. from '2' to 2.

	while($row = $qry_result->fetch_assoc()){
		// scan the directory given
		$albumId = $row['albumId'];
		$filename = $row['filename'];
		$caption = $row['caption'];
		$photo_file = "../../../resources/album_content/$userId/$albumId/$filename";
		echo "<div class=\"photo-div\"><img src=\"$photo_file\" alt=\"$caption\"></div>";
	}
}
get_photo();
?>
