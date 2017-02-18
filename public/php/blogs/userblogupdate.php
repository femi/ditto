<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE


// Print specific blogs for a given userId
function print_specific_blog($userId, $blogId) {
    $result = db_query("SELECT content FROM blogs WHERE userId = ".db_quote($userId)." AND blogID = ".db_quote($blogId));
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // nada
    }
    if ($row = $result->fetch_assoc()) {
         echo $row['content'];
    }

}

//$blogId = $_POST['blogId'];

echo 'userId: '.$_POST['userId'];
echo 'blogId: '.$_POST['blogId'];


?>

<!-- Display the existing entry and update it -->
<form action="userblogdoupdate.php" method="post">
    <textarea name="content" style="height: 200px; width:300px"><?php print_specific_blog($_POST['blogId'], $_POST['userId']); ?></textarea><br>
    <input type="submit" value="Update">
    <input type="hidden" name="blogId" value=<?php echo db_quote($_POST['blogId']) ?>>
</form>
