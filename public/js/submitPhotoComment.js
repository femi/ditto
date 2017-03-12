function submitPhotoComment(albumId, filename) {
  // create an XMLHTTPRequest to the php function.
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE) {
      if (this.status === 200) {
        // document.getElementById('comments-list').value 
        // var test = function(albumId, filename) {
        //   var xmlhttp = new XMLHttpRequest();
        //   xmlhttp.onreadystatechange = function() {
        //     if (this.readyState === XMLHttpRequest.DONE) {
        //       if (this.status === 200) {
        //         return this.responseText
        //       } else if (this.status === 400) {
        //         console.log('There was an error 400');
        //       } else {
        //         console.log('Something else other than a 200 or 400 was returned');
        //       }
        //     }
        //   }
        //   var innerQueryString = '?albumId=' + albumId + '&filename' + filename;
        //   xmlhttp.open('GET', '/php/comments/getPhotoComments.php' + innerQueryString, true);
        //   xmlhttp.send();
        // }
        // document.getElementById('comments-list').value = test(albumId, filename);
        window.location.reload();
      } else if (this.status === 400) {
        console.log("There was an error 400");
      } else {
        console.log("Something else other than 200 or 400 was returned.");
      }
    }
  }

  var message = document.getElementById('commentInput').value;
  var querystring = '?albumId=' + albumId + '&filename=' + filename + '&message=' + message;

  xmlhttp.open('POST', '/php/comments/submitPhotoComment.php' + querystring, true);
  xmlhttp.send();
};
