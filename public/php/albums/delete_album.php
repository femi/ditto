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
	// $userId = db_quote($_REQUEST['userId']); TODO check user validity
	$albumId = db_quote($_REQUEST['albumId']);

    $query = "SELECT * FROM albums WHERE albumId = $albumId";
    $result = db_query($query);
    if ($result === false ) {
        echo mysqli_error(db_connect());
    }
    $userId;
    while ($row = $result->fetch_assoc()) {
        $userId = $row['userId'];
    }

	// build query
	$querytwo = "DELETE FROM albums WHERE albumId = $albumId";

	// Execute the query
	$qry_result = db_query($querytwo);

	if ($qry_result === false) {
		echo mysqli_error(db_connect());
	}

    $new_query = "DELETE FROM photos WHERE albumId = $albumId";
    $new_qry_result = db_query($new_query);

    if ($new_qry_result === false) {
        echo mysqli_error(db_connect());
    }
	
	// remove quotation marks.
	//$userId = (int) substr($userId, 1, strlen($userId) - 2);
	$albumId = (int) substr($albumId, 1, strlen($albumId) - 2);

	try {
		remove_directory("../../../resources/album_content/$userId/$albumId");
	} catch (Exception $e) {
		return $e;
	}	
	echo "albums";

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
