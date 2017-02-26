<!DOCTYPE html>
<html>
<head>
<title>FriendCircle CRUD</title>
</head>
<body>

<h1>F/C CRUD</h1>

<h2>Create</h2>
Create new circle for a user:
<form action="friend-circles-C.php" method="post">
	<input type="text" value="Enter a userId" name="userId"></input>
    <input type="text" value="Enter a circleName" name="circleName"></input>
    <input type="submit" value="Create">
</form>
Add a friend to a circle:
<form action="friend-circles-add.php" method="post">
	<input type="text" value="Enter a circleId" name="circleId"></input>
    <input type="text" value="Enter the userId of friend" name="friendId"></input>
    <input type="submit" value="Add">
</form>


<h2>Retrieve</h2>
<!-- retrieve a user's friend-circles -->
Retrieve a user's friend-circles:
<form action="friend-circles-R.php
" method="post">
    <input type="text" value="Enter a userId" name="userId"></input>
    <input type="submit" value="Retrieve">
</form>

Retrieve 'friends' friend-circles :
<form action="friends-in-circle.php" method="post">
    <input type="text" value="Enter a circleId" name="circleId"></input>
    <input type="submit" value="Retrieve">
</form>

<h2>Update</h2>
Update friend-circles name:
<form action="friend-circles-U.php" method="post">
    <input type="text" value="Enter a circleId" name="circleId"></input>
    <input type="text" value="Enter new name" name="newName"></input>
    <input type="submit" value="Rename">
</form>


<h2>Delete</h2>
Delete circle:
<form action="friend-circles-D.php" method="post">
    <input type="text" value="Enter a circleId" name="circleId"></input>
    <input type="submit" value="Delete">
</form>
Remove a friend from circle:
<form action="friend-circles-remove.php" method="post">
    <input type="text" value="Enter a circleId" name="circleId"></input>
    <input type="text" value="Enter the userId of friend" name="friendId"></input>
    <input type="submit" value="Remove">
</form>



</body>
</html>