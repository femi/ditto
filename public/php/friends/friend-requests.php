<!DOCTYPE html>
<html>
<head>
<title>Friends</title>
        <?php
    require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/get-all-users.php");
    require_once("$_SERVER[DOCUMENT_ROOT]/php/friendCircles/friend-circles-R.php");
    require_once("$_SERVER[DOCUMENT_ROOT]/php/home/header.php");
    ?> 

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
    while($row =$friends->fetch_assoc()){
        echo '<tr>
                <td> '.$row['userId'].'</td>
                <td> '.$row['fName'].'</td>
                <td> '.$row['lName'] .' </td>
            </tr>';
    }
?>
</table>

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
    <input type="submit" value="Accept Request">
    <!-- <input type="submit" value="Delete Request"> -->
</form>

<p>View all pending requests: (outgoing)</p>
<form action="friends/accept" method="post">
    <select name="friendId">
        <?php
         get_outgoingrequests();
        ?>   
    </select>
    <input type="submit" value="Retract burden of friendship">
    <!-- <input type="submit" value="Delete Request"> -->
</form>

</body>
</html>
