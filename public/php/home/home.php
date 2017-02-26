<?php include ('session.php'); ?>

<!DOCTYPE html>
<html lang="en">


  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>

  <body>

    <div class="container">
      <?php include ("header.php") ?>
    <div class="row">
      <div class="col-md-8">
        <img width="200" height="200" style="border-outline: grey;" src="https://cdn.pastemagazine.com/www/articles/2010/01/06/drake%20square.jpg" class="img-responsive img-rounded" alt="Responsive image">
        <h2><?php echo $user_data["fName"] . " " . " " . $user_data["lName"] ; ?></h2>
        <h4><?php echo $user_data["email"]; ?><br></h4>
        <form action="logout.php">
          <input type="submit" value="Logout" />
        </form>
      <div class="col-md-4"></div>
    </div>
  </div>


  <!-- Sex: <?php echo $user_data["sex"]; ?><br>
  DOB: <?php echo $user_data["dob"]; ?><br>
  Mobile Number: <?php echo $user_data["mobileNumber"]; ?><br>
  Email: <?php echo $user_data["email"]; ?><br>
  City: <?php echo $user_data["city"]; ?><br>
  Description: <?php echo $user_data["description"]; ?><br><br> -->

  </body>
</html>
