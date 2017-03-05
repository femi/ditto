function getAlbumPhotos(albumId) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == XMLHttpRequest.DONE) {
      if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
        document.getElementById('ajaxResult').innerHTML = this.responseText;
      } else if (this.status == 400) {
        console.log("There was an error 400.");
      } else {
        console.log("Something else other than 200 was returned.");
      }
    };
  };
  // gets the values from the page
  var querystring = "?albumId=" + albumId;
  xmlhttp.open("GET", '/php/photos/get_album_photos.php' + querystring, true);
  xmlhttp.send();
}
