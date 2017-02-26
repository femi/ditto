<?php

// REQUIRE THE DATABASE FUNCTIONS

// these couldn't be require_once as it causes bug with session
//require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
//require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");
require(realpath(dirname(__FILE__)) . "../../../php/home/session.php");

//$connection = db_connect(); // the db connection




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
        echo '<form method="post" onclick="deleteComment('.$row['commentId'].')">
            <input type="submit" value="Delete">
            <input type="hidden" value=';
            echo $row['commentId'];
            echo ' name="commentId">
        </form></td></tr>';
    }
    echo '</table>';
}


function form_add_comment($blogId) {
    // had to escape the ' in the echo'd html/js to specify 'message' as the id to get the comment from. very sketchy!
    //$userId = $_REQUEST('userId');
    echo "logged in user: ". $_SESSION['userId'];
    echo '<form method="post">
        <textarea style="height: 100px; width:200px" name=message id="message">Write your comment here..</textarea><br>
        <input type="submit" value="Add Comment" onclick="addComment('.$blogId.','.$_SESSION['userId'].', document.getElementById(\'message\').value)">
        <input type="hidden" value=';
        echo $blogId;
        echo ' name="blogId">
    </form></td></tr>';
}


// retrieving a user's blogs
echo "RETRIEVING A USER'S BLOGS FROM USERID PASSED BY FORM";
echo '<br>';
print_users_blogs($_POST['blogUserId']);

// retrieve comments for a blog entry
// add comments for a blog entry

?>
