<!DOCTYPE html>
<html>
<head>
<title>FriendCircle CRUD</title>
    <?php
    session_start();
    require_once(__DIR__.'/get-all-users.php');
    require_once(__DIR__.'/friend-circles-R.php');
    
    ?> 
</head>
<body>

<h1>F/C CRUD</h1>

<!-- checks if user is logged in -->
    <?php 
        if (isset($_SESSION['userId'])){
            echo 'User logged in: ';
            echo $_SESSION['userId'];
        } else {
            echo 'Please login! <br>';
            // returns to log in page -- route may require updating when routing is completeled
            echo '<form action="../../../index.php">
                 <input type="submit" value="Log in" />
                </form>';
            die();
        } 
    ?>
    

<!-- retrieve a user's friend-circles -->
<br>
List of user's friend-circles:
    <?php
    print_users_FC($_SESSION['userId']);
    ?>
<br>
<!-- To create a new circle for user that is logged in -->
Create new circle for a user:
<form action="friend-circles-C.php" method="post">
    <input type="text" placeholder="Enter a circleName" name="circleName"></input>
    <input type="submit" value="Create">
</form>

<!-- Update the name of logged in users friend circle -->
Update friend-circles name:
<form action="friend-circles-U.php" method="post">
    <select name="circleId">
        <?php
        users_circles();
        ?>   
    </select>
    <input type="text" placeholder="Enter new name" name="newName"></input>
    <input type="submit" value="Rename">
</form>


<!-- Retrieve friends from a logged in user's circle -->
Retrieve 'friends' form friend-circles :
<form action="friends-in-circle.php" method="post">
    <select name="circleId">
        <?php
         users_circles();
        ?>   
    </select>
    <input type="submit" value="Retrieve">
</form>

Delete circle:
<form action="friend-circles-D.php" method="post">
    <select name="circleId">
        <?php
        users_circles();
        ?>   
    </select>
    <input type="submit" value="Delete">
</form>

</body>
</html>