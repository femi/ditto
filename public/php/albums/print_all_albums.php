<?php

require_once(realpath(dirname(__FILE__)) . "/retrieve_all_albums.php");

function print_all_albums() {
	echo "Album table";
	echo "";
	echo '<table>';
	$blogs = retrieve_all_albums(); // inside get_all_albums file.
	while($row = $blogs->fetch_assoc()){
		echo '<tr><td> '.$row['blogId'].' '.$row['content'].' '.$row['createdAt'] .' '.$row['updatedAt'].'</td></tr>';
	}
	echo '</table>';
	echo '<br><br>';
}

print_all_albums();

?>
