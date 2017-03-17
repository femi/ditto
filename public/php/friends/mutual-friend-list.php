<?php

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

require_once("$_SERVER[DOCUMENT_ROOT]/php/home/header.php");
require_once("$_SERVER[DOCUMENT_ROOT]/php/friends/mutual.php");


function getMutualFriends($friendId) {
	$connection = db_connect();
	$query2 = "SELECT userId, COUNT(userId) as mutual FROM friendcircle_users WHERE circleId=(SELECT circleId from friendcircles WHERE name='everyone' AND userId=".$_SESSION['userId'].") OR circleId=(SELECT circleId from friendcircles WHERE name='everyone' AND userId=".$friendId.") GROUP BY userId having count(userId) > 1";

	$result = db_query($query2);

	if ($result === false) {
			mysqli_error(db_connect());
	}
	else if (mysqli_num_rows($result) === 0) {
			echo "You currently have no mutual friends";
	}
	else {

		while ($user = $result->fetch_assoc()) {
		//ommits logged in user
			if ($user['userId'] === $_SESSION['userId']){ 
			}else{
			displayMutualFriends($user['userId']);
			}
		}
		echo "<div class=\"container\">";
	}
}

function getUsernameFromUserId($userId){
	$results = db_query("SELECT username FROM users WHERE userId =".$userId);
	if ($results === false) {
		mysqli_error(db_connect());
	}
	else {
		$row = $results->fetch_assoc();
		$username = $row['username'];
		return $username;
	}
}


function displayMutualFriends($userId) {

$results = db_query("SELECT * FROM users WHERE userId =".$userId);

if ($results === false) {
		mysqli_error(db_connect());
	}
	else {
		$user = $results->fetch_assoc();
		}


	$image = "";
	$full_name = $user['fName'] .  " " . $user['lName'];
	$biography = $user['description'];
	$location = $user['city'];
	$userId = $user['userId'];
	$username = $user['username'];
	$mutualFriends = countMutual($userId);


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
							<a href=\"/$username\"><strong>$full_name</strong></a><br><small>$location</small><br><small>
							<a href=\"mutual?id=".$userId."\" >You have <b>".mutualFriends($userId)."</b> mutual friends!</a></small><br>$biography
						</p>
					</div>
				</div>
			</article>";

	echo $search_result;
}
?>


<div class="container">
<br><h2 class="title is-2">Mutual friends with <?php $mutualId= $_GET['id']; echo getUsernameFromUserId($mutualId); ?> </h2><hr>
	
<div class="container">
<?php 

getMutualFriends($mutualId);?>
