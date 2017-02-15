<!--
blogs

.ini file should be outside www folder, not accessible to the web


done:
- connect to database
- query in a function
- retrieve user data
- retrieve blogs
- insert blog
- update blog
- delete blog

functions to:

- disconnect from database?
- escape sql injection

what next?

- SQL injection
- make form linked to functions



-->

<?php

// An insertion query. $result will be `true` if successful
//$result = db_query("INSERT INTO `users` (`name`,`email`) VALUES ('John Doe','john.doe@gmail.com')");

// // Retrieve users data query
// $result = db_query("SELECT * FROM users");
// if($result === false) {
//     // Handle failure - log the error, notify administrator, etc.
// } else {
//     // We successfully inserted a row into the database
// }
//
// echo 'Database before insert: <br>';
// echo '<table>';
// while($row = $result->fetch_assoc()){
//     echo '<tr><td> '.$row['fName'].' '.$row['lName'].' '.$row['email'] .'</td></tr>';
// }
// echo '</table>'


// ---------------------------------------------------------------------------
// FUNCTIONS

function retrieve_all_blogs() {
    // Retrieve blogs data query
    include '../../../resources/db/db_query.php';
    $result = db_query("SELECT * FROM blogs");
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        echo "<br>success<br>";
    }
    return $result;
}

function insert_blog($content) {
    // Insert content into blogs table
    // TODO check for SQL injection
    include '../../../resources/db/db_query.php';
    $result = db_query("INSERT INTO blogs (content) VALUES ('" . $content . "')");
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        echo "<br>success<br>";
    }

}

function update_blog($blogId, $content) {
    // Update a blog with new content
    // TODO check for SQL injection
    include '../../../resources/db/db_query.php';
    $result = db_query("UPDATE blogs SET content = '" . $content . "' WHERE blogId = " . $blogId);
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        echo "<br>success<br>";
    }

}



function delete_blog($blogId) {
    // Delete a blog from the table by blogId
    // TODO check for SQL injection
    include '../../../resources/db/db_query.php';
    $result = db_query("DELETE FROM blogs WHERE blogId = " . $blogId );
    if($result === false) {
	include '../../../resources/db/db_connect.php';
        echo mysqli_error(db_connect());
    } else {
        echo "<br>success<br>";
    }
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



// ---------------------------------------------------------------------------
// TESTING FUNCTIONS AREA

echo "PRINTING BLOG TABLE";
print_blogs();


// inserting a blog
//echo "INSERTING A NEW BLOG";
//insert_blog("some new content");
//print_blogs();


// deleting a blog, this does work!
//echo "DELETING FIRST BLOG";
//delete_blog(1);
//print_blogs();

// update a blog
// echo "UPDATING BLOG 3";
// update_blog(3, "updated content");
// print_blogs();


?>
