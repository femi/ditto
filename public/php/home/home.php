<?php include "$_SERVER[DOCUMENT_ROOT]/php/home/session.php"; ?>
<html>
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
  </body>
</html>
