<?php include ('session.php'); ?>
<html>
  <body>

    Name: <?php echo $user_data["fName"] . " " . " " . $user_data["lName"] ; ?><br>
    DOB: <?php echo $user_data["dob"]; ?><br>
    Mobile Number: <?php echo $user_data["mobileNumber"]; ?><br>
    Email: <?php echo $user_data["email"]; ?><br>
    Username: <?php echo $user_data["username"]; ?><br>


    <form action="logout.php">
      <input type="submit" value="Logout" />
    </form>

  </body>
</html>
