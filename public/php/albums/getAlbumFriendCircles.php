<?php

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

/**
 * This function is called using AJAX and changes an album's privacy settings to friends (0), friendcircles (1), or friends of friends (2)
 */
function getAlbumFriendCircles() {
    $albumId = db_quote($_REQUEST['albumId']);
	$albumId = (int) substr($albumId, 1, strlen($albumId) - 2); // Get rid of quotation marks e.g. from '2' to 2.

	$connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

	// build query
	$query = "SELECT friendcircles.circleId, name FROM friendcircles JOIN album_friendcircles WHERE friendcircles.circleId = album_friendcircles.circleId AND album_friendcircles.albumId = $albumId";

	// Execute the query
	$qry_result = db_query($query);

	if ($qry_result === false) {
		echo mysqli_error(db_connect());
		return;
    }
    while ($row = $qry_result->fetch_assoc()) {
        $circleName = $row['name'];
        $circleId = $row['circleId'];
        echo "<span class=\"tag is-info\">$circleName<button class=\"delete is-small\" onclick=\"deleteAlbumFriendCircle($albumId, $circleId)\"></button></span>";
    }

}
getAlbumFriendCircles();
?>
