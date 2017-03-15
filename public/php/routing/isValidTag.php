<?php

    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

    /**
     *  Checks to see if the given tag is in the tags table.
     */
    function isValidTag($tagname) {
        $connection = db_connect();

        if ($connection === false) {
            // Handle error
        }

        $tagname = db_quote($tagname);

        $query = "SELECT name FROM tags WHERE name = $tagname";
        $query_result = db_query($query);
        
        return (mysqli_num_rows($query_result) === 0) ? false : true;
    }

?>
