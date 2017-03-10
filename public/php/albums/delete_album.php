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
	$albumId = db_quote($_REQUEST['albumId']);
	$albumId = (int) substr($albumId, 1, strlen($albumId) - 2);

    $query = "SELECT * FROM albums WHERE albumId = $albumId";
    $result = db_query($query);

    if ($result === false ) {
        echo mysqli_error(db_connect());
    }
    while ($row = $result->fetch_assoc()) {
        $userId = $row['userId'];
    }

    // need to get photoId to delete the photo comments
    $photoIdQuery = "SELECT photoId from photos WHERE albumId = $albumId";
    $photoIdQueryResult = db_query($photoIdQuery); 

    if ($photoIdQueryResult === false) {
        echo mysqli_error(db_connect());
    } 

    while ($row = $photoIdQueryResult->fetch_assoc()) {
        // delete every photo's comments
        $photoId = $row['photoId'];

        $deleteQuery = "DELETE FROM comments WHERE photoId = $photoId";
        $deleteQueryResult = db_query($deleteQuery);

        if ($deleteQueryResult === false) {
            mysqli_error(db_connect());
        }
    
    }

    // now delete the photo records;
    $querytwo = "DELETE FROM photos WHERE albumId = $albumId";
    $querytwoResult = db_query($querytwo);
 
    if ($querytwoResult === false) {
        echo mysqli_error(db_connect());
    }

    $querythree = "DELETE FROM album_friendcircles WHERE albumId = $albumId";
    $querythreeResult = db_query($querythree);

    if ($querytwoResult === false) {
        echo mysqli_error(db_connect());
    }

 	$queryfour = "DELETE FROM albums WHERE albumId = $albumId";
 	$queryfourResult = db_query($queryfour);
 
 	if ($queryfourResult === false) {
 	    echo mysqli_error(db_connect());
    }
 	
 
 	try {
 		remove_directory("../../../resources/album_content/$userId/$albumId");
 	} catch (Exception $e) {
 		return $e;
 	}	

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
