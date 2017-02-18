<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE


// Update blog
function update_blog($blogId, $content) {
    $result = db_query("UPDATE blogs SET content = ".db_quote($content)." WHERE blogId = ".db_quote($blogId));
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        echo "<br>successfully updated<br>";
        echo 'blogId = '.$blogId;
        echo 'content = '.$content;
    }

}

echo 'blogId: '.$_POST['blogId'];
echo 'content: '.$_POST['content'];

update_blog($_POST['blogId'], $_POST['content']);

?>



<!-- return to the start -->
<form action="blogsformencapsulated.php" method="post">
    <input type="submit" value="Return from whence you came">
</form>
