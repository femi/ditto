function getPhotoComment(albumId, filename) {
  // create an XMLHTTPRequest to the php function.
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE) {
      if (this.status === 200) {
        document.getElementById('comments-list') = this.responseText; // replace this node with the results. 
      } else if (this.status === 400) {
        console.log("There was an error 400");
      } else {
        console.log("Something else other than 200 or 400 was returned.");
      }
    }
  }

  var querystring = '?albumId=' + albumId + '&filename=' + filename; 

  xmlhttp.open('POST', '/php/comments/getPhotoComments.php' + querystring, true);
  xmlhttp.send();
};
