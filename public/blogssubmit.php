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
- make 1st form linked to functions

functions to:

- disconnect from database?
- escape sql injection

what next?

- SQL injection




-->

<?php

// ---------------------------------------------------------------------------
// FUNCTIONS

function retrieve_all_blogs() {
    // Retrieve blogs data query
    include 'db_query.php';
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
    include 'db_query.php';
    $result = db_query("INSERT INTO blogs (content) VALUES ('" . $content . "')");
    if($result === false) {
	include 'db_connect.php';
        echo mysqli_error(db_connect());
    } else {
        echo "<br>success<br>";
    }

}

function update_blog($blogId, $content) {
    // Update a blog with new content
    // TODO check for SQL injection
    include 'db_query.php';
    $result = db_query("UPDATE blogs SET content = '" . $content . "' WHERE blogId = " . $blogId);
    if($result === false) {
	include 'db_connect.php';
        echo mysqli_error(db_connect());
    } else {
        echo "<br>success<br>";
    }

}

function delete_blog($blogId) {
    // Delete a blog from the table by blogId
    // TODO check for SQL injection
    include 'db_query.php';
    $result = db_query("DELETE FROM blogs WHERE blogId = " . $blogId );
    if($result === false) {
	include 'db_connect';
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
echo "INSERTING A NEW BLOG FROM FORM";
insert_blog($_POST['blogentry']);
print_blogs();

?>
