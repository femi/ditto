function changeAlbumPrivacy(radioButton, albumId) {
  if (radioButton.value === '1') {
    // need to get friendcircles dropdown table etc.
    fillFriendCircleContainer(albumId);
  } else {
    // hide dropdown table
     
    var div1 = document.getElementById('friendCircles-query-result');
    if (div1.hasChildNodes()) {
      div1.innerHTML = "";
    }
    var p1 = document.getElementById('friendCircles-searchbox');
    if (p1.childNodes.length > 0) {
      p1.removeChild(p1.childNodes[0]);
    }
    var div2 = document.getElementById('friendCircles-search-results');
    if (div2.hasChildNodes()) {
      div2.innerHTML = "";
    }
  }
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == XMLHttpRequest.DONE) {
      if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
      } else if (this.status == 400) {
        console.log("There was an error 400.");
      } else {
        console.log("Something else other than 200 was returned.");
      }
    };
  };
  var querystring = "?albumId=" + albumId + '&privacyValue=' + radioButton.value;
  xmlhttp.open("POST", "/php/albums/changeAlbumPrivacy.php" + querystring, true);
  xmlhttp.send();
}
