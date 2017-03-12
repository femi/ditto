<?php
// For use with AJAX request.

// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

function update_photo_caption() {
	$connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

    // TODO check user is authorised.

	// Retrieve data from request and escape.
	// $userId = db_quote($_REQUEST['userId']);
	$filename= db_quote($_REQUEST['filename']);
	$caption = db_quote($_REQUEST['caption']);

	// TODO check that userId owns the album
	
	// build query - by default it selects just one.
	$query = "UPDATE photos SET caption = $caption WHERE filename = $filename;";

	// Execute the query
	$qry_result = db_query($query); 

	if ($qry_result === false) {
		// No such album.
		echo mysqli_error(db_connect());
	}

}
update_photo_caption();
?>
