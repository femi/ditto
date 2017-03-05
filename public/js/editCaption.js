function editCaption(albumId, filename) {
    // Load the current caption
    console.log(albumId, filename);
    var text = document.body.getElementsByClassName('caption-container')[0].getElementsByTagName('p')[0].textContent;
    // Set the caption-container div into an input and submit button
    var test = document.body.getElementsByClassName('caption-container')[0];
    document.body.getElementsByClassName('caption-container')[0].innerHTML = "<input type=\"text\" value=\"" + text + "\"></input>" +
        "<button type=\"button\" onclick=\"submitCaption(" + albumId + ", " + filename")\">Submit</button>";
};
