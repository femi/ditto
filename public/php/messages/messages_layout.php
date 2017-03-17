<?php
  require_once("$_SERVER[DOCUMENT_ROOT]/php/home/header.php");


  // REQUIRE THE DATABASE FUNCTIONS

  require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
  require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
  require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

  // get circles that..
  // 1. a user owns
  // 2. a user has been added to by another user (else they can't reply..)
  function getUsersCircles() {
      $userId = $_SESSION['userId'];
      $result = db_query("
          select name, circleId from friendcircles where circleId in(
          select circleId from friendcircles where userId = $userId and (name != 'everyone'))
          or circleId in (
          select circleId from friendcircle_users where userId = $userId and (name != 'everyone'));
      ");
      if($result === false) {
          echo mysqli_error(db_connect());
      } else {
          // nada
      }
      return $result;
  }

  // populate the option box with the users relevant circles
  function printUsersCircles() {
      echo "<option>Select a circle</option>";
      echo "printing users circles";
      $usersCircles = getUsersCircles();
      while($row = $usersCircles->fetch_assoc()) {
          $circleName = $row['name'];
          $circleId = $row['circleId'];
          echo "<option value=\"$circleId\">$circleName</option>";
      };
  }

?>



<script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
<script>
function sendCircleMessage(senderId, circleMessage) {
    var circleId = document.getElementById('selectedCircle').value;
    console.log("sending message to: " + circleId);


    var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {
         if (this.readyState == XMLHttpRequest.DONE) {
           if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
             document.getElementById("ajaxResult").innerHTML = this.responseText;
           } else if (this.status == 400) {
             document.getElementById("ajaxResult").innerHTML = "There was an error 400.";
           } else {
             document.getElementById("ajaxResult").innerHTML = "Something else other than 200 was returned.";
           }
         };
       };

       //gets the values from the page
       var querystring = "circleId=" + circleId + "&senderId=" + senderId + "&circleMessage=" + circleMessage;
       xmlhttp.open("POST", "/php/messages/sendCircleMessage.php", true);

       //Send the proper header information along with the request
       // POST DOESN'T WORK WITHOUT THIS
       xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

       xmlhttp.send(querystring);
};


// print messages in circle
function printCircleMessages() {
    // get the selectedId
    var circleId = document.getElementById("selectedCircle").value;

    // get the messages from the DATABASE
    var xmlhttp = new XMLHttpRequest();
   xmlhttp.onreadystatechange = function() {
     if (this.readyState == XMLHttpRequest.DONE) {
       if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server

            if (this.responseText == "" && $("#selectedCircle option:selected").text() !== "Select a circle")
            {
              document.getElementById("circleMessages").innerHTML = "No messages found. Say something!"
            } else {
              document.getElementById("circleMessages").innerHTML = this.responseText;
            }


            if ($("#selectedCircle option:selected").text() == "Select a circle") {
                document.getElementById("circleTitle").innerHTML =  "<strong>Please choose a circle</strong>";
            }
            else {
                document.getElementById("circleTitle").innerHTML =  "<strong>" + $("#selectedCircle option:selected").text() + "</strong>";
            };
         //document.getElementById("selectedCircle option:selected").text();
       } else if (this.status == 400) {
         document.getElementById("circleMessages").innerHTML = "There was an error 400.";
       } else {
         document.getElementById("circleMessages").innerHTML = "Something else other than 200 was returned.";
       }
     };
   };

   //gets the values from the database
   var querystring = "circleId=" + circleId + "&userId=" + <?php echo $_SESSION['userId']; ?>;
   xmlhttp.open("POST", "/php/messages/viewCircleMessages.php", true);

   //Send the proper header information along with the request
   // POST DOESN'T WORK WITHOUT THIS
   xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

   xmlhttp.send(querystring);

}
</script>



<div class="container">
  <br><h2 class="title is-2">Messages</h2><hr>
  <div class="columns">

  <div class="column is-one-quarter">
    <h4 class="title is-4"><strong>Select message circle</strong></h4>
    <div class="content">
      Select a circle that you would like to message
    </div>
    <p class="control">
      <span class="select is-medium">



        <select id="selectedCircle">

          <?php printUsersCircles(); ?>

        </select>
      </span>
    </p><br><br>

    <h5 class="title is-5"><strong>Send message</strong></h5>


    <!-- <textarea class="textarea" rows="2" placeholder="Enter your message" style="width: 300px; height: 200px" id="circleMessage"></textarea><br>
    <button class="button is-primary" type="submit" onclick="sendCircleMessage(<?php echo $_SESSION['userId'] ?>, document.getElementById('circleMessage').value)">Send</button> -->


    <!-- the sending message mechanism -->
    <p class="control">
      <textarea id="circleMessage" class="textarea " placeholder="Write your message here :)"></textarea>
    </p>
    <p class="control">
      <a class="button is-primary is-medium" onclick="sendCircleMessage(<?php echo $_SESSION['userId'] ?>, document.getElementById('circleMessage').value)">Send</a>
    </p>
  </div>

  <div class="column is-1"></div>

  <div class="column">

      <h4 id="circleTitle" class="title is-4"><strong>Please choose a circle</strong></h4>

      <div id="circleMessages"></div>

  </div>

</div>

</div>
</div>

<!-- the jQuery polling chat mechanism -->
<script type="text/javascript">
$(document).ready(function() {
    //    setInterval(getMessages, 1000);  // to retreive users individual messages
    setInterval(printCircleMessages, 500);
});
</script>
