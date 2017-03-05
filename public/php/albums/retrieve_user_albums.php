<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="../../js/setupCreateAlbum.js"></script>
</head>
<body>
<?php
// For use with AJAX request.

// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/photos/get_album_photo.php");

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
        // $json = Array();
        // while($row = $qry_result->fetch_assoc()){
        //    $json[] = array(
        //        'albumId' => $row['albumId'],
        //        'userId' => $row['userId'],
        //        'albumName' => $row['albumName'],
        //        'createdAt' => $row['createdAt'],
        //            'updatedAt' => $row['updatedAt']
        //    );
        // }
        // $jsonstring = json_encode($json);
        // echo $jsonstring;
        //
        $first = true;

        while ($row = $qry_result->fetch_assoc()){
            $albumName = $row['albumName'];
            $albumId = $row['albumId'];
            if ($first === true) {
                echo "<h1>Your Albums</h1>";   
                $first = false;
            }
            try {
                $photo = get_album_photo($userId, $albumId, $username);
                echo "<div class=\"album-thumbnail\"><p>$albumName</p>$photo</div>";
            } catch (Exception $e) {
                // do something
                echo "Get_album_photo is broken";
            }
        }

        echo "<div id=\"ajaxResult\"><button type=\"button\" onclick=\"setupCreateAlbum($userId)\">Create another album?</button></div>";

    } else {
        // no rows found, offer to create album?
        echo "<div id=\"ajaxResult\"><p>No albums found.</p><button type=\"button\" onclick=\"setupCreateAlbum($userId)\">Create a new album?</button></div>";
    }

}
?>
</body>
</html>
