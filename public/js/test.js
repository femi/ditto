function get_album(albumId) {
  var xmlhttp = new XMLHttpRequest():
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById().innerHTML = this.responseText;
    }
  };

}
