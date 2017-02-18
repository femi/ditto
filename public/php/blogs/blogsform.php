<html>
<body>

<!--
Issues
- How can you retrieve the blog entry, fill the text area and then resubmit it?
- How to delete a specific entry?
-->


<form action="blogssubmit.php" method="post" id="blogform">
    <textarea name="blogentry">Write your blogz here.</textarea>
    <input type="submit" value="Add entry blogs.php">
</form>

<form action="" method="post" id="blogformupdate">
    <textarea name="blogentry"><?php print_blog1() ?></textarea>
    <input type="submit" value="Update">
</form>




<br><br><br>

</body>
</html>

<!-- FUNCTIONS -->

<?php

function retrieve_all_blogs() {
    // Retrieve blogs data query
	//
    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
    $result = db_query("SELECT * FROM blogs");
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        echo "<br>success<br>";
    }
    return $result;
}


function print_blog1() {
    $blogs = retrieve_blog_content(1);
    while($row = $blogs->fetch_assoc()){
        echo $row['content'];
    }
}

function retrieve_blog_content($blogId) {
    // Retrieve blogs data query
    require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
    $result = db_query("SELECT * FROM blogs WHERE blogID = ". $blogId);
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // nada
    }
    return $result;
}

function print_blogs() {
    echo '<br><br>';
    echo 'Blog table: <br>';
    echo '<table>';
    $blogs = retrieve_all_blogs();
    while($row = $blogs->fetch_assoc()){
        echo '<tr><td> '.$row['blogId'].' '.$row['content'].' '.$row['createdAt'] .' '.$row['updatedAt'].'</td></tr>';
    }
    echo '</table>';
    echo '<br><br>';
}

?>
