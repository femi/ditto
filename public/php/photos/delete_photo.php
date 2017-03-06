<?php
// For use with AJAX request.

// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

function delete_photo($username, $userId, $albumId, $filename) {

	$connection = db_connect();

	if ($connection === false) {
		// Handle error
	}

	// $userId = (int) substr($userId, 1, strlen($userId) - 2);
	//$albumId = (int) substr($albumId, 1, strlen($albumId) - 2);
	//$filename = substr($filename, 1, strlen($filename) - 2);
    echo "<pre>";

	$target_file = "../resources/album_content/$userId/$albumId/$filename";
    // echo $target_file;

	if (file_exists($target_file)) {
		unlink($target_file); // deletes

        $new_query = "DELETE FROM photos WHERE albumId = '$albumId' AND filename = '$filename'";
        $new_query_result = db_query($new_query);

        if ($new_query_result === false) {
            echo mysqli_error(db_connect());
        }

        // redirect 
        header ("Location: /$username/albums/$albumId");
        exit;

	} else {
		echo "Cannot find file.";
	}
}
?>
