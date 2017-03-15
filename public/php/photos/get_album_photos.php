<?php
// For use with AJAX request.

// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

/**
 * This function is called after dropzonejs has completed uploading photos.
 */
function get_album_photos() {
	$connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

	// Retrieve data from request and escape.
	// $userId = db_quote($_REQUEST['userId']); // userId for person trying to view data.
	$albumId = db_quote($_REQUEST['albumId']);
	$albumId = (int) substr($albumId, 1, strlen($albumId) - 2); // Get rid of quotation marks e.g. from '2' to 2.

    $username = db_quote($_REQUEST['username']);
	$username = substr($username, 1, strlen($username) - 2); // Get rid of quotation marks e.g. from '2' to 2.
	
	// build query - by default it selects just one.
	$query = "SELECT * FROM albums WHERE albumId = $albumId";

	// Execute the query
	$qry_result = db_query($query); 

	if ($qry_result === false) {
		// No such album.
		echo mysqli_error(db_connect());
	}

  $first = true;
	while($row = $qry_result->fetch_assoc()){
		// scan the directory given
		$userId = $row['userId'];
		$photo_files = scandir("../../../resources/album_content/$userId/$albumId");
	}

	$photo_files = array_diff($photo_files, array('.', '..')); // remove . and .. directories

	foreach($photo_files as $photoName) {
		$file = "../../album_content/$userId/$albumId/$photoName";
		echo "<div class=\"column is-3\"><div class=\"card\"><div class=\"card-image\"><figure class=\"image is-2by1\"><a href=\"/$username/albums/$albumId/$photoName\"><img class=\"photo-thumbnail\" src=\"$file\" alt=\"Test\"></a></figure></div></div></div>"; // TODO get captions
	}
    echo "</div>"; // close the columns div
	// IGNORE FOR NOW - probably not a good idea to serve json files here.
	//$json_string = json_encode($photo_files);
	//echo $json_string;
	
}
get_album_photos();
?>
