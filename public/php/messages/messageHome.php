

<?php require_once("$_SERVER[DOCUMENT_ROOT]/php/home/header.php"); ?>

<?php

// REQUIRE THE DATABASE FUNCTIONS

require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_connect.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_query.php");
require_once(realpath(dirname(__FILE__)) . "../../../../resources/db/db_quote.php");

//require_once(realpath(dirname(__FILE__)) . "/viewUserReceived.php");
//session_start(); // session should have already been started.

function getUsersCircles() {
    $userId = $_SESSION['userId'];
    $result = db_query("SELECT DISTINCT name, friendcircles.circleId FROM friendcircles JOIN friendcircle_users WHERE (
        friendcircles.name != 'everyone')  AND (friendcircle_users.userId = $userId OR friendcircles.userId = $userId)");
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
        $circleName = $row['name'];
        $circleId = $row['circleId'];
        echo "<option value=\"$circleId\">$circleName</option>";
    };
}

function getUsersSingleThreadNames() {
    $userId = $_SESSION['userId'];
    $query = "SELECT DISTINCT fName, lName, users.userId FROM messages JOIN users WHERE (senderId = $userId OR receiverId = $userId) AND userId != $userId ORDER BY updatedAt DESC";
    $result = db_query($query);
    if ($result === false) {
        echo mysqli_error(db_connect());
        return;
    }
    return $result;
}

function printUsersSingleThreadNames() {
    $usersSingleThreadNames = getUsersSingleThreadNames();
    while ($row = $usersSingleThreadNames->fetch_assoc()) {
        $fName = $row['fName'];
        $lName = $row['lName'];
        $userId = $row['userId'];
        echo "<option value=\"userId\">$fName $lName</option>";
    }
}


?>

<link rel="stylesheet" type="text/css" href="/css/bulma.css"></link>
<script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="/js/messageSingleUserSearch.js"></script>
<script type="text/javascript" src="/js/addMessageRecipient.js"></script>
<script type="text/javascript" src="/js/messageCircleSearch.js"></script>
<script type="text/javascript" src="/js/addCircleMessageRecipient.js"></script>
<script type="text/javascript">
    function sendMessage(senderId, message) {
        var receiverId = document.getElementById('singleMessageForm').getAttribute('data-recipientuserid');
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

           var querystring = "receiverId=" + <?php echo $_SESSION['userId']; ?>;
           xmlhttp.open("POST", "viewUserReceived.php", true);

           //Send the proper header information along with the request
           // POST DOESN'T WORK WITHOUT THIS
           xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

           xmlhttp.send(querystring);
    };

    function sendCircleMessage(senderId, circleMessage) {
        var circleId = document.getElementById('circleMessageForm').getAttribute('data-recipientcircleid');
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
           xmlhttp.open("POST", "sendCircleMessage.php", true);

           //Send the proper header information along with the request
           // POST DOESN'T WORK WITHOUT THIS
           xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

           xmlhttp.send(querystring);
    };


    function testOption() {
    }

    // print messages in circle
    function printCircleMessages() {
        // get the selectedId
        var circleId = document.getElementById("selectedCircle").value;

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
       xmlhttp.open("POST", "viewCircleMessages.php", true);

       //Send the proper header information along with the request
       // POST DOESN'T WORK WITHOUT THIS
       xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

       xmlhttp.send(querystring);

    }


</script>

<p>Message inbox</p>
<div id="ajaxResult">Message status appears here</div>

<form id="singleMessageForm" data-recipientUserId="">
    <p class="control">
        <div id="singleMessageSearchContainer">
            <p>Send a message to another user:</p>
            <input class="input" type="text" placeholder="Who do you want to send a message to?" onkeyup="messageSingleUserSearch(this.value)"></input><br>
            <div id="singleUserMessageSearchResult"></div>
        </div>
        <textarea class="textarea" rows="2" placeholder="Enter your message" style="width: 300px; height: 200px" id="message"></textarea><br>
        <button id="singleMessageSubmit" class="button is-primary" type="submit" onclick="sendMessage(<?php echo $_SESSION['userId'] ?>, document.getElementById('message').value)">Send</button>
    </p>
</form>



<br><br>
<div class="container">
    <div class="columns is-gapless">
        <div class="column is-half">
            <p>Choose a circle message thread:</p>
            <form>
                <p class="control">
                    <span class="select">
                        <select id="selectedCircle">
                            <?php printUsersCircles(); ?>
                        </select>
                    </span>
                </p>
            </form>
        </div>
        <div class="column is-half">
            <div id="circleMessages"></div>
        </div>
    </div>
</div>

<div class="container">
<form id="circleMessageForm" data-recipientCircleId="">
    <p class="control">
        <div id="circleMessageSearchContainer">
            <p>Send a message to one of your circles, or one you have been included in:</p>
            <input class="input" type="text" placeholder="Which circle do you want to send a message to?" id="circleId" onkeyup="messageCircleSearch(this.value)"></input><br>
            <div id="circleMessageSearchResult"></div>
        </div>
        <textarea class="textarea" rows="2" placeholder="Enter your message" style="width: 300px; height: 200px" id="circleMessage"></textarea><br>
        <button class="button is-primary" type="submit" onclick="sendCircleMessage(<?php echo $_SESSION['userId'] ?>, document.getElementById('circleMessage').value)">Send</button>
    </p>
</form>
</div>


<script type="text/javascript">
$(document).ready(function() {
    setInterval(getMessages, 1000);
    setInterval(printCircleMessages, 1000);
});
</script>
