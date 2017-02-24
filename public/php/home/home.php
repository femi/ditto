<?php include ('session.php'); ?>
<html>
  <body>

    Name: <?php echo $user_data["fName"] . " " . " " . $user_data["lName"] ; ?><br>
    Sex: <?php echo $user_data["sex"]; ?><br>
    DOB: <?php echo $user_data["dob"]; ?><br>
    Mobile Number: <?php echo $user_data["mobileNumber"]; ?><br>
    Email: <?php echo $user_data["email"]; ?><br>
    City: <?php echo $user_data["city"]; ?><br>
    Description: <?php echo $user_data["description"]; ?><br><br>

    <form action="logout.php">
      <input type="submit" value="Logout" />
    </form>

  </body>
</html>
