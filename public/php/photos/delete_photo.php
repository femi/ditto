<?php
// For use with AJAX request.

// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

function delete_photo() {

    $albumId = db_quote($_REQUEST['albumId']);
    $filename = db_quote($_REQUEST['photoName']);

	// TODO authenticate user owns album
	$connection = db_connect();

	if ($connection === false) {
		// Handle error
	}

    // Get the album's userID for file deletion.
    $query = "SELECT * FROM albums WHERE albumId = $albumId";
    $qry_result = db_query($query);

    if ($qry_result === false) {
        // No such album
        echo mysqli_error(db_connect());
    }

    while ($row= $qry_result->fetch_assoc()) {
        $userId = $row['userId'];
    }


    echo $userId;
	// $userId = (int) substr($userId, 1, strlen($userId) - 2);
	$albumId = (int) substr($albumId, 1, strlen($albumId) - 2);
	$filename = substr($filename, 1, strlen($filename) - 2);

	$target_file = "../../../resources/album_content/$userId/$albumId/$filename";

	if (file_exists($target_file)) {
		unlink($target_file); // deletes

        $new_query = "DELETE FROM photos WHERE albumId = '$albumId' AND filename = '$filename'";
        $new_query_result = db_query($new_query);

        if ($new_query_result === false) {
            echo mysqli_error(db_connect());
        }

        // redirect 
        header ("Location: http://localhost/albums/$albumId");
        exit;

	} else {
		echo "Cannot find file.";
	}
}
delete_photo();
?>
