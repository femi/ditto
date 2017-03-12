<?php

require_once(realpath(dirname(__FILE__)) . "/retrieve_album.php");

function print_album() {
	echo "Album table";
	echo "";
	echo '<table>';
	$blogs = retrieve_album();
	while($row = $blogs->fetch_assoc()){
		echo '<tr><td> '.$row['blogId'].' '.$row['content'].' '.$row['createdAt'] .' '.$row['updatedAt'].'</td></tr>';
	}
	echo '</table>';
	echo '<br><br>';
}

print_album();

?>
