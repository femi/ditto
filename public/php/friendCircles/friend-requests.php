<!DOCTYPE html>
<html>
<head>
<title>Pending Friend Request</title>
        <?php
    session_start();
    require_once(__DIR__.'/get-all-users.php');
    require_once(__DIR__.'/friend-circles-R.php');
    
    ?> 
</head>
<body>

<!-- Make a friend request to users not already in the 'everyone' circle -->
Make new friend request:<br>
<form action="make-friendrequest.php" method="post">
    <select name="friendId">
        <?php
         get_nonfriends();
        ?>   
    </select>
    <input type="submit" value="Make Request">
</form>


<!-- View all requests awaiting approval -->
View all pending requests: (incoming)<br>
<form action="accept-friendrequest.php" method="post">
    <select name="friendId">
        <?php
         get_friendrequests();
        ?>   
    </select>
    <input type="submit" value="Accept Request">
    <!-- <input type="submit" value="Delete Request"> -->
</form>

</body>
</html>
