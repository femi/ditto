<?php

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

require_once("$_SERVER[DOCUMENT_ROOT]/php/home/header.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/friends/mutual.php");


function getMutualFriends($friendId) {
	$connection = db_connect();
	$query2 = "SELECT userId, COUNT(userId) as mutual FROM friendcircle_users WHERE circleId=(SELECT circleId from friendCircles WHERE name='everyone' AND userId=".$_SESSION['userId'].") OR circleId=(SELECT circleId from friendCircles WHERE name='everyone' AND userId=".$friendId.") GROUP BY userId having count(userId) > 1";

	$result = db_query($query2);

	if ($result === false) {
			mysqli_error(db_connect());
	}
	else if (mysqli_num_rows($result) === 0) {
			echo "There are currently no users interested in this...that's a bit awkward! lol.";
	}
	else {

		echo "<div class=\"container\">";
		echo "<br><h2 class=\"title is-2\">#$tag</h2><hr>";
		while ($user = $result->fetch_assoc()) {
		//ommits logged in user
			if ($user['userId'] === $_SESSION['userId']){ 
			}else{
			displayMutualFriends($user);
			}
		}
		echo "<div class=\"container\">";
	}
}



function displayMutualFriends($user) {

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
?>


<div class="container">
<br><h2 class="title is-2">Mutual friends with <?php //username ?> </h2><hr>
	
<div class="container">
