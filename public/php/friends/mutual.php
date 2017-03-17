<?php

// REQUIRE THE DATABASE FUNCTIONS
    require_once("$_SERVER[DOCUMENT_ROOT]/../resources/db/db_connect.php");
    require_once("$_SERVER[DOCUMENT_ROOT]/../resources/db/db_query.php");
    require_once("$_SERVER[DOCUMENT_ROOT]/../resources/db/db_quote.php");


// functions

//function checks how many mutual friends a user(anonId) has with session.user(userId)
    function mutualFriends ($anonId){
    
    // Checks if user is currently a friend	
    	// if (isUserFriend($anonId)){
     //    echo 'You are friends with '.$anonId.'<br>';
     //  } else {
     //    echo 'You are NOT friends with this user <br>';
     //  }

    //Checks how many mutual friends session.user has with anonId  
        return countMutual($anonId);



    }

    //function returns how many mutual friend
    function countMutual ($anonId){
    
        $results = db_query("SELECT COUNT(*) AS mutualcount FROM (SELECT fcu.userId, COUNT(fcu.userId) AS mutual FROM ((SELECT circleId FROM friendcircles AS fc1 WHERE name = 'everyone' AND fc1.userId = {$anonId}) UNION (SELECT circleId FROM friendcircles AS fc2 WHERE name ='everyone' AND fc2.userId = {$_SESSION['userId']})) AS joined_circles INNER JOIN friendcircle_users AS fcu ON joined_circles.circleId = fcu.circleId GROUP BY fcu.userId HAVING mutual > 1) AS mutualfriends ");

        if($results === false) {
            echo mysqli_error(db_connect());
        } else {
            $row = $results->fetch_assoc();
            $count = $row['mutualcount'];
            return $count;
        }

    	
    }

    function isUserAFriend($anonId){
            // (userId of all in (everyone circle of (owner of given albumId)))
            $friends = db_query("SELECT userId FROM friendcircle_users WHERE circleId=(SELECT circleId from friendcircles WHERE name='everyone' AND userId=".$_SESSION['userId'].")");


                while($row =$friends->fetch_assoc()){

                    if ($row['userId'] == $anonId){


                        return 1;
                    } else {

                    }
                }
}


?>