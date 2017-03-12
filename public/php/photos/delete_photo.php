<?php
// For use with AJAX request.

// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

function delete_photo() {
	// TODO authenticate user owns album
	$connection = db_connect();

	if ($connection === false) {
		// Handle error
	}

	$userId = db_quote($_POST['userId']);
	$albumid = db_quote($_POST['albumId']);
	$filename= db_quote($_POST['filename']);

	$userId = (int) substr($userId, 1, strlen($userId) - 2);
	$albumId = (int) substr($albumId, 1, strlen($albumId) - 2);
	$filename = substr($filename, 1, strlen($filename) - 2);

	$target_file = "../../../resources/album_content/$userId/$albumId/$filename";

	if (file_exists($target_file)) {
		unlink($target_file); // deletes
	} else {
		echo "Cannot find file.";
	}
}
delete_photo();
?>
