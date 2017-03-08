function editCaption(albumId, filename) {
    // Load the current caption
    var text = document.body.getElementsByClassName('caption-container')[0].getElementsByTagName('p')[0].textContent;
    // Set the caption-container div into an input and submit button
    var test = document.body.getElementsByClassName('caption-container')[0];
    document.body.getElementsByClassName('caption-container')[0].innerHTML = "<input class=\"input\" type=\"text\" value=\"" + text + "\"></input>" +
        "<a class=\"button is-info\" onclick=\"submitCaption(" + albumId + ", '" + filename + "')\">Submit</a>";
};
