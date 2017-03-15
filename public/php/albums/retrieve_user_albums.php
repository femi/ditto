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
require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/get_album_photo.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/home/header.php");

/**
 * @param $userId: used to get the user's album data.
 * @param $username: Passed on to the photo_getter to create appropriate links of the form /username/albums/albumId/photoName
 */
function retrieve_user_albums($userId, $username) {

    $connection = db_connect(); // Try and connect to the database

    // If connection was not successful, handle the error
    if ($connection === false) {
        // Handle error
    }

    // build query - by default it selects just one.
    $query = "SELECT * FROM albums WHERE userId = $userId";

    // Order results descending for now
    $query .= " ORDER BY createdAt DESC";

    // Execute the query
    $qry_result = db_query($query);

    if ($qry_result === false) {
        echo mysqli_error(db_connect());
    }

    if ($qry_result->num_rows > 0) {
        echo "<div class=\"container\">";
        echo "<h1 class=\"title\">Your Albums</h1>";   
        echo "<div class=\"columns\">";
        while ($row = $qry_result->fetch_assoc()){
            $albumName = $row['albumName'];
            $albumId = $row['albumId'];
            try {
                $photo = get_album_photo($userId, $albumId, $username);
                echo "<div class=\"column is-3\"><div class=\"card\"><div class=\"card-image\"><figure class=\"image is-2by1\">$photo</figure></div><div class=\"card-content\"><div class=\"media\"><div class=\"media-left\"><p class=\"title is-4\">$albumName</p></div></div></div></div></div>";
            } catch (Exception $e) {
                // do something
                echo "Get_album_photo is broken";
            }
        }

        echo "</div>"; // close columns div
        echo "<div id=\"ajaxResult\"><a id=\"albumCreator\" class=\"button is-info\" onclick=\"setupCreateAlbum($userId)\">Create another album?</a></div>";
        echo "</div>"; // close container div

    } else {
        // no rows found, offer to create album?
        echo "<div id=\"ajaxResult\"><p>No albums found.</p><a id=\"albumCreator\" class=\"button is-info\" onclick=\"setupCreateAlbum($userId)\">Create a new album?</a></div>";
    }

}
?>
</body>
</html>
