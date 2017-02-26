<!DOCTYPE html>
<html>
<head>
<title>FriendCircle CRUD</title>
    <?php
    require_once(__DIR__.'/get-all-users.php');
    ?> 
</head>
<body>

<h1>F/C CRUD</h1>

<h2>Create</h2>
Create new circle for a user:
<form action="friend-circles-C.php" method="post">
    <select name="userId">
                    <?php
                    all_users();
                    ?>   
    </select>
    <input type="text" placeholder="Enter a circleName" name="circleName"></input>
    <input type="submit" value="Create">
</form>

Add a friend to a circle:
<form action="friend-circles-add.php" method="post">
    <select name="circleId">
        <?php
        all_circles();
        ?>   
    </select>
    <select name="userId">
                    <?php
                    all_users();
                    ?>   
    </select>
    <input type="submit" value="Add">
</form>


<h2>Retrieve</h2>
<!-- retrieve a user's friend-circles -->
Retrieve a user's friend-circles:
<form action="friend-circles-R.php
" method="post">
    <select name="userId">
                    <?php
                    all_users();
                    ?>   
    </select>
    <input type="submit" value="Retrieve">
</form>

Retrieve 'friends' friend-circles :
<form action="friends-in-circle.php" method="post">
    <select name="circleId">
        <?php
        all_circles();
        ?>   
    </select>
    <input type="submit" value="Retrieve">
</form>

<h2>Update</h2>
Update friend-circles name:
<form action="friend-circles-U.php" method="post">
    <select name="circleId">
        <?php
        all_circles();
        ?>   
    </select>
    <input type="text" placeholder="Enter new name" name="newName"></input>
    <input type="submit" value="Rename">
</form>


<h2>Delete</h2>
Delete circle:
<form action="friend-circles-D.php" method="post">
    <select name="circleId">
        <?php
        all_circles();
        ?>   
    </select>
    <input type="submit" value="Delete">
</form>
Remove a friend from circle:
<form action="friend-circles-remove.php" method="post">
    <select name="circleId">
        <?php
        all_circles();
        ?>   
    </select>
    <select name="userId">
                    <?php
                    all_users();
                    ?>   
    </select>
    <input type="submit" value="Remove">
</form>



</body>
</html>