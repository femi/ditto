<?php
  session_start();
?>
<html>
  <h1>Register</h1>
  <form method="POST" action="register_controller.php" >
    <input type="text" name="fName" placeholder="First name" required><br>
    <input type="text" name="lName" placeholder="Surname" required><br>
    <input type="text" name="email" placeholder="Email address" required><br>
    <input type="number" name="pNumber" placeholder="Mobile number" required><br>
    <input type="date" name="dob" placeholder="Birthday" required><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <input type="submit" name="submit" value="Create account">
  </form>
</html>
