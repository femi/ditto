<?php
// REQUIRE THE DATABASE FUNCTIONS
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");
$connection = db_connect(); // the db connection
// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE
// Deletes a comment given a commentId
function delete_comment($commentId) {
    $result = db_query("DELETE FROM comments WHERE commentId = $commentId");
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // nada
    }
    return $result;
}
echo 'Deleting comment..' . $_POST['commentId'];
delete_comment($_POST['commentId']);
?>
