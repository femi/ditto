<?php


//  MESSAGES
//  Done:
// - ADD POST VARS TO sendUserMessage, that way the form will work, stupid.
//  - link to ajax/jquery so chat is instant
//  - circle messaging


//  TODO:
//
//  - decide on how to split the messages up. what's the exact query for a conversation?
//      - messages as conversations. click to view all messages with certain user in that conversation
//  - integrate with friendCircles: send message to a specific user when logged in, if friends with that user



//  what user wants to see:
//  inbox - click on conversation to view history and continue chat
//  inbox has date, message, sender's username
//  compose a new message to another user
//  compose a new message to a circle

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

//require_once(realpath(dirname(__FILE__)) . "/viewUserReceived.php");
session_start();

function getUsersCircles() {
    $result = db_query('select circleId from friendcircle_users where userId = '.$_SESSION['userId'].';');
    if($result === false) {
        echo mysqli_error(db_connect());
    } else {
        // nada
    }
    return $result;
}

function printUsersCircles() {
    $usersCircles = getUsersCircles();
    while($row = $usersCircles->fetch_assoc()) {
        echo '<option>'.$row['circleId'].'</option>';
    };
}


?>

<script src="../../../resources/jquery-3.1.1.js"></script>
<script>
    function sendMessage(receiverId, senderId, message) {
        console.log("called sendMessage");
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
           var querystring = "receiverId=" + receiverId + "&senderId=" + senderId + "&message=" + message;
           xmlhttp.open("POST", "sendUserMessage.php", true);

           //Send the proper header information along with the request
           // POST DOESN'T WORK WITHOUT THIS
           xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

           xmlhttp.send(querystring);
    };

    function getMessages() {
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
           //console.log(userId);

           var querystring = "receiverId=" + <?php echo $_SESSION['userId']; ?>;
           xmlhttp.open("POST", "viewUserReceived.php", true);

           //Send the proper header information along with the request
           // POST DOESN'T WORK WITHOUT THIS
           xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

           xmlhttp.send(querystring);
    };

    function sendCircleMessage(circleId, senderId, circleMessage) {
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
           console.log(querystring);
           xmlhttp.open("POST", "sendCircleMessage.php", true);

           //Send the proper header information along with the request
           // POST DOESN'T WORK WITHOUT THIS
           xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

           xmlhttp.send(querystring);
    };


    function testOption() {
        console.log("you made the function call");
    }

    // print messages in circle
    function printCircleMessages() {
        console.log("printCircleMessages called");
        // get the selectedId
        var circleId = document.getElementById("selectedCircle").value;
        console.log("circleId is: " + circleId);

        // get the messages from the DATABASE
        var xmlhttp = new XMLHttpRequest();
       xmlhttp.onreadystatechange = function() {
         if (this.readyState == XMLHttpRequest.DONE) {
           if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
             document.getElementById("circleMessages").innerHTML = this.responseText;
           } else if (this.status == 400) {
             document.getElementById("circleMessages").innerHTML = "There was an error 400.";
           } else {
             document.getElementById("circleMessages").innerHTML = "Something else other than 200 was returned.";
           }
         };
       };

       //gets the values from the database
       var querystring = "circleId=" + circleId + "&userId=" + <?php echo $_SESSION['userId']; ?>;
       console.log(querystring);
       xmlhttp.open("POST", "viewCircleMessages.php", true);

       //Send the proper header information along with the request
       // POST DOESN'T WORK WITHOUT THIS
       xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

       xmlhttp.send(querystring);

    }


</script>



current userId: <?php echo $_SESSION['userId']; ?> <br><br>
Here are your messages:<br><br>

<div id="ajaxResult">Message status appears here</div>




<br><br>
Send a message to another user:

<form>
    <input type="text" placeholder="Enter id of recipient" id="receiverId"></input><br>
    <textarea placeholder="Enter your message" style="width: 300px; height: 200px" id="message"></textarea><br>
    <input type="submit" value="Send" onclick="sendMessage(document.getElementById('receiverId').value, <?php echo $_SESSION['userId'] ?>, document.getElementById('message').value)"></input>
</form>

Show messages in your friendCircles:

<form>
    <select id="selectedCircle">
        <?php printUsersCircles(); ?>
    </select>
</form>


<br><br>
<div id="circleMessages">Circle messages appear here</div>
<br><br>



Send a message to a friendCircle:

<form>
    <input type="text" placeholder="Enter circleId" id="circleId"></input><br>
    <textarea placeholder="Enter your message" style="width: 300px; height: 200px" id="circleMessage"></textarea><br>
    <input type="submit" value="Send" onclick="sendCircleMessage(document.getElementById('circleId').value, <?php echo $_SESSION['userId'] ?>, document.getElementById('circleMessage').value)"></input>
</form>


<script>
$(document).ready(function() {
    setInterval(getMessages, 1000);
    setInterval(printCircleMessages, 1000);
});
</script>
