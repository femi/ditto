<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

/**
 * This function is called using AJAX and gets the top 3 albumName matches for the given search string.
 */
function searchAlbumFriendCircles() {
    $albumId = db_quote($_REQUEST['albumId']);
    $searchQuery = db_quote($_REQUEST['searchQuery']);

	$albumId = (int) substr($albumId, 1, strlen($albumId) - 2); // Get rid of quotation marks e.g. from '2' to 2.
	$searchQuery = substr($searchQuery, 1, strlen($searchQuery) - 2); // Get rid of quotation marks e.g. from '2' to 2.

	$connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

    $userId = $_SESSION['userId'];

	// build query - get the user's friendcircles that they have not already selected
	$query = "SELECT circleId, name FROM friendcircles WHERE userId = $userId AND name != 'everyone' AND name LIKE '%$searchQuery%' AND circleId NOT IN (SELECT circleId FROM album_friendcircles WHERE albumId = $albumId) LIMIT 3";

	// Execute the query
	$qry_result = db_query($query);

	if ($qry_result === false) {
		echo mysqli_error(db_connect());
		return;
    }

    if (mysqli_num_rows($qry_result) === 0) {
        echo "<p>No results found</p>";
    } else {

        echo "<div class=\"box\">";
        while ($row = $qry_result->fetch_assoc()) {
            $circleName = $row['name'];
            $circleId = $row['circleId'];
            echo "<a onclick=\"addAlbumFriendCircle($albumId, $circleId)\"><span class=\"tag is-info\">$circleName</span></a>";
        }
        echo "</div>"; // end box div
    }
    
}
searchAlbumFriendCircles();
?>
