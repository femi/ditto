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
    

<h2>Create</h2>
<!-- To create a new circle for user that is logged in -->
Create new circle for a user:
<form action="friend-circles-C.php" method="post">
    <input type="text" placeholder="Enter a circleName" name="circleName"></input>
    <input type="submit" value="Create">
</form>

Add a friend to a circle:
<form action="friend-circles-add.php" method="post">
    <select name="circleId">
        <?php
         users_circles();
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
List of user's friend-circles:
    <?php
    print_users_FC($_SESSION['userId']);
    ?>
<br>

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


<h2>Update</h2>
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


<h2>Delete</h2>
Delete circle:
<form action="friend-circles-D.php" method="post">
    <select name="circleId">
        <?php
        users_circles();
        ?>   
    </select>
    <input type="submit" value="Delete">
</form>

Remove a friend from circle:
<form action="friend-circles-remove.php" method="post">
    <select name="circleId">
        <?php
        users_circles();
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