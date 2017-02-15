<!--
retrieve a users blogs
test the sql injection proofing
    where to insert in code?


create form for the blog
insert a blog entry
update an existing entry in format
-->

<?php
// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection
// -----------------------------------------------------------------------------

?>

<h2>Retrieve a specified user's blog:</h2><br>

<!-- retrieve a user's blogs -->
<form action="userblogs.php" method="post">
    <input type="text" value="Enter a userId" name="userId"></input>
    <input type="submit" value="Retrieve">
</form>


<h2>Insert a new blog entry for specified user:</h2>

<!-- insert a new blog for a user -->
<form action="userbloginsert.php" method="post">
    <input type="text" value="Enter a userId" name="userId" style="width:300px" ></input><br>
    <textarea name="blogEntry" style="height: 200px; width:300px">Type your emo diary here..</textarea><br>
    <input type="submit" value="Insert">
</form>



<h2>Update an existing blog entry for a user: </h2>




<h2>Delete an existing blog entry for a user: </h2>
