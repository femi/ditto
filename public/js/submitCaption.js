function submitCaption() {
  // create an XMLHTTPRequest to the php function.
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE) {
      if (this.status === 200) {
        // executed when the request is successful
        getCaption();
      } else if (this.status === 400) {
        console.log("There was an error 400");
      } else {
        console.log("Something else other than 200 or 400 was returned.");
      }
    }
  }
  var filename = parseURL(document.location.href, 1);
  var caption = document.body.getElementsByClassName('caption-container')[0].getElementsByTagName('input')[0].value;
  var querystring = '?filename=' + filename + '&caption=' + caption;

  xmlhttp.open('POST', '../../php/photos/update_photo_caption.php' + querystring, true);
  xmlhttp.send();
};
