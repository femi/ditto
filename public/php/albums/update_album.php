<? php

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

function update_album() {
	$connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

	// Retrieve data from input and strip.
	$userId = db_quote($_REQUEST['userId']);
	$albumId = db_quote($_REQUEST['albumId']);
	$albumName = db_quote($_REQUEST['albumName']);

	// build query
	$query = "UPDATE albums SET albumName = $albumName WHERE userId = $userId AND albumId = $albumId";

	// Execute the query
	$qry_result = db_query($query);

	if ($qry_result === false) {
		echo mysqli_error(db_connect());
	}
}
update_album();
?>
