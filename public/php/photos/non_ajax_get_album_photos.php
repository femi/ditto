<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="/css/default.css">
    <link rel="stylesheet" type="text/css" href="/css/bulma.css">
    <link rel="stylesheet" type="text/css" href="/css/dropzone.css">
    <script type="text/javascript" src="/js/dropzone.js"></script>
    <script type="text/javascript" src="/js/parseURL.js"></script>
    <script type="text/javascript" src="/js/getAlbumPhotos.js"></script>
    <script type="text/javascript" src="/js/deleteAlbum.js"></script>
    <script type="text/javascript" src="/js/changeAlbumPrivacy.js"></script>
    <script type="text/javascript" src="/js/fillFriendCircleContainer.js"></script>
    <script type="text/javascript" src="/js/searchAlbumFriendCircles.js"></script>
    <script type="text/javascript" src="/js/addAlbumFriendCircle.js"></script>
    <script type="text/javascript" src="/js/deleteAlbumFriendCircle.js"></script>
    <script type="text/javascript" src="/js/replaceCurrentAlbumTags.js"></script>
<script type="text/javascript" >
Dropzone.options.myAwesomeDropzone = {
init: function() {
    this.on('complete', function(file) {
        console.log(file.xhr);
        var photos = getAlbumPhotos(parseURL(document.location.href, 1), parseURL(document.location.href, 3)) // 1st is albumId, 2nd is username
    });
},
    url: '/php/photos/upload_photo.php',
    paramName: "file",
    maxFilesize: 2, // MB
    acceptedFiles: ".jpg, .jpeg, .png, .gif",
    sending: function(file, xhr, formData) {
        formData.append('albumId', parseURL(document.location.href, 1)); // TODO put albumId from an album object here - get the url link
    }
      }
</script>
  </head>
  <body>
<?php
function echoAlbumId($albumId, $username, $isProfile) {
    if ($isProfile != '1') {
        echo "<a class=\"button is-danger is-outlined\" onclick=\"deleteAlbum($albumId, '$username')\">Delete album</a>";
    }
}
?>

<?php
require_once("$_SERVER[DOCUMENT_ROOT]/php/home/header.php");
function showAlbumPrivacySettings($albumId) {

    $connection = db_connect();

    if ($connection === false) {
        // error
    }

    $query = "SELECT isRestricted, isProfile FROM albums WHERE albumId = $albumId";
    $queryResult = db_query($query);

    // fill card content
    if ($queryResult === false) {
        msyqli_error(db_connect());
    } else {
        $row = mysqli_fetch_assoc($queryResult);
        $isRestricted = $row['isRestricted'];
        $isProfile = $row['isProfile'];

        if ($isProfile === '0') { // only show privacy settings for non profile albums
            echo "<div class=\"level\"><div class=\"level-item\"><div class=\"card-content\"><div class=\"content\">";
            echo "<div class=\"card privacy-settings\">";
            // print out card header
            echo "<header class=\"card-header\"><p class=\"card-header-title title is-4\">Album privacy settings:</p><a class=\"card-header-icon\"><span class=\"icon\"><i class=\"fa fa-angle-down\"></i></span></a></header>";
            echo "<div class=\"level\"><p class=\"level-item\">This album can be viewed by:</p></div>";

            if ($isRestricted === '0') {
                echo "<div class=\"level\"><div class=\"level-item><label class=\"radio\"><input type=\"radio\" name=\"albumPrivacy\" value=\"0\" checked=\"checked\" onclick=\"changeAlbumPrivacy(this, $albumId)\">Friends</label></div></div>";
                echo "<div class=\"level\"><div class=\"level-item><label class=\"radio\"><input type=\"radio\" name=\"albumPrivacy\" value=\"1\" onclick=\"changeAlbumPrivacy(this, $albumId)\">Selected friend circles</label></div></div>";
                echo "<div class=\"level\"><div class=\"level-item><label class=\"radio\"><input type=\"radio\" name=\"albumPrivacy\" value=\"2\" onclick=\"changeAlbumPrivacy(this, $albumId)\">Friends of friends</label></div></div>";
            } else if ($isRestricted === '1') {
                echo "<div class=\"level\"><div class=\"level-item><label class=\"radio\"><input type=\"radio\" name=\"albumPrivacy\" value=\"0\" onclick=\"changeAlbumPrivacy(this, $albumId)\">Friends</label></div></div>";
                echo "<div class=\"level\"><div class=\"level-item><label class=\"radio\"><input type=\"radio\" name=\"albumPrivacy\" value=\"1\" checked=\"checked\" onclick=\"changeAlbumPrivacy(this, $albumId)\">Selected friend circles</label></div></div>";
                echo "<div class=\"level\"><div class=\"level-item><label class=\"radio\"><input type=\"radio\" name=\"albumPrivacy\" value=\"2\" onclick=\"changeAlbumPrivacy(this, $albumId)\">Friends of friends</label></div></div>";
                echo "<script>fillFriendCircleContainer($albumId)</script>"; // fill in the privacy controls stuff with JS
            } else if ($isRestricted === '2'){
                echo "<div class=\"level\"><div class=\"level-item><label class=\"radio\"><input type=\"radio\" name=\"albumPrivacy\" value=\"0\" onclick=\"changeAlbumPrivacy(this, $albumId)\">Friends</label></div></div>";
                echo "<div class=\"level\"><div class=\"level-item><label class=\"radio\"><input type=\"radio\" name=\"albumPrivacy\" value=\"1\" onclick=\"changeAlbumPrivacy(this, $albumId)\">Selected friend circles</label></div></div>";
                echo "<div class=\"level\"><div class=\"level-item><label class=\"radio\"><input type=\"radio\" name=\"albumPrivacy\" value=\"2\" checked=\"checked\" onclick=\"changeAlbumPrivacy(this, $albumId)\">Friends of friends</label></div></div>";

            }
            echo "</div></div>";
            echo "</div></div></div>"; // close card-content and level div
            echo "<div class=\"level\"><div class=\"level-item\"><div id=\"friendCircles-container\"><div id=\"friendCircles-controls\"><div id=\"friendCircles-query-result\"></div><p id=\"friendCircles-searchbox\"></p></div><div id=\"friendCircles-search-results\"></div></div></div></div>";
            //echo "</div>"; // close card div

            //echo "</div>"; // close card level
        }
    }
}
?>
    <div id="ajaxResult">
