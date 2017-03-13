function resetMessageSearchBox() {
  var div = document.getElementById('singleMessageSearchContainer');
  var html = '<p>Send a message to another user:</p><input class="input" type="text" placeholder="Who do you want to send a message to?" onkeyup="messageSingleUserSearch(this.value)"><br><div id="singleUserMessageSearchResult></div>"';
  div.innerHTML = html;
}
