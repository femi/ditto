<!DOCTYPE html>
<html>
<head>
<title>Friends</title>
        <?php
    require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/get-all-users.php");
    require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friend-circles-R.php");
    require_once("$_SERVER[DOCUMENT_ROOT]/php/home/header.php");
    ?>
    <script src="/js/searchfof.js"></script>
    <script src="js/jquery-3.1.1.min.js"></script>

</head>
<body>
<!-- Prints table containing friends in 'everyone' circle - stored in session as 'everyone' -->

<p>Displaying all friends for: <?php echo $_SESSION['userId']; ?></p>
<table border = "1px">
<tr>
    <th>userId</th>
    <th>fName</th>
    <th>lName</th>
</tr>
<?php

    $friends = db_query("SELECT * FROM users WHERE userId IN (SELECT userId FROM friendcircle_users WHERE circleId=(SELECT circleId from friendCircles WHERE userId=".$_SESSION['userId']." AND name='everyone'))");
    if ($friends) {
        while($row = $friends->fetch_assoc()){
            echo '<tr>
                    <td> '.$row['userId'].'</td>
                    <td> '.$row['fName'].'</td>
                    <td> '.$row['lName'] .' </td>
                </tr>';
        }
    }
    else {
        echo "sorry you have no friends";
    }
?>
</table>
<p>Delete friend:</p>
<form action="friends/accept" method="post">
    <select name="friendId">
        <?php
         get_friends();
        ?>
    </select>
    <input name="abolish" type="submit" value="Abolish all ties">
</form>

<!-- Make a friend request to users not already in the 'everyone' circle -->
<p>Make new friend request:</p>
<form action="friends/request" method="post">
    <select name="friendId">
        <?php
         get_nonfriends();
        ?>
    </select>
    <input type="submit" value="Make Request">
</form>


<!-- View all requests awaiting approval -->
<p>View all pending requests: (incoming)</p>
<form action="friends/accept" method="post">
    <select name="friendId">
        <?php
         get_incomingrequests();
        ?>
    </select>
    <input name="accept" type="submit" value="Accept Request">
    <input name="delete" type="submit" value="Delete Request">
</form>

<p>View all pending requests: (outgoing)</p>
<form action="friends/accept" method="post">
    <select name="friendId">
        <?php
         get_outgoingrequests();
        ?>
    </select>
    <input name="retract" type="submit" value="Retract burden of friendship">

</form>

<p>Search for friends of friends</p>
<input class="input" type="text" placeholder="Search" style="top: 6px; width: 200px">
<div id="result" class="box" style="display: none; z-index: 100000000; position: absolute; top: 40px; left: 60px"></div>

<script>
    $(document).ready(setupFofSearch());
</script>

</body>
</html>
