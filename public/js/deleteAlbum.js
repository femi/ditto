function deleteAlbum(albumId) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == XMLHttpRequest.DONE) {
      if (this.status == 200) {
        window.location.replace('../albums');
      } else if (this.status == 400) {
        console.log('There was an error 400'); 
      } else {
        console.log('Something else other than 200 or 400 was returned') 
      }
    }
  }
  var querystring = '?albumId=' + albumId;
  xmlhttp.open('POST', '/php/albums/delete_album.php' + querystring, true);
  xmlhttp.send();
}
