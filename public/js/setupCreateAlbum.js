function setupCreateAlbum(userId) {
  // Get rid of quotes
  if (userId[0] === '\'' && userId[userId.length - 1] === '\'') {
    userId = userId.substring(1, userId.length - 2);
  }
  // userId taken in to pass on to submitter.
  var ajaxResult = document.getElementById('ajaxResult')
  var button = ajaxResult.getElementsByTagName('button')[0];

  var div1 = document.createElement('div');
  div1.className = 'create-album-container';
  var p1 = document.createElement('p');
  p1.appendChild(document.createTextNode('Enter album name:'));
  var input1 = document.createElement('input');
  input1.type = 'text';
  var newButton = document.createElement('button');
  newButton.type = 'button';
  newButton.onclick = function () {
    // This is the submit function
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState === XMLHttpRequest.DONE) {
        if (this.status == 200) {
          // TODO redirect to album page
          window.location.href= this.responseText;
          // console.log(this.responseText);
        } else if (this.status === 400) {
          var p2 = document.createElement('p');
          p2.appendChild(document.createTextNode(this.responseText));
          document.getElementById('uploadResult').appendChild(p2);

          console.log('There was an error 400');
        } else {
          console.log('Something else other than 200 or 400 was returned');
        }
      }
    };
    var albumName = document.getElementById('ajaxResult').getElementsByClassName('create-album-container')[0].getElementsByTagName('input')[0].value;
    var querystring = '?userId=' + userId + '&albumName=' + albumName;
    xmlhttp.open('POST', '/php/albums/create_album.php' + querystring, true);
    xmlhttp.send();
  };
  newButton.appendChild(document.createTextNode('Click to submit'));

  div1.appendChild(p1)
  div1.appendChild(input1);
  div1.appendChild(newButton);

  ajaxResult.replaceChild(div1, button);
  // document.body.getElementsByClassName('create-album-container')[0].innerHTML = '<p>Enter album name:</p><input type=\"text\">';
};
