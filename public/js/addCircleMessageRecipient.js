function addCircleMessageRecipient(circleId, name) {
  // get the old div
  var div = document.getElementById('circleMessageSearchContainer');
  // Overwrite the div.
  div.innerHTML = '<p>To: <span id=\"circleReceiverId\" class=\"tag is-info is-small\">' + name + '<button class=\"delete is-small\" onclick="resetCircleMessageSearchBox()"></button></span></p>';

  var form = document.getElementById('circleMessageForm');
  form.setAttribute('data-recipientcircleid', circleId); // adds the recipient circleId to the form
}
