<?php
// For use with AJAX request.

// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

function get_album_photo($userId, $albumId) {
	$connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

	// Retrieve data from request and escape.
//	$userId = db_quote($userId);
	$albumId = db_quote($albumId);

	// TODO check that userId is allowed to view the album
	
	// build query - by default it selects just one.
	$query = "SELECT * FROM photos WHERE albumId = $albumId ORDER BY createdAt DESC";

	// Execute the query
	$qry_result = db_query($query); 

	if ($qry_result === false) {
		// No such album.
		echo mysqli_error(db_connect());
	}

	$userId = (int) substr($userId, 1, strlen($userId) - 2); // Get rid of quotation marks e.g. from '2' to 2.
	$albumId = (int) substr($albumId, 1, strlen($albumId) - 2); // Get rid of quotation marks e.g. from '2' to 2.

	while($row = $qry_result->fetch_assoc()){
		// scan the directory given
		$filename = $row['filename'];
		$caption = $row['caption'];
		$photo_file = "../../../../album_content/$userId/$albumId/$filename";
        if (file_exists("../../../resources/album_content/$userId/$albumId/$filename")) {
		    return "<a href=\"../../albums/$albumId\"><img src=\"$photo_file\" alt=\"$caption\"></a>";
        } else {
            // return default picture
            return "<a href=\"../../albums/$albumId\"><img src=\"../../img/default.jpg\" alt=\"Currently no photos inside album.\"></a>";
        }
	}
}
?>
