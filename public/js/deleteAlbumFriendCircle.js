function deleteAlbumFriendCircle(albumId, circleId) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == XMLHttpRequest.DONE) {
      if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
        replaceCurrentAlbumTags(albumId);
      } else if (this.status == 400) {
        console.log("There was an error 400.");
      } else {
        console.log("Something else other than 200 was returned.");
      }
    };
  };
  var querystring = '?circleId=' + circleId;
  xmlhttp.open("POST", "/php/albums/deleteAlbumFriendCircle.php" + querystring, true);
  xmlhttp.send();
}
