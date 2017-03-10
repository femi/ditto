<?php

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

function delete_album() {
	$connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

	// Retrieve data from input and strip.
	$userId = db_quote($_REQUEST['userId']);
	$albumId = db_quote($_REQUEST['albumId']);

	// build query
	$query = "DELETE FROM albums WHERE userId = $userId AND albumId = $albumId";

	// Execute the query
	$qry_result = db_query($query);

	if ($qry_result === false) {
		echo mysqli_error(db_connect());
		return;
	}
	
	// remove quotation marks.
	$userId = (int) substr($userId, 1, strlen($userId) - 2);
	$albumId = (int) substr($albumId, 1, strlen($albumId) - 2);

	try {
		remove_directory("../../../resources/album_content/$userId/$albumId");
	} catch (Exception $e) {
		echo "Could not delete album directory.";
		return;
	}	
	echo "\nRemoved album succesfully.";

}

function remove_directory($path) {
	// Used to delete the photos inside an album directory and the album directory itself.
	$files = glob($path . '/*');
	foreach ($files as $file) {
		is_dir($file) ? remove_directory($file) : unlink($file);
	}
	rmdir($path);
	return;
}

delete_album();
?>
