function editCaption(albumId, filename) {
  // Load the current caption
  var text = document.getElementById('currentCaption').textContent;
  // Set the caption-container div into an input and submit button
  var test = document.body.getElementsByClassName('caption-container')[0];
  document.body.getElementsByClassName('caption-container')[0].innerHTML = "<div class=\"level\"><div class=\"level-left\"><input class=\"input level-item\" type=\"text\" value=\"" + text + "\"></input></div><div class=\"level-right\"><a class=\"button is-primary level-item\" onclick=\"submitCaption(" + albumId + ", '" + filename + "')\">Submit</a></div></div>";
};
