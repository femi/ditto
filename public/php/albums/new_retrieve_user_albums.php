<?php
// For use with AJAX request.

// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");
require_once(realpath(dirname(__FILE__)) . "../../photos/get_album_photo.php");

function retrieve_user_albums() {
	$connection = db_connect(); // Try and connect to the database

	// If connection was not successful, handle the error
	if ($connection === false) {
		// Handle error
	}

	// Retrieve data from GET request and escape.
	$userId = db_quote($_GET['userId']);
	// $albumName = db_quote($_GET['albumName']);
	// $albumId = db_quote($_GET['albumId']);
	// $from = db_quote($_GET['from']);
	// $to = db_quote($_GET['to']);

	// build query - by default it selects just one.
	$query = "SELECT * FROM albums WHERE userId = $userId";

	// filtering:
	// if (is_numeric($albumId)) {
	// 	$query .= "AND albumId = $albumId"; // but you can give an albumId
	// }
	// if (!empty($albumName)) {
	// 	$query = "SELECT * FROM albums WHERE albumName = $albumName"; // or an album name
	// }
	// if (is_numeric($from)) {
	// 	$query .= " AND createdAt >= $from"; // and filter dates
	// }
	// if (is_numeric($to)) {
	// 	$query .= " AND createdAt <= $to";
	// }
	
	// Order results descending for now
	$query .= " ORDER BY createdAt DESC";
	
	// Execute the query
	$qry_result = db_query($query); 

	if ($qry_result === false) {
		echo mysqli_error(db_connect());
	}

    if ($qry_result->num_rows > 0) {
      // $json = Array();
	  // while($row = $qry_result->fetch_assoc()){
	  // 	$json[] = array(
	  // 		'albumId' => $row['albumId'],
	  // 		'userId' => $row['userId'],
	  // 		'albumName' => $row['albumName'], 
	  // 		'createdAt' => $row['createdAt'], 
	  // 	        'updatedAt' => $row['updatedAt']
	  // 	);
	  // }
	  // $jsonstring = json_encode($json);
	  // echo $jsonstring;
      //
	  while ($row = $qry_result->fetch_assoc()){
	  	$albumName = $row['albumName'];
	  	$albumId = $row['albumId'];	
	  	try {
	  		$photo = get_album_photo($userId, $albumId);
	  		echo "<div class=\"album-thumbnail\"><p>$albumName</p>$photo</div>";
	  	} catch (Exception $e) {
	  		// do something
	  	}
      }

    echo "<button type=\"button\" onclick=\"setupCreateAlbum($userId)\">Create another album?</button>";

    } else {
        // no rows found, offer to create album?
        echo "<p>No albums found.</p><button type=\"button\" onclick=\"setupCreateAlbum($userId)\">Create a new album?</button>";
    }
		
}
retrieve_user_albums();
?>
