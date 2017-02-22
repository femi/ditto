<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

$connection = db_connect(); // the db connection


// -----------------------------------------------------------------------------
// CUSTOM FUNCTIONS FOR THIS FILE

// Retrieve all blogs for a given userId
function retrieve_blog_content($userId) {
    $result = db_query("SELECT * FROM blogs WHERE userId = ". $userId);
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // nada
    }
    return $result;
}


// Print all a user's blogs given a userId
function print_users_blogs($userId) {
    echo 'Blog table: <br>';
    echo '<table>';
    $usersblogs = retrieve_blog_content(db_quote($userId));
    while($row = $usersblogs->fetch_assoc()){
        echo '<tr><td> '.$row['blogId'].' '.$row['content'].' '.$row['createdAt'] .' '.$row['updatedAt'].'</td></tr>';
        print_blog_comments($row['blogId']);
        form_add_comment($row['blogId']);
    }
    echo '</table>';
}


// Retrieve all the comments for a blog
function retrieve_blog_comments($blogId) {
    $result = db_query("SELECT * FROM comments WHERE blogId = ". $blogId);
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // nada
    }
    return $result;
}

// Print all a user's blogs given a userId
function print_blog_comments($blogId) {
    $blogcomments = retrieve_blog_comments(db_quote($blogId));
    while($row = $blogcomments->fetch_assoc()){
        echo '<tr><td> '.$row['message'].' '.$row['updatedAt'].' '.$row['userId'];
        echo '<br>commentId: '.$row['commentId'];
        echo '<form method="post" action="deletecomment.php">
            <input type="submit" value="Delete">
            <input type="hidden" value=';
            echo $row['commentId'];
            echo ' name="commentId">
        </form></td></tr>';
    }
    echo '</table>';
}


function form_add_comment($blogId) {
    echo '<form method="post" action="addcomment.php">
        <textarea style="height: 100px; width:200px" name=message>Write your comment here..</textarea><br>
        <input type="submit" value="Add Comment">
        <input type="hidden" value=';
        echo $blogId;
        echo ' name="blogId">
    </form></td></tr>';
}


// retrieving a user's blogs
echo "RETRIEVING A USER'S BLOGS FROM USERID PASSED BY FORM";
echo '<br>';
print_users_blogs($_POST['userId']);

// retrieve comments for a blog entry
// add comments for a blog entry

?>
