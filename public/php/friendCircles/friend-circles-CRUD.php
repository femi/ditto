<!DOCTYPE html>
<html>
<head>
<title>FriendCircle CRUD</title>
</head>
<body>

<h1>F/C CRUD</h1>

<h2>Create</h2>
<p>Create new circle for a user:</p>
<form action="friend-circles-C.php" method="post">
	<input type="text" value="Enter a userId" name="userId"></input>
    <input type="text" value="Enter a circleName" name="circleName"></input>
    <input type="submit" value="Create">
</form>
<p>Add a friend to a circle:</p>
<form action="friend-circles-add.php" method="post">
	<input type="text" value="Enter a circleId" name="circleId"></input>
    <input type="text" value="Enter the userId of friend" name="friendId"></input>
    <input type="submit" value="Add">
</form>


<h2>Retrieve</h2>
<!-- retrieve a user's friend-circles -->
<p>Retrieve a user's friend-circles:</p>
<form action="friend-circles-R.php
" method="post">
    <input type="text" value="Enter a userId" name="userId"></input>
    <input type="submit" value="Retrieve">
</form>

<p>Retrieve 'friends' friend-circles :</p>
<form action="friends-in-circle.php" method="post">
    <input type="text" value="Enter a circleId" name="circleId"></input>
    <input type="submit" value="Retrieve">
</form>

<h2>Update</h2>

<h2>Delete</h2>

</body>
</html>