<?php
// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

/**
 * @param $albumId: The albumId from which to get the photos
 * @param $username: Passed on to the photo getters to create appropriate links
 * This function gets all the photos from inside the given album.
 */
function non_ajax_get_album_photos($albumId, $username) {
    $connection = db_connect(); // Try and connect to the database

    // If connection was not successful, handle the error
    if ($connection === false) {
        // Handle error
    }

    // build query - by default it selects just one.
    $query = "SELECT * FROM albums WHERE albumId = $albumId";

    // Execute the query
    $qry_result = db_query($query);

    if ($qry_result === false) {
        // No such album.
        echo mysqli_error(db_connect());
    }


    $first = true;

    echo "<div class=\"container\">";


    while($row = $qry_result->fetch_assoc()){
        // scan the directory given
                $userId = $row['userId'];
        $dir = "../resources/album_content/$userId/$albumId";
        $photo_files = scandir($dir);
        $isProfile = $row['isProfile'];
        
        if ($first === true) {
            $albumName = $row['albumName'];
            echo "<br>";
            echo "<div class=\"level\"><div class=\"level-left\"><h2 class=\"title is-2 level-item\">$albumName</h2></div>";
            echo "<div class=\"level-right\"><div class=\"level-item\">";
            echo echoAlbumId($albumId, $username, $isProfile); // pass albumId on to js deleteAlbum() function
            echo "</div><div class=\"level-item\"><a class=\"button is-primary is-outlined\" href=\"../albums\">Back to albums</a></div>";
            echo "</div></div><hr>";
            echo "<div class=\"columns\">";
            echo "<div class=\"column is-one-quarter>";
            echo "<h1 class=\"title is-1\"></h1>";
            $first = false;
            showAlbumPrivacySettings($albumId);
        }
        echo "<form action=\"/php/photos/upload_photo.php\" class=\"dropzone\" id=\"my-awesome-dropzone\"><div class=\"fallback\"><input name=\"file\" type=\"file\" multiple> </div></form>";
        echo "</div>"; // end settings column div
    }

    $photo_files = array_diff($photo_files, array('.', '..')); // remove . and .. directories
    echo "<div class=\"column is-two-thirds\">";
    echo "<div id=\"albumPhotos\" class=\"columns is-multiline\">";
    foreach($photo_files as $photoName) {
        $file = "../../album_content/$userId/$albumId/$photoName";
        echo "<div class=\"column is-4\"><div class=\"card\"><div class=\"card-image\"><figure class=\"image is-2by1\"><a href=\"../../../../$username/albums/$albumId/$photoName\"><img class=\"photo-thumbnail\" src=\"$file\" alt=\"Test\"></a></figure></div></div></div>"; // TODO get captions
    }
    echo "</div>"; // close the albums columns div
    echo "</div>"; // close the album page column div
    echo "</div>"; // close the page columns div
    echo "</div>"; // close the container div
}
?>
</div>

    </body>
</html>
