<?php
// For use with AJAX request.

// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

/**
 * @param $userId: The userId of the album owner.
 * @param $albumId: The album from which to get the photos.
 * @param $username: The username of the album owner
 * This function gets all photos from the given albumId, returning them in the form of <img> 
 * tags and <a> tags linking them to the correct URL route. 
 * If no photos are found in the album, then it returns a default image.
 */
function get_album_photo($userId, $albumId, $username) {
	$connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

	// Retrieve data from request and escape.
//	$userId = db_quote($userId);
	$albumId = db_quote($albumId);

	// TODO check that userId is allowed to view the album
	
	// build query - by default it selects just one.
	$query = "SELECT * FROM photos WHERE albumId = $albumId ORDER BY createdAt DESC";

	// Execute the query
	$qry_result = db_query($query); 
    
    $userId = (int) substr($userId, 1, strlen($userId) - 2); // Get rid of quotation marks e.g. from '2' to 2.
	$albumId = (int) substr($albumId, 1, strlen($albumId) - 2); // Get rid of quotation marks e.g. from '2' to 2.

	if ($qry_result === false) {
		// No such album.
		echo mysqli_error(db_connect());
    } else if (mysqli_num_rows($qry_result) === 0) {
        return "<a href=\"../../$username/albums/$albumId\"><img src=\"../../img/default.jpg\" alt=\"Currently no photos inside album.\"></a>";
    }

	while($row = $qry_result->fetch_assoc()){
		// scan the directory given
		$filename = $row['filename'];
		$caption = $row['caption'];
		$photo_file = "../../../../album_content/$userId/$albumId/$filename";
        if (file_exists("../../../resources/album_content/$userId/$albumId/$filename")) {
		    return "<a href=\"../../$username/albums/$albumId\"><img src=\"$photo_file\" alt=\"$caption\"></a>";
        } else {
            // return default picture
            return "<a href=\"../../$username/albums/$albumId\"><img src=\"../../img/default.jpg\" alt=\"Currently no photos inside album.\"></a>";
        }
	}
}
?>
