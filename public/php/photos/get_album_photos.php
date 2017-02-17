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

	// Retrieve data from request and escape.
	$userId = db_quote($_REQUEST['userId']);
	$albumId = db_quote($_REQUEST['albumId']);

	// TODO check that userId is allowed to view the album
	
	// build query - by default it selects just one.
	$query = "SELECT * FROM albums WHERE userId = $userId AND albumId = $albumId";

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
		$photo_files = scandir("../../../resources/album_content/$userId/$albumId");
	}

	$photo_files = array_diff($photo_files, array('.', '..')); // remove . and .. directories

	foreach($photo_files as $photo) {
		$file = "../../album_content/$userId/$albumId/$photo";
		echo "<img src=\"$file\" alt=\"Test\">";
	}
	

	
	// IGNORE FOR NOW - probably not a good idea to serve json files here.
	//$json_string = json_encode($photo_files);
	//echo $json_string;
	
}
get_album_photos();
?>
