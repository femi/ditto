function fillFriendCircleContainer(albumId) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == XMLHttpRequest.DONE) {
      if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
        var queryResultDiv = document.getElementById('friendCircles-query-result'); 
        queryResultDiv.innerHTML = this.response;
        
        // add the search box to the specific p object
        var p1 = document.getElementById('friendCircles-searchbox');
        var input1 = document.createElement('input');
        input1.className = 'input';
        input1.type = 'text';
        input1.onkeyup = function() {
          searchAlbumFriendCircles(input1, albumId);
        }

        p1.appendChild(input1)
      } else if (this.status == 400) {
        console.log("There was an error 400.");
      } else {
        console.log("Something else other than 200 was returned.");
      }
    };
  };
  var querystring = '?albumId=' + albumId;
  xmlhttp.open("GET", "/php/albums/getAlbumFriendCircles.php" + querystring, true);
  xmlhttp.send();
}
