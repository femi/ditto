<?php
require_once("$_SERVER[DOCUMENT_ROOT]/php/routing/permissions.php");


function buttonSelector($userId){


$addFriendButton = <<<BUTTON
              <center>
              <Button value="$userId" onclick="sendFriendRequest(this)" class="button is-success is-medium">
               <span class="icon">
                  <i class="fa fa-user"></i>
                </span>
                <span>Add Friend</span>
              </Button>
              </center>
BUTTON;
  

  $requestSentButton = <<<BUTTON
              <center>
              <Button value="$userId" onclick="deleteFriendRequest(this)" class="button is-danger is-medium">
               <span class="icon">
                  <i class="fa fa-user"></i>
                </span>
                <span>Request Sent</span>
              </Button>
              </center>
BUTTON;

 $alreadyFriendButton = "<button class=\"button is-medium is-disabled\"> Already a Friend</button>";

 $button = "<button class=\"button is-medium is-disabled\"> Error 404</button>"; 

  if (isUserUsersFriend($userId)){
    //if user is friend

    $button = $alreadyFriendButton;
     
    }else if(isFriendRequestSent($userId)){
    // if user is not friend but a friend request has been sent
    $button = $requestSentButton;


            }else{
        //if user is not a friend and a friend request has NOT been sent
    $button = $addFriendButton;


  }

  return $button;
}

?>