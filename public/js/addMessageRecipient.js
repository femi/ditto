function addMessageRecipient(userId, fName, lName) {
  // get the old div
  var div = document.getElementById('singleMessageSearchContainer');
  // Overwrite the div.
  div.innerHTML = '<p>To: <span id=\"receiverId\" class=\"tag is-info is-small\">' + fName + ' ' + lName + '<button class=\"delete is-small\" onclick="resetMessageSearchBox()"></button></span></p>';

  var form = document.getElementById('singleMessageForm');
  form.setAttribute('data-recipientuserid', userId); // adds the recipientId to the form
}
