function retrieveUserBlogs(blogUserId) {
  var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
       if (this.readyState == XMLHttpRequest.DONE) {
         if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
           document.getElementById("ajaxResult").innerHTML = this.responseText;
         } else if (this.status == 400) {
           document.getElementById("ajaxResult").innerHTML = "There was an error 400.";
         } else {
           document.getElementById("ajaxResult").innerHTML = "Something else other than 200 was returned.";
         }
       };
     };
     //gets the values from the page
     console.log(blogUserId);
     var querystring = "blogUserId=" + blogUserId;
     xmlhttp.open("POST", "../../php/blogs/userblogs.php", true);
     //xmlhttp.open("POST", "../../php/blogs/echovars.php", true);
     //Send the proper header information along with the request
     // POST DOESN'T WORK WITHOUT THIS
     xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     console.log(querystring);
     xmlhttp.send(querystring);
}
function deleteComment(commentId) {
  var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
       if (this.readyState == XMLHttpRequest.DONE) {
         if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
           // remove the commnet from the
           var elem = document.getElementById(`c_${commentId}`);
           elem.parentNode.removeChild(elem);
         } else if (this.status == 400) {
           document.getElementById("ajaxResult").innerHTML = "There was an error 400.";
         } else {
           document.getElementById("ajaxResult").innerHTML = "Something else other than 200 was returned.";
         }
       };
     };
     //gets the values from the page
     //console.log(userId);
     var querystring = "commentId=" + commentId;
     xmlhttp.open("POST", "/delete_comment.php", true);
     //xmlhttp.open("POST", "../../php/blogs/echovars.php", true);
     //Send the proper header information along with the request
     // POST DOESN'T WORK WITHOUT THIS
     xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     console.log(querystring);
     xmlhttp.send(querystring);
}
function addComment(blogId, userId, message) {
  console.log("addComment has been triggered")
  var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
       if (this.readyState == XMLHttpRequest.DONE) {
         if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
           document.getElementById("ajaxResult").innerHTML = this.responseText;
         } else if (this.status == 400) {
           document.getElementById("ajaxResult").innerHTML = "There was an error 400.";
         } else {
           document.getElementById("ajaxResult").innerHTML = "Something else other than 200 was returned.";
         }
       };
     };
     //gets the values from the page
     //console.log(userId);
     var querystring = "blogId=" + blogId + "&userId=" + userId + "&message=" + message;
     xmlhttp.open("POST", "../../php/blogs/add_comment.php", true);
     //Send the proper header information along with the request
     // POST DOESN'T WORK WITHOUT THIS
     xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     console.log(querystring);
     xmlhttp.send(querystring);
}

function deleteBlog(blogId) {
  var xmlhttp = new XMLHttpRequest();
     xmlhttp.onreadystatechange = function() {
       if (this.readyState == XMLHttpRequest.DONE) {
         if (this.status == 200) { // this bit of the function is executed upon a succesful response from the server
           // remove the commnet from the
           var elem = document.getElementById(`b_${blogId}`);
           elem.parentNode.removeChild(elem);
         } else if (this.status == 400) {
           document.getElementById("ajaxResult").innerHTML = "There was an error 400.";
         } else {
           document.getElementById("ajaxResult").innerHTML = "Something else other than 200 was returned.";
         }
       };
     };
     //gets the values from the page
     //console.log(userId);
     var querystring = "blogId=" + blogId;
     xmlhttp.open("POST", "/delete_blog.php", true);
     //xmlhttp.open("POST", "../../php/blogs/echovars.php", true);
     //Send the proper header information along with the request
     // POST DOESN'T WORK WITHOUT THIS
     xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     console.log(querystring);
     xmlhttp.send(querystring);

}
