<?php
// For use with AJAX request.

// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

function upload_photo() {
	// TODO authenticate user owns album
	$connection = db_connect();

	if ($connection === false) {
		// Handle error
	}

	$userId = db_quote($_POST['userId']);
	$albumId = db_quote($_POST['albumId']);

	$userId = (int) substr($userId, 1, strlen($userId) - 2);
	$albumId = (int) substr($albumId, 1, strlen($albumId) - 2);

	$target_dir = "../../../resources/album_content/$userId/$albumId/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);

	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$_FILES['file']['name'])) {
		// Execute the db query.
		// $filename = $_FILES['name'];
		$filename = db_quote($_FILES['file']['name']);
		$query = "INSERT INTO photos (albumId, filename) VALUES ($albumId, $filename)";	
		$qry_result = db_query($query);

		if ($qry_result === false) {
			echo mysqli_error(db_connect());
			return;
		} else {
			$status = 1;
		}
	}
}
upload_photo();
?>
