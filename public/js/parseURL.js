function parseURL(href, index) {
  var list = [];
  var str = "";
  // Gets the final pathname
  for (var i = 0; i < href.length; i++) {
    if (href[i] === '/' && str != "") {
      list.push(str); // add to list
      str = ""; // reset string
    } else {
      str += href[i];
    }
  }
  if (str != "" && str != "/") {
    list.push(str);
  }
  return list[list.length-index];
}
