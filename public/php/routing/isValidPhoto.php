<?php

    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

    /**
     *  Checks to see if the given filename matches a record in the photo table.
     */
    function isValidPhoto($filename) {
        $connection = db_connect();

        if ($connection === false) {
            // Handle error
        }

        $filename = db_quote($filename);
        //$filename = substr($filename, 1, strlen($filename) - 2);

        $query = "SELECT * FROM photos WHERE filename = $filename";
        $query_result = db_query($query);
        
        return (mysqli_num_rows($query_result) === 0) ? false : true;
    }

?>
