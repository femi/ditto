<?php

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

require_once("$_SERVER[DOCUMENT_ROOT]/php/home/header.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/friends/mutual.php");
?>

<?php

function displayAllResults($tag) {
	$connection = db_connect();
	$query = "SELECT * FROM users";
	$query2 = "SELECT * FROM users WHERE userId IN (SELECT userId FROM tags INNER JOIN tag_users ON tags.tagId = tag_users.tagId WHERE name = '$tag');";
	$result = db_query($query2);

	if ($result === false) {
			mysqli_error(db_connect());
	}
	else if (mysqli_num_rows($result) === 0) {
			echo "There are currently no users interested in this...that's a bit awkward! lol.";
	}
	else {

		$tag = strtolower($tag);
		echo "<div class=\"container\">";
		echo "<br><h2 class=\"title is-2\">#$tag</h2><hr>";
		while ($user = $result->fetch_assoc()) {
		//ommits user is already a friend 
			if ($user['userId'] === $_SESSION['userId'] /*OR isUserFriend($user['userId'])*/){ 
			}else{
			displaySearchResult($user);
			}
		}
		echo "<div class=\"container\">";
	}
}

function displaySearchResult($user) {

	$image = "";
	$full_name = $user['fName'] .  " " . $user['lName'];
	$biography = $user['description'];
	$location = $user['city'];
	$userId = $user['userId'];
	$username = $user['username'];
	$tags = getTags($userId);
	$mutualFriends = countMutual($userId);
	if (isUserFriend($user['userId'])){
	$button = "<button class=\"button is-info\">Add Friend</button>";
	}else{
	$button = "<button class=\"button is-disabled\"> Already a Friend</button>";
	}

	$search_result = "
			<article class=\"media\">
				<figure class=\"media-left\">
					<p class=\"image is-64x64\">
						<img src=\"http://bulma.io/images/placeholders/128x128.png\">
					</p>
				</figure>
				<div class=\"media-content\">
					<div class=\"content\">
						<p>
							<a href=\"/$username\"><strong>$full_name</strong></a><br><small>$location</small><br><small>$mutualFriends Mutual Friends</small><br>$biography
						</p>
					</div>
				<div id=\"alltags\">
					$tags
				</div>
				</div>
				<div class=\"media-right\">
					$button
				</div>
			</article>";

	echo $search_result;
}

function getTags($userId) {
	$usertags = db_query("SELECT * FROM tags INNER JOIN tag_users ON tags.tagId = tag_users.tagId WHERE userId = '$userId'");
	$tags = "";
	while ( $row = $usertags->fetch_assoc()){
		$name = $row['name'];
		$tags = $tags . "<span id=\"tag_$name\" class=\"tag is-medium is-light\"><a href=\"/tags/$name\">$name</a></span>" . "\r\n";
		// echo ("<span id=\"tag_$name\" class=\"tag is-medium is-light\"><a href=\"/tags/$name\">$name</a></span>");
	}
	return $tags;
}
?>
