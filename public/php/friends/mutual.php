<?php

// REQUIRE THE DATABASE FUNCTIONS
    require_once("$_SERVER[DOCUMENT_ROOT]/../resources/db/db_connect.php");
    require_once("$_SERVER[DOCUMENT_ROOT]/../resources/db/db_query.php");
    require_once("$_SERVER[DOCUMENT_ROOT]/../resources/db/db_quote.php");
    INCLUDE("$_SERVER[DOCUMENT_ROOT]/php/permissions.php");

// functions

//function checks how many mutual friends a user(anonId) has with session.user(userId)
    function mutualFriends ($anonId){
    
    //Checks if user is currently a friend	
    	if (isUserFriend($anonId)){
        echo 'You are friends with '.$anonId.'<br>';
      }

    //Checks how many mutual friends session.user has with anonId  
      echo "You have ".countMutual($anonId)." mutual friends with ".$anonId."<br>";


    }

    //function returns how many mutual friend
    function countMutual ($anonId){
    	$count= 0;
        // echo "session Id: ".$_SESSION['userId'];
        // echo "<br>anon Id: ".$anonId;

        $results = db_query(" SELECT userId, COUNT(userId) as mutual FROM friendcircle_users WHERE circleId=(SELECT circleId from friendCircles WHERE name='everyone' AND userId=".$_SESSION['userId'].") OR circleId=(SELECT circleId from friendCircles WHERE name='everyone' AND userId=".$anonId.") GROUP BY userId having count(userId) > 1 ");

        while ($row = $results->fetch_assoc()) {
        $mutualFriend = $row['userId'];
        // echo "<br>Mutual friend Id: ".$mutualFriend." <br>";
        $count++;
        }

    	return $count;
    }

echo mutualFriends(7);

?>