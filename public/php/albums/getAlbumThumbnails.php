<?php 
// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

/**
 * @param $userId: The userId whose albums should be retrieved.
 * This function returns an array of up to three thumbnail images.
 */
function getAlbumThumbnails($userId) {
    $connection = db_connect(); // Try and connect to the database

    // If connection was not successful, handle the error
    if ($connection === false) {
        // Handle error
    }

    $userId = db_quote($userId);
    $sessionUser = $_SESSION['userId'];

    // TODO add privacy
    $query = "SELECT users.userId, users.username, albums.albumId FROM albums INNER JOIN users ON albums.userId = users.userId WHERE albums.userId = $userId ORDER BY albums.updatedAt DESC LIMIT 3";

    // Execute the query
    $qry_result = db_query($query);

    if ($qry_result === false) {
        // No such album.
        echo mysqli_error(db_connect());
    }

    $photos = Array();
    while($row = $qry_result->fetch_assoc()){
        // scan the directory n
        $albumId = $row['albumId'];
        $userId = $row['userId'];
        $username = $row['username'];
        $query2 = "SELECT filename FROM photos WHERE albumId = $albumId ORDER BY createdAt DESC LIMIT 1";

        $result = db_query($query2);
        if ($result === false) {
            return;
        } else if (mysqli_num_rows($result) === 0) {
            continue;
        } else {
            $filename = mysqli_fetch_assoc($result)['filename'];
            array_push($photos, "<a href=\"/$username/albums/$albumId\"><img class=\"img-circle\" src=\"/album_content/$userId/$albumId/$filename\"></a>");
        }
    }
    return $photos;
}
?>
