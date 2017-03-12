<?php

    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

    /**
     *  Checks to see if the given albumId matches a record in the album table.
     */
    function isValidAlbum($albumId) {
        $connection = db_connect();

        if ($connection === false) {
            // Handle error
        }
        $albumId = db_quote($albumId);
        $albumId = substr($albumId, 1, strlen($albumId) - 2);

        $query = "SELECT * FROM albums WHERE albumId = $albumId";
        $query_result = db_query($query);

        if (mysqli_num_rows($query_result) === 0 ) {
            return false;
        } else {
            return true;
        }
    }

?>
