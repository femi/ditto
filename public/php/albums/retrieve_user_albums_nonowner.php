<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../../js/setupCreateAlbum.js"></script>
<link rel="stylesheet" type="text/css" href="/css/bulma.css">
</head>
<body>
<?php
// For use with AJAX request.

// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/routing/permissions.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/get_album_photo.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/home/header.php");

/**
 * @param $userId: used to get the user's album data.
 * @param $username: Passed on to the photo_getter to create appropriate links of the form /username/albums/albumId/photoName
 */
function retrieve_user_albums_nonowner($username) {

    $connection = db_connect(); // Try and connect to the database

    // If connection was not successful, handle the error
    if ($connection === false) {
        // Handle error
    }

    //build query - by default it selects just one.
    // $query = "SELECT * FROM albums WHERE userId = $userId";
    // $query .= " ORDER BY createdAt DESC";

    $query = "SELECT a.albumId, a.albumName, u.userId FROM albums AS a INNER JOIN users AS u ON u.userId = a.userId WHERE u.username = '$username' ORDER BY a.createdAt DESC";

    // Execute the query
    $qry_result = db_query($query);

    if ($qry_result === false) {
        echo mysqli_error(db_connect());
    }

    if ($qry_result->num_rows > 0) {

        echo "<h1 class=\"title\">Albums</h1>";   
        while ($row = $qry_result->fetch_assoc()){
            $userId = $row['userId'];
            $albumName = $row['albumName'];
            $albumId = $row['albumId'];
            if (userCanViewAlbum($albumId)) {
                try {
                    $photo = get_album_photo($userId, $albumId, $username);
                    echo "<div class=\"album-thumbnail\"><h6 class=\"title is-4\">$albumName</h6>$photo</div>";
                } catch (Exception $e) {
                    // do something
                    echo "Get_album_photo is broken";
                }
            }
        }

    } else {
        // no rows found, offer to create album?
    }

}
?>
</body>
</html>
