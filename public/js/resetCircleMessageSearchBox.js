function resetCircleMessageSearchBox() {
  var div = document.getElementById('circleMessageSearchContainer');
  var html = '<p>Send a message to a friend circle:</p><input class="input" type="text" placeholder="Which circle do you want to send a message to?" onkeyup="messageCircleSearch(this.value)"><br><div id="circleMessageSearchResult></div>"';
  div.innerHTML = html;
}
