  function sendFriendRequest(buttonObject) {
  	console.log (buttonObject);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == XMLHttpRequest.DONE) {
        if (this.status == 200) {
          // this is called when the server issues a 200 response i.e. it processed the request (and potentially completed it).

          buttonObject.innerHTML = "<span class=\"icon\"><i class=\"fa fa-user\"></i></span> <span>Delete Request</span>";
          buttonObject.className = "button is-danger is-medium";
          buttonObject.setAttribute( "onClick", "deleteFriendRequest(this)" );

          // this is where you want to change the button status to sent or whatever
        } else if (this.status == 400) {
          console.log('There was an error 400');
        } else {
          console.log('Something else other than 200 or 400 was returned')
        }
      }
    }
    // you need to get the userId of the recipient of the request from the button (sender is in the session)
    var userId = buttonObject.value;

    var querystring = '?friendId=' + userId;
    xmlhttp.open('POST', '/php/friends/make-friendrequest.php' + querystring, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
  }


  function deleteFriendRequest(buttonObject) {
    console.log (buttonObject);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == XMLHttpRequest.DONE) {
        if (this.status == 200) {
          // this is called when the server issues a 200 response i.e. it processed the request (and potentially completed it).

          buttonObject.innerHTML = "<span class=\"icon\"><i class=\"fa fa-user\"></i></span> <span>Add Friend</span>";
          buttonObject.className = "button is-success is-medium";
          buttonObject.setAttribute( "onClick", "sendFriendRequest(this)" );


          // this is where you want to change the button status to sent or whatever
        } else if (this.status == 400) {
          console.log('There was an error 400');
        } else {
          console.log('Something else other than 200 or 400 was returned')
        }
      }
    }
    // you need to get the userId of the recipient of the request from the button (sender is in the session)
    var userId = buttonObject.value;

    var querystring = '?friendId=' + userId;
    xmlhttp.open('POST', '/php/friends/delete-friendrequest.php' + querystring, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
  }