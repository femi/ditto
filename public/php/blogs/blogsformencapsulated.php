<!--
DONE:
create form for the blog
retrieve a users blogs
test the sql injection proofing
    where to insert in code?
insert a blog entry
delete a blog entry
update an existing entry in form
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

<!-- update an existing blog given a userId and a blogId -->
<form action="userblogupdate.php" method="post">
    <input type="text" value="Enter a userId" name="userId" style="width:300px" ></input><br>
    <input type="text" value="Enter a blogId" name="blogId" style="width:300px" ></input><br>
    <input type="submit" value="View and update">
</form>



<h2>Delete an existing blog entry for a user: </h2>

<!-- insert a new blog for a user -->
<form action="userblogdelete.php" method="post">
    <input type="text" value="Enter a userId" name="userId" style="width:300px" ></input><br>
    <input type="text" value="Enter a blogId" name="blogId" style="width:300px" ></input><br>
    <input type="submit" value="Erase those painful memories">
</form>
