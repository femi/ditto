<?php
  session_start();
?>
<html>
  <h1>Register</h1>
  <form method="POST" action="register_controller.php" >
    First Name: <input type="text" name="fName" value=""><br>
    Last Name: <input type="text" name="lName" value=""><br>
    Email: <input type="text" name="email" value=""><br>
    Number: <input type="text" name="pNumber" value=""><br>
    DOB: <input type="text" name="dob" value=""><br>
    Password: <input type="text" name="password" value=""><br>
    <input type="submit" name="submit" value="submit">
  </form>
</html>
