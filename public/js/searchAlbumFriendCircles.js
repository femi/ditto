function searchAlbumFriendCircles(inputObj, albumId) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == XMLHttpRequest.DONE) {
      if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
        var div = document.getElementById('friendCircles-search-results');
        div.innerHTML = this.responseText;
      } else if (this.status == 400) {
        console.log("There was an error 400.");
      } else {
        console.log("Something else other than 200 was returned.");
      }
    };
  };
  var querystring = '?albumId=' + albumId + '&searchQuery=' + inputObj.value;
  xmlhttp.open("GET", "/php/albums/searchAlbumFriendCircles.php" + querystring, true);
  xmlhttp.send();
}
