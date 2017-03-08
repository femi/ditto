<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/css/default.css">
    <link rel="stylesheet" type="text/css" href="/css/bulma.css">
    <script type="text/javascript" src="/js/parseURL.js"></script>
    <script type="text/javascript" src="/js/editCaption.js"></script>
    <script type="text/javascript" src="/js/submitCaption.js"></script>
    <script type="text/javascript" src="/js/getCaption.js"></script>
  </head>
  <body>
    <a href="../"><p>Back to albums</p></a>
    <p>Result:</p>
    <div class="single-photo-container">
<?php
// For use with AJAX request.

// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

/*
 * This file is called from the album browse page and will load the clicked photo to the screen dimensions, and include comments below.
 */
function get_photo_page_with_comments($username, $albumId, $photoName) {
    $connection = db_connect(); // Try and connect to the database

    // If connection was not successful, handle the error
    if ($connection === false) {
        // Handle error
    }

    $albumId = db_quote($albumId);
    $photoName= db_quote($photoName);
    $albumId = (int) substr($albumId, 1, strlen($albumId) -2); // Get rid of quotation marks.

    // build query - by default it selects just one.
    $query = "SELECT * FROM photos WHERE albumId = $albumId AND filename = $photoName LIMIT 1";

    // Execute the query
    $qry_result = db_query($query);

    if ($qry_result === false) {
        // No such album.
        echo mysqli_error(db_connect());
    }

    // Get the photo caption
    while($row = $qry_result->fetch_assoc()){
        // scan the directory given
        $caption = $row['caption'];
    }

    $photoName= substr($photoName, 1, strlen($photoName) - 2); // Get rid of quotation marks e.g. from '2' to 2.

    $new_query = "SELECT * FROM albums WHERE albumId = $albumId";
    $new_qry_result = db_query($new_query);

    while ($row= $new_qry_result->fetch_assoc()) {
        $userId = $row['userId'];
        $photo_file = "../../../../album_content/$userId/$albumId/$photoName";
        if (isset($caption)) {
            echo "<a href=\"../../albums/$albumId\"><img class=\"single-photo-container\" src=\"$photo_file\" alt=\"$caption\"></a><div class=\"caption-container\"><p>$caption</p></div>";
            echo "<div class=\"photo-deletion\"><a class=\"button is-info\" onclick=\"editCaption($albumId, '$photoName')\">Edit caption</a><a class=\"button is-info\" href=\"/$username/albums/$albumId/$photoName/delete/\">Delete photo</a></div>";
        } else {
            echo "<a href=\"../../albums/$albumId\"><img class=\"single-photo-container\" src=\"$photo_file\" ></a><div class=\"caption-container\"><p>Temp Caption</p></div>";
            echo "<nav class=\"level\"><a class=\"button is-info\" onclick=\"editCaption($albumId, '$photoName')\">Edit caption</a><a class=\"button is-info\" href=\"/$username/albums/$albumId/$photoName/delete/\">Delete photo</a></div>";
        }
    }


    // Load the photo comments
}
?>
  </div>
  <div class="comment-container">
    <article class="media">
        <figure class="media-left">
            <p class="image is-32x32">
                <img src="">
            </p>
        </figure>
        <div class="media-content">
            <p class="control">
                <textarea class="textarea" placeholder="Type any comments in here"></textarea>
            </p>
            <nav class="level">
                <div class="level-left">
                    <div class="level-item">
                        <a class="button is-info">Post</a>
                    </div>
                </div>
            </nav>
        </div>
    </article>

  </div>
  </body>
</html>
