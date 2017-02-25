<!DOCTYPE html>
<html>
<head>
<title>FriendCircle CRUD</title>
</head>
<body>

<h1>F/C CRUD</h1>

<h2>Create</h2>

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

<h2>Insert</h2>

<h2>Delete</h2>

</body>
</html>