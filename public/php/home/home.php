<?php include "$_SERVER[DOCUMENT_ROOT]/php/home/session.php"; ?>
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

    <form action="../../html/blogs/userblogs.html">
        <input type="submit" value="goto blogs" />
    </form>

    <form action="../../php/messages/messageHome.php">
        <input type="submit" value="goto messages" />
    </form>

  </body>
</html>
